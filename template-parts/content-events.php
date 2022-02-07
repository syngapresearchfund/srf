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

<article id="post-<?php the_ID(); ?>" <?php post_class( 'm-3 bg-gray-200 even:bg-opacity-50 xs:flex justify-between items-center' ); ?>>
	<?php srf_post_thumbnail( 'block w-full h-48 xs:w-40 xs:h-28 mx-auto xs:mx-0 xs:mr-6 object-cover' ); ?>
	<?php the_title( '<h2 class="entry-title w-full xs:w-4/6 mr-6 p-3 xs:p-0 text-2xl font-bold text-center xs:text-left xs:line-clamp-2 md:line-clamp-none"><a class="hover:underline" href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
	<h3 class="hidden sm:block mr-6 text-sm text-right font-normal"><?php echo get_the_date( 'F j, Y' ); ?></h3>
</article>
