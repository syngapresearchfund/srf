<?php
/**
 * The template file for Events listing page.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @since 2019-05-19 First docBlock
 * @package SRF
 */

namespace SRF;

use WP_Query;

get_header();

$upcoming_args         = array(
	'posts_per_page' => 500, // phpcs:ignore -- pagination limit ok.
	'post_type'      => 'srf-events',
	'post_status'    => array(
		'future',
		'publish',
	),
	'date_query'     => array(
		array(
			'year'  => gmdate( 'Y' ),
			'month' => gmdate( 'M' ),
			'day'   => gmdate( 'D' ),
		),
	),
);
$upcoming_events_query = new WP_Query( $upcoming_args );

$past_args         = array(
	'posts_per_page' => 500, // phpcs:ignore -- pagination limit ok.
	'post_type'      => 'srf-events',
	'post_status'    => array(
		'publish',
	),
	'date_query'     => array(
		array(
			'before' => gmdate( 'F j, Y' ),
		),
	),
);
$past_events_query = new WP_Query( $past_args );

?>

<div class="container mx-auto px-6 lg:px-0 py-16">
	<header class="entry-header max-w-3xl mx-auto mb-16 text-center">
		<h1 class="entry-title mb-4 text-4xl lg:text-5xl text-gray-600 font-extrabold">SRF Events</h1>
		<div class="mx-auto w-2/3 h-1 bg-gradient-to-r from-blue-400 to-purple-400 rounded transform translate-y-2"></div>
	</header>

	<section class="upcoming-events text-center mb-14">
		<h2 class="text-2xl lg:text-3xl text-gray-700 font-bold mb-10">Upcoming Events</h2>

		<?php
		if ( $upcoming_events_query->have_posts() ) :
			?>
		<div class="max-w-5xl mx-auto mb-10 text-gray-600 text-left">
			<?php
			/* Start the Loop */
			while ( $upcoming_events_query->have_posts() ) :
				$upcoming_events_query->the_post();

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
	</section>

	<section class="past-events text-center mb-14">
		<h2 class="text-2xl lg:text-3xl text-gray-700 font-bold mb-10">Past Events</h2>

		<?php
		if ( $past_events_query->have_posts() ) :
			?>
		<div class="max-w-5xl mx-auto mb-10 text-gray-600 text-left">
			<?php
			/* Start the Loop */
			while ( $past_events_query->have_posts() ) :
				$past_events_query->the_post();

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
	</section>
</div>
<?php
get_footer();
