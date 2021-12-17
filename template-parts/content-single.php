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

<article id="post-<?php the_ID(); ?>" <?php post_class( 'pb-16' ); ?>>
	<header class="entry-header p-6 sm:p-0 sm:flex bg-srf-purple-500">
		<?php srf_post_thumbnail( 'hidden sm:block sm:w-1/3' ); ?>

		<div class="sm:px-10 sm:py-12 text-center sm:text-left text-white flex flex-col justify-center">
			<?php the_title( '<h1 class="entry-title mb-4 text-4xl lg:text-5xl font-extrabold">', '</h1>' ); ?>

			<div class="text-sm">
				<?php
				srf_posted_on();

				$tags_list = get_the_tag_list( '', ', ' );
				if ( $tags_list ) {
					echo '<div class="post-tags flex justify-items-start items-center">';
					echo '<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
					<path fill-rule="evenodd" d="M17.707 9.293a1 1 0 010 1.414l-7 7a1 1 0 01-1.414 0l-7-7A.997.997 0 012 10V5a3 3 0 013-3h5c.256 0 .512.098.707.293l7 7zM5 6a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd" />
				  </svg>';
					echo '<span class="tags-links">' . $tags_list . '</span>'; // phpcs:ignore -- XSS OK.
					echo '</div>';
				}
				?>
			</div>
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
