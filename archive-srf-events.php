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
		<div class="container mx-auto px-6 lg:px-0 py-16">
			<header class="entry-header relative">
				<h1 class="entry-title relative text-4xl lg:text-5xl text-gray-600 text-center font-extrabold mb-14"><?php echo post_type_archive_title( '', false ); ?></h1>
			</header><!-- .entry-header -->

			<div class="max-w-5xl mx-auto mb-10 text-gray-600 text-left">
				<?php
				/* Start the Loop */
				while ( have_posts() ) :
					the_post();

					/*
					* Include the Post-Type-specific template for the content.
					* If you want to override this in a child theme, then include a file
					* called content-___.php (where ___ is the Post Type name) and that will be used instead.
					*/
					get_template_part( 'template-parts/content', 'events' );

				endwhile;
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
