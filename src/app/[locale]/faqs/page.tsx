import type { Metadata } from "next";
import { notFound } from "next/navigation";
import { JsonLd } from "@/components/JsonLd";
import { isLocale, t, type Locale } from "@/lib/i18n";
import {
  breadcrumbJsonLd,
  buildPageMetadata,
  faqPageJsonLd,
  seoText,
} from "@/lib/seo";

export async function generateMetadata({
  params,
}: {
  params: Promise<{ locale: string }>;
}): Promise<Metadata> {
  const { locale: raw } = await params;
  if (!isLocale(raw)) return {};
  const locale = raw as Locale;
  const { title, description } = seoText(locale, "faq_seo_title", "faq_seo_desc");
  return buildPageMetadata({ locale, path: "/faqs", title, description });
}

export default async function FaqsPage({
  params,
}: {
  params: Promise<{ locale: string }>;
}) {
  const { locale: raw } = await params;
  if (!isLocale(raw)) notFound();
  const locale = raw as Locale;
  const faqs = [1, 2, 3, 4, 5, 6, 7].map((i) => ({
    question: t(locale, `faq_q${i}`),
    answer: t(locale, `faq_a${i}`),
  }));

  return (
    <main id="main">
      <JsonLd
        data={[
          breadcrumbJsonLd(locale, [
            { name: t(locale, "nav_home"), path: "/" },
            { name: t(locale, "nav_faq"), path: "/faqs" },
          ]),
          faqPageJsonLd(faqs),
        ]}
      />
      <section className="page-hero">
        <div className="container">
          <h1>{t(locale, "faq_title")}</h1>
        </div>
      </section>
      <section className="section">
        <div className="container">
          <div className="faq-list">
            {faqs.map((faq, i) => (
              <details className="faq-item" key={faq.question} open={i === 0}>
                <summary>{faq.question}</summary>
                <p>{faq.answer}</p>
              </details>
            ))}
          </div>
        </div>
      </section>
    </main>
  );
}
