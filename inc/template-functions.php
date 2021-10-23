<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @since 2019-05-19 First docBlock
 * @package SRF
 */

namespace SRF;

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function srf_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', __NAMESPACE__ . '\\srf_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function srf_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', __NAMESPACE__ . '\\srf_pingback_header' );

/**
 * Adds custom classes to the navigation item based on current taxonomy
 *
 * @param array $tax Taxonomy related to current nav item
 * @return boolean
 */
function srf_container_classes() {
	// $container_classes  = ! is_front_page() ? 'container mx-auto px-6 lg:px-0 py-16' : 'prose lg:prose-xl';
	// $container_classes .= is_singular() ? 'prose lg:prose-xl' : '';

	$container_classes = '';

	if ( ! is_front_page() ) {
		$container_classes .= 'container mx-auto px-6 lg:px-0 py-16';
	}
	if ( is_singular() || is_home() ) {
		$container_classes .= ' prose lg:prose-xl';
	}

	return $container_classes;
}

/**
 * Adds custom classes to the navigation item based on current taxonomy
 *
 * @param array $tax Taxonomy related to current nav item
 * @return boolean
 */
function srf_current_menu_item( $tax ) {
	if ( is_singular() ) {
		$menu_item_class = in_category( $tax ) || has_tag( $tax ) ? ' current-menu-item' : '';
	} else {
		$menu_item_class = is_category( $tax ) || is_tag( $tax ) ? ' current-menu-item' : '';
	}

	return $menu_item_class;
}
