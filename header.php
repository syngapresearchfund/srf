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

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

	<link rel="profile" href="https://gmpg.org/xfn/11">

	<!-- Google Tag Manager -->
	<script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-155106030-1"></script>
	<script type="text/javascript">window.dataLayer = window.dataLayer || [];function gtag(){dataLayer.push(arguments);}gtag('js', new Date());gtag('config', 'UA-155106030-1', {'anonymize_ip': false});</script>
		
	<!-- FB Events -->
	<script type="text/javascript">!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';n.agent='plwebflow';n.queue=[];t=b.createElement(e);t.async=!0;t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,document,'script','https://connect.facebook.net/en_US/fbevents.js');fbq('init', '393196405398381');fbq('track', 'PageView');</script>

	<!-- Global site tag (gtag.js) - Google Ads: 714362048 -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=AW-714362048"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'AW-714362048');
	</script>

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site relative">
	<a class="skip-link screen-reader-text hidden" href="#content"><?php esc_html_e( 'Skip to content' ); ?></a>

	<header id="masthead" class="site-header w-full z-10 text-gray-600 border-b border-gray-300"  x-data="{ open: false, openFirst: false, openSecond: false, openThird: false, openFourth: false, openLast: false }">
		<?php get_template_part( 'template-parts/content', 'header' ); ?>
	</header>

	<main id="content" class="site-content site-main <?php echo is_front_page() ? '' : 'bg-gray-100'; ?>">
