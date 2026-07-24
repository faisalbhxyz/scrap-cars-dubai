<?php
/**
 * SEO: meta tags, schema, sitemap enhancement, robots.
 *
 * @package ScrapCarsDubai
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Avoid duplicate canonical from WP core — theme outputs lang-aware canonical.
 */
remove_action( 'wp_head', 'rel_canonical' );

/**
 * Merge robots directives into WP core wp_robots (avoids duplicate meta tags).
 *
 * @param array $robots Robots directives.
 * @return array
 */
function scd_wp_robots( $robots ) {
	$robots['index']              = true;
	$robots['follow']             = true;
	$robots['max-image-preview']  = 'large';
	$robots['max-snippet']        = -1;
	$robots['max-video-preview']  = -1;

	if ( is_page( 'privacy-policy' ) ) {
		// Keep indexable but discourage as a ranking target.
		$robots['max-snippet'] = 0;
	}

	return $robots;
}
add_filter( 'wp_robots', 'scd_wp_robots' );

/**
 * Document titles with target keywords (inner pages).
 *
 * @param string $title Document title.
 * @return string
 */
function scd_seo_title( $title ) {
	if ( is_front_page() ) {
		return scd__( 'site_name' ) . ' | ' . ( scd_is_ar()
			? 'أفضل مشترين سكراب السيارات في دبي'
			: 'Best Scrap Car Buyers in Dubai & UAE' );
	}

	$brand = scd__( 'site_name' );
	if ( is_page( 'about-us' ) ) {
		return scd_is_ar()
			? 'من نحن | مشترو سكراب السيارات دبي | ' . $brand
			: 'About Us | Scrap Car Buyers Dubai | ' . $brand;
	}
	if ( is_page( 'faqs' ) ) {
		return scd_is_ar()
			? 'الأسئلة الشائعة | بيع سكراب السيارات | ' . $brand
			: 'FAQs | Selling Scrap Cars in Dubai | ' . $brand;
	}
	if ( is_page( 'how-it-works' ) ) {
		return scd_is_ar()
			? 'كيف نعمل | بيع سيارتك السكراب في 4 خطوات | ' . $brand
			: 'How It Works | Sell Your Scrap Car in 4 Steps | ' . $brand;
	}
	if ( is_page( 'why-choose-us' ) ) {
		return scd_is_ar()
			? 'لماذا نحن | أفضل مشترين سكراب دبي | ' . $brand
			: 'Why Choose Us | Best Scrap Car Buyers Dubai | ' . $brand;
	}
	if ( is_page( 'privacy-policy' ) ) {
		return scd_is_ar()
			? 'سياسة الخصوصية | ' . $brand
			: 'Privacy Policy | ' . $brand;
	}

	$svc = scd_current_service();
	if ( $svc ) {
		$key = 'svc_' . str_replace( '-', '_', $svc['id'] ) . '_seo_title';
		$title_txt = scd__( $key );
		return $title_txt . ' | ' . $brand;
	}

	return $title;
}
add_filter( 'pre_get_document_title', 'scd_seo_title', 20 );

/**
 * Page-specific meta descriptions (kept ~150–160 chars).
 *
 * @return string
 */
function scd_meta_description() {
	if ( is_front_page() ) {
		return scd_is_ar()
			? 'كار سكراب دبي — نشتري السيارات التالفة والسكراب والقديمة في دبي والإمارات. استلام مجاني وأفضل سعر نقدي.'
			: 'Car Scrap Dubai buys scrap, damaged & old cars across Dubai & UAE. Free pickup, fair cash offers, eco-friendly recycling. Instant quote.';
	}

	if ( is_page( 'about-us' ) ) {
		return scd_is_ar()
			? 'تعرّف على كار سكراب دبي — مشترو سيارات سكراب موثوقون في دبي والإمارات مع إعادة تدوير مسؤولة ودفع سريع.'
			: 'Learn about Car Scrap Dubai — trusted scrap car buyers in Dubai & UAE with responsible recycling, free pickup, and fast payment.';
	}
	if ( is_page( 'faqs' ) ) {
		return scd_is_ar()
			? 'أجوبة عن استلام السكراب المجاني، الدفع، الماركات، والمواعيد. اعرف كيف تبيع سيارتك لكار سكراب دبي.'
			: 'Answers on free scrap car pickup, payment, brands we buy, and timelines. Learn how selling to Car Scrap Dubai works.';
	}
	if ( is_page( 'how-it-works' ) ) {
		return scd_is_ar()
			? 'بيع سيارتك السكراب في 4 خطوات: تواصل، اقبل العرض، استلام مجاني، واستلم التحويل البنكي في دبي والإمارات.'
			: 'Sell your scrap car in 4 steps: contact us, accept the offer, free pickup, then get paid by bank transfer across Dubai & UAE.';
	}
	if ( is_page( 'why-choose-us' ) ) {
		return scd_is_ar()
			? 'لماذا كار سكراب دبي؟ أسعار ممتازة، استلام مجاني، استجابة سريعة، وعملية بلا متاعب في جميع الإمارات.'
			: 'Why Car Scrap Dubai? Excellent prices, free UAE-wide collection, fast response, and a hassle-free scrap car selling process.';
	}
	if ( is_page( 'privacy-policy' ) ) {
		return scd_is_ar()
			? 'سياسة خصوصية كار سكراب دبي — كيف نجمع ونستخدم ونحمي معلوماتك عند طلب عرض سعر أو التواصل معنا.'
			: 'Car Scrap Dubai privacy policy — how we collect, use, and protect your information when you request a quote or contact us.';
	}

	$svc = scd_current_service();
	if ( $svc ) {
		return scd__( 'svc_' . str_replace( '-', '_', $svc['id'] ) . '_seo_desc' );
	}

	if ( is_singular() ) {
		$excerpt = get_the_excerpt();
		if ( $excerpt ) {
			$clean = wp_strip_all_tags( $excerpt );
			if ( strlen( $clean ) > 160 ) {
				$clean = rtrim( substr( $clean, 0, 157 ) ) . '...';
			}
			return $clean;
		}
	}

	return scd__( 'tagline' );
}

