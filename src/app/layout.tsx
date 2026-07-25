import type { Metadata } from "next";
import { headers } from "next/headers";
import { Archivo_Black, Cairo, Manrope, Montserrat, Syne } from "next/font/google";
import "./globals.css";
import "./main.css";

const syne = Syne({
  subsets: ["latin"],
  weight: ["600", "700", "800"],
  display: "swap",
  variable: "--ff-syne",
});

const manrope = Manrope({
  subsets: ["latin"],
  weight: ["400", "500", "600", "700"],
  display: "swap",
  variable: "--ff-manrope",
});

const montserrat = Montserrat({
  subsets: ["latin"],
  weight: ["600", "700", "800"],
  display: "swap",
  variable: "--ff-montserrat",
});

const archivoBlack = Archivo_Black({
  subsets: ["latin"],
  weight: "400",
  display: "swap",
  variable: "--ff-archivo",
});

const cairo = Cairo({
  subsets: ["arabic", "latin"],
  weight: ["400", "600", "700", "800"],
  display: "swap",
  variable: "--ff-cairo",
});

export const metadata: Metadata = {
  title: {
    default: "Car Scrap Dubai | Sell Scrap Cars for Cash UAE",
    template: "%s | Car Scrap Dubai",
  },
  description:
    "Sell your scrap, damaged & old cars for the best cash offer in Dubai & UAE. Free pickup, fair prices, fast payment.",
  metadataBase: new URL("https://carscrapdubai.com"),
  applicationName: "Car Scrap Dubai",
  authors: [{ name: "Car Scrap Dubai", url: "https://carscrapdubai.com" }],
  creator: "Car Scrap Dubai",
  publisher: "Car Scrap Dubai",
  category: "automotive",
  referrer: "origin-when-cross-origin",
  formatDetection: {
    email: false,
    address: false,
    telephone: false,
  },
  robots: {
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
  openGraph: {
    type: "website",
    siteName: "Car Scrap Dubai",
    locale: "en_AE",
    url: "https://carscrapdubai.com",
    title: "Car Scrap Dubai | Sell Scrap Cars for Cash UAE",
    description:
      "Sell your scrap, damaged & old cars for the best cash offer in Dubai & UAE. Free pickup, fair prices, fast payment.",
    images: [
      {
        url: "/images/yard/car-scrap-yard-dubai-salvage-lot.jpg",
        width: 1200,
        height: 1185,
        alt: "Car scrap yard Dubai — salvage lot with scrap cars ready for recycling",
      },
    ],
  },
  twitter: {
    card: "summary_large_image",
    title: "Car Scrap Dubai | Sell Scrap Cars for Cash UAE",
    description:
      "Sell your scrap, damaged & old cars for the best cash offer in Dubai & UAE. Free pickup, fair prices, fast payment.",
    images: ["/images/yard/car-scrap-yard-dubai-salvage-lot.jpg"],
  },
  icons: {
    icon: "/favicon.ico",
  },
};

export default async function RootLayout({ children }: { children: React.ReactNode }) {
  const locale = (await headers()).get("x-locale") === "ar" ? "ar" : "en";
  const dir = locale === "ar" ? "rtl" : "ltr";

  return (
    <html
      lang={locale}
      dir={dir}
      suppressHydrationWarning
      className={`${syne.variable} ${manrope.variable} ${montserrat.variable} ${archivoBlack.variable} ${cairo.variable}`}
    >
      <body className={`lang-${locale} ${dir}`}>{children}</body>
    </html>
  );
}
