<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @since 2019-05-19 First docBlock
 * @package SRF
 */

namespace SRF;

get_header();
?>

	<?php
	while ( have_posts() ) :
		$current_post_type = get_post_type($post);
		the_post();

		get_template_part( 'template-parts/content', 'single-' . $current_post_type );

		// If comments are open or we have at least one comment, load up the comment template.
		if ( comments_open() || get_comments_number() ) :
			comments_template();
		endif;

	endwhile; // End of the loop.
	?>

<?php
get_footer();
