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
function srf_setup(): void {
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
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	// Add support for Block Styles.
	add_theme_support( 'wp-block-styles' );

	// Add support for full and wide align images.
	add_theme_support( 'align-wide' );

	// Add support for editor styles.
	add_theme_support( 'editor-styles' );

	// Adds support for appearance tools - added in 6.5
	// See https://wordpress.org/documentation/wordpress-version/version-6-5/#add-appearance-tools-to-classic-themes
	add_theme_support( 'appearance-tools' );

	// WooCommerce support (uncomment to enable)
	// https://docs.woocommerce.com/document/third-party-custom-theme-compatibility/
	// NOTE: This appears to break the layout of the single product page. Commenting out for now, as it does not seem to be needed.
	// add_theme_support( 'woocommerce' );

	// Add featured image size.
	add_image_size( 'featured-image', 635, 320 );
	add_image_size( 'featured-image-small', 475, 320 );
	add_image_size( 'featured-thumbnail', 320, 320 );
	add_image_size( 'profile-image', 640, 640 );

	// Remove patterns that ship with WordPress Core.
	remove_theme_support( 'core-block-patterns' );
}

add_action( 'after_setup_theme', __NAMESPACE__ . '\\srf_setup' );

/**
 * Prevent the loading of patterns from the WordPress.org Pattern Directory.
 */
add_filter( 'should_load_remote_block_patterns', '__return_false' );

/**
 * Enqueue scripts and styles.
 */
function srf_scripts(): void {
	// Theme styles.
	wp_enqueue_style( 'srf-style', get_template_directory_uri() . '/style.css', array(), wp_get_theme()->get( 'Version' ) );
	// Google Font stylesheet.
	wp_enqueue_style( 'srf-fonts', 'https://fonts.googleapis.com/css2?family=EB+Garamond:ital,wght@0,400;0,500;0,600;0,700;0,800;1,400;1,500;1,600;1,700;1,800&family=Poppins:wght@400;500;600;700;800&display=swap', array(), wp_get_theme()->get( 'Version' ) );
	// Alpine library.
	wp_enqueue_script( 'alpinejs', get_template_directory_uri() . '/assets/js/alpinejs-3.10.5.min.js', array(), wp_get_theme()->get( 'Version' ), true );
	// Alpine library.
	wp_enqueue_script( 'main', get_template_directory_uri() . '/assets/js/index.js', array(), wp_get_theme()->get( 'Version' ), true );
	// Classy Donation Widget.
	if ( is_page( 'donate' ) ) {
		wp_enqueue_script( 'classy-donation-widget', 'https://giving.classy.org/embedded/api/sdk/js/86467', array(), wp_get_theme()->get( 'Version' ), true );
	}
}

add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\\srf_scripts' );

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Jetpack compatability configurations.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';
