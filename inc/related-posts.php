<?php
/**
 * Related posts.
 *
 * @since 2019-08-25
 * @package SRF
 */

namespace SRF;

/**
 * Related posts.
 *
 * @since 2019-08-25
 *
 * @return string Related posts.
 */
function the_related_posts() : void {
	if ( ! class_exists( 'Jetpack_RelatedPosts' ) || ! method_exists( 'Jetpack_RelatedPosts', 'init_raw' ) ) {
		return; // Not possible.
	}

	$related_post_ids = []; // Initialize.
	$related_posts    = \Jetpack_RelatedPosts::init_raw()
		->set_query_name( 'wpcom-h4-related-posts' )
		->get_for_post_id(
			get_the_ID(),
			[ 'size' => 3 ]
		);
	foreach ( is_array( $related_posts ) ? $related_posts : [] as $_related_post ) {
		$related_post_ids[] = absint( $_related_post['id'] );
	}

	if ( $related_post_ids ) {
		echo '<div class="related-posts">';
		echo '    <h4><span>' . esc_html__( 'RECOMMENDED ARTICLES' ) . '</span></h4>';
		echo '    <div class="post-grid">';

		$query = new \WP_Query( [
			'ignore_sticky_posts' => true,
			'post_type'           => 'post',
			'post_status'         => 'publish',
			'post__in'            => $related_post_ids,
			'orderby'             => 'post__in',
			'posts_per_page'      => 3,
		] );

		if ( $query->have_posts() ) {
			while ( $query->have_posts() ) {
				$query->the_post();
				get_template_part( 'landing/marketing/go/template-parts/content', get_post_type() );
			}
			wp_reset_postdata();
		}

		echo '</div></div>';
	}
}
