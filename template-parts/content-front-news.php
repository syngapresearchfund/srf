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

<article id="post-<?php the_ID(); ?>" <?php post_class( ' col-span-2 border border-gray-700 rounded shadow-lg' ); ?>>
	<header class="entry-header p-4 flex items-center justify-between border-b border-gray-700">
		<?php the_title( '<h2 class="entry-title font-bold text-lg text-gray-700 line-clamp-1"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>

		<div class="flex space-x-2">
			<div class="w-3 h-3 rounded-full bg-red-500"></div>
			<div class="w-3 h-3 rounded-full bg-yellow-500"></div>
			<div class="w-3 h-3 rounded-full bg-green-500"></div>
		</div>
	</header><!-- .entry-header -->

	<div class="p-4 text-gray-700"><?php the_excerpt(); ?></div>
</article><!-- #post-<?php the_ID(); ?> -->
