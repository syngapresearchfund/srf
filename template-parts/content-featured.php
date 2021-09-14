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
			the_title( '<h1 class="entry-title no-widows"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h1>' );
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
