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
$current_term      = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
get_header();
?>

	<?php if ( have_posts() ) : ?>
		<div class="<?php echo esc_attr( $container_classes ); ?> text-center">
			<header class="entry-header max-w-3xl mx-auto mb-10">
				<h1 class="entry-title mb-4 text-4xl lg:text-5xl text-gray-600 font-extrabold"><?php echo esc_html( $current_term->name ); ?></h1>
				<div class="mx-auto w-2/3 h-1 bg-gradient-to-r from-blue-400 to-purple-400 rounded transform translate-y-2"></div>
			</header>
			
			<div class="prose lg:prose-xl mx-auto mb-8">
				<p>The founders cover SRF overhead, allowing donations to go toward research and programs to help SYNGAP1 patients.  This page is where all your donations go: we find labs where the PI has knowledge of SynGAP and/or key skills that will be essential for our quest for a therapy for our patients and we support those labs.</p>
			</div>

			<div class="max-w-6xl mx-auto mb-12 md:grid grid-cols-3 gap-4 text-base leading-relaxed text-gray-700">
				<p class="bg-white px-4 py-6 m-4 md:m-0">The Syngap Research Fund is eager to provide high-impact research grants to interested physicians and researchers worldwide to accelerate diagnosis and management of SynGAP1 syndrome.</p>
				<p class="bg-white px-4 py-6 m-4 md:m-0">Please complete <a class="underline" href="<?php echo esc_url( home_url( '/srf-grant-application/' ) ); ?>">SRF’s grant application</a> if you are interested in applying for funding to conduct SynGAP1 research.</p>
				<p class="bg-white px-4 py-6 m-4 md:m-0"><strong class="font-bold">Note:</strong> SRF has a Board-directed policy that does not allow for the payment of indirect costs to nonprofit institutions.</p>
			</div>

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
			<!-- TODO: This navigation is broken - subsequent pages return 404. -->
			<div class="max-w-6xl mx-auto mt-14 pt-10 text-center border-t-2 border-gray-200">
				<?php
					the_posts_navigation();
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
