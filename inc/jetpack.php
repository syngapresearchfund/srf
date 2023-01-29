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

	// Add theme support for Content Options.
	// add_theme_support(
	// 'jetpack-content-options',
	// array(
	// 'post-details'    => array(
	// 'stylesheet' => 'go-style',
	// 'date'       => '.posted-on',
	// 'categories' => '.cat-links',
	// 'tags'       => '.tags-links',
	// 'author'     => '.byline',
	// 'comment'    => '.comments-link',
	// ),
	// 'featured-images' => array(
	// 'archive' => true,
	// 'post'    => true,
	// 'page'    => true,
	// ),
	// )
	// );
}
add_action( 'after_setup_theme', __NAMESPACE__ . '\\srf_jetpack_setup' );

/**
 * Renders content on infinite scroll.
 */
function srf_infinite_scroll_render() : void {
	while ( have_posts() ) {
		the_post();
		get_template_part( 'template-parts/content', get_post_type() );
	}
}
