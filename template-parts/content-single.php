<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @since 2019-05-19 First docBlock
 * @package SRF
 */

namespace SRF;

// TODO: Adjust the featured image to be based on an aspect ratio size.
// $thumbnail_classes = 'w-2/3 sm:w-1/3 max-h-80 object-cover sm:float-left sm:mr-10';
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'py-16' ); ?>>
	<header class="entry-header max-w-3xl mx-auto mb-16 text-center">
		<?php the_title( '<h1 class="entry-title mb-4 text-4xl lg:text-5xl text-gray-600 font-extrabold">', '</h1>' ); ?>
		<div class="mx-auto w-2/3 h-1 bg-gradient-to-r from-blue-400 to-purple-400 rounded transform translate-y-2"></div>
		<?php srf_post_meta(); ?>
	</header>

	<div class="entry-content mx-auto prose lg:prose-xl max-w-screen-md 2xl:max-w-screen-lg px-6 lg:px-0">
		<?php
		srf_single_featured_image();
		the_content(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			)
		);

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:' ),
				'after'  => '</div>',
			)
		);
		?>
		<p class="clear-both"></p>
	</div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->
