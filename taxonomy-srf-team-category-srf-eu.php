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
$current_term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
get_header();
?>

	<?php if ( have_posts() ) : ?>
	<div class="<?php echo esc_attr( $container_classes ); ?> text-center">
		<header class="entry-header max-w-3xl mx-auto mb-16">
			<h1 class="entry-title mb-4 text-4xl lg:text-5xl text-gray-600 font-extrabold">STICHTING* SYNGAP RESEARCH
				FUND EUROPE</h1>
			<div
				class="mx-auto w-2/3 h-1 bg-gradient-to-r from-blue-400 to-purple-400 rounded transform translate-y-2"></div>
		</header>

		<div class="prose lg:prose-xl mx-auto mb-16">
			<h3>Mission:</h3>
			<p>Improve the lives for people living with SYNGAP1 syndrome through research and development of treatments,
				therapies and support systems in Europe.</p>

			<h3>Important Documents:</h3>
			<a href="https://drive.google.com/file/d/1HGfEdNhFDKLfW9sVI2pNMp-IOTb1X9kF/view?usp=sharing">Policy
				Paper</a>

			<h3>Contact us:</h3>
			<a href="info-eu@syngapresearchfund.com">‍info-eu@syngapresearchfund.org</a>
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
		<div class="max-w-6xl mx-auto mt-14 pt-10 text-center border-t-2 border-gray-200">
			<?php
				the_posts_navigation( array( 'prev_text' => 'Next Page', 'next_text' => 'Previous Page' ) );
			?>
		</div>

		<div class="prose lg:prose-xl mx-auto mb-16">
			<p>The board of SynGap Research Fund Europe does not receive any income for their roles. The founder covers
				all operational costs, allowing 100% of donations to go to research.</p>

			<p class="italic">*A stichting is a legal entity established under Dutch law, translating to “foundation” in
				English. A stichting is a self-contained legal entity with a separate legal personality, which has no
				members or shareholders and therefore, no recognized owner.</p>

			<img class="w-1/2 mx-auto" src="<?php echo get_template_directory_uri() . '/assets/images/SRF_EU.png' ?>"
				 alt="SRF Europe logo" />
			<img class="w-1/2 mx-auto p-1 bg-white"
				 src="<?php echo get_template_directory_uri() . '/assets/images/logo_eurordis_members_rvb.jpg' ?>"
				 alt="SRF Eurodis logo" />
		</div>
	</div>
<?php
else :

	get_template_part( 'template-parts/content', 'none' );

endif;
?>

	<?php
get_footer();
