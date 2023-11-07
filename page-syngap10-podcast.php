<?php
/**
 * The template for displaying all pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @since 2019-05-19 First docBlock
 * @package SRF
 */

namespace SRF;

get_header();
?>

<?php
	while ( have_posts() ) :
		the_post();
		?>

		<article id="post-<?php the_ID(); ?>" <?php post_class( 'container mx-auto px-6 lg:px-0 py-16' ); ?>>
			<header class="entry-header max-w-3xl mx-auto mb-16 text-center">
				<?php the_title( '<h1 class="entry-title mb-4 text-4xl lg:text-5xl text-gray-600 font-extrabold">', '</h1>' ); ?>
				<div class="mx-auto w-2/3 h-1 bg-gradient-to-r from-blue-400 to-purple-400 rounded transform translate-y-2"></div>
			</header>

			<h2 class="mb-10 text-2xl lg:text-3xl font-extrabold text-gray-600 text-center">SynGAP10 weekly 10 minute updates on SYNGAP1 with <a class="underline" href="https://curesyngap1.org/team/board-members/mike-graglia/">Mike</a>.</h2>

			<?php srf_post_thumbnail(); ?>

			<iframe title="SynGAP10 video update with Mike Graglia: Weekly 10 minutes on #SYNGAP1 from the #SynGAP Research Fund 501(c)(3)" allowtransparency="true" height="480" width="100%" style="border: none; min-width: min(100%, 430px);" scrolling="no" data-name="pb-iframe-player" src="https://www.podbean.com/player-v2/?i=bpx6c-aae915-pbblog-playlist&share=1&download=1&rtl=0&fonts=Georgia&skin=1&order=episodic&limit=10&filter=all&ss=a713390a017602015775e868a2cf26b0&btn-skin=11&size=480" allowfullscreen=""></iframe>

			<div class="entry-content mx-auto prose lg:prose-xl max-w-screen-md 2xl:max-w-screen-lg">
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

		<?php
		// If comments are open or we have at least one comment, load up the comment template.
		if ( comments_open() || get_comments_number() ) :
			comments_template();
		endif;

	endwhile; // End of the loop.
	?>

<?php
get_footer();
