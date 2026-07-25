import { Archivo_Black, Cairo, Manrope, Montserrat } from "next/font/google";

export const manrope = Manrope({
  subsets: ["latin"],
  weight: ["400", "600", "700"],
  display: "swap",
  variable: "--ff-manrope",
  adjustFontFallback: true,
});

export const montserrat = Montserrat({
  subsets: ["latin"],
  weight: ["600", "700", "800"],
  display: "swap",
  variable: "--ff-montserrat",
  adjustFontFallback: true,
});

export const archivoBlack = Archivo_Black({
  subsets: ["latin"],
  weight: "400",
  display: "swap",
  variable: "--ff-archivo",
  adjustFontFallback: true,
});

/** Arabic UI — load only on `ar` locale to keep EN LCP light. */
export const cairo = Cairo({
  subsets: ["arabic", "latin"],
  weight: ["400", "700", "800"],
  display: "swap",
  variable: "--ff-cairo",
  preload: false,
  adjustFontFallback: true,
});
