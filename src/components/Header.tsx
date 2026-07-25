import Link from "next/link";
import { headers } from "next/headers";
import { BrandLogo } from "@/components/BrandLogo";
import { HeaderChrome } from "@/components/HeaderChrome";
import { localePath, t, type Locale } from "@/lib/i18n";

export async function Header({ locale }: { locale: Locale }) {
  const pathname = (await headers()).get("x-pathname") || "/";
  const visiblePath =
    pathname === "/en" || pathname.startsWith("/en/")
      ? pathname === "/en"
        ? "/"
        : pathname.slice(3) || "/"
      : pathname.startsWith("/ar")
        ? pathname === "/ar"
          ? "/"
          : pathname.slice(3) || "/"
        : pathname;

  return (
    <header className="site-header">
      <div className="container header-inner">
        <Link className="brand" href={localePath(locale, "/")}>
          <BrandLogo alt={t(locale, "site_name")} />
        </Link>
        <HeaderChrome locale={locale} visiblePath={visiblePath} />
      </div>
    </header>
  );
}
