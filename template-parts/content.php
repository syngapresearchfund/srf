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

$card_classes = ( is_front_page() && 'srf-warriors' === get_post_type() ) ? 'border-gray-700' : 'border-gray-500';
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'rounded border ' . $card_classes ); ?>>
	<a class="post-card relative block" href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark">
		<div class="featured-image">
			<?php srf_post_thumbnail( 'rounded h-64 w-full object-cover object-center' ); ?>
		</div>

		<header class="entry-header p-6 absolute bottom-0 w-full text-gray-100 bg-gray-800 bg-opacity-50">
			<?php
			the_title( '<h2 class="entry-title text-2xl font-bold">', '</h2>' );
			?>
		</header><!-- .entry-header -->
	</a>
</article><!-- #post-<?php the_ID(); ?> -->
