"use client";

import Image from "next/image";
import Link from "next/link";
import { usePathname } from "next/navigation";
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

export function Header({ locale }: { locale: Locale }) {
  const pathname = usePathname() || "/";
  const [open, setOpen] = useState(false);
  const visiblePath =
    pathname === "/en" || pathname.startsWith("/en/")
      ? pathname === "/en"
        ? "/"
        : pathname.slice(3) || "/"
      : pathname;

  return (
    <header className="site-header">
      <div className="container header-inner">
        <Link className="brand" href={localePath(locale, "/")}>
          <Image
            src="/images/logo.png"
            alt={t(locale, "site_name")}
            width={200}
            height={100}
            className="custom-logo"
            priority
          />
        </Link>

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
      </div>
    </header>
  );
}
