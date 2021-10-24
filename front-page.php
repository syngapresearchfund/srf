<?php
/**
 * Front page template.
 *
 * @since 2019-05-19 First docBlock
 * @package SRF
 */

namespace SRF;

use WP_Query;

get_header();
?>
	<!-- ========================= -->
	<!-- hero section -->
	<!-- ========================= -->
	<section class="bg-white">
		<div class="container mx-auto px-6 lg:px-0 py-24 text-center">
			<!-- heading -->
			<h1 class="mb-6 text-4xl lg:text-5xl font-extrabold">
				<span class="text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-blue-500">Collaboration.</span>
				<span class="block md:inline text-transparent bg-clip-text bg-gradient-to-r from-blue-500 to-purple-500">Transparency.</span>
				<span class="block md:inline text-transparent bg-clip-text bg-gradient-to-r from-purple-500 to-purple-600">Urgency.</span>
			</h1>
			<!-- paragraphs -->
			<p class="lg:w-1/2 lg:mx-auto mb-8 text-lg text-gray-500">SynGAP Research Fund (SRF) is a global group of families committed to accelerating the science to cure SynGAP & to supporting each other.</p>

			<!-- big button / cta -->
			<a href="https://syngapresearchfund.org" class="inline-block py-3 px-12 rounded shadow-lg hover:shadow-2xl bg-gradient-to-br from-blue-500 to-blue-700 hover:to-blue-600 text-blue-100 hover:text-white font-bold text-lg tracking-wide transition duration-500">Learn about SYNGAP1</a>
		</div>
	</section>		<!-- header + hero bg wrapper -->

	<!-- ========================= -->
	<!-- News section -->
	<!-- ========================= -->
	<section class="bg-gray-200">
		<div class="container mx-auto px-6 lg:px-0 py-24 text-center">
			<h2 class="mb-10 text-3xl lg:text-4xl font-extrabold text-gray-600">Latest News & Updates</h2>

			<?php
			$args       = array( 'posts_per_page' => 4 );
			$news_query = new WP_Query( $args );


			if ( $news_query->have_posts() ) :
				?>
			<!-- <div class="max-w-6xl mx-auto grid grid-cols-2 lg:grid-cols-4 gap-8 mb-10"> -->
			<div class="lg:grid grid-cols-6 gap-8 space-y-8 lg:space-y-0 mb-10 text-left">
				<?php
				/* Start the Loop */
				while ( $news_query->have_posts() ) :
					$news_query->the_post();

					/*
					* Include the Post-Type-specific template for the content.
					* If you want to override this in a child theme, then include a file
					* called content-___.php (where ___ is the Post Type name) and that will be used instead.
					*/
					get_template_part( 'template-parts/content', 'front-news' );

				endwhile;
				?>
			</div>

				<?php
			else :

				get_template_part( 'template-parts/content', 'none' );

			endif;

			/* Restore original Post Data */
			wp_reset_postdata();
			?>

			<!-- big button / cta -->
			<a href="<?php echo esc_url( site_url( '/news/' ) ); ?>" class="inline-block border border-gray-600 hover:bg-gray-600 rounded py-3 px-8 text-gray-600 hover:text-gray-100 transition duration-500 font-bold">View all News articles →</a>
		</div>
	</section>		<!-- header + hero bg wrapper -->

	<!-- ========================= -->
	<!-- Warriors section -->
	<!-- ========================= -->
	<section class="bg-gray-300">
		<div class="container mx-auto px-6 lg:px-0 py-24 text-center">
			<h2 class="mb-10 text-3xl lg:text-4xl text-gray-700 font-extrabold">Meet Our Warriors</h2>

			<?php
			$args       = array(
				'posts_per_page' => 4,
				'post_type'      => 'srf-warriors',
			);
			$news_query = new WP_Query( $args );


			if ( $news_query->have_posts() ) :
				?>
			<div class="max-w-6xl mx-auto grid grid-cols-2 lg:grid-cols-4 gap-8 mb-10">
				<?php
				/* Start the Loop */
				while ( $news_query->have_posts() ) :
					$news_query->the_post();

					/*
					* Include the Post-Type-specific template for the content.
					* If you want to override this in a child theme, then include a file
					* called content-___.php (where ___ is the Post Type name) and that will be used instead.
					*/
					get_template_part( 'template-parts/content', 'grid-items' );

				endwhile;
				?>
			</div>

				<?php
			else :

				get_template_part( 'template-parts/content', 'none' );

			endif;

			/* Restore original Post Data */
			wp_reset_postdata();
			?>

			<!-- big button / cta -->
			<a href="<?php echo esc_url( site_url( '/warriors/' ) ); ?>" class="inline-block border border-gray-700 hover:bg-gray-700 rounded py-3 px-8 text-gray-700 hover:text-gray-100 transition duration-500 font-bold">View all Warriors →</a>
		</div>
	</section>		<!-- header + hero bg wrapper -->



<?php get_footer(); ?>
