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

$bg_header_color = 'bg-srf-purple-500';

if ( 'post' === get_post_type() ) {
	$bg_header_color = 'bg-srf-blue-500';
} elseif ( 'srf-events' === get_post_type() ) {
	$bg_header_color = 'bg-srf-green-500';
}

/**
 * This logic is only needed because of the current thumbnail sizes. Once we get a good consistent size down, we can remove the max-w rule.
 *
 * TODO: Adjust the featured image to be based on an aspect ratio size.
 */
$thumbnail_classes = 'srf-events' === get_post_type() ? 'w-full sm:w-1/3 sm:max-w-xl max-h-80 object-cover' : 'w-2/3 sm:w-1/3 max-h-80 object-cover sm:float-left sm:mr-10';
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'py-16' ); ?>>
	<header class="entry-header max-w-3xl mx-auto mb-16 text-center">
		<?php the_title( '<h1 class="entry-title mb-4 text-4xl lg:text-5xl text-gray-600 font-extrabold">', '</h1>' ); ?>
		<div class="mx-auto w-2/3 h-1 bg-gradient-to-r from-blue-400 to-purple-400 rounded transform translate-y-2"></div>
		<?php srf_post_meta(); ?>
	</header>

	<div class="entry-content mx-auto prose lg:prose-xl max-w-screen-md 2xl:max-w-screen-lg px-6 lg:px-0">
		<?php
		if ( 'post' !== get_post_type() && 'product' !== get_post_type() ) {
			srf_post_thumbnail( $thumbnail_classes );
		}
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
	</div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->
