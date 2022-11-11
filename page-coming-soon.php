<?php
/**
 * The Coming Soon page template.
 *
 * This is the template that displays the COMING SOON page while site is in development.
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

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text hidden" href="#content"><?php esc_html_e( 'Skip to content' ); ?></a>

	<main id="content" class="site-content site-main bg-gray-200">

		<div class="min-h-screen min-w-screen flex flex-col gap-y-6 justify-center items-center">
			<img class="w-auto h-9 sm:h-16" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/srf-logo.svg" alt="">
			<h1 class="text-5xl sm:text-7xl md:text-8xl lg:text-9xl font-bold text-transparent bg-clip-text bg-gradient-to-br from-srf-blue-500 via-srf-purple-500 to-srf-green-500">COMING SOON!</h1>
		</div>
	</main>

</div>
</body>
</html>
