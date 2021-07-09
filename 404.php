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

<div class="error-404-header-wrapper">
	<header class="error-404-header no-widows">
		<h1 class="error-404-title">
			<?php esc_html_e( 'Oops! That page can’t be found.' ); ?>
		</h1>
	</header><!-- .page-header -->
</div>

<div class="page-content error-404 not-found">
	<p class="no-widows"><?php esc_html_e( 'It looks like nothing was found at this location. Perhaps searching will help:' ); ?></p>
	<?php get_search_form(); ?>
</div><!-- .page-content -->

<?php
get_footer();
