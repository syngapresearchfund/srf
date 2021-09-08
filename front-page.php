<?php
/**
 * Front page template.
 *
 * @since 2019-05-19 First docBlock
 * @package SRF
 */

namespace SRF;

get_header();
?>
	<!-- ========================= -->
	<!-- hero section -->
	<!-- ========================= -->
	<section class="bg-gradient-to-b from-gray-100 to-gray-300">
		<div class="container mx-auto px-6 lg:px-0 py-24 text-center">
			<!-- heading -->
			<h2 class="mb-6 text-4xl lg:text-5xl font-extrabold">
				<span class="text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-blue-500">Collaboration.</span>
				<span class="block md:inline text-transparent bg-clip-text bg-gradient-to-r from-blue-500 to-purple-500">Transparency.</span>
				<span class="block md:inline text-transparent bg-clip-text bg-gradient-to-r from-purple-500 to-purple-600">Urgency.</span>
			</h2>
			<!-- paragraphs -->
			<p class="lg:w-1/2 lg:mx-auto mb-8 text-lg text-gray-500">SynGAP Research Fund (SRF) is a global group of families committed to accelerating the science to cure SynGAP & to supporting each other.</p>
	
			<!-- big button / cta -->
			<a href="https://syngapresearchfund.org" class="inline-block py-3 px-12 rounded shadow-lg hover:shadow-2xl bg-gradient-to-br from-blue-500 to-blue-700 hover:to-blue-600 text-blue-100 hover:text-white font-bold text-lg tracking-wide transition duration-500">Learn about SYNGAP1</a>
		</div>
	</section>		<!-- header + hero bg wrapper -->

	<?php
	if ( have_posts() ) :
		/* Start the Loop */
		while ( have_posts() ) :
			the_post();

				/*
				* Include the Post-Type-specific template for the content.
				* If you want to override this in a child theme, then include a file
				* called content-___.php (where ___ is the Post Type name) and that will be used instead.
				*/
				get_template_part( 'template-parts/content', get_post_type() );
		endwhile;
	else :
		get_template_part( 'template-parts/content', 'none' );
	endif;
	?>

<?php get_footer(); ?>
