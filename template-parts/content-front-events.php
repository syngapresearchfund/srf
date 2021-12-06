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

<article id="post-<?php the_ID(); ?>" <?php post_class( 'p-6 bg-gray-200 even:bg-opacity-50 flex justify-between items-center first:rounded-t-lg last:rounded-b-lg' ); ?>>
	<?php the_title( '<h2 class="entry-title w-full sm:w-4/6 text-2xl font-bold text-center sm:text-left"><a class="hover:underline" href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
	<h3 class="hidden sm:block text-sm text-right font-normal"><?php echo get_the_date( 'F j, Y' ); ?></h3>
</article>
