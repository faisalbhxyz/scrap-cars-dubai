import type { Metadata } from "next";
import { localePath, t, type Locale } from "@/lib/i18n";
import { site } from "@/lib/site";

export const defaultOgImage = "/images/yard/car-scrap-yard-dubai-salvage-lot.jpg";

export function absoluteUrl(path = "/"): string {
  if (!path || path === "/") return site.url;
  const clean = path.startsWith("/") ? path : `/${path}`;
  return `${site.url}${clean}`;
}

export function localizedUrl(locale: Locale, path = "/"): string {
  return absoluteUrl(localePath(locale, path));
}

type PageMetaInput = {
  locale: Locale;
  path: string;
  title: string;
  description: string;
  image?: string;
  noIndex?: boolean;
  keywords?: string | string[];
  type?: "website" | "article";
  publishedTime?: string;
};

export function buildPageMetadata({
  locale,
  path,
  title,
  description,
  image = defaultOgImage,
  noIndex = false,
  keywords,
  type = "website",
  publishedTime,
}: PageMetaInput): Metadata {
  const url = localizedUrl(locale, path);
  const en = localizedUrl("en", path);
  const ar = localizedUrl("ar", path);
  const imageUrl = absoluteUrl(image);
  const ogLocale = locale === "ar" ? "ar_AE" : "en_AE";

  return {
    title: { absolute: title },
    description,
    keywords,
    alternates: {
      canonical: url,
      languages: {
        en,
        ar,
        "x-default": en,
      },
    },
    openGraph: {
      type,
      url,
      title,
      description,
      siteName: site.name,
      locale: ogLocale,
      alternateLocale: locale === "ar" ? ["en_AE"] : ["ar_AE"],
      ...(publishedTime ? { publishedTime } : {}),
      images: [
        {
          url: imageUrl,
          width: 1200,
          height: 1185,
          alt: title,
        },
      ],
    },
    twitter: {
      card: "summary_large_image",
      title,
      description,
      images: [imageUrl],
    },
    robots: noIndex
      ? { index: false, follow: false }
      : {
          index: true,
          follow: true,
          googleBot: {
            index: true,
            follow: true,
            "max-image-preview": "large",
            "max-snippet": -1,
            "max-video-preview": -1,
          },
        },
  };
}

export function seoText(locale: Locale, titleKey: string, descKey: string) {
  return {
    title: t(locale, titleKey),
    description: t(locale, descKey),
  };
}

type FaqItem = { question: string; answer: string };

export function localBusinessJsonLd(locale: Locale) {
  const name = t(locale, "site_name");
  const description = t(locale, "home_seo_desc");

  return {
    "@context": "https://schema.org",
    "@type": ["LocalBusiness", "AutomotiveBusiness"],
    "@id": `${site.url}/#business`,
    name,
    alternateName: locale === "ar" ? "Car Scrap Dubai" : "كار سكراب دبي",
    description,
    url: localizedUrl(locale, "/"),
    image: absoluteUrl(defaultOgImage),
    logo: absoluteUrl("/images/logo.png"),
    telephone: [site.phone, site.phone2],
    email: site.email,
    priceRange: "$$",
    currenciesAccepted: "AED",
    paymentAccepted: "Cash, Bank Transfer",
    areaServed: [
      { "@type": "City", name: "Dubai" },
      { "@type": "City", name: "Sharjah" },
      { "@type": "Country", name: "United Arab Emirates" },
    ],
    address: [
      {
        "@type": "PostalAddress",
        addressLocality: "Dubai",
        addressCountry: "AE",
      },
      {
        "@type": "PostalAddress",
        streetAddress: "Sharjah Industrial Area 10",
        addressLocality: "Sharjah",
        addressCountry: "AE",
      },
    ],
    geo: {
      "@type": "GeoCoordinates",
      latitude: 25.2048,
      longitude: 55.2708,
    },
    openingHoursSpecification: {
      "@type": "OpeningHoursSpecification",
      dayOfWeek: [
        "Monday",
        "Tuesday",
        "Wednesday",
        "Thursday",
        "Friday",
        "Saturday",
        "Sunday",
      ],
      opens: "00:00",
      closes: "23:59",
    },
    sameAs: [site.facebook, site.instagram, site.x],
    contactPoint: [
      {
        "@type": "ContactPoint",
        telephone: site.phone,
        contactType: "customer service",
        areaServed: "AE",
        availableLanguage: ["en", "ar"],
      },
    ],
  };
}

export function websiteJsonLd(locale: Locale) {
  return {
    "@context": "https://schema.org",
    "@type": "WebSite",
    "@id": `${site.url}/#website`,
    name: t(locale, "site_name"),
    url: site.url,
    inLanguage: locale === "ar" ? "ar" : "en",
    publisher: { "@id": `${site.url}/#business` },
  };
}

export function breadcrumbJsonLd(
  locale: Locale,
  items: { name: string; path: string }[],
) {
  return {
    "@context": "https://schema.org",
    "@type": "BreadcrumbList",
    itemListElement: items.map((item, index) => ({
      "@type": "ListItem",
      position: index + 1,
      name: item.name,
      item: localizedUrl(locale, item.path),
    })),
  };
}

export function faqPageJsonLd(faqs: FaqItem[]) {
  return {
    "@context": "https://schema.org",
    "@type": "FAQPage",
    mainEntity: faqs.map((faq) => ({
      "@type": "Question",
      name: faq.question,
      acceptedAnswer: {
        "@type": "Answer",
        text: faq.answer,
      },
    })),
  };
}

export function serviceJsonLd(input: {
  locale: Locale;
  name: string;
  description: string;
  path: string;
  image: string;
}) {
  return {
    "@context": "https://schema.org",
    "@type": "Service",
    name: input.name,
    description: input.description,
    url: localizedUrl(input.locale, input.path),
    image: absoluteUrl(input.image),
    provider: { "@id": `${site.url}/#business` },
    areaServed: {
      "@type": "Country",
      name: "United Arab Emirates",
    },
    serviceType: "Car scrap buying and free pickup",
  };
}
