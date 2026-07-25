import strings from "@/data/strings.json";

export const locales = ["en", "ar"] as const;
export type Locale = (typeof locales)[number];

export function isLocale(value: string): value is Locale {
  return locales.includes(value as Locale);
}

export function t(locale: Locale, key: string): string {
  const entry = (strings as Record<string, { en?: string; ar?: string }>)[key];
  if (!entry) return key;
  return entry[locale] || entry.en || key;
}

export function localePath(locale: Locale, path = "/") {
  const clean = path.startsWith("/") ? path : `/${path}`;
  if (locale === "ar") {
    if (clean === "/") return "/ar";
    return `/ar${clean}`;
  }
  return clean === "/" ? "/" : clean;
}

export function switchLocalePath(currentLocale: Locale, target: Locale, pathname: string) {
  let path = pathname;
  if (path === "/ar" || path.startsWith("/ar/")) {
    path = path === "/ar" ? "/" : path.slice(3) || "/";
  }
  return localePath(target, path);
}

export function locationLabel(locale: Locale, loc: { en: string; ar: string }) {
  return locale === "ar" ? loc.ar : loc.en;
}
