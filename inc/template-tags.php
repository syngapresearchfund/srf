<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @since 2019-05-19 First docBlock
 * @package SRF
 */

namespace SRF;

if ( ! function_exists( 'srf_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function srf_posted_on() {
		$posted_on = '<span class="posted-on text-sm">' . esc_html__( 'Posted on: ' );

		$posted_on .= ! is_singular() ? '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' : '';
		$posted_on .= '<time class="entry-date published updated" datetime="' . esc_attr( get_the_date( DATE_W3C ) ) . '">' . esc_html( get_the_date() ) . '</time>';
		$posted_on .= ! is_singular() ? '</a></span>' : '</span>';

		echo $posted_on; // phpcs:ignore -- XSS OK
	}
endif;

if ( ! function_exists( 'srf_posted_by' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function srf_posted_by() {
		$author_avatar = get_avatar( get_the_author_meta( 'user_email' ), 150, 'mysteryman' );

		$byline = '<span class="author-avatar">' . $author_avatar . '</span><span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>';

		echo '<span class="byline"> ' . $byline . '</span>'; // phpcs:ignore -- XSS OK
	}
endif;

if ( ! function_exists( 'srf_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function srf_entry_footer() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( esc_html__( ', ' ) );
			if ( $categories_list ) {
				echo '<span class="cat-links">' . $categories_list . '</span>'; // phpcs:ignore -- XSS OK.
			}

			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator' ) );
			if ( $tags_list ) {
				echo '<span class="tags-links">' . $tags_list . '</span>'; // phpcs:ignore -- XSS OK.
			}
		}

		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			comments_popup_link(
				sprintf(
					wp_kses(
						/* translators: %s: post title */
						__( 'Leave a Comment<span class="screen-reader-text"> on %s</span>' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				)
			);
			echo '</span>';
		}

		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Edit <span class="screen-reader-text">%s</span>' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			),
			'<span class="edit-link">',
			'</span>'
		);
	}
endif;

if ( ! function_exists( 'srf_post_thumbnail' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * @param string $img_classes Optional classes for image.
	 */
	function srf_post_thumbnail( $img_classes = '' ) {
		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			return;
		}

		$srf_thumbnail_url = get_the_post_thumbnail_url( get_the_ID(), 'featured-image' );

		echo '<img class="' . esc_attr( $img_classes ) . '" src="' . esc_url( $srf_thumbnail_url ) . '" alt="' . esc_attr( get_the_title() ) . '" srcset="' . esc_url( add_query_arg( 'w', 660, $srf_thumbnail_url ) ) . ' 660w, ' . esc_url( add_query_arg( 'w', 960, $srf_thumbnail_url ) ) . ' 960w, ' . esc_url( $srf_thumbnail_url ) . ' 1280w" sizes="(max-width: 768px) 100vw, 100vw"/>';
	}
endif;

if ( ! function_exists( 'srf_profile_thumbnail' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 */
	function srf_profile_thumbnail() {
		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			return;
		}

		$srf_thumbnail_url = get_the_post_thumbnail_url();

		echo '<img class="w-3/4 sm:w-56 h-80 sm:h-56 object-cover rounded border border-gray-500" src="' . esc_url( $srf_thumbnail_url ) . '" alt="' . esc_attr( get_the_title() ) . '" srcset="' . esc_url( add_query_arg( 'w', 660, $srf_thumbnail_url ) ) . ' 660w, ' . esc_url( add_query_arg( 'w', 960, $srf_thumbnail_url ) ) . ' 960w, ' . esc_url( $srf_thumbnail_url ) . ' 1280w" sizes="(max-width: 768px) 100vw, 100vw" />';
	}
endif;

if ( ! function_exists( 'srf_excerpt' ) ) :
	/**
	 * Prints HTML for post excerpt to force "Read more"
	 */
	function srf_excerpt() {
		global $post;

		if ( $post->post_excerpt ) {
			the_excerpt();
			echo '<p><a class="link__more" href="' . esc_url( get_permalink( $post->ID ) ) . '">' . esc_html__( 'Read more' ) . '</a></p>';
		} else {
			the_excerpt();
		}
	}
endif;

if ( ! function_exists( 'srf_cat_icons' ) ) :
	/**
	 * Outputs SVG icons for categories
	 *
	 * @param  string $cat Current category.
	 */
	function srf_cat_icons( $cat ) {
		$cat_icon = '<svg class="go-category-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><rect x="0" fill="none" width="24" height="24"/><g>';

		switch ( $cat ) {
			case 'digital-marketing':
				$cat_icon .= '<path d="M12 2C6.477 2 2 6.477 2 12s4.477 10 10 10 10-4.477 10-10S17.523 2 12 2zm6.918 6h-3.215c-.188-1.424-.42-2.65-.565-3.357 1.593.682 2.916 1.87 3.78 3.357zm-5.904-3.928c.068.352.387 2.038.645 3.928h-3.32c.26-1.89.578-3.576.646-3.928C11.32 4.03 11.656 4 12 4s.68.03 1.014.072zM14 12c0 .598-.043 1.286-.11 2h-3.78c-.067-.714-.11-1.402-.11-2s.043-1.286.11-2h3.78c.067.714.11 1.402.11 2zM8.862 4.643C8.717 5.35 8.485 6.576 8.297 8H5.082c.864-1.487 2.187-2.675 3.78-3.357zM4.262 10h3.822c-.05.668-.084 1.344-.084 2s.033 1.332.085 2H4.263C4.097 13.36 4 12.692 4 12s.098-1.36.263-2zm.82 6h3.215c.188 1.424.42 2.65.565 3.357-1.593-.682-2.916-1.87-3.78-3.357zm5.904 3.928c-.068-.353-.388-2.038-.645-3.928h3.32c-.26 1.89-.578 3.576-.646 3.928-.333.043-.67.072-1.014.072s-.68-.03-1.014-.072zm4.152-.57c.145-.708.377-1.934.565-3.358h3.215c-.864 1.487-2.187 2.675-3.78 3.357zm4.6-5.358h-3.822c.05-.668.084-1.344.084-2s-.033-1.332-.085-2h3.82c.167.64.265 1.308.265 2s-.097 1.36-.263 2z"/>';
				break;
			case 'content-blogging':
				$cat_icon .= '<path d="M17 3H7c-1.105 0-2 .896-2 2v16l7-4 7 4V5c0-1.104-.896-2-2-2z"/>';
				break;
			case 'website-building':
				$cat_icon .= '<path d="M14 15h-4v-2H2v6c0 1.105.895 2 2 2h16c1.105 0 2-.895 2-2v-6h-8v2zm6-9h-2V4c0-1.105-.895-2-2-2H8c-1.105 0-2 .895-2 2v2H4c-1.105 0-2 .895-2 2v4h20V8c0-1.105-.895-2-2-2zm-4 0H8V4h8v2z"/>';
				break;
			case 'web-design':
				$cat_icon .= '<path d="M19 3H5c-1.105 0-2 .895-2 2v14c0 1.105.895 2 2 2h14c1.105 0 2-.895 2-2V5c0-1.105-.895-2-2-2zM6 6h5v5H6V6zm4.5 13C9.12 19 8 17.88 8 16.5S9.12 14 10.5 14s2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5zm3-6l3-5 3 5h-6z"/>';
				break;
			case 'tutorials':
				$cat_icon .= '<path d="M16 18H8v-2h8v2zm0-6H8v2h8v-2zm2-9h-2v2h2v15H6V5h2V3H6c-1.105 0-2 .895-2 2v15c0 1.105.895 2 2 2h12c1.105 0 2-.895 2-2V5c0-1.105-.895-2-2-2zm-4 2V4c0-1.105-.895-2-2-2s-2 .895-2 2v1c-1.105 0-2 .895-2 2v1h8V7c0-1.105-.895-2-2-2z"/>';
				break;
			default:
				$cat_icon .= '<path d="M18 19H6c-1.1 0-2-.9-2-2V7c0-1.1.9-2 2-2h3c1.1 0 2 .9 2 2h7c1.1 0 2 .9 2 2v8c0 1.1-.9 2-2 2z"/>';
		}

		$cat_icon .= '</g></svg>';

		echo $cat_icon; // phpcs:ignore -- XSS ok
	}
endif;
