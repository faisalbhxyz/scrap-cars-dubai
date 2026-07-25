export const site = {
  name: "Car Scrap Dubai",
  url: "https://carscrapdubai.com",
  phone: "+971 54 567 4515",
  phone2: "+971 52 778 1618",
  whatsapp: "971545674515",
  email: "info@carscrapdubai.com",
  addressLines: ["Dubai, United Arab Emirates", "Sharjah Industrial Area 10"] as const,
  facebook: "https://www.facebook.com/profile.php?id=100025197109278",
  instagram: "https://www.instagram.com/scrapcar0545674515",
  x: "https://x.com/ScrapCar5",
  developerWa: "https://wa.me/8801310790697",
  ogImage: "/images/yard/car-scrap-yard-dubai-salvage-lot.jpg",
} as const;

export function phoneHref(phone: string = site.phone) {
  return `tel:${phone.replace(/\s+/g, "")}`;
}

export function whatsappHref(text?: string) {
  const base = `https://wa.me/${site.whatsapp}`;
  return text ? `${base}?text=${encodeURIComponent(text)}` : base;
}
