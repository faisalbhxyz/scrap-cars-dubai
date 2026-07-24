<?php
/**
 * Template Name: Why Choose Us Page
 *
 * @package ScrapCarsDubai
 */
get_header();

$phone_href = 'tel:' . preg_replace( '/\s+/', '', scd_phone() );
$wa_href    = 'https://wa.me/' . scd_whatsapp();
?>
<main id="main">
	<section class="page-hero">
		<div class="container">
			<h1><?php scd_e( 'why_title' ); ?></h1>
			<p><?php scd_e( 'why_sub' ); ?></p>
		</div>
	</section>

	<section class="section">
		<div class="container">
			<div class="why-grid">
				<div class="why-item">
					<h2><?php scd_e( 'why_price' ); ?></h2>
					<p><?php scd_e( 'why_price_desc' ); ?></p>
				</div>
				<div class="why-item">
					<h2><?php scd_e( 'why_free' ); ?></h2>
					<p><?php scd_e( 'why_free_desc' ); ?></p>
				</div>
				<div class="why-item">
					<h2><?php scd_e( 'why_trust' ); ?></h2>
					<p><?php scd_e( 'why_trust_desc' ); ?></p>
				</div>
				<div class="why-item">
					<h2><?php scd_e( 'why_fast' ); ?></h2>
					<p><?php scd_e( 'why_fast_desc' ); ?></p>
				</div>
				<div class="why-item">
					<h2><?php scd_e( 'why_hassle' ); ?></h2>
					<p><?php scd_e( 'why_hassle_desc' ); ?></p>
				</div>
				<div class="why-item">
					<h2><?php scd_e( 'why_flex' ); ?></h2>
					<p><?php scd_e( 'why_flex_desc' ); ?></p>
				</div>
			</div>
		</div>
	</section>

	<section class="section section-green-soft">
		<div class="container prose">
			<p><?php echo esc_html( scd_is_ar()
				? 'آلاف البائعين في دبي والإمارات اختاروا كار سكراب دبي لأسعار عادلة واستلام سريع وإعادة تدوير مسؤولة.'
				: 'Thousands of sellers across Dubai and the UAE choose Car Scrap Dubai for fair prices, fast collection, and responsible recycling.'
			); ?></p>
			<p><a class="btn btn-green" href="<?php echo esc_url( $phone_href ); ?>"><?php scd_e( 'cta_call' ); ?></a>
			<a class="btn btn-dark" href="<?php echo esc_url( $wa_href ); ?>" target="_blank" rel="noopener noreferrer"><?php scd_e( 'cta_sell' ); ?></a></p>
		</div>
	</section>
</main>
<?php
get_footer();
