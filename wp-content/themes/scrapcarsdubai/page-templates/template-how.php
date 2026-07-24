<?php
/**
 * Template Name: How It Works Page
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
			<h1><?php scd_e( 'how_title' ); ?></h1>
			<p><?php scd_e( 'how_intro' ); ?></p>
		</div>
	</section>

	<section class="section section-band">
		<div class="container">
			<div class="steps">
				<div class="step">
					<h2><?php scd_e( 'how_step1_title' ); ?></h2>
					<p><?php scd_e( 'how_step1_desc' ); ?></p>
				</div>
				<div class="step">
					<h2><?php scd_e( 'how_step2_title' ); ?></h2>
					<p><?php scd_e( 'how_step2_desc' ); ?></p>
				</div>
				<div class="step">
					<h2><?php scd_e( 'how_step3_title' ); ?></h2>
					<p><?php scd_e( 'how_step3_desc' ); ?></p>
				</div>
				<div class="step">
					<h2><?php scd_e( 'how_step4_title' ); ?></h2>
					<p><?php scd_e( 'how_step4_desc' ); ?></p>
				</div>
			</div>
		</div>
	</section>

	<section class="section">
		<div class="container prose">
			<p><?php echo esc_html( scd_is_ar()
				? 'سواء كانت سيارتك تالفة أو قديمة أو متضررة من حادث أو لا تعمل، كار سكراب دبي تجعل البيع سهلاً — بدون رسوم استلام وبدون تعقيدات ورقية.'
				: 'Whether your car is damaged, old, accident-written-off, or non-running, Car Scrap Dubai makes selling simple — free collection and paperwork support across the UAE.'
			); ?></p>
			<p><?php echo esc_html( scd_is_ar()
				? 'جاهز للبدء؟ اتصل أو واتساب الآن للحصول على عرض سعر فوري.'
				: 'Ready to start? Call or WhatsApp now for an instant quote.'
			); ?></p>
			<div class="hero-cta" style="margin-top:1.5rem">
				<a class="btn btn-green" href="<?php echo esc_url( $phone_href ); ?>"><?php scd_e( 'cta_quote' ); ?></a>
				<a class="btn btn-outline" href="<?php echo esc_url( $wa_href ); ?>" target="_blank" rel="noopener noreferrer"><?php scd_e( 'cta_whatsapp' ); ?></a>
			</div>
		</div>
	</section>
</main>
<?php
get_footer();