/**
 * Current canonical URL (language-aware).
 *
 * @return string
 */
function scd_canonical_url() {
	$canonical = is_singular() ? get_permalink() : home_url( add_query_arg( array() ) );
	$canonical = remove_query_arg( 'lang', $canonical );
	if ( scd_is_ar() ) {
		$canonical = add_query_arg( 'lang', 'ar', $canonical );
	}
	return $canonical;
}

function scd_seo_head() {
	$desc      = scd_meta_description();
	$site_url  = home_url( '/' );
	$og_image  = SCD_URI . '/assets/images/yard/car-scrap-yard-dubai-salvage-lot.jpg';
	$canonical = scd_canonical_url();
	$svc       = scd_current_service();
	if ( $svc ) {
		$og_image = SCD_URI . '/assets/images/services/' . $svc['image'] . '.jpg';
	}

	echo '<meta name="description" content="' . esc_attr( $desc ) . '" />' . "\n";
	echo '<link rel="canonical" href="' . esc_url( $canonical ) . '" />' . "\n";

	// Hreflang.
	$en_url = remove_query_arg( 'lang', $canonical );
	$ar_url = add_query_arg( 'lang', 'ar', remove_query_arg( 'lang', $canonical ) );
	echo '<link rel="alternate" hreflang="en" href="' . esc_url( $en_url ) . '" />' . "\n";
	echo '<link rel="alternate" hreflang="ar" href="' . esc_url( $ar_url ) . '" />' . "\n";
	echo '<link rel="alternate" hreflang="x-default" href="' . esc_url( $en_url ) . '" />' . "\n";

	// Open Graph.
	$og_title = wp_get_document_title();
	echo '<meta property="og:locale" content="' . esc_attr( scd_is_ar() ? 'ar_AE' : 'en_AE' ) . '" />' . "\n";
	echo '<meta property="og:type" content="' . esc_attr( is_front_page() ? 'website' : 'article' ) . '" />' . "\n";
	echo '<meta property="og:title" content="' . esc_attr( $og_title ) . '" />' . "\n";
	echo '<meta property="og:description" content="' . esc_attr( $desc ) . '" />' . "\n";
	echo '<meta property="og:url" content="' . esc_url( $canonical ) . '" />' . "\n";
	echo '<meta property="og:site_name" content="' . esc_attr( scd__( 'site_name' ) ) . '" />' . "\n";
	echo '<meta property="og:image" content="' . esc_url( $og_image ) . '" />' . "\n";
	echo '<meta property="og:image:width" content="1200" />' . "\n";
	echo '<meta property="og:image:height" content="1185" />' . "\n";
	echo '<meta property="og:image:alt" content="' . esc_attr( scd__( 'img_alt_hero' ) ) . '" />' . "\n";

	// Twitter.
	echo '<meta name="twitter:card" content="summary_large_image" />' . "\n";
	echo '<meta name="twitter:title" content="' . esc_attr( $og_title ) . '" />' . "\n";
	echo '<meta name="twitter:description" content="' . esc_attr( $desc ) . '" />' . "\n";
	echo '<meta name="twitter:image" content="' . esc_url( $og_image ) . '" />' . "\n";
	echo '<meta name="twitter:image:alt" content="' . esc_attr( scd__( 'img_alt_hero' ) ) . '" />' . "\n";

	// Geo / business hints.
	echo '<meta name="geo.region" content="AE-DU" />' . "\n";
	echo '<meta name="geo.placename" content="Dubai" />' . "\n";
	echo '<meta name="author" content="Car Scrap Dubai" />' . "\n";

	scd_schema_jsonld( $desc, $site_url, $og_image, $canonical );
}
add_action( 'wp_head', 'scd_seo_head', 1 );

