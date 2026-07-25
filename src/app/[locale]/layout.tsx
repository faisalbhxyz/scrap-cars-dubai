import { notFound } from "next/navigation";
import { Footer } from "@/components/Footer";
import { Header } from "@/components/Header";
import { JsonLd } from "@/components/JsonLd";
import { RevealInit } from "@/components/Reveal";
import { isLocale, type Locale } from "@/lib/i18n";
import { localBusinessJsonLd, websiteJsonLd } from "@/lib/seo";

export function generateStaticParams() {
  return [{ locale: "en" }, { locale: "ar" }];
}

export default async function LocaleLayout({
  children,
  params,
}: {
  children: React.ReactNode;
  params: Promise<{ locale: string }>;
}) {
  const { locale: raw } = await params;
  if (!isLocale(raw)) notFound();
  const locale = raw as Locale;
  const dir = locale === "ar" ? "rtl" : "ltr";

  return (
    <div className={`site-shell lang-${locale} ${dir}`} lang={locale} dir={dir}>
      <JsonLd data={[localBusinessJsonLd(locale), websiteJsonLd(locale)]} />
      <a className="skip-link screen-reader-text" href="#main">
        {locale === "ar" ? "تخطي إلى المحتوى" : "Skip to content"}
      </a>
      <Header locale={locale} />
      {children}
      <Footer locale={locale} />
      <RevealInit />
    </div>
  );
}
