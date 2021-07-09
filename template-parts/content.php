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

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<a class="post-card" href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark">
		<div class="featured-image">
			<div class="post-thumbnail">
				<?php srf_post_thumbnail(); ?>
			</div>
		</div>

		<header class="entry-header">
			<?php
			$categories            = get_the_category();
			$primary_category      = reset( $categories );
			$primary_category_icon = $primary_category instanceof \WP_Term ? $primary_category->slug : '';

			if ( $categories ) {
				echo '<div class="post-category">';
				srf_cat_icons( $primary_category_icon );
				echo '<span class="cat-links">' . $primary_category->name . '</span>'; // phpcs:ignore -- XSS OK.
				echo '</div>';
			}
			the_title( '<h2 class="entry-title no-widows">', '</h2>' );
			?>
		</header><!-- .entry-header -->
	</a>
</article><!-- #post-<?php the_ID(); ?> -->
