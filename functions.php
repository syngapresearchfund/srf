<?php
/**
 * Theme functionis.
 *
 * @since 2019-05-19 First docBlock
 * @package SRF
 */

namespace SRF;

/**
 * Sets up theme.
 */
function srf_setup() : void {
	// Automatic feed links.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', [
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	] );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	// Add support for Block Styles.
	add_theme_support( 'wp-block-styles' );

	// Add support for full and wide align images.
	add_theme_support( 'align-wide' );

	// Add support for editor styles.
	add_theme_support( 'editor-styles' );
}
add_action( 'after_setup_theme', __NAMESPACE__ . '\\srf_setup' );

/**
 * Enqueue scripts and styles.
 */
function srf_scripts() {
	// Theme styles
	wp_enqueue_style( 'srf-style', get_template_directory_uri() . '/style.css', array(), wp_get_theme()->get( 'Version' ) );
	// WooCommerce style overrides
	wp_enqueue_style( 'woo-style', get_template_directory_uri() . '/assets/css/woocommerce.css', array(), wp_get_theme()->get( 'Version' ) );
	// Navigation scripts
	wp_enqueue_script( 'alpinejs', get_template_directory_uri() . '/assets/js/alpinejs-3.3.1.min.js', array(), wp_get_theme()->get( 'Version' ), true );
}
add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\\srf_scripts' );


/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Related posts addition.
 */
require get_template_directory() . '/inc/related-posts.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
// if ( defined( 'JETPACK__VERSION' ) ) {
	// require get_template_directory() . '/inc/jetpack.php';
// }
