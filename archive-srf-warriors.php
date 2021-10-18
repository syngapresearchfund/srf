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

$container_classes = srf_container_classes();
get_header();
?>

	<?php if ( have_posts() ) : ?>
		<div class="<?php echo esc_attr( $container_classes ); ?>">
			<header class="entry-header relative">
				<h1 class="entry-title relative text-4xl lg:text-5xl text-center font-extrabold mb-14"><?php echo post_type_archive_title( '', false ); ?></h1>
				<div class="absolute inset-x-1/2 -bottom-6 w-1/4 lg:w-1/6 h-0.5 bg-gradient-to-r from-purple-400 via-green-400 to-blue-400 rounded transform -translate-x-1/2"></div>
			</header><!-- .entry-header -->

			<div class="max-w-6xl mx-auto grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
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
		</div> <!-- .post-grid -->

	<?php
	else :

		get_template_part( 'template-parts/content', 'none' );

	endif;
	?>

<?php
get_footer();
