export type Localized = { en: string; ar: string };

export type BlogSection = {
  heading: Localized;
  paragraphs: Localized[];
  list?: Localized[];
};

export type BlogFaq = {
  q: Localized;
  a: Localized;
};

export type BlogPost = {
  slug: string;
  date: string;
  title: Localized;
  excerpt: Localized;
  seoTitle: Localized;
  seoDescription: Localized;
  keywords: string[];
  relatedService?: string;
  intro: Localized[];
  sections: BlogSection[];
  faqs: BlogFaq[];
};

import { posts as allPosts } from "@/data/posts";

export function getAllPosts(): BlogPost[] {
  return [...allPosts].sort((a, b) => (a.date < b.date ? 1 : -1));
}

export function getPostBySlug(slug: string): BlogPost | undefined {
  return allPosts.find((p) => p.slug === slug);
}

export function formatPostDate(locale: "en" | "ar", date: string): string {
  const d = new Date(`${date}T12:00:00Z`);
  return new Intl.DateTimeFormat(locale === "ar" ? "ar-AE" : "en-GB", {
    day: "numeric",
    month: "long",
    year: "numeric",
    timeZone: "Asia/Dubai",
  }).format(d);
}

export function localized(locale: "en" | "ar", value: Localized): string {
  return locale === "ar" ? value.ar : value.en;
}
