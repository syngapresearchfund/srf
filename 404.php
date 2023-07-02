<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @since 2019-05-19 First docBlock
 * @package SRF
 */

namespace SRF;

get_header();
?>


<div class="container mx-auto px-6 lg:px-0 py-16">
	<header class="entry-header max-w-3xl mx-auto mb-16 text-center">
		<h1 class="entry-title mb-4 text-4xl lg:text-5xl text-gray-600 font-extrabold"><?php esc_html_e( 'Oops! That page can’t be found.' ); ?></h1>
		<div class="mx-auto w-2/3 h-1 bg-gradient-to-r from-blue-400 to-purple-400 rounded transform translate-y-2"></div>
	</header>

	<div class="text-center">
		<p class="mb-4 text-lg"><?php esc_html_e( 'It looks like nothing was found at this location. Perhaps searching will help:' ); ?></p>
		<div class="w-96 mx-auto">
			<?php get_search_form(); ?>
		</div>
	</div>
</div>

<?php
get_footer();
