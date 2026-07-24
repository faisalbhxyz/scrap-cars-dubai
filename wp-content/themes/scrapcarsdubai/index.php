<?php
/**
 * Main fallback template.
 *
 * @package ScrapCarsDubai
 */
get_header();
?>
<main id="main">
	<section class="page-hero">
		<div class="container">
			<h1><?php echo esc_html( get_the_title() ? get_the_title() : scd__( 'site_name' ) ); ?></h1>
		</div>
	</section>
	<section class="content-block">
		<div class="container prose">
			<?php
			if ( have_posts() ) {
				while ( have_posts() ) {
					the_post();
					the_content();
				}
			}
			?>
		</div>
	</section>
</main>
<?php
get_footer();
