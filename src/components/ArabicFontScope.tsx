/** Arabic shell — system fonts (no next/font CSS leaked onto EN). */
export function ArabicFontScope({
  className,
  children,
}: {
  className: string;
  children: React.ReactNode;
}) {
  return (
    <div className={className} lang="ar" dir="rtl">
      {children}
    </div>
  );
}
