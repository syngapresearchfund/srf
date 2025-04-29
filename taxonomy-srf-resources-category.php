<?php
/**
 * The template for displaying the Webinars taxonomy term archive.
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

$container_classes = srf_container_classes();
$term = get_queried_object();
$term_slug = $term->slug;
$current_term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
// Get term meta if it exists
$intro_text = get_field('resources_introduction_text', $term);
$before_content_grid = get_field('resources_before_content_grid', $term);

get_header();
?>

	<?php if ( have_posts() ) : ?>
		<div class="<?php echo esc_attr( $container_classes ); ?> text-center">
			<header class="entry-header max-w-3xl mx-auto mb-16">
				<h1 class="entry-title mb-4 text-4xl lg:text-5xl text-gray-600 font-extrabold"><?php echo esc_html( $current_term->name ); ?></h1>
				<div class="mx-auto w-2/3 h-1 bg-gradient-to-r from-blue-400 to-purple-400 rounded transform translate-y-2"></div>
			</header>

			<?php if (!empty($intro_text)) : ?>
			<div class="prose lg:prose-xl mx-auto mb-10 text-center">
                <?php echo wp_kses_post($intro_text); ?>
            </div>
			<?php endif; ?>

			<?php if (!empty($before_content_grid)) : ?>
				<div class="max-w-6xl mx-auto mb-12 md:grid grid-cols-3 gap-4 text-base leading-relaxed text-center text-gray-700">
					<?php echo wp_kses_post($before_content_grid); ?>
				</div>
			<?php endif; ?>

			<div class="max-w-6xl mx-auto lg:grid grid-cols-6 gap-8 space-y-8 lg:space-y-0 mb-10 text-left">
				<?php
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
				?>
			</div>
			<div class="max-w-6xl mx-auto mt-14 pt-10 text-center border-t-2 border-gray-200">
				<?php
					the_posts_navigation( array( 'prev_text' => 'Next Page', 'next_text' => 'Previous Page' ) );
				?>
			</div>
		</div>
		<?php
	else :

		get_template_part( 'template-parts/content', 'none' );

	endif;
	?>

<?php
get_footer();
