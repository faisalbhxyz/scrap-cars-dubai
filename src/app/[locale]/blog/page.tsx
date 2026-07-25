import type { Metadata } from "next";
import Link from "next/link";
import { notFound } from "next/navigation";
import { JsonLd } from "@/components/JsonLd";
import { isLocale, localePath, t, type Locale } from "@/lib/i18n";
import {
  formatPostDate,
  getAllPosts,
  localized,
} from "@/lib/posts";
import {
  absoluteUrl,
  breadcrumbJsonLd,
  buildPageMetadata,
  localizedUrl,
  seoText,
} from "@/lib/seo";
import { phoneHref, site, whatsappHref } from "@/lib/site";

export async function generateMetadata({
  params,
}: {
  params: Promise<{ locale: string }>;
}): Promise<Metadata> {
  const { locale: raw } = await params;
  if (!isLocale(raw)) return {};
  const locale = raw as Locale;
  const { title, description } = seoText(locale, "blog_seo_title", "blog_seo_desc");
  return buildPageMetadata({ locale, path: "/blog", title, description });
}

export default async function BlogIndexPage({
  params,
}: {
  params: Promise<{ locale: string }>;
}) {
  const { locale: raw } = await params;
  if (!isLocale(raw)) notFound();
  const locale = raw as Locale;
  const posts = getAllPosts();

  const collectionLd = {
    "@context": "https://schema.org",
    "@type": "Blog",
    name: t(locale, "blog_title"),
    description: t(locale, "blog_seo_desc"),
    url: localizedUrl(locale, "/blog"),
    inLanguage: locale === "ar" ? "ar" : "en",
    publisher: { "@id": `${site.url}/#business` },
    blogPost: posts.map((post) => ({
      "@type": "BlogPosting",
      headline: localized(locale, post.title),
      description: localized(locale, post.excerpt),
      datePublished: `${post.date}T08:00:00+04:00`,
      url: localizedUrl(locale, `/blog/${post.slug}`),
      image: absoluteUrl(site.ogImage),
    })),
  };

  return (
    <main id="main">
      <JsonLd
        data={[
          breadcrumbJsonLd(locale, [
            { name: t(locale, "nav_home"), path: "/" },
            { name: t(locale, "nav_blog"), path: "/blog" },
          ]),
          collectionLd,
        ]}
      />
      <section className="page-hero">
        <div className="container">
          <nav className="breadcrumbs" aria-label="Breadcrumb">
            <Link href={localePath(locale, "/")}>{t(locale, "nav_home")}</Link>
            <span aria-hidden="true">/</span>
            <span>{t(locale, "nav_blog")}</span>
          </nav>
          <h1>{t(locale, "blog_title")}</h1>
          <p>{t(locale, "blog_sub")}</p>
        </div>
      </section>

      <section className="section blog-index">
        <div className="container">
          <ul className="blog-list">
            {posts.map((post) => (
              <li key={post.slug} className="blog-list-item">
                <article>
                  <time dateTime={post.date} className="blog-date">
                    {formatPostDate(locale, post.date)}
                  </time>
                  <h2>
                    <Link href={localePath(locale, `/blog/${post.slug}`)}>
                      {localized(locale, post.title)}
                    </Link>
                  </h2>
                  <p>{localized(locale, post.excerpt)}</p>
                  <Link
                    className="blog-read-more"
                    href={localePath(locale, `/blog/${post.slug}`)}
                  >
                    {t(locale, "blog_read_more")}
                  </Link>
                </article>
              </li>
            ))}
          </ul>

          <div className="hero-cta" style={{ marginTop: "2.5rem" }}>
            <a className="btn btn-green" href={phoneHref()}>
              {t(locale, "cta_call")} {site.phone}
            </a>
            <a
              className="btn btn-dark"
              href={whatsappHref(
                locale === "ar"
                  ? "مرحباً، أريد عرض سعر لبيع سيارتي"
                  : "Hi, I want a quote to sell my car",
              )}
              target="_blank"
              rel="noopener noreferrer"
            >
              {t(locale, "cta_quote")}
            </a>
          </div>
        </div>
      </section>
    </main>
  );
}
