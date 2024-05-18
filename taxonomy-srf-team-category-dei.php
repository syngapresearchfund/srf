<?php
/**
 * The template for displaying all pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @since 2019-05-19 First docBlock
 * @package SRF
 */

namespace SRF;

$term = get_queried_object();
//$taxonomy = $term->taxonomy;
//$term_id = $term->term_id;
//$GLOBALS['wp_embed']->post_ID = $taxonomy . '_' . $term_id;

$container_classes = srf_container_classes();

get_header();
?>

	<?php if ( have_posts() ) : ?>
	<div class="<?php echo esc_attr( $container_classes ); ?>">
		<header class="entry-header max-w-3xl mx-auto mb-16 text-center">
			<h1 class="entry-title mb-4 text-4xl lg:text-5xl text-gray-600 font-extrabold">Diversity, Equity, and
				Inclusion Board</h1>
			<div
				class="mx-auto w-2/3 h-1 bg-gradient-to-r from-blue-400 to-purple-400 rounded transform translate-y-2"></div>
		</header>

		<!-- Opening Details -->
		<div class="prose lg:prose-xl mx-auto mb-10 max-w-screen-md 2xl:max-w-screen-lg px-6 lg:px-0">
			<?php echo wp_kses_post( get_field( 'dei_intro_text', $term ) ); ?>
		</div>

		<!-- DEI Board Members -->
		<div class="max-w-6xl mx-auto grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-2 text-center">
			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/*
				* Include the Post-Type-specific template for the content.
				* If you want to override this in a child theme, then include a file
				* called content-___.php (where ___ is the Post Type name) and that will be used instead.
				*/
				get_template_part( 'template-parts/content', 'grid-items' );

			endwhile;
			?>
		</div>

		<div class="entry-content mx-auto mt-14 prose lg:prose-xl max-w-screen-md 2xl:max-w-screen-lg">
			<!-- After team CTAs -->
			<?php echo wp_kses_post( get_field( 'dei_ctas', $term ) ); ?>
		</div><!-- .entry-content -->
	</div><!-- #post-<?php the_ID(); ?> -->

<?php
else :

	get_template_part( 'template-parts/content', 'none' );

endif;
?>

	<?php
get_footer();
