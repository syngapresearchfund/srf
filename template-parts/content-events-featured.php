<?php
/**
 * Template part for displaying the Featured Event
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @since 2019-05-19 First docBlock
 * @package SRF
 */

namespace SRF;

$event_date = get_post_meta( get_the_ID(), 'event_date', true );
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'shadow-lg bg-gray-300 bg-opacity-50 xs:flex items-center col-span-full ' ); ?>>
	<?php srf_post_thumbnail( 'block w-full h-48 xs:w-56 mx-auto xs:mx-0 xs:mr-6 border-8 border-gray-300 object-cover xl:h-80 xl:w-96 xl:px-6 xl:object-contain bg-gray-300' ); ?>
	<div class="w-full xs:w-4/6 px-6 text-center xs:text-left">
		<h4 class="mb-2 font-extrabold uppercase">
			<span class="text-transparent bg-clip-text bg-gradient-to-r from-srf-purple-500 to-srf-blue-500">Featured </span><span class="text-transparent bg-clip-text bg-gradient-to-r from-srf-blue-500 via-srf-green-600 to-srf-green-500"> Event</span>
		</h4>
		<?php the_title( '<h2 class="entry-title w-full xs:w-4/6 mr-6 p-3 xs:p-0 text-2xl font-bold text-center xs:text-left xs:line-clamp-2 md:line-clamp-3 xl:text-3xl"><a class="hover:underline" href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
	</div>
	<?php if ( ! empty( $event_date) ) : ?>
		<h3 class="hidden sm:block mr-6 text-sm text-right font-normal xl:text-base"><?php echo esc_html( date( 'F j, Y', $event_date ) ); ?></h3>
	<?php endif; ?>
</article>
