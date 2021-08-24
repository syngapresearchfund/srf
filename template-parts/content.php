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
			the_title( '<h2 class="entry-title no-widows">', '</h2>' );
			?>
		</header><!-- .entry-header -->
	</a>
</article><!-- #post-<?php the_ID(); ?> -->
