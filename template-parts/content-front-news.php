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

$col_span = ' col-span-2';

// if ( isset( $args['post_count'] ) && ( 1 === $args['post_count'] || 2 === $args['post_count'] ) ) {
// if ( isset( $args['post_count'] ) && ( 1 === $args['post_count'] ) ) {
	// $col_span = ' col-span-3';
	// $col_span = ' col-span-6';
// }

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( $col_span . ' border border-gray-700 rounded shadow-lg' ); ?>>
	<header class="entry-header p-4 flex items-center justify-between border-b border-gray-700">
		<div class="flex space-x-2 mr-10">
			<div class="w-3 h-3 rounded-full bg-srf-blue-500"></div>
			<div class="w-3 h-3 rounded-full bg-srf-purple-500"></div>
			<div class="w-3 h-3 rounded-full bg-srf-green-500"></div>
		</div>
		<h3 class="font-semibold text-sm text-gray-600"><?php echo get_the_date( 'F j, Y' ); ?></h3>
	</header><!-- .entry-header -->

	<div class="text-gray-600">
		<?php srf_post_thumbnail( 'w-full h-52 object-cover block' ); ?>
		<div class="p-6">
			<?php the_title( '<h2 class="entry-title mb-2 font-bold text-lg text-gray-700"><a class="hover:underline" href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
			<?php the_excerpt(); ?>
		</div>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->
