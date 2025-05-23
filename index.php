<?php
/**
 * The main template file
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

get_header();

$posts_title = get_the_title( get_option( 'page_for_posts', true ) );
$archive_subheading = is_category() ? "Category: " : "Tag: ";
?>

	<?php if ( have_posts() ) : ?>
		<div class="<?php echo esc_attr( srf_container_classes() ); ?>">
			<header class="entry-header max-w-3xl mx-auto mb-16 text-center">
				<h1 class="entry-title mb-4 text-4xl lg:text-5xl text-gray-600 font-extrabold"><?php echo esc_html( $posts_title ); ?></h1>
				<div class="mx-auto mb-6 w-2/3 h-1 bg-gradient-to-r from-blue-400 to-purple-400 rounded transform translate-y-2"></div>
				<?php
					if ( is_category() || is_tag() ) { 
						the_archive_title( '<h4 class="archive-title text-xl lg:text-2xl text-gray-700 font-bold italic">' . $archive_subheading, '</h4>' );
					}
				?>
			</header>

			<?php if ( is_home() || is_category() || is_tag() ) : ?>
				<div class="max-w-6xl mx-auto mb-10 flex justify-between flex-wrap text-lg text-gray-600">
					<div>
						<h4 class="mb-2 font-semibold text-sm text-gray-900">Filter by Category:</h4>
						<?php 
							$cat_args = array(
								'taxonomy'        => 'category',
								'show_option_all' => 'All',
								'name'            => 'cat',
								'orderby'        => 'name',
								'class'           => 'blog-filter',
								'hide_if_empty'   => true,
							);
							wp_dropdown_categories( $cat_args );
						?>
					</div>

					<div>
						<h4 class="mb-2 font-semibold text-sm text-gray-900">Filter by Tag:</h4>
						<?php
							$current_category = get_queried_object();
							$tag_args = array(
								'taxonomy'        => 'post_tag',
								'show_option_all' => 'All',
								'value_field'     => 'slug',
								'name'            => 'tag',
								'orderby'        => 'name',
								'class'           => 'blog-filter',
								'hide_if_empty'   => true,
								'selected'        => $current_category->slug,
							);
							wp_dropdown_categories( $tag_args );
						?>
					</div>
				</div>
			<?php endif; ?>
			<!-- <div class="max-w-4xl mx-auto space-y-16"> -->
			<div id="post-list" class="max-w-6xl mx-auto lg:grid grid-cols-6 gap-8 space-y-8 lg:space-y-0 mb-10 text-left">
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
		</div> <!-- .post-grid -->

		<?php
	else :

		get_template_part( 'template-parts/content', 'none' );

	endif;
	?>

<?php
get_footer();
