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
	</section>
	
	<!-- ========================= -->
	<!-- upcoming events section -->
	<!-- ========================= -->
	<section class="py-32 bg-gradient-to-b from-gray-700 to-gray-800">
		<div class="container mx-auto px-10">
			<div class="mb-10 text-center space-y-4"><h2 class="text-4xl lg:text-6xl text-center text-gray-100">Upcoming events</h2><p class="text-2xl text-gray-100">Mark your calendars, don't miss out!</p></div>
			<!-- events grid -->
			<!-- NOTE: replace the items below with dynamic posts from a news post type -->
			<div class="lg:grid grid-cols-3 gap-1 space-y-8 lg:space-y-0">
				<div class="border border-gray-700 bg-gray-300 rounded text-gray-700">
					<h3 class="py-2 px-4 border-b border-gray-700 text-gray-900 font-bold text-lg">SRF | Grandparents Chat</h3>
					<div class="p-6 space-y-3 bg-white border-b border-gray-700">
						<h4 class="font-bold">When?</h4>
						<p>3rd Tuesday of every month - 5pm PT/ 8pm ET</p>
						<h4 class="font-bold">Details</h4>
						<p>Join us <a href="#" class="text-blue-500 hover:underline">on Zoom</a> for a casual chat to learn about each-other's journeys!</p>
					</div>
				</div>
				<div class="border border-gray-700 bg-gray-300 rounded text-gray-700">
					<h3 class="py-2 px-4 border-b border-gray-700 text-gray-900 font-bold text-lg">Interpretation of SYNGAP1 Variants</h3>
					<div class="p-6 space-y-3 bg-white border-b border-gray-700">
						<h4 class="font-bold">When?</h4>
						<p>Thurs., August 19th @ 10 am Pacific/1 pm Chile</p>
						<h4 class="font-bold">Details</h4>
						<p>Join us <a href="#" class="text-blue-500 hover:underline">on Zoom</a> for a casual chat to learn about each-other's journeys!</p>
					</div>
				</div>
				<div class="border border-gray-700 bg-gray-300 rounded text-gray-700">
					<h3 class="py-2 px-4 border-b border-gray-700 text-gray-900 font-bold text-lg">SRF | Grandparents Chat</h3>
					<div class="p-6 space-y-3 bg-white border-b border-gray-700">
						<h4 class="font-bold">When?</h4>
						<p>3rd Tuesday of every month - 5pm PT/ 8pm ET</p>
						<h4 class="font-bold">Details</h4>
						<p>Join us <a href="#" class="text-blue-500 hover:underline">on Zoom</a> for a casual chat to learn about each-other's journeys!</p>
					</div>
				</div>
			</div>
		</div>
	</section>


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
