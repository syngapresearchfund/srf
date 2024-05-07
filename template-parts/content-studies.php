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

<article id="post-<?php the_ID(); ?>" <?php post_class( 'col-span-2 bg-white rounded shadow-lg' ); ?>>
	<div class="p-6 border-t border-gray-200 text-gray-600">
		<h2 class="entry-title mb-2 font-bold text-2xl text-gray-700"><a
				class="link__more block font-semibold hover:underline" href="<?php esc_url( the_permalink() ); ?>"
				rel="bookmark"><?php echo esc_html( get_field( 'short_title' ) ); ?></a></h2>
		<div
			class="mx-auto h-1 rounded transform translate-y-2 bg-opacity-50 <?php echo esc_attr( $srf_bg_colors[ array_rand( $srf_bg_colors, 1 ) ] ); ?>"></div>
		<div class="mt-6 prose">
			<p><span
					class='font-bold'>Institution / Researcher: </span><?php echo esc_html( get_field( 'institution_researcher' ) ) ?>
			</p>
			<?php if ( get_field( 'additional_info' ) ) : ?>
				<div>
					<?php echo wp_kses_post( get_field( 'additional_info' ) ) ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->
