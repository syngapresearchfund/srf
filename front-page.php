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
	<section class="bg-gradient-to-br from-srf-blue-500 via-srf-purple-500 to-srf-green-500">
		<div class="container mx-auto px-6 lg:px-0 py-24 lg:py-36 text-center text-white">
			<h1 class="mb-6 text-4xl lg:text-5xl font-extrabold">
				Collaboration. Transparency. Urgency.
			</h1>
			<p class="lg:w-1/2 lg:mx-auto mb-8 text-lg">SynGAP Research Fund (SRF) is a global group of families committed to accelerating the science to cure SynGAP & to supporting each other.</p>
			<a href="https://syngapresearchfund.org" class="font-sans inline-block py-3 px-12 rounded  hover:bg-white text-white hover:text-srf-purple-500 border border-white font-bold text-lg tracking-wide transition duration-500">Learn about SYNGAP1</a>
		</div>
	</section>	

	<!-- ========================= -->
	<!-- News section -->
	<!-- ========================= -->
	<section class="bg-gray-100">
		<div class="container mx-auto px-6 lg:px-0 py-24 text-center">
			<h2 class="mb-10 text-3xl lg:text-4xl font-extrabold text-gray-600">Latest News & Updates</h2>

			<?php
			$args       = array( 'posts_per_page' => 6 ); // phpcs:ignore -- pagination limit ok.
			$news_query = new WP_Query( $args );

			if ( $news_query->have_posts() ) :
				?>
			<!-- <div class="max-w-6xl mx-auto grid grid-cols-2 lg:grid-cols-4 gap-8 mb-10"> -->
			<div class="max-w-6xl mx-auto lg:grid grid-cols-6 gap-8 space-y-8 lg:space-y-0 mb-10 text-left">
				<?php
				/* Start the Loop */
				while ( $news_query->have_posts() ) :
					$news_query->the_post();

					/*
					* Include the Post-Type-specific template for the content.
					* If you want to override this in a child theme, then include a file
					* called content-___.php (where ___ is the Post Type name) and that will be used instead.
					*/
					get_template_part( 'template-parts/content', get_post_type() );

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
			<a href="<?php echo esc_url( home_url( '/news/' ) ); ?>" class="font-sans inline-flex bg-srf-blue-500 hover:bg-srf-blue-600 rounded py-3 px-8 text-white transition duration-500 font-bold">View all News articles <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" /></svg></a>
		</div>
	</section>		<!-- header + hero bg wrapper -->

	<!-- ========================= -->
	<!-- Warriors section -->
	<!-- ========================= -->
	<section class="bg-white">
		<div class="container mx-auto px-6 lg:px-0 py-24 text-center">
			<h2 class="mb-10 text-3xl lg:text-4xl text-gray-700 font-extrabold">Meet Our Warriors</h2>

			<?php
			$args       = array(
				'posts_per_page' => 8,
				'post_type'      => 'srf-warriors',
			);
			$news_query = new WP_Query( $args );


			if ( $news_query->have_posts() ) :
				?>
			<div class="max-w-6xl mx-auto grid grid-cols-2 lg:grid-cols-4 gap-2 mb-10">
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
			<a href="<?php echo esc_url( home_url( '/warriors/' ) ); ?>" class="font-sans inline-flex border border-gray-700 hover:border-transparent hover:bg-srf-blue-500 rounded py-3 px-8 text-gray-700 hover:text-white transition duration-500 font-bold">View all Warriors <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" /></svg></a>
		</div>
	</section>		<!-- header + hero bg wrapper -->

	<!-- ========================= -->
	<!-- Events section -->
	<!-- ========================= -->
	<section class="relative py-32 bg-gray-100">
		<div class="container mx-auto px-10 text-center">
			<h2 class="mb-10 mx-auto font-extrabold text-center text-3xl lg:text-4xl text-gray-600">Upcoming Events</h2>

			<?php
			$args         = array(
				'posts_per_page' => 8,
				'post_type'      => 'srf-events',
			);
			$events_query = new WP_Query( $args );

			if ( $events_query->have_posts() ) :
				?>
			<div class="max-w-5xl mx-auto mb-10 text-gray-600 text-left">
				<?php
				/* Start the Loop */
				while ( $events_query->have_posts() ) :
					$events_query->the_post();

					/*
					* Include the Post-Type-specific template for the content.
					* If you want to override this in a child theme, then include a file
					* called content-___.php (where ___ is the Post Type name) and that will be used instead.
					*/
					get_template_part( 'template-parts/content', 'events' );

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
			<a href="<?php echo esc_url( home_url( '/events/' ) ); ?>" class="font-sans inline-flex bg-srf-blue-500 hover:bg-srf-blue-600 rounded py-3 px-8 text-white transition duration-500 font-bold">View all Events <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" /></svg></a>
		</div>
	</section>

<?php get_footer(); ?>
