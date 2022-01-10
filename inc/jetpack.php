<?php
/**
 * Jetpack Compatibility File
 *
 * @link https://jetpack.com/
 *
 * @since 2019-05-19 First docBlock
 * @package SRF
 */

namespace SRF;

// Constants array for setting custom SEO title and meta tags.
require_once ABSPATH . '.config/seo/wpgo-seo-constants.php';

/**
 * Jetpack setup function.
 *
 * See: https://jetpack.com/support/infinite-scroll/
 * See: https://jetpack.com/support/responsive-videos/
 * See: https://jetpack.com/support/content-options/
 */
function srf_jetpack_setup() {
	// Add theme support for Infinite Scroll.
	add_theme_support(
		'infinite-scroll',
		array(
			'type'           => 'click',
			'container'      => 'grid-container',
			'wrapper'        => false,
			'render'         => __NAMESPACE__ . '\\srf_infinite_scroll_render',
			'footer'         => false,
			'posts_per_page' => 12,
		)
	);

	// Add theme support for Responsive Videos.
	add_theme_support( 'jetpack-responsive-videos' );

	// Add theme support for Content Options.
	add_theme_support(
		'jetpack-content-options',
		array(
			'post-details'    => array(
				'stylesheet' => 'go-style',
				'date'       => '.posted-on',
				'categories' => '.cat-links',
				'tags'       => '.tags-links',
				'author'     => '.byline',
				'comment'    => '.comments-link',
			),
			'featured-images' => array(
				'archive' => true,
				'post'    => true,
				'page'    => true,
			),
		)
	);
}
add_action( 'after_setup_theme', __NAMESPACE__ . '\\srf_jetpack_setup' );

/**
 * Renders content on infinite scroll.
 */
function srf_infinite_scroll_render() : void {
	while ( have_posts() ) {
		the_post();
		get_template_part( 'landing/marketing/go/template-parts/content', get_post_type() );
	}
}

/**
 * Filters infinite scroll AJAX URL.
 *
 * @since 2019-08-25
 *
 * @param  string $url URL to filter.
 * @return string      Filtered /go/ URL.
 */
function srf_infinite_scroll_ajax_url( $url ) : string {
	$url = (string) $url;

	if ( $url && false === mb_stripos( $url, '/go/' ) ) {
		$url = preg_replace( '/\/\/[^\/]+\//ui', '${0}go/', $url );
	}

	return $url;
}
add_filter( 'infinite_scroll_ajax_url', __NAMESPACE__ . '\\srf_infinite_scroll_ajax_url' );

/**
 * Filters infinite scroll settings.
 *
 * @since 2019-08-25
 *
 * @param  array $settings JS settings.
 * @return array           Filtered JS settings.
 */
function srf_infinite_scroll_js_settings( $settings ) : array {
	$settings = is_array( $settings ) ? $settings : array();

	$settings['ajaxurl'] = srf_infinite_scroll_ajax_url( $settings['ajaxurl'] ?? '' );
	$settings['text']    = __( 'Load more tips' );

	return $settings;
}
add_filter( 'infinite_scroll_js_settings', __NAMESPACE__ . '\\srf_infinite_scroll_js_settings' );

/**
 * This filter is written as a workaround for the bug raised at https://wp.me/pau2Xa-1J1
 * The root caused has been raised with the jetpack team at https://wp.me/p1HpG7-a9v
 * For now any infinite scroll result with a 404 status code is overridden as a 200 ok
 *
 * @param mixed $results current state of the result in the filter chain
 * @return mixed          unchanged state of the result in the filter chain
 */
function force_ok_response( $results ) {
	$current_status_code = http_response_code();
	if ( 404 === $current_status_code ) {
		status_header( 200 );
	}
	return $results;
}
add_filter( 'infinite_scroll_results', __NAMESPACE__ . '\\force_ok_response', 10 );

/**
 * Filters title tag.
 *
 * @since 2020-05-11
 *
 * @param  string $title Passed in by filter.
 * @return string        Filtered title.
 */
function srf_on_jetpack_seo_title( $title = '' ) : string {
	$title   = is_string( $title ) ? $title : '';
	$page_id = is_home() ? 0 : get_the_id();

	if ( defined( 'WPGO_SEO' ) && ! empty( WPGO_SEO[ $page_id ]['title'] ) ) {
		$title = WPGO_SEO[ $page_id ]['title'];
	}

	return $title;
}
add_filter( 'h4_title', __NAMESPACE__ . '\\srf_on_jetpack_seo_title', 15 );
add_filter( 'pre_get_document_title', __NAMESPACE__ . '\\srf_on_jetpack_seo_title', 15 );

/**
 * Filters meta tags.
 *
 * @since 2020-05-11
 *
 * @param  array $meta Passed in by filter.
 * @return array       Filtered meta.
 */
function srf_on_jetpack_seo_meta_tags( $meta = array() ) : array {
	$meta = is_array( $meta ) ? $meta : array();

	if ( ! defined( 'WPGO_SEO' ) ) {
		return $meta; // exit early
	}

	$page_id            = is_home() ? 0 : get_the_id();
	$custom_title       = WPGO_SEO[ $page_id ]['title'] ?? null;
	$custom_description = WPGO_SEO[ $page_id ]['description'] ?? null;

	if ( $custom_description ) {
		if ( doing_filter( 'jetpack_seo_meta_tags' ) ) {
			$meta['description'] = $custom_description;
		} else {
			$meta['og:description']      = $custom_description;
			$meta['twitter:description'] = $custom_description;
		}
	}

	if ( doing_filter( 'jetpack_open_graph_tags' ) && $custom_title ) {
		$meta['og:title']           = $custom_title;
		$meta['twitter:text:title'] = $custom_title;
	}

	return $meta;
}
add_filter( 'jetpack_seo_meta_tags', __NAMESPACE__ . '\\srf_on_jetpack_seo_meta_tags', 15 );
add_filter( 'jetpack_open_graph_tags', __NAMESPACE__ . '\\srf_on_jetpack_seo_meta_tags', 15 );

