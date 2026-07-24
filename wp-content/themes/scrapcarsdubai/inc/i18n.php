<?php
/**
 * Language detection and translation helpers.
 *
 * @package ScrapCarsDubai
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Supported languages.
 */
function scd_languages() {
	return array(
		'en' => array(
			'code'      => 'en',
			'locale'    => 'en_US',
			'name'      => 'English',
			'native'    => 'English',
			'dir'       => 'ltr',
			'hreflang'  => 'en',
		),
		'ar' => array(
			'code'      => 'ar',
			'locale'    => 'ar',
			'name'      => 'Arabic',
			'native'    => 'العربية',
			'dir'       => 'rtl',
			'hreflang'  => 'ar',
		),
	);
}

/**
 * Current language code.
 */
function scd_lang() {
	static $lang = null;
	if ( null !== $lang ) {
		return $lang;
	}

	$supported = array_keys( scd_languages() );
	$chosen    = 'en';

	if ( isset( $_GET['lang'] ) ) {
		$q = sanitize_key( wp_unslash( $_GET['lang'] ) );
		if ( in_array( $q, $supported, true ) ) {
			$chosen = $q;
			setcookie( 'scd_lang', $chosen, time() + YEAR_IN_SECONDS, COOKIEPATH ? COOKIEPATH : '/', COOKIE_DOMAIN, is_ssl(), true );
		}
	} elseif ( ! empty( $_COOKIE['scd_lang'] ) ) {
		$c = sanitize_key( wp_unslash( $_COOKIE['scd_lang'] ) );
		if ( in_array( $c, $supported, true ) ) {
			$chosen = $c;
		}
	} else {
		$uri = isset( $_SERVER['REQUEST_URI'] ) ? wp_unslash( $_SERVER['REQUEST_URI'] ) : '';
		if ( preg_match( '#^/ar(/|\?|$)#', $uri ) || false !== strpos( $uri, '/ar/' ) ) {
			$chosen = 'ar';
		}
	}

	$lang = $chosen;
	return $lang;
}

/**
 * Is Arabic?
 */
function scd_is_ar() {
	return 'ar' === scd_lang();
}

/**
 * Document language attributes.
 */
function scd_html_lang_attr() {
	$langs = scd_languages();
	$lang  = scd_lang();
	return sprintf(
		'lang="%s" dir="%s"',
		esc_attr( $langs[ $lang ]['hreflang'] ),
		esc_attr( $langs[ $lang ]['dir'] )
	);
}

/**
 * Translate a string key.
 */
function scd__( $key, $fallback = '' ) {
	$strings = scd_strings();
	$lang    = scd_lang();
	if ( isset( $strings[ $key ][ $lang ] ) ) {
		return $strings[ $key ][ $lang ];
	}
	if ( isset( $strings[ $key ]['en'] ) ) {
		return $strings[ $key ]['en'];
	}
	return $fallback !== '' ? $fallback : $key;
}

/**
 * Echo translated string.
 */
function scd_e( $key, $fallback = '' ) {
	echo esc_html( scd__( $key, $fallback ) );
}

/**
 * Language switch URL for target language.
 */
function scd_switch_url( $target ) {
	$url = remove_query_arg( 'lang' );
	return add_query_arg( 'lang', $target, $url );
}

/**
 * Filter locale based on language.
 */
function scd_locale( $locale ) {
	$langs = scd_languages();
	$lang  = scd_lang();
	if ( isset( $langs[ $lang ] ) ) {
		return $langs[ $lang ]['locale'];
	}
	return $locale;
}
add_filter( 'locale', 'scd_locale' );

/**
 * Body classes for language.
 */
function scd_body_class( $classes ) {
	$classes[] = 'lang-' . scd_lang();
	$classes[] = scd_is_ar() ? 'rtl' : 'ltr';
	return $classes;
}
add_filter( 'body_class', 'scd_body_class' );
