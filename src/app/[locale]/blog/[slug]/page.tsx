import type { Metadata } from "next";
import Link from "next/link";
import { notFound } from "next/navigation";
import { JsonLd } from "@/components/JsonLd";
import { isLocale, localePath, t, type Locale } from "@/lib/i18n";
import {
  formatPostDate,
  getAllPosts,
  getPostBySlug,
  localized,
} from "@/lib/posts";
import {
  absoluteUrl,
  breadcrumbJsonLd,
  buildPageMetadata,
  faqPageJsonLd,
  localizedUrl,
} from "@/lib/seo";
import { getServiceBySlug } from "@/lib/services";
import { phoneHref, site, whatsappHref } from "@/lib/site";

export function generateStaticParams() {
  const locales = ["en", "ar"] as const;
  return locales.flatMap((locale) =>
    getAllPosts().map((post) => ({ locale, slug: post.slug })),
  );
}

export async function generateMetadata({
  params,
}: {
  params: Promise<{ locale: string; slug: string }>;
}): Promise<Metadata> {
  const { locale: raw, slug } = await params;
  if (!isLocale(raw)) return {};
  const locale = raw as Locale;
  const post = getPostBySlug(slug);
  if (!post) return {};

  return buildPageMetadata({
    locale,
    path: `/blog/${post.slug}`,
    title: localized(locale, post.seoTitle),
    description: localized(locale, post.seoDescription),
    keywords: post.keywords,
    type: "article",
    publishedTime: `${post.date}T08:00:00+04:00`,
  });
}

