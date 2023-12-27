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
//	add_theme_support(
//		'infinite-scroll',
//		array(
//			'type'           => 'click',
//			'container'      => 'post-list',
//			'wrapper'        => false,
//			'footer'         => false,
//			'render'         => 'srf_infinite_scroll_render',
//			'posts_per_page' => 9,
//		)
//	);

	// Add theme support for Responsive Videos.
	add_theme_support( 'jetpack-responsive-videos' );

	// Add theme support for Featured Content.
//	add_theme_support( 'featured-content', array(
//		'filter'     => 'srf_get_featured_posts',
//		'max_posts'  => 3,
//		'post_types' => array( 'srf-events' ),
//	) );
}

add_action( 'after_setup_theme', __NAMESPACE__ . '\\srf_jetpack_setup' );

/**
 * Renders content on infinite scroll.
 */
function srf_infinite_scroll_render(): void {
	while ( have_posts() ) {
		the_post();
		get_template_part( 'template-parts/content', get_post_type() );
	}
}
