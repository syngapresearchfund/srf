<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @since 2019-05-19 First docBlock
 * @package SRF
 */

namespace SRF;

/**
 * Removes inline width and height attributes on featured images
 */
function srf_remove_thumbnail_dimensions( $html ) {
	$html = preg_replace( '/(width|height)="\d*"\s/', '', $html );
	return $html;
}
add_filter( 'post_thumbnail_html', __NAMESPACE__ . '\\srf_remove_thumbnail_dimensions', 10 );
add_filter( 'image_send_to_editor', __NAMESPACE__ . '\\srf_remove_thumbnail_dimensions', 10 );

/**
 * Let's customize our excerpt a bit, so it looks better
 * First we decrease the default excerpt length, then
 * we give it a proper hellip for the more text.
 */
function srf_custom_excerpt_length() {
	return 20;
}
add_filter( 'excerpt_length', __NAMESPACE__ . '\\srf_custom_excerpt_length', 999 );

/**
 * Customize the "Read more" markup
 */
function srf_excerpt_more( $more ) {
	global $post;

	return '...</p><p class="mt-4"><a class="link__more font-semibold hover:underline" href="' . esc_url( get_permalink( $post->ID ) ) . '">' . esc_html__( 'Read more →' ) . '</a></p>';
}
add_filter( 'excerpt_more', __NAMESPACE__ . '\\srf_excerpt_more' );

/**
 * Filters the Archive Title to remove "Category:" text
 */
function srf_archive_title( $title ) {

	if ( is_category() ) {

		$title = single_cat_title( '', false );

	} elseif ( is_tag() ) {

		$title = single_tag_title( '', false );

	}

	return $title;
}
add_filter( 'get_the_archive_title', __NAMESPACE__ . '\\srf_archive_title' );

/**
 * Filters the main query to display desired post order for teams CPT.
 * 
 * @param  object $query Current query object
 */
function srf_team_orderby( $query ) {
	if ( ! is_admin() && $query->is_main_query() ) {
		if ( is_post_type_archive( 'srf-team' ) || is_tax( 'srf-team-category' ) ) {
			$query->set( 'orderby', array( 'menu_order' => 'DESC', 'title' => 'ASC' ) );
		}
	}
}
add_action( 'pre_get_posts', __NAMESPACE__ . '\\srf_team_orderby', 11 );

/**
 * Filters posts_per_page to display desired number of posts
 * 
 * Note: This is not currently in use, but is here for reference.
 * If we want to use this, we need to uncomment the add_action() line below.
 *
 * @param  object $query Current query object
 */
function srf_posts_per_page( $query ) {
	if ( is_admin() || ! $query->is_main_query() ) {
		return;
	}

	if ( $query->is_home() ) {
		if ( is_paged() ) {
			$query->set( 'posts_per_page', 15 );
		} else {
			$query->set( 'posts_per_page', 14 );
		}
	} elseif ( is_archive() ) {
		$query->set( 'posts_per_page', 9 );
	}
}
// add_action( 'pre_get_posts', __NAMESPACE__ . '\\srf_posts_per_page', 99 );
