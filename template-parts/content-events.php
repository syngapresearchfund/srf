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
$thumbnail_size = $args['current_item'] > 0 ? '' : 'xl:h-64 xl:w-72';
$title_size     = $args['current_item'] > 0 ? '' : 'xl:text-3xl';
$date_size      = $args['current_item'] > 0 ? '' : 'xl:text-base';
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'shadow-lg bg-gray-300 bg-opacity-50 xs:flex items-center ' . $col_span ); ?>>
	<?php srf_post_thumbnail( 'block w-full h-48 xs:w-56 mx-auto xs:mx-0 xs:mr-6 object-cover ' . $thumbnail_size ); ?>
	<?php the_title( '<h2 class="entry-title w-full xs:w-4/6 mr-6 p-3 xs:p-0 text-2xl font-bold text-center xs:text-left xs:line-clamp-2 md:line-clamp-3 ' . $title_size . '"><a class="hover:underline" href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
	<?php if ( has_excerpt() ) : ?>
		<h3 class="hidden sm:block mr-6 text-sm text-right font-normal <?php echo esc_attr( $date_size ); ?>"><?php the_excerpt(); ?></h3>
	<?php endif; ?>
</article>