/**
 * JSON-LD: LocalBusiness, WebSite, FAQ, BreadcrumbList.
 *
 * @param string $desc       Meta description.
 * @param string $site_url   Home URL.
 * @param string $image      Default share image.
 * @param string $canonical  Current canonical URL.
 */
function scd_schema_jsonld( $desc, $site_url, $image, $canonical ) {
	$phone    = get_theme_mod( 'scd_phone', '+971 54 567 4515' );
	$email    = get_theme_mod( 'scd_email', 'info@carscrapdubai.com' );
	$addr     = get_theme_mod( 'scd_address', 'Dubai, United Arab Emirates' );
	$logo_id  = get_theme_mod( 'custom_logo' );
	$logo_url = $logo_id ? wp_get_attachment_image_url( $logo_id, 'full' ) : $image;
	$biz_id   = trailingslashit( $site_url ) . '#business';

	$org = array(
		'@context'           => 'https://schema.org',
		'@type'              => array( 'LocalBusiness', 'AutomotiveBusiness' ),
		'@id'                => $biz_id,
		'name'               => 'Car Scrap Dubai',
		'alternateName'      => 'كار سكراب دبي',
		'url'                => $site_url,
		'description'        => wp_strip_all_tags( $desc ),
		'telephone'          => $phone,
		'email'              => $email,
		'image'              => array_values( array_filter( array( $image, $logo_url ) ) ),
		'logo'               => $logo_url ? $logo_url : $image,
		'priceRange'         => '$$',
		'currenciesAccepted' => 'AED',
		'paymentAccepted'    => 'Bank Transfer',
		'openingHours'       => 'Mo-Su 00:00-23:59',
		'areaServed'         => array(
			array( '@type' => 'City', 'name' => 'Dubai' ),
			array( '@type' => 'Country', 'name' => 'United Arab Emirates' ),
		),
		'address'            => array(
			'@type'           => 'PostalAddress',
			'addressLocality' => 'Dubai',
			'addressCountry'  => 'AE',
			'streetAddress'   => $addr,
		),
		'sameAs'             => array_values( array_filter( array(
			get_theme_mod( 'scd_facebook', '' ),
			get_theme_mod( 'scd_instagram', '' ),
		) ) ),
		'hasOfferCatalog'    => array(
			'@type'           => 'OfferCatalog',
			'name'            => 'Scrap Car Buying Services',
			'itemListElement' => array(
				array( '@type' => 'Offer', 'itemOffered' => array( '@type' => 'Service', 'name' => 'Accidental Cars Purchase' ) ),
				array( '@type' => 'Offer', 'itemOffered' => array( '@type' => 'Service', 'name' => 'Accident Mulkiya Finish Cars Purchase' ) ),
				array( '@type' => 'Offer', 'itemOffered' => array( '@type' => 'Service', 'name' => 'Damaged Cars Purchase' ) ),
				array( '@type' => 'Offer', 'itemOffered' => array( '@type' => 'Service', 'name' => 'Non-Running Cars Purchase' ) ),
				array( '@type' => 'Offer', 'itemOffered' => array( '@type' => 'Service', 'name' => 'Flooded Cars Purchase' ) ),
			),
		),
	);

	$website = array(
		'@context'   => 'https://schema.org',
		'@type'      => 'WebSite',
		'@id'        => trailingslashit( $site_url ) . '#website',
		'url'        => $site_url,
		'name'       => 'Car Scrap Dubai',
		'inLanguage' => array( 'en', 'ar' ),
		'publisher'  => array( '@id' => $biz_id ),
	);

	echo '<script type="application/ld+json">' . wp_json_encode( $org, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE ) . '</script>' . "\n";
	echo '<script type="application/ld+json">' . wp_json_encode( $website, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE ) . '</script>' . "\n";

	if ( is_front_page() || is_page( 'faqs' ) ) {
		$faq_entities = array();
		for ( $i = 1; $i <= 7; $i++ ) {
			$faq_entities[] = array(
				'@type'          => 'Question',
				'name'           => scd__( 'faq_q' . $i ),
				'acceptedAnswer' => array(
					'@type' => 'Answer',
					'text'  => scd__( 'faq_a' . $i ),
				),
			);
		}
		$faq = array(
			'@context'   => 'https://schema.org',
			'@type'      => 'FAQPage',
			'mainEntity' => $faq_entities,
		);
		echo '<script type="application/ld+json">' . wp_json_encode( $faq, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE ) . '</script>' . "\n";
	}

	$svc = scd_current_service();
	if ( $svc ) {
		$sid = str_replace( '-', '_', $svc['id'] );
		$svc_faq = array();
		for ( $i = 1; $i <= 3; $i++ ) {
			$svc_faq[] = array(
				'@type'          => 'Question',
				'name'           => scd__( 'svc_' . $sid . '_faq_q' . $i ),
				'acceptedAnswer' => array(
					'@type' => 'Answer',
					'text'  => scd__( 'svc_' . $sid . '_faq_a' . $i ),
				),
			);
		}
		$faq_page = array(
			'@context'   => 'https://schema.org',
			'@type'      => 'FAQPage',
			'mainEntity' => $svc_faq,
		);
		echo '<script type="application/ld+json">' . wp_json_encode( $faq_page, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE ) . '</script>' . "\n";

		$service_schema = array(
			'@context'    => 'https://schema.org',
			'@type'       => 'Service',
			'name'        => scd__( $svc['title'] ),
			'description' => scd__( 'svc_' . $sid . '_seo_desc' ),
			'provider'    => array( '@id' => $biz_id ),
			'areaServed'  => array(
				array( '@type' => 'City', 'name' => 'Dubai' ),
				array( '@type' => 'Country', 'name' => 'United Arab Emirates' ),
			),
			'url'         => $canonical,
			'image'       => SCD_URI . '/assets/images/services/' . $svc['image'] . '.jpg',
		);
		echo '<script type="application/ld+json">' . wp_json_encode( $service_schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE ) . '</script>' . "\n";
	}

	if ( ! is_front_page() && is_singular() ) {
		$crumbs = array(
			array(
				'@type'    => 'ListItem',
				'position' => 1,
				'name'     => scd__( 'nav_home' ),
				'item'     => scd_is_ar() ? add_query_arg( 'lang', 'ar', $site_url ) : $site_url,
			),
		);
		if ( $svc ) {
			$crumbs[] = array(
				'@type'    => 'ListItem',
				'position' => 2,
				'name'     => scd__( 'nav_services' ),
				'item'     => scd_is_ar() ? add_query_arg( 'lang', 'ar', home_url( '/#services' ) ) : home_url( '/#services' ),
			);
			$crumbs[] = array(
				'@type'    => 'ListItem',
				'position' => 3,
				'name'     => scd__( $svc['title'] ),
				'item'     => $canonical,
			);
		} else {
			$crumbs[] = array(
				'@type'    => 'ListItem',
				'position' => 2,
				'name'     => get_the_title(),
				'item'     => $canonical,
			);
		}
		$breadcrumb = array(
			'@context'        => 'https://schema.org',
			'@type'           => 'BreadcrumbList',
			'itemListElement' => $crumbs,
		);
		echo '<script type="application/ld+json">' . wp_json_encode( $breadcrumb, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE ) . '</script>' . "\n";
	}
}

