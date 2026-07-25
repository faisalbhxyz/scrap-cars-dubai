<?php
/**
 * Car Scrap Dubai theme functions.
 *
 * @package ScrapCarsDubai
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'SCD_VERSION', '1.5.1' );
define( 'SCD_DIR', get_template_directory() );
define( 'SCD_URI', get_template_directory_uri() );

require_once SCD_DIR . '/inc/i18n.php';
require_once SCD_DIR . '/inc/services.php';
require_once SCD_DIR . '/inc/locations.php';
require_once SCD_DIR . '/inc/service-translations.php';
require_once SCD_DIR . '/inc/translations.php';
require_once SCD_DIR . '/inc/seo.php';

function scd_setup() {
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'custom-logo', array(
		'height'      => 120,
		'width'       => 280,
		'flex-height' => true,
		'flex-width'  => true,
	) );
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' ) );
	add_theme_support( 'automatic-feed-links' );

	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'scrapcarsdubai' ),
		'footer'  => __( 'Footer Menu', 'scrapcarsdubai' ),
	) );
}
add_action( 'after_setup_theme', 'scd_setup' );

function scd_assets() {
	wp_enqueue_style(
		'scd-fonts',
		'https://fonts.googleapis.com/css2?family=Archivo+Black&family=Cairo:wght@400;600;700;800&family=Montserrat:wght@600;700;800&family=Syne:wght@600;700;800&family=Manrope:wght@400;500;600;700&display=swap',
		array(),
		null
	);
	wp_enqueue_style( 'scd-main', SCD_URI . '/assets/css/main.css', array( 'scd-fonts' ), SCD_VERSION );
	wp_enqueue_script( 'scd-main', SCD_URI . '/assets/js/main.js', array(), SCD_VERSION, true );
}
add_action( 'wp_enqueue_scripts', 'scd_assets' );

function scd_customize_register( $wp_customize ) {
	$wp_customize->add_section( 'scd_contact', array(
		'title'    => __( 'Car Scrap Dubai Contact', 'scrapcarsdubai' ),
		'priority' => 30,
	) );

	$fields = array(
		'scd_phone'     => array( 'Phone', '+971 54 567 4515', 'text' ),
		'scd_phone_2'   => array( 'Phone 2', '+971 52 778 1618', 'text' ),
		'scd_whatsapp'  => array( 'WhatsApp (digits only)', '971545674515', 'text' ),
		'scd_email'     => array( 'Email', 'info@carscrapdubai.com', 'text' ),
		'scd_address'   => array( 'Address', "Dubai, United Arab Emirates\nSharjah Industrial Area 10", 'textarea' ),
		'scd_facebook'  => array( 'Facebook URL', 'https://www.facebook.com/profile.php?id=100025197109278', 'text' ),
		'scd_instagram' => array( 'Instagram URL', 'https://www.instagram.com/scrapcar0545674515', 'text' ),
		'scd_x'         => array( 'X (Twitter) URL', 'https://x.com/ScrapCar5', 'text' ),
	);

	foreach ( $fields as $id => $data ) {
		$is_textarea = isset( $data[2] ) && 'textarea' === $data[2];
		$wp_customize->add_setting( $id, array(
			'default'           => $data[1],
			'sanitize_callback' => $is_textarea ? 'sanitize_textarea_field' : 'sanitize_text_field',
		) );
		$wp_customize->add_control( $id, array(
			'label'   => $data[0],
			'section' => 'scd_contact',
			'type'    => $is_textarea ? 'textarea' : 'text',
		) );
	}
}
add_action( 'customize_register', 'scd_customize_register' );

function scd_phone() {
	return get_theme_mod( 'scd_phone', '+971 54 567 4515' );
}
function scd_phone_2() {
	return get_theme_mod( 'scd_phone_2', '+971 52 778 1618' );
}
function scd_whatsapp() {
	return get_theme_mod( 'scd_whatsapp', '971545674515' );
}
function scd_email() {
	return get_theme_mod( 'scd_email', 'info@carscrapdubai.com' );
}
function scd_address() {
	return implode( "\n", scd_address_lines() );
}

/**
 * Address lines for Contact / footer (exact 2-line layout).
 *
 * @return string[]
 */
function scd_address_lines() {
	$default = array(
		'Dubai, United Arab Emirates',
		'Sharjah Industrial Area 10',
	);
	$addr = get_theme_mod( 'scd_address', implode( "\n", $default ) );
	if ( ! is_string( $addr ) || '' === trim( $addr ) ) {
		return $default;
	}
	$lines = preg_split( '/\R+/', trim( $addr ) );
	$lines = array_values( array_filter( array_map( 'trim', (array) $lines ) ) );
	return count( $lines ) >= 2 ? $lines : $default;
}

/**
 * Print address as separate block lines (no soft-wrap across lines).
 *
 * @param string $class Optional CSS class on each line.
 */
function scd_the_address( $class = 'scd-address-line' ) {
	foreach ( scd_address_lines() as $line ) {
		printf(
			'<span class="%s">%s</span>',
			esc_attr( $class ),
			esc_html( $line )
		);
	}
}
function scd_facebook() {
	return get_theme_mod( 'scd_facebook', 'https://www.facebook.com/profile.php?id=100025197109278' );
}
function scd_instagram() {
	return get_theme_mod( 'scd_instagram', 'https://www.instagram.com/scrapcar0545674515' );
}
function scd_x() {
	return get_theme_mod( 'scd_x', 'https://x.com/ScrapCar5' );
}

/**
 * Fallback primary menu when no WP menu assigned.
 */
function scd_fallback_menu() {
	$items = array(
		array( 'nav_home', home_url( '/' ) ),
		array( 'nav_services', home_url( '/#services' ) ),
		array( 'nav_how', home_url( '/#how-it-works' ) ),
		array( 'nav_locations', home_url( '/#locations' ) ),
		array( 'nav_why', home_url( '/#why-us' ) ),
		array( 'nav_about', home_url( '/about-us/' ) ),
		array( 'nav_faq', home_url( '/faqs/' ) ),
	);
	echo '<ul class="nav-list">';
	foreach ( $items as $item ) {
		$url = $item[1];
		if ( scd_is_ar() ) {
			$url = add_query_arg( 'lang', 'ar', $url );
		}
		printf( '<li><a href="%s">%s</a></li>', esc_url( $url ), esc_html( scd__( $item[0] ) ) );
	}
	echo '</ul>';
}

function scd_lang_url( $path = '/' ) {
	$url = home_url( $path );
	if ( scd_is_ar() ) {
		$url = add_query_arg( 'lang', 'ar', $url );
	}
	return $url;
}
