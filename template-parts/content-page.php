<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @since 2019-05-19 First docBlock
 * @package SRF
 */

namespace SRF;

$srf_content_classes = ( is_page( 'shop' ) || is_page( 'calendar' ) ) ? 'max-w-5xl mx-auto mb-10' : 'mx-auto prose lg:prose-xl max-w-screen-md 2xl:max-w-screen-lg';
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'container mx-auto px-6 lg:px-0 py-16' ); ?>>
	<header class="entry-header max-w-3xl mx-auto mb-16 text-center">
		<?php the_title( '<h1 class="entry-title mb-4 text-4xl lg:text-5xl text-gray-600 font-extrabold">', '</h1>' ); ?>
		<div class="mx-auto w-2/3 h-1 bg-gradient-to-r from-blue-400 to-purple-400 rounded transform translate-y-2"></div>
	</header>

	<?php the_post_thumbnail( 'featured-image', array( 'class' => 'mx-auto mb-10') ); ?>

	<div class="entry-content <?php echo esc_attr( $srf_content_classes ); ?>">
		<?php
		the_content();

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:' ),
				'after'  => '</div>',
			)
		);
		?>
	</div><!-- .entry-content -->

	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer mt-8 mx-auto max-w-3xl pt-8 border-t border-gray-200">
			<?php
			edit_post_link(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Edit this page.<span class="screen-reader-text">%s</span>' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				),
				'<span class="edit-link hover:underline">',
				'</span>'
			);
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->
