<?php
/**
 * Template part for displaying events and webinars on the home page grid.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @since 2019-05-19 First docBlock
 * @package SRF
 */

namespace SRF;

$event_date     = get_post_meta( get_the_ID(), 'event_date', true );
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'shadow-lg bg-gray-300 bg-opacity-50 xs:flex items-center col-span-3' ); ?>>
	<?php srf_post_thumbnail( 'block w-full h-48 xs:w-56 mx-auto border-8 border-gray-300 object-cover' ); ?>
	<!-- Note: The below wrapping div is for the title and Featured Event tag (when we add it back in) to be grouped together in the flex column. -->
	<!-- It may also help with title alignment so keeping it here to test when we have the grid query set up. -->
	<!-- If it does not help with alignment on the non-featured grid items, we can remove the container and just render the title here (see content-events.php). -->
	<div class="w-full xs:w-4/6 px-6 text-center xs:text-left">
		<?php the_title( '<h2 class="entry-title text-2xl font-bold xs:line-clamp-2 md:line-clamp-3"><a class="hover:underline" href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
	</div>
	<?php if ( ! empty( $event_date) ) : ?>
		<h3 class="hidden sm:block pr-6 text-sm text-right font-normal"><?php echo esc_html( date( 'F j, Y', $event_date ) ); ?></h3>
	<?php endif; ?>
	<?php //srf_event_date(); ?>
</article>
