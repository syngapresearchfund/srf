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

$event_date = get_field( 'event_dates' );
?>

<article
	id="post-<?php the_ID(); ?>" <?php post_class( 'shadow-lg bg-gray-300 bg-opacity-50 xs:flex items-center col-span-3' ); ?>>
	<?php the_post_thumbnail( 'featured-image', array( 'class' => 'block w-full h-48 xs:w-56 mx-auto border-8 border-gray-300 object-cover' ) ); ?>
	<div class="w-full xs:w-4/6 px-6 py-2 text-center xs:text-left">
		<?php the_title( '<h2 class="entry-title text-xl sm:text-2xl font-bold line-clamp-4"><a class="hover:underline" href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
	</div>
	<?php if ( ! empty( $event_date ) ) : ?>
		<h3 class="hidden sm:block pr-6 text-sm text-right font-normal"><?php echo esc_html( $event_date ); ?></h3>
	<?php endif; ?>
	<?php //srf_event_date();
	?>
</article>
