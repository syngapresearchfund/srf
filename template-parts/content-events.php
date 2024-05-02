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

$event_date = get_field( 'event_dates' );
?>

<article
	id="post-<?php the_ID(); ?>" <?php post_class( 'shadow-lg bg-gray-300 bg-opacity-50 xs:flex items-center ' ); ?>>
	<?php the_post_thumbnail( 'featured-image', array( 'class' => 'block w-full h-48 xs:w-56 mx-auto xs:mx-0 xs:mr-6 border-8 border-gray-300 object-cover' ) ); ?>
	<div class="w-full xs:w-4/6 px-6 text-center xs:text-left">
		<?php the_title( '<h2 class="entry-title w-full xs:w-4/6 mr-6 p-3 xs:p-0 text-2xl font-bold text-center xs:text-left xs:line-clamp-2 md:line-clamp-3"><a class="hover:underline" href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
	</div>
	<?php if ( ! empty( $event_date ) ) : ?>
		<h3 class="hidden sm:block mr-6 text-sm text-right font-normal"><?php echo esc_html( $event_date ); ?></h3>
	<?php endif; ?>
</article>
