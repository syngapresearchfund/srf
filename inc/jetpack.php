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
			'container'      => 'new-posts',
			'wrapper'        => false,
			'footer'         => false,
			'render'         => 'srf_infinite_scroll_render',
			'posts_per_page' => get_option( 'posts_per_page' ),
		)
	);

	// Add theme support for Responsive Videos.
	add_theme_support( 'jetpack-responsive-videos' );
}
/**
 * Renders content on infinite scroll.
 */
function srf_infinite_scroll_render() : void {
	while ( have_posts() ) {
		the_post();
		get_template_part( 'template-parts/content', get_post_type() );
	}
}
// This isn't needed because we're using the default Jetpack setup for now.
// TODO: Explore this implementation in the future.
// add_action( 'after_setup_theme', __NAMESPACE__ . '\\srf_jetpack_setup' );

/**
 * Add a custom Open Graph tags (social share card).
 *
 * @param array $tags List of opengraph tags.
 * @return array Modified list of opengraph tags.
 *@since 2020-03-06
 *
 */
function srf_custom_og_tags( array $tags ) : array {
	$tags['og:image'] = get_template_directory_uri() . '/assets/images/srf-site-icon.png';
	$tags['og:site_name'] = 'Syngap Research Fund';
	$tags['og:description'] = 'SynGAP Research Fund (SRF) is a global group of families committed to accelerating the science to cure SYNGAP1 & to supporting each other.';

	return $tags;
}
add_filter( 'jetpack_open_graph_tags', __NAMESPACE__ . '\\srf_custom_og_tags' );
