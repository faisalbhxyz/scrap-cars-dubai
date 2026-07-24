<?php
/**
 * Service catalog — slugs, SEO, and detail content keys.
 *
 * @package ScrapCarsDubai
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * All buyable vehicle categories with SEO-friendly page slugs.
 *
 * @return array<int, array<string, string>>
 */
function scd_services() {
	return array(
		array(
			'id'    => 'accidental',
			'slug'  => 'accidental-cars-dubai',
			'image' => 'accidental',
			'title' => 'svc_accidental',
			'desc'  => 'svc_accidental_desc',
		),
		array(
			'id'    => 'mulkiya-finish',
			'slug'  => 'accident-mulkiya-finish-cars-dubai',
			'image' => 'mulkiya-finish',
			'title' => 'svc_mulkiya_finish',
			'desc'  => 'svc_mulkiya_finish_desc',
		),
		array(
			'id'    => 'damaged',
			'slug'  => 'damaged-cars-dubai',
			'image' => 'damaged',
			'title' => 'svc_damaged',
			'desc'  => 'svc_damaged_desc',
		),
		array(
			'id'    => 'impounded',
			'slug'  => 'impounded-cars-dubai',
			'image' => 'impounded',
			'title' => 'svc_impounded',
			'desc'  => 'svc_impounded_desc',
		),
		array(
			'id'    => 'nonrunning',
			'slug'  => 'non-running-cars-dubai',
			'image' => 'nonrunning',
			'title' => 'svc_nonrunning',
			'desc'  => 'svc_nonrunning_desc',
		),
		array(
			'id'    => 'mechanical',
			'slug'  => 'mechanical-issues-cars-dubai',
			'image' => 'mechanical',
			'title' => 'svc_mechanical',
			'desc'  => 'svc_mechanical_desc',
		),
		array(
			'id'    => 'electrical',
			'slug'  => 'electrical-issues-cars-dubai',
			'image' => 'electrical',
			'title' => 'svc_electrical',
			'desc'  => 'svc_electrical_desc',
		),
		array(
			'id'    => 'old',
			'slug'  => 'old-cars-dubai',
			'image' => 'old',
			'title' => 'svc_old',
			'desc'  => 'svc_old_desc',
		),
		array(
			'id'    => 'flooded',
			'slug'  => 'flooded-cars-dubai',
			'image' => 'flooded',
			'title' => 'svc_flooded',
			'desc'  => 'svc_flooded_desc',
		),
	);
}

/**
 * Find a service by page slug.
 *
 * @param string $slug Page post_name.
 * @return array<string, string>|null
 */
function scd_get_service_by_slug( $slug ) {
	foreach ( scd_services() as $svc ) {
		if ( $svc['slug'] === $slug ) {
			return $svc;
		}
	}
	return null;
}

/**
 * Whether the current singular page is a service detail page.
 *
 * @return array<string, string>|null
 */
function scd_current_service() {
	if ( ! is_singular( 'page' ) ) {
		return null;
	}
	return scd_get_service_by_slug( get_post_field( 'post_name', get_queried_object_id() ) );
}

/**
 * Public URL for a service detail page (language-aware).
 *
 * @param string $slug Service page slug.
 * @return string
 */
function scd_service_url( $slug ) {
	return scd_lang_url( '/' . trailingslashit( $slug ) );
}
