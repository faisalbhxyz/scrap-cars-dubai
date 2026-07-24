<?php
/**
 * Template Name: Contact Page
 *
 * @package ScrapCarsDubai
 */
get_header();

$phone_href  = 'tel:' . preg_replace( '/\s+/', '', scd_phone() );
$phone2_href = scd_phone_2() ? 'tel:' . preg_replace( '/\s+/', '', scd_phone_2() ) : '';
$wa_href     = 'https://wa.me/' . scd_whatsapp();
$email_href  = 'mailto:' . scd_email();
?>
<main id="main">
	<section class="page-hero">
		<div class="container">
			<h1><?php scd_e( 'contact_title' ); ?></h1>
			<p><?php scd_e( 'contact_sub' ); ?></p>
		</div>
	</section>

	<section class="section">
		<div class="container contact-grid">
			<div>
				<dl class="contact-info">
					<dt><?php scd_e( 'contact_phone' ); ?></dt>
					<dd><a href="<?php echo esc_url( $phone_href ); ?>"><?php echo esc_html( scd_phone() ); ?></a></dd>
					<?php if ( scd_phone_2() ) : ?>
					<dd><a href="<?php echo esc_url( $phone2_href ); ?>"><?php echo esc_html( scd_phone_2() ); ?></a></dd>
					<?php endif; ?>

					<dt><?php scd_e( 'contact_email' ); ?></dt>
					<dd><a href="<?php echo esc_url( $email_href ); ?>"><?php echo esc_html( scd_email() ); ?></a></dd>

					<dt><?php scd_e( 'contact_address' ); ?></dt>
					<dd class="scd-address"><?php scd_the_address(); ?></dd>

					<dt><?php scd_e( 'contact_hours' ); ?></dt>
					<dd><?php scd_e( 'contact_hours_val' ); ?></dd>
				</dl>
				<div class="hero-cta" style="margin-top:1.5rem">
					<a class="btn btn-green" href="<?php echo esc_url( $phone_href ); ?>"><?php scd_e( 'cta_call' ); ?></a>
					<a class="btn btn-dark" href="<?php echo esc_url( $wa_href ); ?>" target="_blank" rel="noopener noreferrer"><?php scd_e( 'cta_whatsapp' ); ?></a>
				</div>
			</div>

			<div>
				<form class="contact-form" id="scd-contact-form" action="#" method="post">
					<label>
						<?php scd_e( 'form_name' ); ?>
						<input type="text" name="name" id="scd-cf-name" required autocomplete="name">
					</label>
					<label>
						<?php scd_e( 'form_phone' ); ?>
						<input type="tel" name="phone" id="scd-cf-phone" required autocomplete="tel">
					</label>
					<label>
						<?php scd_e( 'form_car' ); ?>
						<input type="text" name="car" id="scd-cf-car" required>
					</label>
					<label>
						<?php scd_e( 'form_message' ); ?>
						<textarea name="message" id="scd-cf-message" rows="4"></textarea>
					</label>
					<button class="btn btn-green" type="submit"><?php scd_e( 'form_submit' ); ?></button>
				</form>
			</div>
		</div>
	</section>
</main>
<script>
(function () {
	var form = document.getElementById('scd-contact-form');
	if (!form) return;
	var wa = <?php echo wp_json_encode( $wa_href ); ?>;
	form.addEventListener('submit', function (e) {
		e.preventDefault();
		var name = (document.getElementById('scd-cf-name') || {}).value || '';
		var phone = (document.getElementById('scd-cf-phone') || {}).value || '';
		var car = (document.getElementById('scd-cf-car') || {}).value || '';
		var msg = (document.getElementById('scd-cf-message') || {}).value || '';
		var text = 'Hello Car Scrap Dubai%0AName: ' + encodeURIComponent(name) +
			'%0APhone: ' + encodeURIComponent(phone) +
			'%0ACar: ' + encodeURIComponent(car) +
			(msg ? '%0AMessage: ' + encodeURIComponent(msg) : '');
		window.open(wa + '?text=' + text, '_blank', 'noopener,noreferrer');
	});
})();
</script>
<?php
get_footer();
