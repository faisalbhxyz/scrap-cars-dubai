#!/usr/bin/env python3
"""Export local WordPress site to a static /site folder for Vercel."""

from __future__ import annotations

import json
import re
import shutil
import urllib.error
import urllib.parse
import urllib.request
from pathlib import Path

LOCAL = "http://localhost:8882"
PROD = "https://scrap-cars-dubai.vercel.app"
ROOT = Path(__file__).resolve().parent
OUT = ROOT / "site"
THEME_ASSETS = ROOT / "wp-content" / "themes" / "scrapcarsdubai" / "assets"
UPLOADS = ROOT / "wp-content" / "uploads"

SKIP_PATH_PREFIXES = (
    "/wp-json",
    "/wp-admin",
    "/wp-includes",
    "/feed",
    "/comments/",
    "/xmlrpc",
)


def fetch(url: str) -> bytes:
    req = urllib.request.Request(
        url,
        headers={"User-Agent": "scrap-cars-dubai-static-export/1.0"},
    )
    with urllib.request.urlopen(req, timeout=60) as resp:
        return resp.read()


def page_list() -> list[dict]:
    raw = fetch(f"{LOCAL}/wp-json/wp/v2/pages?per_page=100")
    return json.loads(raw.decode("utf-8"))


def path_from_link(link: str) -> str:
    parsed = urllib.parse.urlparse(link)
    path = parsed.path or "/"
    if not path.endswith("/"):
        path += "/"
    return path


def out_path_for(path: str, lang: str) -> Path:
    clean = path.strip("/")
    if lang == "ar":
        if clean:
            return OUT / "ar" / clean / "index.html"
        return OUT / "ar" / "index.html"
    if clean:
        return OUT / clean / "index.html"
    return OUT / "index.html"


def rewrite_html(html: str, lang: str) -> str:
    # Absolute local -> production
    html = html.replace(LOCAL, PROD)
    html = html.replace(LOCAL.replace("http://", "https://"), PROD)

    # Theme assets + uploads -> short static paths
    html = html.replace(
        f"{PROD}/wp-content/themes/scrapcarsdubai/assets/",
        f"{PROD}/assets/",
    )
    html = html.replace(
        "/wp-content/themes/scrapcarsdubai/assets/",
        "/assets/",
    )
    html = html.replace(f"{PROD}/wp-content/uploads/", f"{PROD}/uploads/")
    html = html.replace("/wp-content/uploads/", "/uploads/")

    # Strip cache-busting query on static assets we control
    html = re.sub(r"(/assets/[^\"'\s]+)\?ver=[^\"'\s]+", r"\1", html)

    # Relative language switchers from WP scd_switch_url()
    html = html.replace('href="/?lang=ar"', 'href="/ar/"')
    html = html.replace("href='/?lang=ar'", "href='/ar/'")
    html = html.replace('href="/?lang=en"', 'href="/"')
    html = html.replace("href='/?lang=en'", "href='/'")

    def to_ar_path(path: str) -> str:
        path = path or "/"
        if not path.startswith("/"):
            path = "/" + path
        if path.startswith("/ar/") or path == "/ar":
            return path if path.endswith("/") else path + "/"
        if path == "/":
            return "/ar/"
        if not path.endswith("/"):
            path += "/"
        return "/ar" + path

    def lang_ar_repl(match: re.Match[str]) -> str:
        url = match.group(0)
        parsed = urllib.parse.urlparse(url if "://" in url else "http://x" + url)
        q = urllib.parse.parse_qs(parsed.query)
        if q.get("lang", [None])[0] != "ar":
            return url
        new_path = to_ar_path(parsed.path or "/")
        frag = f"#{parsed.fragment}" if parsed.fragment else ""
        q.pop("lang", None)
        qs = urllib.parse.urlencode({k: v[0] for k, v in q.items()})
        base = PROD if url.startswith("http") else ""
        if qs:
            return f"{base}{new_path}?{qs}{frag}"
        return f"{base}{new_path}{frag}"

    html = re.sub(
        rf'{re.escape(PROD)}/[^\s"\']*\?lang=ar[^\s"\']*',
        lang_ar_repl,
        html,
    )
    html = re.sub(
        r'(?<!["\w])/[^\s"\']*\?lang=ar[^\s"\']*',
        lang_ar_repl,
        html,
    )
    html = re.sub(r'href="(/[^"#?]*)/?\?lang=ar"', lambda m: f'href="{to_ar_path(m.group(1))}"', html)

    # English switch links pointing at ?lang=en
    html = re.sub(
        rf'{re.escape(PROD)}(/[^\s"\']*)\?lang=en([^\s"\']*)',
        rf"{PROD}\1\2",
        html,
    )
    html = re.sub(r'href="(/[^"#?]*)/?\?lang=en"', r'href="\1"', html)
    html = re.sub(r'href="/ar/\?lang=en"', 'href="/"', html)
    html = re.sub(r'href="/ar(/[^"#?]*)/?\?lang=en"', r'href="\1"', html)

    # Fix hreflang alternates that still use query style
    html = re.sub(
        rf'(hreflang="ar" href="){re.escape(PROD)}/\?lang=ar(")',
        rf'\1{PROD}/ar/\2',
        html,
    )
    html = re.sub(
        rf'(hreflang="ar" href="){re.escape(PROD)}(/[^"\']+)/?\?lang=ar(")',
        rf'\1{PROD}/ar\2/\3',
        html,
    )

    # On Arabic pages, ensure language switcher to EN drops /ar
    if lang == "ar":
        html = re.sub(
            rf'(hreflang="en" href="){re.escape(PROD)}/ar/(")',
            rf'\1{PROD}/\2',
            html,
        )
        html = re.sub(
            rf'(hreflang="en" href="){re.escape(PROD)}/ar(/[^"\']+)(")',
            rf'\1{PROD}\2\3',
            html,
        )

    # Drop noisy WP discovery tags that are useless on static host
    drop_patterns = [
        r'<link rel="alternate" type="application/rss\+xml"[^>]*>\s*',
        r'<link rel="alternate" title="oEmbed[^>]*>\s*',
        r'<link rel="EditURI"[^>]*>\s*',
        r'<link rel="https://api\.w\.org/"[^>]*>\s*',
        r'<link rel="alternate" title="JSON"[^>]*>\s*',
        r'<link rel=\'dns-prefetch\' href=\'//localhost\'[^>]*>\s*',
        r'<meta name="generator" content="WordPress[^>]*>\s*',
        r'<script[^>]*wp-emoji[^>]*>.*?</script>\s*',
        r'<style[^>]*wp-emoji[^>]*>.*?</style>\s*',
        r'<style[^>]*wp-img-auto-sizes[^>]*>.*?</style>\s*',
        r'<style[^>]*id=["\']wp-block-library[^>]*>.*?</style>\s*',
        r'<style[^>]*id=["\']global-styles[^>]*>.*?</style>\s*',
        r'<style[^>]*id=["\']classic-theme-styles[^>]*>.*?</style>\s*',
    ]
    for pat in drop_patterns:
        html = re.sub(pat, "", html, flags=re.I | re.S)

    # Remove leftover wp-includes script tags
    html = re.sub(
        r'<script[^>]+src=["\'][^"\']*wp-includes[^"\']*["\'][^>]*>\s*</script>\s*',
        "",
        html,
        flags=re.I,
    )

    return html


