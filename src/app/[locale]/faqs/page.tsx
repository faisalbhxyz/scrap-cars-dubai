import { notFound } from "next/navigation";
import { isLocale, t, type Locale } from "@/lib/i18n";

export default async function FaqsPage({
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
          <h1>{t(locale, "faq_title")}</h1>
        </div>
      </section>
      <section className="section">
        <div className="container">
          <div className="faq-list">
            {[1, 2, 3, 4, 5, 6, 7].map((i) => (
              <details className="faq-item" key={i} open={i === 1}>
                <summary>{t(locale, `faq_q${i}`)}</summary>
                <p>{t(locale, `faq_a${i}`)}</p>
              </details>
            ))}
          </div>
        </div>
      </section>
    </main>
  );
}
