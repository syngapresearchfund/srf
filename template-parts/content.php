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

$is_webinar = in_array( 'term-webinars', get_body_class() );
$thumbnail_classes = $is_webinar ? 'w-full lg:max-h-52 object-cover object-center block rounded-t' : 'w-full lg:max-h-40 object-cover object-center block rounded-t';

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'col-span-2 bg-white rounded shadow-lg' ); ?>>
	<div class="text-gray-600">
		<a class="link__more block font-semibold hover:underline" href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark">
			<?php the_post_thumbnail( 'featured-image', array( 'class' => $thumbnail_classes ) ); ?>
			<div class="p-6 border-t border-gray-200">
				<h4 class="font-semibold text-sm text-gray-600"><?php echo get_the_date( 'F j, Y' ); ?></h4>
				<?php the_title( '<h2 class="entry-title mb-2 font-bold text-lg text-gray-700">', '</h2>' ); ?>
				<p class="mt-4">View article →</p>
			</div>
		</a>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->