def copy_assets() -> None:
    dest_assets = OUT / "assets"
    if dest_assets.exists():
        shutil.rmtree(dest_assets)
    shutil.copytree(THEME_ASSETS, dest_assets)

    dest_uploads = OUT / "uploads"
    if dest_uploads.exists():
        shutil.rmtree(dest_uploads)
    if UPLOADS.exists():
        shutil.copytree(UPLOADS, dest_uploads)


def write_robots_and_sitemap(paths: list[str]) -> None:
    robots = f"""User-agent: *
Allow: /

Sitemap: {PROD}/sitemap.xml
"""
    (OUT / "robots.txt").write_text(robots, encoding="utf-8")

    urls: list[str] = []
    for path in paths:
        urls.append(f"{PROD}{path if path != '/' else '/'}")
        if path == "/":
            urls.append(f"{PROD}/ar/")
        else:
            urls.append(f"{PROD}/ar{path}")

    body = [
        '<?xml version="1.0" encoding="UTF-8"?>',
        '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">',
    ]
    for u in sorted(set(urls)):
        body.append("  <url>")
        body.append(f"    <loc>{u}</loc>")
        body.append("  </url>")
    body.append("</urlset>")
    body.append("")
    (OUT / "sitemap.xml").write_text("\n".join(body), encoding="utf-8")


def main() -> None:
    if OUT.exists():
        shutil.rmtree(OUT)
    OUT.mkdir(parents=True)

    pages = page_list()
    paths: list[str] = []
    for page in pages:
        path = path_from_link(page["link"])
        paths.append(path)

        for lang in ("en", "ar"):
            if lang == "ar":
                url = page["link"]
                sep = "&" if "?" in url else "?"
                url = f"{url}{sep}lang=ar"
            else:
                url = page["link"]

            print(f"Fetching [{lang}] {url}")
            try:
                raw = fetch(url)
            except urllib.error.HTTPError as exc:
                print(f"  SKIP {exc.code}: {url}")
                continue
            html = rewrite_html(raw.decode("utf-8", errors="replace"), lang)
            dest = out_path_for(path, lang)
            dest.parent.mkdir(parents=True, exist_ok=True)
            dest.write_text(html, encoding="utf-8")
            print(f"  -> {dest.relative_to(ROOT)}")

    copy_assets()
    write_robots_and_sitemap(paths)
    print(f"Done. Static site at {OUT}")


if __name__ == "__main__":
    main()
