<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @since 2019-05-19 First docBlock
 * @package SRF
 */

namespace SRF;

if ( ! function_exists( 'srf_body_classes' ) ) :
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
endif;
add_filter( 'body_class', __NAMESPACE__ . '\\srf_body_classes' );

if ( ! function_exists( 'srf_pingback_header' ) ) :
	/**
	 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
	 */
	function srf_pingback_header() {
		if ( is_singular() && pings_open() ) {
			printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
		}
	}
endif;
add_action( 'wp_head', __NAMESPACE__ . '\\srf_pingback_header' );

if ( ! function_exists( 'srf_container_classes' ) ) :
	/**
	 * Adds custom classes to the navigation item based on current taxonomy
	 *
	 * @return boolean
	 */
	function srf_container_classes() {
		$container_classes = '';

		if ( ! is_front_page() ) {
			$container_classes .= 'container mx-auto px-6 lg:px-0 py-16';
		}
		if ( is_singular() ) {
			$container_classes .= ' prose lg:prose-xl';
		}

		return $container_classes;
	}
endif;

if ( ! function_exists( 'srf_current_menu_item' ) ) :
	/**
	 * Adds custom classes to the navigation item based on current taxonomy
	 *
	 * @param array $tax Taxonomy related to current nav item.
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
endif;

if ( ! function_exists( 'srf_is_state_ambassador' ) ) :
	/**
	 * Checks if the current post is a state ambassador
	 *
	 * @param array $args Arguments passed in from get_tempalte_part.
	 * @return boolean
	 */
	function srf_is_state_ambassador( $args ) {
		if ( 'srf-team' !== get_post_type() ) {
			return false;
		}

		if ( ! empty( $args ) && ( 'state-ambassadors' === $args['cat_slug'] || 'state-advocates' === $args['cat_slug'] ) ) {
			return true;
		}

		if ( is_tax() && ( 'state-ambassadors' === get_query_var( 'term' ) || 'state-advocates' === get_query_var( 'term' ) ) ) {
			return true;
		}


		return false;
	}
endif;

if ( ! function_exists( 'srf_is_intl_ambassador' ) ) :
	/**
	 * Checks if the current post is a state ambassador
	 *
	 * @param array $args Arguments passed in from get_tempalte_part.
	 * @return boolean
	 */
	function srf_is_intl_ambassador( $args ) {
		if ( 'srf-team' !== get_post_type() ) {
			return false;
		}

		if ( ! empty( $args ) && 'international-ambassadors' === $args['cat_slug'] ) {
			return true;
		}

		if ( is_tax() && 'international-ambassadors' === get_query_var( 'term' ) ) {
			return true;
		}


		return false;
	}
endif;