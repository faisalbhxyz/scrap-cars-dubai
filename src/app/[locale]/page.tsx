import type { Metadata } from "next";
import Image from "next/image";
import Link from "next/link";
import { notFound } from "next/navigation";
import { HeroMedia } from "@/components/HeroMedia";
import {
  abuDhabiLocations,
  dubaiLocations,
  uaeLocations,
} from "@/lib/locations";
import { isLocale, localePath, locationLabel, t, type Locale } from "@/lib/i18n";
import { buildPageMetadata, seoText } from "@/lib/seo";
import { services } from "@/lib/services";
import { phoneHref, site, whatsappHref } from "@/lib/site";

export async function generateMetadata({
  params,
}: {
  params: Promise<{ locale: string }>;
}): Promise<Metadata> {
  const { locale: raw } = await params;
  if (!isLocale(raw)) return {};
  const locale = raw as Locale;
  const { title, description } = seoText(locale, "home_seo_title", "home_seo_desc");
  return buildPageMetadata({ locale, path: "/", title, description });
}

const brands = [
  ["toyota", "Toyota"],
  ["nissan", "Nissan"],
  ["bmw", "BMW"],
  ["mercedes", "Mercedes"],
  ["audi", "Audi"],
  ["ford", "Ford"],
  ["hyundai", "Hyundai"],
  ["kia", "Kia"],
  ["honda", "Honda"],
  ["lexus", "Lexus"],
  ["chevrolet", "Chevrolet"],
  ["vw", "Volkswagen"],
] as const;

const opsGallery = [
  { file: "tow-truck-car-pickup-dubai.jpg", alt: "img_alt_tow_pickup", mod: "ops-span-tall", w: 1200, h: 1600 },
  { file: "scrap-yard-stacked-cars-dubai.jpg", alt: "img_alt_stacked", mod: "ops-span-tall", w: 899, h: 1262 },
  { file: "scrap-car-tow-truck-dubai.jpg", alt: "img_alt_tow_truck", mod: "ops-span-tall", w: 1100, h: 1466 },
  { file: "scrap-car-engines-parts-dubai-recycling.jpg", alt: "img_alt_engines", mod: "ops-span-tall", w: 1200, h: 1592 },
  { file: "buy-used-suv-scrap-dubai.jpg", alt: "img_alt_used_suv", mod: "ops-span-wide", w: 1400, h: 1050 },
  { file: "abandoned-mercedes-scrap-dubai.jpg", alt: "img_alt_mercedes", mod: "ops-span-mid", w: 960, h: 1280 },
  { file: "accident-damaged-scrap-car-dubai.jpg", alt: "img_alt_accident", mod: "ops-span-mid", w: 1100, h: 1290 },
  { file: "mercedes-engine-scrap-parts-dubai.jpg", alt: "img_alt_merc_engine", mod: "ops-span-wide", w: 1200, h: 900 },
  { file: "scrap-mitsubishi-pajero-dubai.jpg", alt: "img_alt_pajero", mod: "ops-span-wide", w: 1280, h: 960 },
  { file: "abandoned-suv-scrap-dubai.jpg", alt: "img_alt_abandoned_suv", mod: "ops-span-mid", w: 899, h: 1599 },
  { file: "scrap-car-recovery-dubai-desert.jpg", alt: "img_alt_desert", mod: "ops-span-mid", w: 960, h: 1280 },
  { file: "scrap-suv-pickup-dubai.jpg", alt: "img_alt_terrain", mod: "ops-span-mid", w: 1100, h: 1466 },
  { file: "rear-damaged-junk-car-dubai.jpg", alt: "img_alt_rear_damage", mod: "ops-span-mid", w: 720, h: 1600 },
  { file: "car-scrap-yard-dubai-salvage-lot.jpg", alt: "img_alt_hero", mod: "ops-span-wide", w: 1600, h: 1067 },
  { file: "used-pajero-scrap-buy-dubai.jpg", alt: "img_alt_pajero_rear", mod: "ops-span-mid", w: 1280, h: 960 },
  { file: "end-of-life-suv-scrap-dubai.jpg", alt: "img_alt_eol_suv", mod: "ops-span-mid", w: 1100, h: 1466 },
  { file: "scrap-car-engine-inspection-dubai.jpg", alt: "img_alt_engine_inspect", mod: "ops-span-full", w: 864, h: 1152 },
] as const;

const pin = (
  <svg className="locations-pin" width="18" height="18" viewBox="0 0 24 24" aria-hidden focusable="false">
    <path
      fill="currentColor"
      d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"
    />
  </svg>
);

