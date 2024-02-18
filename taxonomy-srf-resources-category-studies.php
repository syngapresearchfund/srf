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
$current_term      = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
get_header();
?>

<div class="<?php echo esc_attr( $container_classes ); ?> text-center">
	<header class="entry-header max-w-3xl mx-auto mb-16">
		<h1 class="entry-title mb-4 text-4xl lg:text-5xl text-gray-600 font-extrabold"><?php esc_html_e( 'Webinars', 'srf' ); ?></h1>
		<div class="mx-auto w-2/3 h-1 bg-gradient-to-r from-blue-400 to-purple-400 rounded transform translate-y-2"></div>
	</header>

	<div class="max-w-6xl mx-auto lg:grid grid-cols-6 gap-8 space-y-8 lg:space-y-0 mb-10 text-left">
		<?php
		/* Start the Loop */
		if ( have_posts() ) :
			while ( have_posts() ) :
				the_post();

				/*
				* Include the Post-Type-specific template for the content.
				* If you want to override this in a child theme, then include a file
				* called content-___.php (where ___ is the Post Type name) and that will be used instead.
				*/
				get_template_part( 'template-parts/content', get_post_type() );

			endwhile;
		else : ?>
			<p class="text-2xl text-center italic">No <?php echo esc_html( $current_term->name ); ?> have been uploaded yet. Please check back later!</p>
		<?php endif; ?>

	</div>
	<div class="max-w-6xl mx-auto mt-14 pt-10 text-center border-t-2 border-gray-200">
		<?php
			the_posts_navigation( array( 'prev_text' => 'Next Page', 'next_text' => 'Previous Page' ) );
		?>
	</div>
</div>

<?php
get_footer();
