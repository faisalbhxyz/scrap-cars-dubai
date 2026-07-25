/** Pre-optimized LCP hero — static edge assets, no image optimizer latency. */
export function HeroMedia({ alt }: { alt: string }) {
  return (
    <>
      <link
        rel="preload"
        as="image"
        href="/images/yard/hero-lcp.avif"
        type="image/avif"
        fetchPriority="high"
      />
      <div className="hero-media" aria-hidden="true">
        <picture>
          <source srcSet="/images/yard/hero-lcp.avif" type="image/avif" />
          <source srcSet="/images/yard/hero-lcp.webp" type="image/webp" />
          {/* eslint-disable-next-line @next/next/no-img-element */}
          <img
            src="/images/yard/hero-lcp.jpg"
            alt={alt}
            width={720}
            height={711}
            decoding="async"
            fetchPriority="high"
          />
        </picture>
      </div>
    </>
  );
}
