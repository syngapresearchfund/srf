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

$col_span       = $args['current_item'] > 0 ? 'col-span-3' : 'col-span-full';
$thumbnail_size = $args['current_item'] > 0 ? '' : 'xl:h-80 xl:w-96 xl:px-6 xl:object-contain bg-gray-300';
$title_size     = $args['current_item'] > 0 ? '' : 'xl:text-3xl';
$date_size      = $args['current_item'] > 0 ? '' : 'xl:text-base';
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'shadow-lg bg-gray-300 bg-opacity-50 xs:flex items-center ' . $col_span ); ?>>
	<?php srf_post_thumbnail( 'block w-full h-48 xs:w-56 mx-auto border-8 border-gray-300 object-cover ' . $thumbnail_size ); ?>
	<div class="w-full xs:w-4/6 px-6 text-center xs:text-left">
		<?php echo $args['current_item'] === 0 ? '<h4 class="mb-2 font-extrabold uppercase"><span class="text-transparent bg-clip-text bg-gradient-to-r from-srf-purple-500 to-srf-blue-500">Featured</span><span class="text-transparent bg-clip-text bg-gradient-to-r from-srf-blue-500 via-srf-green-600 to-srf-green-500"> Event</span></h4>' : ''; ?>
		<?php the_title( '<h2 class="entry-title text-2xl font-bold xs:line-clamp-2 md:line-clamp-3 ' . $title_size . '"><a class="hover:underline" href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
	</div>
	<?php if ( has_excerpt() ) : ?>
		<h3 class="hidden sm:block pr-6 text-sm text-right font-normal <?php echo esc_attr( $date_size ); ?>"><?php the_excerpt(); ?></h3>
	<?php endif; ?>
</article>
