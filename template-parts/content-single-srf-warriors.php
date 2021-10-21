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

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( srf_container_classes() ); ?>>
	<div class="single-header-wrapper">
		<header class="entry-header">
			<div class="entry-header-text">
				<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
			</div>

			<div class="featured-image">
				<?php srf_post_thumbnail( 'lg:max-w-xs rounded border border-gray-500' ); ?>
			</div>
		</header><!-- .entry-header -->
	</div>

	<div class="entry-content-wrapper">
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
