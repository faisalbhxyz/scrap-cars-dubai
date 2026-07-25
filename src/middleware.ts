import { NextRequest, NextResponse } from "next/server";

export function middleware(request: NextRequest) {
  const { pathname } = request.nextUrl;

  if (
    pathname.startsWith("/_next") ||
    pathname.startsWith("/images") ||
    pathname === "/favicon.ico" ||
    pathname.includes(".")
  ) {
    return NextResponse.next();
  }

  // Canonicalize: /en/... → /...
  if (pathname === "/en" || pathname.startsWith("/en/")) {
    const url = request.nextUrl.clone();
    url.pathname = pathname === "/en" ? "/" : pathname.slice(3) || "/";
    return NextResponse.redirect(url);
  }

  // Arabic URLs match /[locale]/...
  if (pathname === "/ar" || pathname.startsWith("/ar/")) {
    const res = NextResponse.next();
    res.headers.set("x-locale", "ar");
    return res;
  }

  // English: keep clean URL, rewrite internally to /en/...
  const url = request.nextUrl.clone();
  url.pathname = pathname === "/" ? "/en" : `/en${pathname}`;
  const res = NextResponse.rewrite(url);
  res.headers.set("x-locale", "en");
  return res;
}

export const config = {
  matcher: ["/((?!_next/static|_next/image|.*\\..*).*)"],
};
