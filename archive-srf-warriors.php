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
?>

	<?php if ( have_posts() ) : ?>
		<div class="<?php echo esc_attr( srf_container_classes() ); ?> text-center">
			<header class="entry-header max-w-3xl mx-auto mb-16">
				<h1 class="entry-title mb-4 text-4xl lg:text-5xl text-gray-600 font-extrabold"><?php echo post_type_archive_title( '', false ); ?></h1>
				<div class="mx-auto w-2/3 h-1 bg-gradient-to-r from-blue-400 to-purple-400 rounded transform translate-y-2"></div>
			</header>

			<div class="max-w-6xl mx-auto grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-2">
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
			<?php
				the_posts_pagination(
					array(
						'mid_size'  => 2,
						'prev_text' => sprintf(
							'<span class="nav-prev-text">%s</span>',
							__( 'Newer posts', 'srf' )
						),
						'next_text' => sprintf(
							'<span class="nav-next-text">%s</span>',
							__( 'Older posts', 'srf' ),
						),
					)
				);

			?>
		</div> <!-- .post-grid -->

		<?php
	else :

		get_template_part( 'template-parts/content', 'none' );

	endif;
	?>

<?php
get_footer();
