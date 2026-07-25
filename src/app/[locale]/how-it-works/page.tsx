import { notFound } from "next/navigation";
import { isLocale, t, type Locale } from "@/lib/i18n";
import { phoneHref, whatsappHref } from "@/lib/site";

export default async function HowItWorksPage({
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
          <h1>{t(locale, "how_title")}</h1>
          <p>{t(locale, "how_intro")}</p>
        </div>
      </section>

      <section className="section section-band">
        <div className="container">
          <div className="steps">
            {[1, 2, 3, 4].map((n) => (
              <div className="step" key={n}>
                <h2>{t(locale, `how_step${n}_title`)}</h2>
                <p>{t(locale, `how_step${n}_desc`)}</p>
              </div>
            ))}
          </div>
        </div>
      </section>

      <section className="section">
        <div className="container prose">
          <p>
            {locale === "ar"
              ? "سواء كانت سيارتك تالفة أو قديمة أو متضررة من حادث أو لا تعمل، كار سكراب دبي تجعل البيع سهلاً — بدون رسوم استلام وبدون تعقيدات ورقية."
              : "Whether your car is damaged, old, accident-written-off, or non-running, Car Scrap Dubai makes selling simple — free collection and paperwork support across the UAE."}
          </p>
          <p>
            {locale === "ar"
              ? "جاهز للبدء؟ اتصل أو واتساب الآن للحصول على عرض سعر فوري."
              : "Ready to start? Call or WhatsApp now for an instant quote."}
          </p>
          <div className="hero-cta" style={{ marginTop: "1.5rem" }}>
            <a className="btn btn-green" href={phoneHref()}>
              {t(locale, "cta_quote")}
            </a>
            <a
              className="btn btn-outline"
              href={whatsappHref()}
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