/**
 * Ensure WP core sitemap includes key pages; add lastmod.
 *
 * @param array  $entry     Sitemap entry.
 * @param string $post_type Post type.
 * @return array
 */
function scd_sitemap_entry( $entry, $post_type ) {
	if ( isset( $entry['loc'] ) ) {
		$entry['changefreq'] = 'weekly';
		$entry['priority']   = ( home_url( '/' ) === $entry['loc'] || untrailingslashit( home_url() ) === untrailingslashit( $entry['loc'] ) ) ? '1.0' : '0.8';
	}
	return $entry;
}
add_filter( 'wp_sitemaps_posts_entry', 'scd_sitemap_entry', 10, 2 );

/**
 * Custom robots.txt.
 *
 * @param string $output Robots.txt body.
 * @param bool   $public Blog public setting.
 * @return string
 */
function scd_robots_txt( $output, $public ) {
	if ( '0' === (string) $public ) {
		return $output;
	}
	$sitemap = home_url( '/wp-sitemap.xml' );
	$extra   = "\n# Car Scrap Dubai SEO\n";
	$extra  .= "User-agent: *\n";
	$extra  .= "Allow: /\n";
	$extra  .= "Disallow: /wp-admin/\n";
	$extra  .= "Allow: /wp-admin/admin-ajax.php\n";
	$extra  .= "Sitemap: {$sitemap}\n";
	return $extra;
}
add_filter( 'robots_txt', 'scd_robots_txt', 10, 2 );
