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

$event_date = get_field( 'event_dates' );
?>

<article
	id="post-<?php the_ID(); ?>" <?php post_class( 'shadow-lg bg-gray-300 bg-opacity-50 xs:flex items-center col-span-full ' ); ?>>
	<?php the_post_thumbnail( 'featured-image', array( 'class' => 'block w-full h-48 xs:w-56 mx-auto xs:mx-0 xs:mr-6 border-8 border-gray-300 object-cover xl:h-80 xl:w-96 xl:px-6 xl:object-contain bg-gray-300' ) ); ?>
	<div class="w-full xs:w-4/6 px-6 text-center xs:text-left">
		<h4 class="mb-2 font-extrabold uppercase text-xs sm:text-base">
			<span
				class="text-transparent bg-clip-text bg-gradient-to-r from-srf-purple-500 to-srf-blue-500">Featured </span><span
				class="text-transparent bg-clip-text bg-gradient-to-r from-srf-blue-500 via-srf-green-600 to-srf-green-500"> Event</span>
		</h4>
		<?php the_title( '<h2 class="entry-title w-full xs:w-4/6 mr-6 p-3 xs:p-0 font-bold text-center xs:text-left line-clamp-4 text-xl sm:text-2xl xl:text-3xl"><a class="hover:underline" href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
	</div>
	<?php if ( ! empty( $event_date ) ) : ?>
		<h3 class="hidden sm:block mr-6 text-sm text-right font-normal xl:text-base"><?php echo esc_html( $event_date ); ?></h3>
	<?php endif; ?>
</article>
