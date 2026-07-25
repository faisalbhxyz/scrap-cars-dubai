import type { Metadata } from "next";
import { notFound } from "next/navigation";
import { JsonLd } from "@/components/JsonLd";
import { isLocale, t, type Locale } from "@/lib/i18n";
import { breadcrumbJsonLd, buildPageMetadata, seoText } from "@/lib/seo";
import { phoneHref, whatsappHref } from "@/lib/site";

export async function generateMetadata({
  params,
}: {
  params: Promise<{ locale: string }>;
}): Promise<Metadata> {
  const { locale: raw } = await params;
  if (!isLocale(raw)) return {};
  const locale = raw as Locale;
  const { title, description } = seoText(locale, "about_seo_title", "about_seo_desc");
  return buildPageMetadata({ locale, path: "/about-us", title, description });
}

export default async function AboutPage({
  params,
}: {
  params: Promise<{ locale: string }>;
}) {
  const { locale: raw } = await params;
  if (!isLocale(raw)) notFound();
  const locale = raw as Locale;

  return (
    <main id="main">
      <JsonLd
        data={breadcrumbJsonLd(locale, [
          { name: t(locale, "nav_home"), path: "/" },
          { name: t(locale, "nav_about"), path: "/about-us" },
        ])}
      />
      <section className="page-hero">
        <div className="container">
          <h1>{t(locale, "about_title")}</h1>
          <p>{t(locale, "why_sub")}</p>
        </div>
      </section>
      <section className="content-block">
        <div className="container prose">
          <p>{t(locale, "about_p1")}</p>
          <p>{t(locale, "about_p2")}</p>
          <p>{t(locale, "about_p3")}</p>
          <p>
            {locale === "ar"
              ? "نخدم دبي وجميع الإمارات — استلام مجاني، عرض سعر فوري، ودفع عبر التحويل البنكي بعد الاستلام."
              : "We serve Dubai and all UAE emirates — free pickup, instant quotes, and bank-transfer payment after collection."}
          </p>
          <p>
            {locale === "ar"
              ? "من سيارات الحوادث والملكية المنتهية إلى السيارات الغارقة وغير العاملة، نشتري جميع الحالات والماركات."
              : "From accidental and mulkiya-finish cars to flooded and non-running vehicles, we buy all conditions and major brands."}
          </p>
          <div className="hero-cta" style={{ marginTop: "1.25rem" }}>
            <a className="btn btn-green" href={phoneHref()}>
              {t(locale, "cta_call")}
            </a>
            <a
              className="btn btn-dark"
              href={whatsappHref()}
              target="_blank"
              rel="noopener noreferrer"
            >
              {t(locale, "cta_sell")}
            </a>
          </div>
        </div>
      </section>
    </main>
  );
}