export default async function HomePage({
  params,
}: {
  params: Promise<{ locale: string }>;
}) {
  const { locale: raw } = await params;
  if (!isLocale(raw)) notFound();
  const locale = raw as Locale;
  const wa = whatsappHref();

  return (
    <main id="main">
      <section className="hero">
        <HeroMedia alt={t(locale, "img_alt_hero")} />
        <div className="hero-scrim" aria-hidden="true" />
        <div className="container hero-inner">
          <p className="hero-brand">
            {locale === "ar" ? (
              t(locale, "hero_brand")
            ) : (
              <>
                Car Scrap <span>Dubai</span>
              </>
            )}
          </p>
          <h1>{t(locale, "hero_headline")}</h1>
          <p>{t(locale, "hero_sub")}</p>
          <div className="hero-cta">
            <a className="btn btn-green" href={phoneHref()}>
              {t(locale, "cta_quote")}
            </a>
            <a className="btn btn-outline" href={wa} target="_blank" rel="noopener noreferrer">
              {t(locale, "cta_whatsapp")}
            </a>
          </div>
        </div>
      </section>

      <section className="section section-services" id="services">
        <div className="container">
          <div className="section-head reveal">
            <p className="section-eyebrow">
              {locale === "ar" ? "خدماتنا" : "What we buy"}
            </p>
            <h2>{t(locale, "services_title")}</h2>
            <p>{t(locale, "services_sub")}</p>
          </div>
          <div className="service-grid reveal">
            {services.map((svc) => (
              <Link
                key={svc.id}
                className="service-item"
                href={localePath(locale, `/${svc.slug}`)}
              >
                <span className="service-icon">
                  <Image
                    src={`/images/services/${svc.image}.jpg`}
                    alt={`${t(locale, svc.titleKey)} — ${t(locale, "site_name")}`}
                    width={120}
                    height={120}
                    sizes="120px"
                    quality={70}
                  />
                </span>
                <h3>{t(locale, svc.titleKey)}</h3>
                <p className="service-desc screen-reader-text">{t(locale, svc.descKey)}</p>
                <span className="service-link">{t(locale, "view_detail")}</span>
              </Link>
            ))}
          </div>
        </div>
      </section>

      <section className="section section-green-soft" id="our-services">
        <div className="container">
          <div className="section-head reveal">
            <h2>{t(locale, "our_services")}</h2>
          </div>
          <div className="feature-row reveal">
            {(
              [
                ["service_quote_title", "service_quote_desc"],
                ["service_price_title", "service_price_desc"],
                ["service_salvage_title", "service_salvage_desc"],
                ["service_recycle_title", "service_recycle_desc"],
              ] as const
            ).map(([title, desc]) => (
              <div className="feature-block" key={title}>
                <h3>{t(locale, title)}</h3>
                <p>{t(locale, desc)}</p>
              </div>
            ))}
          </div>
        </div>
      </section>

      <section className="section section-band" id="how-it-works">
        <div className="container">
          <div className="section-head reveal">
            <h2>{t(locale, "how_title")}</h2>
            <p>{t(locale, "how_intro")}</p>
          </div>
          <div className="steps reveal">
            {[1, 2, 3, 4].map((n) => (
              <div className="step" key={n}>
                <h3>{t(locale, `how_step${n}_title`)}</h3>
                <p>{t(locale, `how_step${n}_desc`)}</p>
              </div>
            ))}
          </div>
        </div>
      </section>

      <section className="section" id="why-us">
        <div className="container">
          <div className="section-head reveal">
            <h2>{t(locale, "why_title")}</h2>
            <p>{t(locale, "why_sub")}</p>
          </div>
          <div className="why-grid reveal">
            {(
              [
                ["why_price", "why_price_desc"],
                ["why_free", "why_free_desc"],
                ["why_trust", "why_trust_desc"],
                ["why_fast", "why_fast_desc"],
                ["why_hassle", "why_hassle_desc"],
                ["why_flex", "why_flex_desc"],
              ] as const
            ).map(([title, desc]) => (
              <div className="why-item" key={title}>
                <h3>{t(locale, title)}</h3>
                <p>{t(locale, desc)}</p>
              </div>
            ))}
          </div>
        </div>
      </section>

      <section className="section section-green-soft">
        <div className="container">
          <div className="stats reveal">
            <div className="stat">
              <strong>1,000+</strong>
              <span>{t(locale, "stats_customers")}</span>
            </div>
            <div className="stat">
              <strong>800+</strong>
              <span>{t(locale, "stats_deals")}</span>
            </div>
            <div className="stat">
              <strong>24/7</strong>
              <span>{t(locale, "stats_hours")}</span>
            </div>
            <div className="stat">
              <strong>UAE</strong>
              <span>{t(locale, "stats_areas")}</span>
            </div>
          </div>
        </div>
      </section>

      <section className="section">
        <div className="container">
          <div className="section-head reveal" style={{ textAlign: "center", marginInline: "auto" }}>
            <h2>{t(locale, "brands_title")}</h2>
          </div>
          <div className="brands reveal">
            {brands.map(([slug, name]) => (
              <span className="brand-chip" key={slug}>
                {/* eslint-disable-next-line @next/next/no-img-element */}
                <img
                  src={`/images/brands/${slug}.svg`}
                  alt={name}
                  width={120}
                  height={48}
                  loading="lazy"
                  decoding="async"
                  fetchPriority="low"
                />
              </span>
            ))}
          </div>
        </div>
      </section>

      <section className="section section-locations" id="locations">
        <div className="container">
          <div className="section-head reveal">
            <p className="section-eyebrow">
              {locale === "ar" ? "مناطق الخدمة" : "Service areas"}
            </p>
            <h2>{t(locale, "locations_title")}</h2>
            <p>{t(locale, "locations_sub")}</p>
          </div>
          <div className="locations-panels reveal">
            <div className="locations-panel">
              <h3 className="locations-panel-title">
                {pin}
                {t(locale, "locations_dubai_title")}
              </h3>
              <ul className="locations-list">
                {dubaiLocations.map((loc) => (
                  <li key={loc.en}>{locationLabel(locale, loc)}</li>
                ))}
              </ul>
            </div>
            <div className="locations-panel">
              <h3 className="locations-panel-title">
                {pin}
                {t(locale, "locations_uae_title")}
              </h3>
              <p className="locations-group-label">{t(locale, "locations_abu_dhabi_title")}</p>
              <ul className="locations-list">
                {abuDhabiLocations.map((loc) => (
                  <li key={loc.en}>{locationLabel(locale, loc)}</li>
                ))}
              </ul>
              <ul className="locations-list locations-list--emirates">
                {uaeLocations.map((loc) => (
                  <li key={loc.en}>{locationLabel(locale, loc)}</li>
                ))}
              </ul>
            </div>
          </div>
        </div>
      </section>

      <section className="section section-yard" id="about">
        <div className="container">
          <div className="section-head reveal">
            <p className="section-eyebrow">
              {locale === "ar" ? "عملياتنا" : "Operations"}
            </p>
            <h2>{t(locale, "yard_title")}</h2>
            <p>{t(locale, "yard_sub")}</p>
          </div>
          <div className="yard-intro reveal">
            <div className="yard-copy">
              <h3>{t(locale, "about_title")}</h3>
              <p>{t(locale, "about_p1")}</p>
              <p>{t(locale, "about_p2")}</p>
            </div>
            <figure className="yard-shot yard-shot--feature yard-shot--highlight">
              <Image
                src="/images/yard/scrap-yard-dubai-burnt-car-salvage.jpg"
                alt={t(locale, "img_alt_salvage")}
                width={1000}
                height={901}
                sizes="(max-width: 900px) 100vw, 50vw"
                quality={70}
              />
              <figcaption className="yard-caption">
                {t(locale, "img_caption_highlight")}
              </figcaption>
            </figure>
          </div>
          <div
            className="ops-mosaic reveal"
            aria-label={
              locale === "ar" ? "معرض عمليات السكراب" : "Scrap operations photo gallery"
            }
          >
            {opsGallery.map((shot) => (
              <figure className={`yard-shot ${shot.mod}`} key={shot.file}>
                <Image
                  src={`/images/yard/${shot.file}`}
                  alt={t(locale, shot.alt)}
                  width={shot.w}
                  height={shot.h}
                  sizes={
                    shot.mod === "ops-span-full"
                      ? "100vw"
                      : shot.mod === "ops-span-wide"
                        ? "(max-width: 768px) 100vw, 66vw"
                        : "(max-width: 768px) 50vw, 33vw"
                  }
                  quality={65}
                />
              </figure>
            ))}
          </div>
        </div>
      </section>

      <section className="section section-green-soft" id="faq">
        <div className="container">
          <div className="section-head reveal">
            <h2>{t(locale, "faq_title")}</h2>
          </div>
          <div className="faq-list reveal">
            {[1, 2, 3, 4, 5, 6, 7].map((i) => (
              <details className="faq-item" key={i}>
                <summary>{t(locale, `faq_q${i}`)}</summary>
                <p>{t(locale, `faq_a${i}`)}</p>
              </details>
            ))}
          </div>
        </div>
      </section>

      <section className="cta-band">
        <div className="container reveal">
          <h2>{t(locale, "cta_banner_title")}</h2>
          <p>{t(locale, "cta_banner_sub")}</p>
          <div className="hero-cta">
            <a className="btn btn-green" href={phoneHref()}>
              {t(locale, "cta_call")} {site.phone}
            </a>
            <a className="btn btn-outline" href={wa} target="_blank" rel="noopener noreferrer">
              {t(locale, "cta_sell")}
            </a>
          </div>
        </div>
      </section>
    </main>
  );
}
