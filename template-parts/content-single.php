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
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'pb-16' ); ?>>
	<header class="entry-header sm:flex sm:h-80 <?php echo esc_attr( $bg_header_color ); ?>">
		<?php srf_post_thumbnail( 'w-full sm:w-1/3 max-h-80 object-cover' ); ?>

		<div class="p-6 sm:px-10 sm:py-12 text-center sm:text-left text-white flex flex-col justify-center">
			<?php
				the_title( '<h1 class="entry-title mb-4 text-4xl lg:text-5xl font-extrabold">', '</h1>' );
				srf_post_meta();
			?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<div class="entry-content-wrapper container mx-auto prose lg:prose-xl px-6 lg:px-0 pt-8 pb-16">
		<div class="entry-content">
			<?php
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
		</div>
	</div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->
