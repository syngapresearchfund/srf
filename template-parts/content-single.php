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

$container_classes = srf_container_classes();
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( $container_classes ); ?>>
	<div class="single-header-wrapper">
		<div class="featured-image">
			<?php srf_post_thumbnail(); ?>
		</div>

		<header class="entry-header">
			<?php
				the_title( '<h1 class="entry-title">', '</h1>' );
				srf_posted_on();
			?>
		</header><!-- .entry-header -->

		<div class="entry-meta">
			<?php

			$tags_list = get_the_tag_list( '', ', ' );
			if ( $tags_list ) {
				echo '<div class="post-tags">';
				echo '<svg class="go-tag-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><rect x="0" fill="none" width="24" height="24"/><g><path d="M20 2.007h-7.087c-.53 0-1.04.21-1.414.586L2.592 11.5c-.78.78-.78 2.046 0 2.827l7.086 7.086c.78.78 2.046.78 2.827 0l8.906-8.906c.376-.374.587-.883.587-1.413V4.007c0-1.105-.895-2-2-2zM17.007 9c-1.105 0-2-.895-2-2s.895-2 2-2 2 .895 2 2-.895 2-2 2z"/></g></svg>';
				echo '<span class="tags-links">' . $tags_list . '</span>'; // phpcs:ignore -- XSS OK.
				echo '</div>';
			}
			?>
		</div><!-- .entry-meta -->
	</div>

	<div class="entry-content-wrapper">
		<?php srf_tldr(); ?>
		<div class="entry-content">
			<?php
			the_content( sprintf(
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
				) );

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:' ),
				'after'  => '</div>',
				) );
			?>
		</div>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php // srf_entry_footer(); ?>
		<!-- Add Related Posts here. -->
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
