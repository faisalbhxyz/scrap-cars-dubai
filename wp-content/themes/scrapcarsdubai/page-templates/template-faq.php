<?php
/**
 * Template Name: FAQ Page
 *
 * @package ScrapCarsDubai
 */
get_header();
?>
<main id="main">
	<section class="page-hero">
		<div class="container">
			<h1><?php scd_e( 'faq_title' ); ?></h1>
		</div>
	</section>
	<section class="section">
		<div class="container">
			<div class="faq-list">
				<?php for ( $i = 1; $i <= 7; $i++ ) : ?>
				<details class="faq-item" <?php echo 1 === $i ? 'open' : ''; ?>>
					<summary><?php scd_e( 'faq_q' . $i ); ?></summary>
					<p><?php scd_e( 'faq_a' . $i ); ?></p>
				</details>
				<?php endfor; ?>
			</div>
		</div>
	</section>
</main>
<?php
get_footer();
