import type { MetadataRoute } from "next";
import { localePath, type Locale } from "@/lib/i18n";
import { getAllPosts } from "@/lib/posts";
import { services } from "@/lib/services";
import { site } from "@/lib/site";

const staticPaths = [
  "/",
  "/about-us",
  "/contact-us",
  "/faqs",
  "/how-it-works",
  "/why-choose-us",
  "/privacy-policy",
  "/blog",
] as const;

function absoluteUrl(path: string) {
  if (path === "/") return site.url;
  return `${site.url}${path}`;
}

function pageEntry(
  path: string,
  locale: Locale,
  opts: {
    changeFrequency: NonNullable<MetadataRoute.Sitemap[number]["changeFrequency"]>;
    priority: number;
  },
): MetadataRoute.Sitemap[number] {
  const en = absoluteUrl(localePath("en", path));
  const ar = absoluteUrl(localePath("ar", path));

  return {
    url: locale === "ar" ? ar : en,
    lastModified: new Date(),
    changeFrequency: opts.changeFrequency,
    priority: opts.priority,
    alternates: {
      languages: {
        en,
        ar,
        "x-default": en,
      },
    },
  };
}

export default function sitemap(): MetadataRoute.Sitemap {
  const pages: MetadataRoute.Sitemap = [];

  for (const path of staticPaths) {
    const changeFrequency = path === "/" ? "weekly" : "monthly";
    const priority = path === "/" ? 1 : 0.8;
    pages.push(pageEntry(path, "en", { changeFrequency, priority }));
    pages.push(pageEntry(path, "ar", { changeFrequency, priority }));
  }

  for (const svc of services) {
    const path = `/${svc.slug}`;
    const opts = { changeFrequency: "monthly" as const, priority: 0.7 };
    pages.push(pageEntry(path, "en", opts));
    pages.push(pageEntry(path, "ar", opts));
  }

  for (const post of getAllPosts()) {
    const path = `/blog/${post.slug}`;
    const lastModified = new Date(`${post.date}T08:00:00+04:00`);
    for (const locale of ["en", "ar"] as const) {
      const entry = pageEntry(path, locale, {
        changeFrequency: "monthly",
        priority: 0.75,
      });
      pages.push({ ...entry, lastModified });
    }
  }

  return pages;
}
