"use client";

import Link from "next/link";
import { useState } from "react";
import { localePath, switchLocalePath, t, type Locale } from "@/lib/i18n";
import { phoneHref } from "@/lib/site";

const nav = [
  { key: "nav_home", path: "/" },
  { key: "nav_services", path: "/#services" },
  { key: "nav_how", path: "/#how-it-works" },
  { key: "nav_locations", path: "/#locations" },
  { key: "nav_why", path: "/#why-us" },
  { key: "nav_about", path: "/about-us" },
  { key: "nav_blog", path: "/blog" },
  { key: "nav_faq", path: "/faqs" },
] as const;

export function HeaderChrome({
  locale,
  visiblePath,
}: {
  locale: Locale;
  visiblePath: string;
}) {
  const [open, setOpen] = useState(false);

  return (
    <>
      <div className={`nav-wrap${open ? " is-open" : ""}`} id="site-nav">
        <nav className="primary-nav" aria-label="Primary">
          <ul className="nav-list">
            {nav.map((item) => (
              <li key={item.key}>
                <Link
                  href={localePath(locale, item.path)}
                  onClick={() => setOpen(false)}
                >
                  {t(locale, item.key)}
                </Link>
              </li>
            ))}
          </ul>
        </nav>
      </div>

      <div className="header-right">
        <div className="lang-switch" role="navigation" aria-label="Language">
          <Link
            className={locale === "en" ? "is-active" : ""}
            href={switchLocalePath(locale, "en", visiblePath)}
          >
            EN
          </Link>
          <Link
            className={locale === "ar" ? "is-active" : ""}
            href={switchLocalePath(locale, "ar", visiblePath)}
          >
            ع
          </Link>
        </div>

        <a className="btn btn-green btn-call-desktop" href={phoneHref()}>
          {t(locale, "cta_call")}
        </a>

        <button
          className="menu-toggle"
          type="button"
          aria-expanded={open}
          aria-controls="site-nav"
          aria-label={t(locale, "menu_open")}
          onClick={() => setOpen((v) => !v)}
        >
          <span />
          <span />
          <span />
        </button>
      </div>
    </>
  );
}
