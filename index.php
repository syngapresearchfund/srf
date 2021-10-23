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
?>

	<?php if ( have_posts() ) : ?>
		<div class="<?php echo esc_attr( srf_container_classes() ); ?>">
			<header class="entry-header relative mb-14">
				<!-- <h1 class="entry-title text-4xl lg:text-5xl text-center font-extrabold mb-14"><?php //echo esc_html( $posts_title ); ?></h1> -->
				<h1 class="entry-title text-center"><?php echo esc_html( $posts_title ); ?></h1>
				<div class="absolute inset-x-1/2 -bottom-6 w-1/4 lg:w-1/6 h-1 bg-gradient-to-r from-purple-400 via-green-400 to-blue-400 rounded transform -translate-x-1/2"></div>
			</header><!-- .entry-header -->

			<!-- <div class="max-w-4xl mx-auto space-y-16"> -->
			<div class="content">
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
