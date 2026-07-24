<!DOCTYPE html>
<html <?php echo scd_html_lang_attr(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<a class="skip-link screen-reader-text" href="#main" style="position:absolute;left:-9999px"><?php echo esc_html( scd_is_ar() ? 'تخطي إلى المحتوى' : 'Skip to content' ); ?></a>
<header class="site-header">
	<div class="container header-inner">
		<a class="brand" href="<?php echo esc_url( scd_lang_url( '/' ) ); ?>">
			<?php
			if ( has_custom_logo() ) {
				$logo_id = get_theme_mod( 'custom_logo' );
				echo wp_get_attachment_image( $logo_id, 'medium', false, array(
					'alt'   => scd__( 'site_name' ),
					'class' => 'custom-logo',
				) );
			} else {
				?>
				<span class="brand-text">
					<strong>CAR SCRAP</strong>
					<span>DUBAI</span>
				</span>
				<?php
			}
			?>
		</a>

		<div class="header-right">
			<div class="lang-switch" role="navigation" aria-label="Language">
				<a class="<?php echo scd_is_ar() ? '' : 'is-active'; ?>" href="<?php echo esc_url( scd_switch_url( 'en' ) ); ?>">EN</a>
				<a class="<?php echo scd_is_ar() ? 'is-active' : ''; ?>" href="<?php echo esc_url( scd_switch_url( 'ar' ) ); ?>">ع</a>
			</div>

			<a class="btn btn-green btn-call-desktop" href="tel:<?php echo esc_attr( preg_replace( '/\s+/', '', scd_phone() ) ); ?>"><?php scd_e( 'cta_call' ); ?></a>

			<button class="menu-toggle" type="button" aria-expanded="false" aria-controls="site-nav" aria-label="<?php echo esc_attr( scd__( 'menu_open' ) ); ?>">
				<span></span><span></span><span></span>
			</button>
		</div>

		<div class="nav-wrap" id="site-nav">
			<nav class="primary-nav" aria-label="Primary">
				<?php scd_fallback_menu(); ?>
			</nav>
		</div>
	</div>
</header>
