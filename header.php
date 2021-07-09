<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @since 2019-05-19 First docBlock
 * @package SRF
 */

namespace SRF;

?>

<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="x-ua-compatible" content="IE=Edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0" />

	<title><?php echo esc_html( the_title() ); ?></title>

	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text hidden" href="#content"><?php esc_html_e( 'Skip to content' ); ?></a>

	<header id="masthead" class="site-header">
		<nav id="site-navigation" class="flex px-8 bg-purple-700 text-purple-100 justify-between">
			<!-- left side -->
			<div class="flex items-center space-x-3">
				<a class="block p-3">Features</a>
				<a class="block p-3">Pricing</a>
			</div>

			<!-- center -->
			<div class="flex items-center space-x-3">
				<a class="block p-3">Logo</a>
			</div>

			<!-- right side -->
			<div class="flex items-center space-x-3">
				<a class="block p-3">Sign Up</a>
				<a class="block p-3">Login</a>
			</div>
		</nav>

		<div class="site-masthead">
			<div class="site-branding">
				<a href="<?php echo esc_url( 'https://wordpress.com' ); ?>" rel="home">
					WordPress.com
				</a>
			</div><!-- .site-branding -->
			<p class="site-description no-widows"><?php _e( 'Expert Tips' ); ?></p>
			<div class="site-masthead-cta"><a class="button__cta button__cta-small" href="<?php echo esc_url( 'https://wordpress.com/start/' ); ?>"><?php esc_html_e( 'Create your own website' ); ?></a></div>
		</div>

		<div class="wpcom-go-search"><?php get_search_form(); ?></div>
	</header><!-- #masthead -->

	<main id="content" class="site-content site-main">
