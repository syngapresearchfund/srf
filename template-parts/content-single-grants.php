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
		<div
			class="mx-auto w-2/3 h-1 bg-gradient-to-r from-blue-400 to-purple-400 rounded transform translate-y-2"></div>
		<?php srf_post_meta(); ?>
	</header>

	<div class="entry-content mx-auto prose lg:prose-xl max-w-screen-md 2xl:max-w-screen-lg px-6 lg:px-0">
		<?php srf_single_featured_image(); ?>

		<ul class="grant-details">
			<?php if ( get_field( 'principal_investigator' ) ) : ?>
				<li><strong class="font-bold">Principal
						Investigator:</strong> <?php echo esc_html( get_field( 'principal_investigator' ) ); ?></li>
			<?php endif; ?>
			<?php if ( get_field( 'institution' ) ) : ?>
				<li><strong
						class="font-bold">Institution:</strong> <?php echo esc_html( get_field( 'institution' ) ); ?>
				</li>
			<?php endif; ?>
			<li><strong class="font-bold">Grant
					Number:</strong> <?php echo esc_html( get_field( 'grant_number' ) ); ?>
			</li>
			<li><strong class="font-bold">Funding
					Amount:</strong> <?php echo esc_html( get_field( 'funding_amount' ) ); ?></li>
			<li><strong class="font-bold">Percentage
					Dispersed:</strong> <?php echo esc_html( get_field( 'percentage_dispersed' ) ); ?></li>
			<li><strong class="font-bold">Grant
					Status:</strong> <?php echo esc_html( get_field( 'grant_status' ) ); ?>
			</li>
		</ul>

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
		<p class="clear-both"></p> <!--This is to clear the floating featured image, if present.-->
	</div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->
