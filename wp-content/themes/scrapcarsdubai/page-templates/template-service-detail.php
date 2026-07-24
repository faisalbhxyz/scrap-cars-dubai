<?php
/**
 * Template Name: Service Detail
 *
 * SEO landing page for each vehicle category we buy.
 *
 * @package ScrapCarsDubai
 */

get_header();

$svc = scd_current_service();
if ( ! $svc ) {
	// Fallback if template assigned to a non-catalog page.
	$svc = array(
		'id'    => 'accidental',
		'slug'  => get_post_field( 'post_name' ),
		'image' => 'accidental',
		'title' => 'svc_accidental',
		'desc'  => 'svc_accidental_desc',
	);
}

$sid        = $svc['id'];
$phone_href = 'tel:' . preg_replace( '/\s+/', '', scd_phone() );
$wa_href    = 'https://wa.me/' . scd_whatsapp();
$img        = SCD_URI . '/assets/images/services/' . $svc['image'] . '.jpg';
$wa_msg     = rawurlencode(
	scd_is_ar()
		? 'مرحباً، أريد بيع: ' . scd__( $svc['title'] )
		: 'Hi, I want to sell: ' . scd__( $svc['title'] )
);
$wa_href_prefill = $wa_href . '?text=' . $wa_msg;
?>
<main id="main" class="service-detail">
	<section class="page-hero service-detail-hero">
		<div class="container service-detail-hero-inner">
			<nav class="breadcrumbs" aria-label="Breadcrumb">
				<a href="<?php echo esc_url( scd_lang_url( '/' ) ); ?>"><?php scd_e( 'nav_home' ); ?></a>
				<span aria-hidden="true">/</span>
				<a href="<?php echo esc_url( scd_lang_url( '/#services' ) ); ?>"><?php scd_e( 'nav_services' ); ?></a>
				<span aria-hidden="true">/</span>
				<span><?php scd_e( $svc['title'] ); ?></span>
			</nav>
			<div class="service-detail-hero-grid">
				<div class="service-detail-hero-copy">
					<p class="section-eyebrow"><?php scd_e( 'svc_detail_eyebrow' ); ?></p>
					<h1><?php scd_e( 'svc_' . str_replace( '-', '_', $sid ) . '_h1' ); ?></h1>
					<p class="service-detail-lead"><?php scd_e( 'svc_' . str_replace( '-', '_', $sid ) . '_lead' ); ?></p>
					<div class="hero-cta service-detail-cta">
						<a class="btn btn-green" href="<?php echo esc_url( $phone_href ); ?>"><?php scd_e( 'cta_call' ); ?> <?php echo esc_html( scd_phone() ); ?></a>
						<a class="btn btn-outline" href="<?php echo esc_url( $wa_href_prefill ); ?>" target="_blank" rel="noopener noreferrer"><?php scd_e( 'cta_whatsapp' ); ?></a>
					</div>
				</div>
				<figure class="service-detail-hero-media">
					<img
						src="<?php echo esc_url( $img ); ?>"
						alt="<?php echo esc_attr( scd__( 'svc_' . str_replace( '-', '_', $sid ) . '_img_alt' ) ); ?>"
						width="640"
						height="640"
						fetchpriority="high"
						decoding="async"
					>
				</figure>
			</div>
		</div>
	</section>

	<section class="section">
		<div class="container service-detail-layout">
			<article class="service-detail-body prose">
				<h2><?php scd_e( 'svc_' . str_replace( '-', '_', $sid ) . '_why_title' ); ?></h2>
				<p><?php scd_e( 'svc_' . str_replace( '-', '_', $sid ) . '_why' ); ?></p>

				<h2><?php scd_e( 'svc_detail_benefits_title' ); ?></h2>
				<ul class="service-detail-list">
					<li><?php scd_e( 'svc_detail_b1' ); ?></li>
					<li><?php scd_e( 'svc_detail_b2' ); ?></li>
					<li><?php scd_e( 'svc_detail_b3' ); ?></li>
					<li><?php scd_e( 'svc_detail_b4' ); ?></li>
					<li><?php scd_e( 'svc_' . str_replace( '-', '_', $sid ) . '_benefit' ); ?></li>
				</ul>

				<h2><?php scd_e( 'how_title' ); ?></h2>
				<ol class="service-detail-steps">
					<li>
						<strong><?php scd_e( 'how_step1_title' ); ?></strong>
						<span><?php scd_e( 'how_step1_desc' ); ?></span>
					</li>
					<li>
						<strong><?php scd_e( 'how_step2_title' ); ?></strong>
						<span><?php scd_e( 'how_step2_desc' ); ?></span>
					</li>
					<li>
						<strong><?php scd_e( 'how_step3_title' ); ?></strong>
						<span><?php scd_e( 'how_step3_desc' ); ?></span>
					</li>
					<li>
						<strong><?php scd_e( 'how_step4_title' ); ?></strong>
						<span><?php scd_e( 'how_step4_desc' ); ?></span>
					</li>
				</ol>

				<h2><?php scd_e( 'svc_detail_areas_title' ); ?></h2>
				<p><?php scd_e( 'svc_detail_areas' ); ?></p>

				<h2><?php scd_e( 'faq_title' ); ?></h2>
				<div class="faq-list">
					<?php for ( $i = 1; $i <= 3; $i++ ) : ?>
					<details class="faq-item">
						<summary><?php scd_e( 'svc_' . str_replace( '-', '_', $sid ) . '_faq_q' . $i ); ?></summary>
						<p><?php scd_e( 'svc_' . str_replace( '-', '_', $sid ) . '_faq_a' . $i ); ?></p>
					</details>
					<?php endfor; ?>
				</div>
			</article>

			<aside class="service-detail-aside" aria-label="<?php echo esc_attr( scd__( 'svc_detail_aside_label' ) ); ?>">
				<div class="service-detail-card">
					<h2><?php scd_e( 'svc_detail_cta_title' ); ?></h2>
					<p><?php scd_e( 'svc_detail_cta_sub' ); ?></p>
					<a class="btn btn-green btn-block" href="<?php echo esc_url( $phone_href ); ?>"><?php scd_e( 'cta_call' ); ?></a>
					<a class="btn btn-outline btn-block" href="<?php echo esc_url( $wa_href_prefill ); ?>" target="_blank" rel="noopener noreferrer"><?php scd_e( 'cta_whatsapp' ); ?></a>
					<a class="btn btn-dark btn-block" href="<?php echo esc_url( $wa_href ); ?>" target="_blank" rel="noopener noreferrer"><?php scd_e( 'cta_quote' ); ?></a>
					<p class="service-detail-hours"><?php scd_e( 'contact_hours' ); ?>: <?php scd_e( 'contact_hours_val' ); ?></p>
				</div>
			</aside>
		</div>
	</section>

	<section class="section section-green-soft">
		<div class="container">
			<div class="section-head">
				<h2><?php scd_e( 'svc_detail_related_title' ); ?></h2>
			</div>
			<div class="service-grid">
				<?php
				$count = 0;
				foreach ( scd_services() as $related ) {
					if ( $related['id'] === $svc['id'] ) {
						continue;
					}
					if ( $count >= 4 ) {
						break;
					}
					$count++;
					$rimg = SCD_URI . '/assets/images/services/' . $related['image'] . '.jpg';
					?>
				<a class="service-item" href="<?php echo esc_url( scd_service_url( $related['slug'] ) ); ?>">
					<span class="service-icon">
						<img src="<?php echo esc_url( $rimg ); ?>" alt="<?php echo esc_attr( scd__( $related['title'] ) ); ?>" width="120" height="120" loading="lazy" decoding="async">
					</span>
					<h3><?php scd_e( $related['title'] ); ?></h3>
					<span class="service-link"><?php scd_e( 'view_detail' ); ?></span>
				</a>
				<?php } ?>
			</div>
		</div>
	</section>

	<section class="cta-band">
		<div class="container">
			<h2><?php scd_e( 'cta_banner_title' ); ?></h2>
			<p><?php scd_e( 'cta_banner_sub' ); ?></p>
			<div class="hero-cta">
				<a class="btn btn-green" href="<?php echo esc_url( $phone_href ); ?>"><?php scd_e( 'cta_call' ); ?> <?php echo esc_html( scd_phone() ); ?></a>
				<a class="btn btn-outline" href="<?php echo esc_url( $wa_href_prefill ); ?>" target="_blank" rel="noopener noreferrer"><?php scd_e( 'cta_whatsapp' ); ?></a>
			</div>
		</div>
	</section>
</main>
<?php
get_footer();
