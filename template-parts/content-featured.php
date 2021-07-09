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

<article id="post-<?php the_ID(); ?>" <?php post_class( 'featured-post' ); ?>>
	<div class="featured-image">
		<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
			<?php srf_post_thumbnail(); ?>
		</a>
	</div>

	<header class="entry-header">
		<div class="featured-title">
			<?php
			$categories_list       = get_the_category_list( esc_html__( ', ' ) );
			$categories            = get_the_category();
			$primary_category      = reset( $categories );
			$primary_category_icon = $primary_category instanceof \WP_Term ? $primary_category->slug : '';

			if ( $categories_list ) {
				echo '<div class="post-category">';
				srf_cat_icons( $primary_category_icon );
				echo '<span class="cat-links">' . $categories_list . '</span>'; // phpcs:ignore -- XSS OK.
				echo '</div>';
			}
			the_title( '<h2 class="entry-title no-widows"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			?>
		</div>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
		if ( 'post' === get_post_type() ) :
			?>
			<div class="entry-date">
				<?php
				srf_posted_on();
				?>
			</div><!-- .entry-date -->
		<?php endif; ?>
		<div class="post-excerpt">
			<?php srf_excerpt(); ?>
		</div>
	</div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->

<!-- Begin post grid for remaining items -->
<div id="grid-container" class="post-grid">
