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
