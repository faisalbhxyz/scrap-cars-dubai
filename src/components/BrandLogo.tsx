/** Tiny brand mark — static WebP, avoids next/image oversized srcset. */
export function BrandLogo({
  alt,
  width = 200,
  height = 100,
  className = "custom-logo",
}: {
  alt: string;
  width?: number;
  height?: number;
  className?: string;
}) {
  return (
    <picture>
      <source srcSet="/images/logo.webp" type="image/webp" />
      {/* eslint-disable-next-line @next/next/no-img-element */}
      <img
        src="/images/logo.png"
        alt={alt}
        width={width}
        height={height}
        className={className}
        decoding="async"
        fetchPriority="low"
      />
    </picture>
  );
}
