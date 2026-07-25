import type { MetadataRoute } from "next";
import { site } from "@/lib/site";

export default function manifest(): MetadataRoute.Manifest {
  return {
    name: site.name,
    short_name: "Car Scrap Dubai",
    description:
      "Sell your scrap, damaged & old cars for the best cash offer in Dubai & UAE.",
    start_url: "/",
    display: "standalone",
    background_color: "#0f172a",
    theme_color: "#16a34a",
    lang: "en",
    icons: [
      {
        src: "/favicon.ico",
        sizes: "48x48",
        type: "image/x-icon",
      },
      {
        src: "/images/logo.png",
        sizes: "512x512",
        type: "image/png",
      },
    ],
  };
}
