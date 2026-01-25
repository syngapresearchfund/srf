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

/**
 * Redirect international visitors from the donate page to an alternate page.
 *
 * Uses ip-api.com for geolocation. Includes error logging and caching safeguards.
 */
function srf_redirect_international_donors(): void {
	// Only run on the donate page.
	if ( ! is_page( 'donate' ) ) {
		return;
	}

	// Prevent page caching for this page.
	nocache_headers();

	// Get the visitor's IP address.
	$ip = $_SERVER['REMOTE_ADDR'] ?? '';

	// Skip for local/private IPs (development environments).
	if ( empty( $ip ) || in_array( $ip, array( '127.0.0.1', '::1' ), true ) ) {
		return;
	}

	// Check for cached geolocation result (reduces API calls).
	$cache_key    = 'srf_geo_' . md5( $ip );
	$country_code = get_transient( $cache_key );

	if ( false === $country_code ) {
		// Make the API request.
		$api_url  = "http://ip-api.com/json/{$ip}?fields=status,message,countryCode";
		$response = wp_remote_get( $api_url, array( 'timeout' => 5 ) );

		if ( is_wp_error( $response ) ) {
			// Log the error and allow access.
			error_log( 'SRF Geolocation: API request failed - ' . $response->get_error_message() );
			return;
		}

		$body = wp_remote_retrieve_body( $response );
		$geo  = json_decode( $body );

		if ( ! $geo || ! isset( $geo->status ) ) {
			error_log( 'SRF Geolocation: Invalid API response for IP ' . $ip );
			return;
		}

		if ( 'fail' === $geo->status ) {
			// Rate limited or other API error.
			error_log( 'SRF Geolocation: API error - ' . ( $geo->message ?? 'unknown' ) );
			return;
		}

		$country_code = $geo->countryCode ?? '';

		// Cache the result for 1 hour to reduce API calls.
		set_transient( $cache_key, $country_code, HOUR_IN_SECONDS );
	}

	// Redirect non-US visitors.
	if ( ! empty( $country_code ) && 'US' !== $country_code ) {
		wp_redirect( home_url( '/donate-international/' ) );
		exit;
	}
}

add_action( 'template_redirect', __NAMESPACE__ . '\\srf_redirect_international_donors' );

/**
 * Enqueue JavaScript fallback for international donor redirect.
 *
 * This handles edge cases where page caching might bypass the PHP redirect.
 */
function srf_enqueue_geo_fallback_script(): void {
	if ( ! is_page( 'donate' ) ) {
		return;
	}

	$redirect_url = home_url( '/donate-international/' );

	$inline_script = "
		(function() {
			// Only run if not already redirected and fetch is available.
			if (typeof fetch !== 'function') return;

			fetch('https://ip-api.com/json/?fields=status,countryCode')
				.then(function(response) { return response.json(); })
				.then(function(data) {
					if (data.status === 'success' && data.countryCode && data.countryCode !== 'US') {
						window.location.href = " . wp_json_encode( $redirect_url ) . ";
					}
				})
				.catch(function(error) {
					console.log('Geolocation check failed:', error);
				});
		})();
	";

	wp_add_inline_script( 'main', $inline_script, 'after' );
}

add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\\srf_enqueue_geo_fallback_script' );