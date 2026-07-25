import { notFound } from "next/navigation";
import { isLocale, t, type Locale } from "@/lib/i18n";
import { phoneHref, whatsappHref } from "@/lib/site";

export default async function WhyChooseUsPage({
  params,
}: {
  params: Promise<{ locale: string }>;
}) {
  const { locale: raw } = await params;
  if (!isLocale(raw)) notFound();
  const locale = raw as Locale;

  return (
    <main id="main">
      <section className="page-hero">
        <div className="container">
          <h1>{t(locale, "why_title")}</h1>
          <p>{t(locale, "why_sub")}</p>
        </div>
      </section>

      <section className="section">
        <div className="container">
          <div className="why-grid">
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
                <h2>{t(locale, title)}</h2>
                <p>{t(locale, desc)}</p>
              </div>
            ))}
          </div>
        </div>
      </section>

      <section className="section section-green-soft">
        <div className="container prose">
          <p>
            {locale === "ar"
              ? "آلاف البائعين في دبي والإمارات اختاروا كار سكراب دبي لأسعار عادلة واستلام سريع وإعادة تدوير مسؤولة."
              : "Thousands of sellers across Dubai and the UAE choose Car Scrap Dubai for fair prices, fast collection, and responsible recycling."}
          </p>
          <p>
            <a className="btn btn-green" href={phoneHref()}>
              {t(locale, "cta_call")}
            </a>{" "}
            <a
              className="btn btn-dark"
              href={whatsappHref()}
              target="_blank"
              rel="noopener noreferrer"
            >
              {t(locale, "cta_sell")}
            </a>
          </p>
        </div>
      </section>
    </main>
  );
}
