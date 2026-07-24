<?php
/**
 * Template Name: About Page
 *
 * @package ScrapCarsDubai
 */
get_header();
$wa_href    = 'https://wa.me/' . scd_whatsapp();
$phone_href = 'tel:' . preg_replace( '/\s+/', '', scd_phone() );
?>
<main id="main">
	<section class="page-hero">
		<div class="container">
			<h1><?php scd_e( 'about_title' ); ?></h1>
			<p><?php scd_e( 'why_sub' ); ?></p>
		</div>
	</section>
	<section class="content-block">
		<div class="container prose">
			<p><?php scd_e( 'about_p1' ); ?></p>
			<p><?php scd_e( 'about_p2' ); ?></p>
			<p><?php scd_e( 'about_p3' ); ?></p>
			<p><?php echo esc_html( scd_is_ar()
				? 'نخدم دبي وجميع الإمارات — استلام مجاني، عرض سعر فوري، ودفع عبر التحويل البنكي بعد الاستلام.'
				: 'We serve Dubai and all UAE emirates — free pickup, instant quotes, and bank-transfer payment after collection.'
			); ?></p>
			<p><?php echo esc_html( scd_is_ar()
				? 'من سيارات الحوادث والملكية المنتهية إلى السيارات الغارقة وغير العاملة، نشتري جميع الحالات والماركات.'
				: 'From accidental and mulkiya-finish cars to flooded and non-running vehicles, we buy all conditions and major brands.'
			); ?></p>
			<div class="hero-cta" style="margin-top:1.25rem">
				<a class="btn btn-green" href="<?php echo esc_url( $phone_href ); ?>"><?php scd_e( 'cta_call' ); ?></a>
				<a class="btn btn-dark" href="<?php echo esc_url( $wa_href ); ?>" target="_blank" rel="noopener noreferrer"><?php scd_e( 'cta_sell' ); ?></a>
			</div>
		</div>
	</section>
</main>
<?php
get_footer();
