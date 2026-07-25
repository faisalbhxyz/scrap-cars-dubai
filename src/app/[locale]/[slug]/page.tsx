import Image from "next/image";
import Link from "next/link";
import { notFound } from "next/navigation";
import { isLocale, localePath, t, type Locale } from "@/lib/i18n";
import {
  getServiceBySlug,
  serviceKeyId,
  services,
} from "@/lib/services";
import { phoneHref, site, whatsappHref } from "@/lib/site";

export function generateStaticParams() {
  const locales = ["en", "ar"] as const;
  return locales.flatMap((locale) =>
    services.map((svc) => ({ locale, slug: svc.slug })),
  );
}

export default async function ServiceDetailPage({
  params,
}: {
  params: Promise<{ locale: string; slug: string }>;
}) {
  const { locale: raw, slug } = await params;
  if (!isLocale(raw)) notFound();
  const locale = raw as Locale;
  const svc = getServiceBySlug(slug);
  if (!svc) notFound();

  const sid = serviceKeyId(svc.id);
  const waPrefill = whatsappHref(
    locale === "ar"
      ? `مرحباً، أريد بيع: ${t(locale, svc.titleKey)}`
      : `Hi, I want to sell: ${t(locale, svc.titleKey)}`,
  );
  const related = services.filter((s) => s.id !== svc.id).slice(0, 4);

  return (
    <main id="main" className="service-detail">
      <section className="page-hero service-detail-hero">
        <div className="container service-detail-hero-inner">
          <nav className="breadcrumbs" aria-label="Breadcrumb">
            <Link href={localePath(locale, "/")}>{t(locale, "nav_home")}</Link>
            <span aria-hidden="true">/</span>
            <Link href={localePath(locale, "/#services")}>{t(locale, "nav_services")}</Link>
            <span aria-hidden="true">/</span>
            <span>{t(locale, svc.titleKey)}</span>
          </nav>
          <div className="service-detail-hero-grid">
            <div className="service-detail-hero-copy">
              <p className="section-eyebrow">{t(locale, "svc_detail_eyebrow")}</p>
              <h1>{t(locale, `svc_${sid}_h1`)}</h1>
              <p className="service-detail-lead">{t(locale, `svc_${sid}_lead`)}</p>
              <div className="hero-cta service-detail-cta">
                <a className="btn btn-green" href={phoneHref()}>
                  {t(locale, "cta_call")} {site.phone}
                </a>
                <a
                  className="btn btn-outline"
                  href={waPrefill}
                  target="_blank"
                  rel="noopener noreferrer"
                >
                  {t(locale, "cta_whatsapp")}
                </a>
              </div>
            </div>
            <figure className="service-detail-hero-media">
              <Image
                src={`/images/services/${svc.image}.jpg`}
                alt={t(locale, `svc_${sid}_img_alt`)}
                width={640}
                height={640}
                priority
              />
            </figure>
          </div>
        </div>
      </section>

      <section className="section">
        <div className="container service-detail-layout">
          <article className="service-detail-body prose">
            <h2>{t(locale, `svc_${sid}_why_title`)}</h2>
            <p>{t(locale, `svc_${sid}_why`)}</p>

            <h2>{t(locale, "svc_detail_benefits_title")}</h2>
            <ul className="service-detail-list">
              <li>{t(locale, "svc_detail_b1")}</li>
              <li>{t(locale, "svc_detail_b2")}</li>
              <li>{t(locale, "svc_detail_b3")}</li>
              <li>{t(locale, "svc_detail_b4")}</li>
              <li>{t(locale, `svc_${sid}_benefit`)}</li>
            </ul>

            <h2>{t(locale, "how_title")}</h2>
            <ol className="service-detail-steps">
              {[1, 2, 3, 4].map((n) => (
                <li key={n}>
                  <strong>{t(locale, `how_step${n}_title`)}</strong>
                  <span>{t(locale, `how_step${n}_desc`)}</span>
                </li>
              ))}
            </ol>

            <h2>{t(locale, "svc_detail_areas_title")}</h2>
            <p>{t(locale, "svc_detail_areas")}</p>

            <h2>{t(locale, "faq_title")}</h2>
            <div className="faq-list">
              {[1, 2, 3].map((i) => (
                <details className="faq-item" key={i}>
                  <summary>{t(locale, `svc_${sid}_faq_q${i}`)}</summary>
                  <p>{t(locale, `svc_${sid}_faq_a${i}`)}</p>
                </details>
              ))}
            </div>
          </article>

          <aside
            className="service-detail-aside"
            aria-label={t(locale, "svc_detail_aside_label")}
          >
            <div className="service-detail-card">
              <h2>{t(locale, "svc_detail_cta_title")}</h2>
              <p>{t(locale, "svc_detail_cta_sub")}</p>
              <a className="btn btn-green btn-block" href={phoneHref()}>
                {t(locale, "cta_call")}
              </a>
              <a
                className="btn btn-outline btn-block"
                href={waPrefill}
                target="_blank"
                rel="noopener noreferrer"
              >
                {t(locale, "cta_whatsapp")}
              </a>
              <a
                className="btn btn-dark btn-block"
                href={whatsappHref()}
                target="_blank"
                rel="noopener noreferrer"
              >
                {t(locale, "cta_quote")}
              </a>
              <p className="service-detail-hours">
                {t(locale, "contact_hours")}: {t(locale, "contact_hours_val")}
              </p>
            </div>
          </aside>
        </div>
      </section>

      <section className="section section-green-soft">
        <div className="container">
          <div className="section-head">
            <h2>{t(locale, "svc_detail_related_title")}</h2>
          </div>
          <div className="service-grid">
            {related.map((item) => (
              <Link
                key={item.id}
                className="service-item"
                href={localePath(locale, `/${item.slug}`)}
              >
                <span className="service-icon">
                  <Image
                    src={`/images/services/${item.image}.jpg`}
                    alt={t(locale, item.titleKey)}
                    width={120}
                    height={120}
                  />
                </span>
                <h3>{t(locale, item.titleKey)}</h3>
                <span className="service-link">{t(locale, "view_detail")}</span>
              </Link>
            ))}
          </div>
        </div>
      </section>

      <section className="cta-band">
        <div className="container">
          <h2>{t(locale, "cta_banner_title")}</h2>
          <p>{t(locale, "cta_banner_sub")}</p>
          <div className="hero-cta">
            <a className="btn btn-green" href={phoneHref()}>
              {t(locale, "cta_call")} {site.phone}
            </a>
            <a
              className="btn btn-outline"
              href={waPrefill}
              target="_blank"
              rel="noopener noreferrer"
            >
              {t(locale, "cta_whatsapp")}
            </a>
          </div>
        </div>
      </section>
    </main>
  );
}
