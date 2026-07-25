import { cairo } from "@/lib/fonts";

/** Isolates Cairo so EN routes never pay for Arabic font bytes. */
export function ArabicFontScope({
  className,
  children,
}: {
  className: string;
  children: React.ReactNode;
}) {
  return (
    <div className={`${className} ${cairo.variable}`} lang="ar" dir="rtl">
      {children}
    </div>
  );
}
