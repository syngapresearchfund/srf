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

<article id="post-<?php the_ID(); ?>" <?php post_class( ' relative mb-24' ); ?>>
	<?php if ( has_post_thumbnail() ) : ?>
		<a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark">
			<?php srf_post_thumbnail( 'mb-2 border border-gray-500' ); ?>
		</a>
	<?php endif; ?>

	<header class="entry-header">
		<a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark">
			<?php the_title( '<h2 class="entry-title line-clamp-2">', '</h2>' ); ?>
		</a>
	</header><!-- .entry-header -->

	<?php the_excerpt(); ?>

	<div class="absolute inset-x-1/2 -bottom-10 w-1/4 lg:w-1/4 h-0.5 bg-gray-300 rounded transform -translate-x-1/2"></div>
</article><!-- #post-<?php the_ID(); ?> -->
