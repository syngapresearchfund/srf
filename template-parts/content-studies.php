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

$is_webinar        = in_array( 'term-webinars', get_body_class() );
$thumbnail_classes = $is_webinar ? 'w-full lg:max-h-52 object-cover object-center block rounded-t' : 'w-full lg:max-h-40 object-cover object-center block rounded-t';

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'col-span-3 bg-white rounded shadow-lg' ); ?>>
	<div class="text-gray-600">
		<div class="p-6 border-t border-gray-200">
			<?php the_title( '<h2 class="entry-title mb-2 font-bold text-2xl text-gray-700"><a class="link__more block font-semibold hover:underline" href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
			<div
				class="mx-auto h-1 bg-gray-300 rounded transform translate-y-2"></div>
			<div class="mt-6 prose"><?php the_content(); ?></div>
		</div>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->
