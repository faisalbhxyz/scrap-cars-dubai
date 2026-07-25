"use client";

import { useEffect } from "react";

const HREF = "/css/site.css";

/** Non-blocking full stylesheet — critical.css covers first paint. */
export function DeferredCSS() {
  useEffect(() => {
    if (document.querySelector(`link[data-site-css="1"]`)) return;

    const apply = () => {
      const link = document.createElement("link");
      link.rel = "stylesheet";
      link.href = HREF;
      link.dataset.siteCss = "1";
      document.head.appendChild(link);
    };

    // Let LCP image claim the first paint frame, then attach CSS
    if ("requestAnimationFrame" in window) {
      requestAnimationFrame(() => requestAnimationFrame(apply));
      return;
    }
    apply();
  }, []);

  return (
    <>
      <link rel="preload" href={HREF} as="style" />
      <noscript>
        <link rel="stylesheet" href={HREF} />
      </noscript>
    </>
  );
}
