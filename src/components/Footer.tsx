import Link from "next/link";
import { BrandLogo } from "@/components/BrandLogo";
import { localePath, t, type Locale } from "@/lib/i18n";
import { services } from "@/lib/services";
import { phoneHref, site } from "@/lib/site";

export function Footer({ locale }: { locale: Locale }) {
  const year = new Date().getUTCFullYear();

  return (
    <>
      <footer className="site-footer">
        <div className="container">
          <div className="footer-grid">
            <div className="footer-brand">
              <BrandLogo alt={t(locale, "site_name")} width={180} height={90} />
              <p>{t(locale, "footer_about")}</p>
              <div className="footer-socials" aria-label="Social media">
                {site.facebook ? (
                  <a
                    className="social-link"
                    href={site.facebook}
                    target="_blank"
                    rel="noopener noreferrer"
                    aria-label={t(locale, "social_facebook")}
                  >
                    <svg
                      className="social-logo facebook-logo"
                      viewBox="0 0 24 24"
                      width="22"
                      height="22"
                      aria-hidden="true"
                    >
                      <rect width="24" height="24" rx="6.5" fill="#1877F2" />
                      <path
                        fill="#fff"
                        d="M16.67 12.55h-2.18V19h-3.02v-6.45H9.7V9.95h1.77V8.33c0-1.75 1.07-2.7 2.63-2.7.75 0 1.39.06 1.58.08v1.83h-1.08c-.85 0-1.01.4-1.01.99v1.42h2.15l-.28 2.6z"
                      />
                    </svg>
                  </a>
                ) : null}
                {site.instagram ? (
                  <a
                    className="social-link"
                    href={site.instagram}
                    target="_blank"
                    rel="noopener noreferrer"
                    aria-label={t(locale, "social_instagram")}
                  >
                    <svg
                      className="social-logo instagram-logo"
                      viewBox="0 0 24 24"
                      width="22"
                      height="22"
                      aria-hidden="true"
                    >
                      <defs>
                        <radialGradient id="scdIgGrad" cx="0.3" cy="1.07" r="1.2">
                          <stop offset="0" stopColor="#fdf497" />
                          <stop offset="0.45" stopColor="#fd5949" />
                          <stop offset="0.6" stopColor="#d6249f" />
                          <stop offset="0.9" stopColor="#285AEB" />
                        </radialGradient>
                      </defs>
                      <rect width="24" height="24" rx="6.5" fill="url(#scdIgGrad)" />
                      <path
                        fill="#fff"
                        d="M12 7.2A4.8 4.8 0 1 0 12 16.8 4.8 4.8 0 0 0 12 7.2zm0 7.92a3.12 3.12 0 1 1 0-6.24 3.12 3.12 0 0 1 0 6.24zM17.04 6.84a1.12 1.12 0 1 1-2.24 0 1.12 1.12 0 0 1 2.24 0zM12 4.8c-1.96 0-2.2.01-2.97.04-.76.03-1.28.16-1.74.34-.47.18-.87.43-1.27.82-.4.4-.64.8-.82 1.27-.18.46-.3.98-.34 1.74C4.81 9.8 4.8 10.04 4.8 12s.01 2.2.04 2.97c.03.76.16 1.28.34 1.74.18.47.43.87.82 1.27.4.4.8.64 1.27.82.46.18.98.3 1.74.34.77.03 1.01.04 2.97.04s2.2-.01 2.97-.04c.76-.03 1.28-.16 1.74-.34.47-.18.87-.43 1.27-.82.4-.4.64-.8.82-1.27.18-.46.3-.98.34-1.74.03-.77.04-1.01.04-2.97s-.01-2.2-.04-2.97c-.03-.76-.16-1.28-.34-1.74-.18-.47-.43-.87-.82-1.27-.4-.4-.8-.64-1.27-.82-.46-.18-.98-.3-1.74-.34C14.2 4.81 13.96 4.8 12 4.8zm0 1.44c1.92 0 2.15.01 2.91.04.7.03 1.08.15 1.34.25.34.13.58.29.84.55.26.26.42.5.55.84.1.26.22.64.25 1.34.03.76.04.99.04 2.91s-.01 2.15-.04 2.91c-.03.7-.15 1.08-.25 1.34-.13.34-.29.58-.55.84-.26.26-.5.42-.84.55-.26.1-.64.22-1.34.25-.76.03-.99.04-2.91.04s-2.15-.01-2.91-.04c-.7-.03-1.08-.15-1.34-.25-.34-.13-.58-.29-.84-.55-.26-.26-.42-.5-.55-.84-.1-.26-.22-.64-.25-1.34-.03-.76-.04-.99-.04-2.91s.01-2.15.04-2.91c.03-.7.15-1.08.25-1.34.13-.34.29-.58.55-.84.26-.26.5-.42.84-.55.26-.1.64-.22 1.34-.25.76-.03.99-.04 2.91-.04z"
                      />
                    </svg>
                  </a>
                ) : null}
                {site.x ? (
                  <a
                    className="social-link"
                    href={site.x}
                    target="_blank"
                    rel="noopener noreferrer"
                    aria-label={t(locale, "social_x")}
                  >
                    <svg
                      className="social-logo x-logo"
                      viewBox="0 0 24 24"
                      width="22"
                      height="22"
                      aria-hidden="true"
                    >
                      <rect width="24" height="24" rx="6.5" fill="#000" />
                      <path
                        fill="#fff"
                        d="M13.54 10.94 18.2 5.5h-1.1l-4.05 4.72L9.8 5.5H5.75l4.89 7.12L5.9 18.5h1.1l4.27-4.98 3.41 4.98h4.05l-5.19-7.56zm-1.51 1.76-.5-.71-3.95-5.64h1.7l3.18 4.55.5.71 4.13 5.91h-1.7l-3.36-4.82z"
                      />
                    </svg>
                  </a>
                ) : null}
              </div>
            </div>
            <div>
              <h4>{t(locale, "footer_links")}</h4>
              <ul className="footer-links">
                <li>
                  <Link href={localePath(locale, "/")}>{t(locale, "nav_home")}</Link>
                </li>
                <li>
                  <Link href={localePath(locale, "/#locations")}>
                    {t(locale, "nav_locations")}
                  </Link>
                </li>
                <li>
                  <Link href={localePath(locale, "/#why-us")}>{t(locale, "nav_why")}</Link>
                </li>
                <li>
                  <Link href={localePath(locale, "/about-us")}>{t(locale, "nav_about")}</Link>
                </li>
                <li>
                  <Link href={localePath(locale, "/blog")}>{t(locale, "nav_blog")}</Link>
                </li>
                <li>
                  <Link href={localePath(locale, "/privacy-policy")}>
                    {t(locale, "nav_privacy")}
                  </Link>
                </li>
                <li>
                  <Link href={localePath(locale, "/faqs")}>{t(locale, "nav_faq")}</Link>
                </li>
              </ul>
            </div>
            <div>
              <h4>{t(locale, "footer_services")}</h4>
              <ul className="footer-links">
                {services.slice(0, 6).map((svc) => (
                  <li key={svc.id}>
                    <Link href={localePath(locale, `/${svc.slug}`)}>
                      {t(locale, svc.titleKey)}
                    </Link>
                  </li>
                ))}
              </ul>
            </div>
            <div>
              <h4>{t(locale, "nav_contact")}</h4>
              <ul className="footer-links">
                <li>
                  <a href={phoneHref()}>{site.phone}</a>
                </li>
                <li>
                  <a href={phoneHref(site.phone2)}>{site.phone2}</a>
                </li>
                <li>
                  <a href={`mailto:${site.email}`}>{site.email}</a>
                </li>
                {site.addressLines.map((line) => (
                  <li key={line} className="footer-address-line">
                    {line}
                  </li>
                ))}
                <li>
                  {t(locale, "contact_hours")}: {t(locale, "contact_hours_val")}
                </li>
              </ul>
            </div>
          </div>
          <div className="footer-bottom">
            <span>
              © {year} {t(locale, "footer_rights")}
            </span>
            <a href={site.developerWa} target="_blank" rel="noopener noreferrer">
              Developed By Adstryker
            </a>
          </div>
        </div>
      </footer>
      <a
        className="float-wa"
        href={`https://wa.me/${site.whatsapp}`}
        target="_blank"
        rel="noopener noreferrer"
        aria-label={t(locale, "cta_whatsapp")}
      >
        <svg width="28" height="28" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
          <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.435 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z" />
        </svg>
      </a>
    </>
  );
}
