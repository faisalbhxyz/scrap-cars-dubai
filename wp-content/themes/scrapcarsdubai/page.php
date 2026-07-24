<?php
/**
 * Default page template.
 *
 * @package ScrapCarsDubai
 */
get_header();
?>
<main id="main">
	<?php while ( have_posts() ) : the_post(); ?>
	<section class="page-hero">
		<div class="container">
			<h1><?php the_title(); ?></h1>
		</div>
	</section>
	<section class="content-block">
		<div class="container prose">
			<?php the_content(); ?>
		</div>
	</section>
	<?php endwhile; ?>
</main>
<?php
get_footer();
