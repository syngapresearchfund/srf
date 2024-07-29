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

$srf_bg_colors    = array(
	'bg-srf-blue-500',
	'bg-srf-purple-500',
	'bg-srf-green-500',
);
$ambassador_field = get_field( 'ambassador_states' );
$ambassador_state = ! empty( $ambassador_field ) && srf_is_state_ambassador( $args ) ? $ambassador_field . ' - ' : '';
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'bg-white' ); ?>>
	<a class="post-card relative block" href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark">
		<?php
		if ( has_post_thumbnail() ) {
			the_post_thumbnail( 'profile-image', array( 'class' => 'h-64 w-full object-cover object-center' ) );
		} else {
			echo '<div class="h-64 w-full bg-opacity-30 ' . esc_attr( $srf_bg_colors[ array_rand( $srf_bg_colors, 1 ) ] ) . '"></div>';
		}
		?>

		<header class="entry-header p-6 absolute bottom-0 w-full text-gray-100 bg-gray-900 bg-opacity-40 rounded-b">
			<?php the_title( '<h2 class="entry-title text-xl font-bold line-clamp-2">' . $ambassador_state, '</h2>' ); ?>
		</header><!-- .entry-header -->
	</a>
</article><!-- #post-<?php the_ID(); ?> -->