export default async function BlogPostPage({
  params,
}: {
  params: Promise<{ locale: string; slug: string }>;
}) {
  const { locale: raw, slug } = await params;
  if (!isLocale(raw)) notFound();
  const locale = raw as Locale;
  const post = getPostBySlug(slug);
  if (!post) notFound();

  const related = getServiceBySlug(post.relatedService || "");
  const waPrefill = whatsappHref(
    locale === "ar"
      ? `مرحباً، قرأت مقال: ${localized(locale, post.title)} — أريد عرض سعر`
      : `Hi, I read: ${localized(locale, post.title)} — I want a quote`,
  );

  const postPath = `/blog/${post.slug}`;
  const jsonLd = {
    "@context": "https://schema.org",
    "@type": "BlogPosting",
    headline: localized(locale, post.title),
    description: localized(locale, post.seoDescription),
    datePublished: `${post.date}T08:00:00+04:00`,
    dateModified: `${post.date}T08:00:00+04:00`,
    image: absoluteUrl(site.ogImage),
    author: {
      "@type": "Organization",
      name: site.name,
      url: site.url,
    },
    publisher: { "@id": `${site.url}/#business` },
    mainEntityOfPage: localizedUrl(locale, postPath),
    inLanguage: locale === "ar" ? "ar" : "en",
    keywords: post.keywords.join(", "),
  };

  const faqLd =
    post.faqs.length > 0
      ? faqPageJsonLd(
          post.faqs.map((faq) => ({
            question: localized(locale, faq.q),
            answer: localized(locale, faq.a),
          })),
        )
      : null;

  const morePosts = getAllPosts()
    .filter((p) => p.slug !== post.slug)
    .slice(0, 3);

  return (
    <main id="main" className="blog-post">
      <JsonLd
        data={[
          breadcrumbJsonLd(locale, [
            { name: t(locale, "nav_home"), path: "/" },
            { name: t(locale, "nav_blog"), path: "/blog" },
            { name: localized(locale, post.title), path: postPath },
          ]),
          jsonLd,
          ...(faqLd ? [faqLd] : []),
        ]}
      />

      <section className="page-hero">
        <div className="container blog-post-hero">
          <nav className="breadcrumbs" aria-label="Breadcrumb">
            <Link href={localePath(locale, "/")}>{t(locale, "nav_home")}</Link>
            <span aria-hidden="true">/</span>
            <Link href={localePath(locale, "/blog")}>{t(locale, "nav_blog")}</Link>
            <span aria-hidden="true">/</span>
            <span>{localized(locale, post.title)}</span>
          </nav>
          <time dateTime={post.date} className="blog-date">
            {formatPostDate(locale, post.date)}
          </time>
          <h1>{localized(locale, post.title)}</h1>
          <p className="blog-post-lead">{localized(locale, post.excerpt)}</p>
          <div className="hero-cta service-detail-cta">
            <a className="btn btn-green" href={phoneHref()}>
              {t(locale, "cta_call")} {site.phone}
            </a>
            <a
              className="btn btn-outline"
              href={waPrefill}
              target="_blank"
              rel="noopener noreferrer"
            >
              {t(locale, "cta_whatsapp")}
            </a>
          </div>
        </div>
      </section>

      <section className="section">
        <div className="container service-detail-layout">
          <article className="service-detail-body prose blog-article">
            {post.intro.map((para, i) => (
              <p key={`intro-${i}`}>{localized(locale, para)}</p>
            ))}

            {post.sections.map((section) => (
              <section key={localized(locale, section.heading)}>
                <h2>{localized(locale, section.heading)}</h2>
                {section.paragraphs.map((para, i) => (
                  <p key={`${localized(locale, section.heading)}-p-${i}`}>
                    {localized(locale, para)}
                  </p>
                ))}
                {section.list ? (
                  <ul className="service-detail-list">
                    {section.list.map((item, i) => (
                      <li key={`${localized(locale, section.heading)}-li-${i}`}>
                        {localized(locale, item)}
                      </li>
                    ))}
                  </ul>
                ) : null}
              </section>
            ))}

            {post.faqs.length > 0 ? (
              <>
                <h2>{t(locale, "faq_title")}</h2>
                <div className="faq-list">
                  {post.faqs.map((faq, i) => (
                    <details className="faq-item" key={i}>
                      <summary>{localized(locale, faq.q)}</summary>
                      <p>{localized(locale, faq.a)}</p>
                    </details>
                  ))}
                </div>
              </>
            ) : null}

            {related ? (
              <p className="blog-related-service">
                {t(locale, "blog_related_service")}{" "}
                <Link href={localePath(locale, `/${related.slug}`)}>
                  {t(locale, related.titleKey)}
                </Link>
              </p>
            ) : null}
          </article>

          <aside
            className="service-detail-aside"
            aria-label={t(locale, "svc_detail_aside_label")}
          >
            <div className="service-detail-card">
              <h2>{t(locale, "svc_detail_cta_title")}</h2>
              <p>{t(locale, "svc_detail_cta_sub")}</p>
              <a className="btn btn-green btn-block" href={phoneHref()}>
                {t(locale, "cta_call")}
              </a>
              <a
                className="btn btn-outline btn-block"
                href={waPrefill}
                target="_blank"
                rel="noopener noreferrer"
              >
                {t(locale, "cta_whatsapp")}
              </a>
              <a
                className="btn btn-dark btn-block"
                href={whatsappHref()}
                target="_blank"
                rel="noopener noreferrer"
              >
                {t(locale, "cta_quote")}
              </a>
              <p className="service-detail-hours">
                {t(locale, "contact_hours")}: {t(locale, "contact_hours_val")}
              </p>
            </div>
          </aside>
        </div>
      </section>

      {morePosts.length > 0 ? (
        <section className="section section-green-soft">
          <div className="container">
            <div className="section-head">
              <h2>{t(locale, "blog_more_title")}</h2>
            </div>
            <ul className="blog-more-list">
              {morePosts.map((item) => (
                <li key={item.slug}>
                  <Link href={localePath(locale, `/blog/${item.slug}`)}>
                    {localized(locale, item.title)}
                  </Link>
                  <time dateTime={item.date}>
                    {formatPostDate(locale, item.date)}
                  </time>
                </li>
              ))}
            </ul>
          </div>
        </section>
      ) : null}

      <section className="cta-band">
        <div className="container">
          <h2>{t(locale, "cta_banner_title")}</h2>
          <p>{t(locale, "cta_banner_sub")}</p>
          <div className="hero-cta">
            <a className="btn btn-green" href={phoneHref()}>
              {t(locale, "cta_call")} {site.phone}
            </a>
            <a
              className="btn btn-outline"
              href={waPrefill}
              target="_blank"
              rel="noopener noreferrer"
            >
              {t(locale, "cta_whatsapp")}
            </a>
          </div>
        </div>
      </section>
    </main>
  );
}
