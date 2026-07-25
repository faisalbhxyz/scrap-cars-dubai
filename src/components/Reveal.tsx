"use client";

import { useEffect } from "react";

export function RevealInit() {
  useEffect(() => {
    const reveals = document.querySelectorAll<HTMLElement>(".reveal");
    if (!reveals.length) return;

    if (!("IntersectionObserver" in window)) {
      reveals.forEach((el) => el.classList.add("is-visible"));
      return;
    }

    const io = new IntersectionObserver(
      (entries) => {
        entries.forEach((entry) => {
          if (entry.isIntersecting) {
            entry.target.classList.add("is-visible");
            io.unobserve(entry.target);
          }
        });
      },
      { threshold: 0.12, rootMargin: "0px 0px -8% 0px" },
    );

    // Defer hide/observe to after first paint so LCP/FCP stay clean
    const start = () => {
      reveals.forEach((el) => {
        const rect = el.getBoundingClientRect();
        const inView = rect.top < window.innerHeight * 0.92;
        if (inView) {
          el.classList.add("is-visible");
          return;
        }
        el.setAttribute("data-reveal", "");
        io.observe(el);
      });
    };

    const ric = window.requestIdleCallback?.bind(window);
    if (ric) {
      const id = ric(start, { timeout: 400 });
      return () => {
        window.cancelIdleCallback?.(id);
        io.disconnect();
      };
    }

    const t = window.setTimeout(start, 50);
    return () => {
      window.clearTimeout(t);
      io.disconnect();
    };
  }, []);

  return null;
}
