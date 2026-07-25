import type { Metadata } from "next";
import { notFound } from "next/navigation";
import { ContactForm } from "@/components/ContactForm";
import { JsonLd } from "@/components/JsonLd";
import { isLocale, t, type Locale } from "@/lib/i18n";
import { breadcrumbJsonLd, buildPageMetadata, seoText } from "@/lib/seo";
import { phoneHref, site, whatsappHref } from "@/lib/site";

export async function generateMetadata({
  params,
}: {
  params: Promise<{ locale: string }>;
}): Promise<Metadata> {
  const { locale: raw } = await params;
  if (!isLocale(raw)) return {};
  const locale = raw as Locale;
  const { title, description } = seoText(
    locale,
    "contact_seo_title",
    "contact_seo_desc",
  );
  return buildPageMetadata({ locale, path: "/contact-us", title, description });
}

export default async function ContactPage({
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
          { name: t(locale, "nav_contact"), path: "/contact-us" },
        ])}
      />
      <section className="page-hero">
        <div className="container">
          <h1>{t(locale, "contact_title")}</h1>
          <p>{t(locale, "contact_sub")}</p>
        </div>
      </section>

      <section className="section">
        <div className="container contact-grid">
          <div>
            <dl className="contact-info">
              <dt>{t(locale, "contact_phone")}</dt>
              <dd>
                <a href={phoneHref()}>{site.phone}</a>
              </dd>
              <dd>
                <a href={phoneHref(site.phone2)}>{site.phone2}</a>
              </dd>

              <dt>{t(locale, "contact_email")}</dt>
              <dd>
                <a href={`mailto:${site.email}`}>{site.email}</a>
              </dd>

              <dt>{t(locale, "contact_address")}</dt>
              <dd className="scd-address">
                {site.addressLines.map((line) => (
                  <span className="scd-address-line" key={line}>
                    {line}
                  </span>
                ))}
              </dd>

              <dt>{t(locale, "contact_hours")}</dt>
              <dd>{t(locale, "contact_hours_val")}</dd>
            </dl>
            <div className="hero-cta" style={{ marginTop: "1.5rem" }}>
              <a className="btn btn-green" href={phoneHref()}>
                {t(locale, "cta_call")}
              </a>
              <a
                className="btn btn-dark"
                href={whatsappHref()}
                target="_blank"
                rel="noopener noreferrer"
              >
                {t(locale, "cta_whatsapp")}
              </a>
            </div>
          </div>
          <div>
            <ContactForm locale={locale} />
          </div>
        </div>
      </section>
    </main>
  );
}
