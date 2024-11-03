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

$srf_bg_colors = array(
	'bg-srf-blue-500',
	'bg-srf-purple-500',
	'bg-srf-green-500',
);
?>

<article
	id="post-<?php the_ID(); ?>" <?php post_class( 'bg-opacity-20 hover:bg-opacity-40 ' . esc_attr( $srf_bg_colors[ array_rand( $srf_bg_colors, 1 ) ] ) ); ?>>
	<a class="post-card relative block h-full" href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark">
		<div class="entry-header p-6">
			<?php the_title( '<h2 class="entry-title mb-6 text-xl text-center font-bold">', '</h2>' ); ?>
			<ul>
				<?php if ( get_field( 'principal_investigator' ) ) : ?>
					<li><strong class="font-bold">Principal
							Investigator:</strong> <?php echo esc_html( get_field( 'principal_investigator' ) ); ?></li>
				<?php endif; ?>
				<?php if ( get_field( 'institution' ) ) : ?>
					<li><strong
							class="font-bold">Institution:</strong> <?php echo esc_html( get_field( 'institution' ) ); ?>
					</li>
				<?php endif; ?>
				<li><strong class="font-bold">Funding
						Amount:</strong> <?php echo esc_html( get_field( 'funding_amount' ) ); ?></li>
				<li><strong class="font-bold">Grant
						Status:</strong> <?php echo esc_html( get_field( 'grant_status' ) ); ?></li>
			</ul>
		</div><!-- .entry-header -->
	</a>
</article><!-- #post-<?php the_ID(); ?> -->
