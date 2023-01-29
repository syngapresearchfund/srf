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

$card_classes  = ( is_front_page() && 'srf-warriors' === get_post_type() ) ? 'border-gray-700' : 'border-gray-600';
$srf_bg_colors = array(
	'bg-srf-blue-500',
	'bg-srf-purple-500',
	'bg-srf-green-500',
);
$item_taxonomy = get_queried_object();
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'rounded bg-white' ); ?>>
	<a class="post-card relative block" href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark">
		<?php
		if ( has_post_thumbnail() ) {
			srf_post_thumbnail( 'rounded h-64 w-full object-cover object-center' );
		} else {
			echo '<div class="rounded h-64 w-full ' . esc_attr( $srf_bg_colors[ array_rand( $srf_bg_colors, 1 ) ] ) . '"></div>';
		}
		?>

		<?php // if ( 'srf-resources' === get_post_type() ) : ?>
		<?php if ( 'Webinars' === $item_taxonomy->name ) : ?>
			<header class="entry-header p-6 absolute top-0 h-full w-full text-gray-100 bg-gray-900 bg-opacity-40 rounded">
				<?php the_title( '<h2 class="entry-title text-2xl font-bold line-clamp-5">', '</h2>' ); ?>
				<?php if ( has_excerpt() ) : ?>
					<h3 class="mt-4 text-sm font-normal"><?php the_excerpt(); ?></h3>
				<?php endif; ?>
			</header><!-- .entry-header -->
		<?php else : ?>
			<header class="entry-header p-6 absolute bottom-0 w-full text-gray-100 bg-gray-900 bg-opacity-40 rounded-b">
				<?php the_title( '<h2 class="entry-title text-2xl font-bold line-clamp-2">', '</h2>' ); ?>
			</header><!-- .entry-header -->
		<?php endif; ?>
	</a>
</article><!-- #post-<?php the_ID(); ?> -->
