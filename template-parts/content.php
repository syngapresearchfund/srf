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

<article id="post-<?php the_ID(); ?>" <?php post_class( 'col-span-2 border border-gray-700 rounded shadow-lg' ); ?>>
	<div class="text-gray-600">
		<?php srf_post_thumbnail( 'w-full h-52 object-cover block rounded-t' ); ?>
		<div class="p-6">
			<h4 class="font-semibold text-sm text-gray-600"><?php echo get_the_date( 'F j, Y' ); ?></h4>
			<?php the_title( '<h2 class="entry-title mb-2 font-bold text-lg text-gray-700"><a class="hover:underline" href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
			<?php the_excerpt(); ?>
		</div>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->
