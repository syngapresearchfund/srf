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
?>

<div class="container mx-auto px-6 lg:px-0 py-16">
	<header class="entry-header relative">
		<h1 class="entry-title relative text-4xl lg:text-5xl text-gray-600 text-center font-extrabold mb-14">Team</h1>
	</header><!-- .entry-header -->
		<?php
		$args         = array(
			'posts_per_page' => 100, // phpcs:ignore -- pagination limit ok.
			'post_type'      => 'srf-team',
		);
		$events_query = new WP_Query( $args );

		if ( $events_query->have_posts() ) :
			?>
		<div class="max-w-6xl mx-auto grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-2">
			<?php
			/* Start the Loop */
			while ( $events_query->have_posts() ) :
				$events_query->the_post();

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
</div>
<?php
get_footer();
