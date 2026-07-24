<?php
/**
 * Front page template.
 *
 * @package ScrapCarsDubai
 */
get_header();

$services = scd_services();

$phone_href = 'tel:' . preg_replace( '/\s+/', '', scd_phone() );
$wa_href    = 'https://wa.me/' . scd_whatsapp();
?>
<main id="main">
	<section class="hero">
		<div class="hero-media" aria-hidden="true">
			<img
				src="<?php echo esc_url( SCD_URI . '/assets/images/yard/car-scrap-yard-dubai-salvage-lot.jpg' ); ?>"
				alt="<?php echo esc_attr( scd__( 'img_alt_hero' ) ); ?>"
				width="1200"
				height="1185"
				fetchpriority="high"
				decoding="async"
			>
		</div>
		<div class="hero-scrim" aria-hidden="true"></div>
		<div class="container hero-inner">
			<p class="hero-brand"><?php echo esc_html( scd_is_ar() ? scd__( 'hero_brand' ) : 'Car Scrap' ); ?><?php if ( ! scd_is_ar() ) : ?> <span>Dubai</span><?php endif; ?></p>
			<h1><?php scd_e( 'hero_headline' ); ?></h1>
			<p><?php scd_e( 'hero_sub' ); ?></p>
			<div class="hero-cta">
				<a class="btn btn-green" href="<?php echo esc_url( $phone_href ); ?>"><?php scd_e( 'cta_quote' ); ?></a>
				<a class="btn btn-outline" href="<?php echo esc_url( $wa_href ); ?>" target="_blank" rel="noopener noreferrer"><?php scd_e( 'cta_whatsapp' ); ?></a>
			</div>
		</div>
	</section>

	<section class="section section-services" id="services">
		<div class="container">
			<div class="section-head reveal">
				<p class="section-eyebrow"><?php echo esc_html( scd_is_ar() ? 'خدماتنا' : 'What we buy' ); ?></p>
				<h2><?php scd_e( 'services_title' ); ?></h2>
				<p><?php scd_e( 'services_sub' ); ?></p>
			</div>
			<div class="service-grid reveal">
				<?php foreach ( $services as $svc ) :
					$img = SCD_URI . '/assets/images/services/' . $svc['image'] . '.jpg';
					?>
				<a class="service-item" href="<?php echo esc_url( scd_service_url( $svc['slug'] ) ); ?>">
					<span class="service-icon">
						<img src="<?php echo esc_url( $img ); ?>" alt="<?php echo esc_attr( scd__( $svc['title'] ) . ' — ' . scd__( 'site_name' ) ); ?>" width="120" height="120" loading="lazy" decoding="async">
					</span>
					<h3><?php scd_e( $svc['title'] ); ?></h3>
					<p class="service-desc screen-reader-text"><?php scd_e( $svc['desc'] ); ?></p>
					<span class="service-link"><?php scd_e( 'view_detail' ); ?></span>
				</a>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<section class="section section-green-soft" id="our-services">
		<div class="container">
			<div class="section-head reveal">
				<h2><?php scd_e( 'our_services' ); ?></h2>
			</div>
			<div class="feature-row reveal">
				<div class="feature-block">
					<h3><?php scd_e( 'service_quote_title' ); ?></h3>
					<p><?php scd_e( 'service_quote_desc' ); ?></p>
				</div>
				<div class="feature-block">
					<h3><?php scd_e( 'service_price_title' ); ?></h3>
					<p><?php scd_e( 'service_price_desc' ); ?></p>
				</div>
				<div class="feature-block">
					<h3><?php scd_e( 'service_salvage_title' ); ?></h3>
					<p><?php scd_e( 'service_salvage_desc' ); ?></p>
				</div>
				<div class="feature-block">
					<h3><?php scd_e( 'service_recycle_title' ); ?></h3>
					<p><?php scd_e( 'service_recycle_desc' ); ?></p>
				</div>
			</div>
		</div>
	</section>

	<section class="section section-band" id="how-it-works">
		<div class="container">
			<div class="section-head reveal">
				<h2><?php scd_e( 'how_title' ); ?></h2>
				<p><?php scd_e( 'how_intro' ); ?></p>
			</div>
			<div class="steps reveal">
				<div class="step">
					<h3><?php scd_e( 'how_step1_title' ); ?></h3>
					<p><?php scd_e( 'how_step1_desc' ); ?></p>
				</div>
				<div class="step">
					<h3><?php scd_e( 'how_step2_title' ); ?></h3>
					<p><?php scd_e( 'how_step2_desc' ); ?></p>
				</div>
				<div class="step">
					<h3><?php scd_e( 'how_step3_title' ); ?></h3>
					<p><?php scd_e( 'how_step3_desc' ); ?></p>
				</div>
				<div class="step">
					<h3><?php scd_e( 'how_step4_title' ); ?></h3>
					<p><?php scd_e( 'how_step4_desc' ); ?></p>
				</div>
			</div>
		</div>
	</section>

	<section class="section" id="why-us">
		<div class="container">
			<div class="section-head reveal">
				<h2><?php scd_e( 'why_title' ); ?></h2>
				<p><?php scd_e( 'why_sub' ); ?></p>
			</div>
			<div class="why-grid reveal">
				<div class="why-item">
					<h3><?php scd_e( 'why_price' ); ?></h3>
					<p><?php scd_e( 'why_price_desc' ); ?></p>
				</div>
				<div class="why-item">
					<h3><?php scd_e( 'why_free' ); ?></h3>
					<p><?php scd_e( 'why_free_desc' ); ?></p>
				</div>
				<div class="why-item">
					<h3><?php scd_e( 'why_trust' ); ?></h3>
					<p><?php scd_e( 'why_trust_desc' ); ?></p>
				</div>
				<div class="why-item">
					<h3><?php scd_e( 'why_fast' ); ?></h3>
					<p><?php scd_e( 'why_fast_desc' ); ?></p>
				</div>
				<div class="why-item">
					<h3><?php scd_e( 'why_hassle' ); ?></h3>
					<p><?php scd_e( 'why_hassle_desc' ); ?></p>
				</div>
				<div class="why-item">
					<h3><?php scd_e( 'why_flex' ); ?></h3>
					<p><?php scd_e( 'why_flex_desc' ); ?></p>
				</div>
			</div>
		</div>
	</section>

	<section class="section section-green-soft">
		<div class="container">
			<div class="stats reveal">
				<div class="stat">
					<strong>10,000+</strong>
					<span><?php scd_e( 'stats_customers' ); ?></span>
				</div>
				<div class="stat">
					<strong>8,000+</strong>
					<span><?php scd_e( 'stats_deals' ); ?></span>
				</div>
				<div class="stat">
					<strong>24/7</strong>
					<span><?php scd_e( 'stats_hours' ); ?></span>
				</div>
				<div class="stat">
					<strong>UAE</strong>
					<span><?php scd_e( 'stats_areas' ); ?></span>
				</div>
			</div>
		</div>
	</section>

	<section class="section">
		<div class="container">
			<div class="section-head reveal" style="text-align:center;margin-inline:auto">
				<h2><?php scd_e( 'brands_title' ); ?></h2>
			</div>
			<div class="brands reveal">
				<?php
				$brands = array(
					'toyota'     => 'Toyota',
					'nissan'     => 'Nissan',
					'bmw'        => 'BMW',
					'mercedes'   => 'Mercedes',
					'audi'       => 'Audi',
					'ford'       => 'Ford',
					'hyundai'    => 'Hyundai',
					'kia'        => 'Kia',
					'honda'      => 'Honda',
					'lexus'      => 'Lexus',
					'chevrolet'  => 'Chevrolet',
					'vw'         => 'Volkswagen',
				);
				foreach ( $brands as $slug => $brand ) :
					$logo = SCD_URI . '/assets/images/brands/' . $slug . '.svg';
					?>
				<span class="brand-chip">
					<img src="<?php echo esc_url( $logo ); ?>" alt="<?php echo esc_attr( $brand ); ?>" width="120" height="48" loading="lazy" decoding="async">
				</span>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<section class="section section-locations" id="locations">
		<div class="container">
			<div class="section-head reveal">
				<p class="section-eyebrow"><?php echo esc_html( scd_is_ar() ? 'مناطق الخدمة' : 'Service areas' ); ?></p>
				<h2><?php scd_e( 'locations_title' ); ?></h2>
				<p><?php scd_e( 'locations_sub' ); ?></p>
			</div>

			<div class="locations-panels reveal">
				<div class="locations-panel">
					<h3 class="locations-panel-title">
						<svg class="locations-pin" width="18" height="18" viewBox="0 0 24 24" aria-hidden="true" focusable="false">
							<path fill="currentColor" d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
						</svg>
						<?php scd_e( 'locations_dubai_title' ); ?>
					</h3>
					<ul class="locations-list">
						<?php foreach ( scd_dubai_locations() as $loc ) : ?>
						<li><?php echo esc_html( scd_location_label( $loc ) ); ?></li>
						<?php endforeach; ?>
					</ul>
				</div>

				<div class="locations-panel">
					<h3 class="locations-panel-title">
						<svg class="locations-pin" width="18" height="18" viewBox="0 0 24 24" aria-hidden="true" focusable="false">
							<path fill="currentColor" d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
						</svg>
						<?php scd_e( 'locations_uae_title' ); ?>
					</h3>
					<p class="locations-group-label"><?php scd_e( 'locations_abu_dhabi_title' ); ?></p>
					<ul class="locations-list">
						<?php foreach ( scd_abu_dhabi_locations() as $loc ) : ?>
						<li><?php echo esc_html( scd_location_label( $loc ) ); ?></li>
						<?php endforeach; ?>
					</ul>
					<ul class="locations-list locations-list--emirates">
						<?php foreach ( scd_uae_locations() as $loc ) : ?>
						<li><?php echo esc_html( scd_location_label( $loc ) ); ?></li>
						<?php endforeach; ?>
					</ul>
				</div>
			</div>
		</div>
	</section>

	<section class="section section-yard" id="about">
		<div class="container">
			<div class="section-head reveal">
				<p class="section-eyebrow"><?php echo esc_html( scd_is_ar() ? 'عملياتنا' : 'Operations' ); ?></p>
				<h2><?php scd_e( 'yard_title' ); ?></h2>
				<p><?php scd_e( 'yard_sub' ); ?></p>
			</div>

			<div class="yard-intro reveal">
				<div class="yard-copy">
					<h3><?php scd_e( 'about_title' ); ?></h3>
					<p><?php scd_e( 'about_p1' ); ?></p>
					<p><?php scd_e( 'about_p2' ); ?></p>
				</div>
				<figure class="yard-shot yard-shot--feature">
					<img
						src="<?php echo esc_url( SCD_URI . '/assets/images/yard/junk-car-removal-dubai-auto-salvage.jpg' ); ?>"
						alt="<?php echo esc_attr( scd__( 'img_alt_salvage' ) ); ?>"
						width="1200"
						height="898"
						loading="lazy"
						decoding="async"
					>
				</figure>
			</div>

			<?php
			$ops_gallery = array(
				array( 'file' => 'tow-truck-car-pickup-dubai.jpg', 'alt' => 'img_alt_tow_pickup', 'mod' => 'ops-span-tall', 'w' => 1200, 'h' => 1600 ),
				array( 'file' => 'scrap-yard-stacked-cars-dubai.jpg', 'alt' => 'img_alt_stacked', 'mod' => 'ops-span-tall', 'w' => 899, 'h' => 1262 ),
				array( 'file' => 'scrap-car-tow-truck-dubai.jpg', 'alt' => 'img_alt_tow_truck', 'mod' => 'ops-span-tall', 'w' => 1100, 'h' => 1466 ),
				array( 'file' => 'scrap-car-engines-parts-dubai-recycling.jpg', 'alt' => 'img_alt_engines', 'mod' => 'ops-span-tall', 'w' => 1200, 'h' => 1592 ),
				array( 'file' => 'buy-used-suv-scrap-dubai.jpg', 'alt' => 'img_alt_used_suv', 'mod' => 'ops-span-wide', 'w' => 1400, 'h' => 1050 ),
				array( 'file' => 'abandoned-mercedes-scrap-dubai.jpg', 'alt' => 'img_alt_mercedes', 'mod' => 'ops-span-mid', 'w' => 960, 'h' => 1280 ),
				array( 'file' => 'accident-damaged-scrap-car-dubai.jpg', 'alt' => 'img_alt_accident', 'mod' => 'ops-span-mid', 'w' => 1100, 'h' => 1290 ),
				array( 'file' => 'mercedes-engine-scrap-parts-dubai.jpg', 'alt' => 'img_alt_merc_engine', 'mod' => 'ops-span-wide', 'w' => 1200, 'h' => 900 ),
				array( 'file' => 'scrap-mitsubishi-pajero-dubai.jpg', 'alt' => 'img_alt_pajero', 'mod' => 'ops-span-wide', 'w' => 1280, 'h' => 960 ),
				array( 'file' => 'abandoned-suv-scrap-dubai.jpg', 'alt' => 'img_alt_abandoned_suv', 'mod' => 'ops-span-mid', 'w' => 899, 'h' => 1599 ),
				array( 'file' => 'scrap-car-recovery-dubai-desert.jpg', 'alt' => 'img_alt_desert', 'mod' => 'ops-span-mid', 'w' => 960, 'h' => 1280 ),
				array( 'file' => 'scrap-suv-pickup-dubai.jpg', 'alt' => 'img_alt_terrain', 'mod' => 'ops-span-mid', 'w' => 1100, 'h' => 1466 ),
				array( 'file' => 'rear-damaged-junk-car-dubai.jpg', 'alt' => 'img_alt_rear_damage', 'mod' => 'ops-span-mid', 'w' => 720, 'h' => 1600 ),
				array( 'file' => 'car-scrap-yard-dubai-salvage-lot.jpg', 'alt' => 'img_alt_hero', 'mod' => 'ops-span-wide', 'w' => 1600, 'h' => 1067 ),
				array( 'file' => 'used-pajero-scrap-buy-dubai.jpg', 'alt' => 'img_alt_pajero_rear', 'mod' => 'ops-span-mid', 'w' => 1280, 'h' => 960 ),
				array( 'file' => 'end-of-life-suv-scrap-dubai.jpg', 'alt' => 'img_alt_eol_suv', 'mod' => 'ops-span-mid', 'w' => 1100, 'h' => 1466 ),
				array( 'file' => 'scrap-car-engine-inspection-dubai.jpg', 'alt' => 'img_alt_engine_inspect', 'mod' => 'ops-span-full', 'w' => 864, 'h' => 1152 ),
			);
			?>
			<div class="ops-mosaic reveal" aria-label="<?php echo esc_attr( scd_is_ar() ? 'معرض عمليات السكراب' : 'Scrap operations photo gallery' ); ?>">
				<?php foreach ( $ops_gallery as $shot ) : ?>
				<figure class="yard-shot <?php echo esc_attr( $shot['mod'] ); ?>">
					<img
						src="<?php echo esc_url( SCD_URI . '/assets/images/yard/' . $shot['file'] ); ?>"
						alt="<?php echo esc_attr( scd__( $shot['alt'] ) ); ?>"
						width="<?php echo esc_attr( (string) $shot['w'] ); ?>"
						height="<?php echo esc_attr( (string) $shot['h'] ); ?>"
						loading="lazy"
						decoding="async"
					>
				</figure>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<section class="section section-green-soft" id="faq">
		<div class="container">
			<div class="section-head reveal">
				<h2><?php scd_e( 'faq_title' ); ?></h2>
			</div>
			<div class="faq-list reveal">
				<?php for ( $i = 1; $i <= 7; $i++ ) : ?>
				<details class="faq-item">
					<summary><?php scd_e( 'faq_q' . $i ); ?></summary>
					<p><?php scd_e( 'faq_a' . $i ); ?></p>
				</details>
				<?php endfor; ?>
			</div>
		</div>
	</section>

	<section class="cta-band">
		<div class="container reveal">
			<h2><?php scd_e( 'cta_banner_title' ); ?></h2>
			<p><?php scd_e( 'cta_banner_sub' ); ?></p>
			<div class="hero-cta">
				<a class="btn btn-green" href="<?php echo esc_url( $phone_href ); ?>"><?php scd_e( 'cta_call' ); ?> <?php echo esc_html( scd_phone() ); ?></a>
				<a class="btn btn-outline" href="<?php echo esc_url( $wa_href ); ?>" target="_blank" rel="noopener noreferrer"><?php scd_e( 'cta_sell' ); ?></a>
			</div>
		</div>
	</section>
</main>
<?php
get_footer();
