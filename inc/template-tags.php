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

use WP_Query;

if ( ! function_exists( 'srf_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function srf_posted_on() {
		$posted_on = '<span class="posted-on">' . esc_html__( 'Posted on: ' );

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
	 * @param string $img_size Optional image size for image.
	 */
	function srf_post_thumbnail( $img_classes = 'mx-auto mb-10', $img_size = 'featured-image' ) {
		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			return;
		}

		$srf_thumbnail_url = get_the_post_thumbnail_url( get_the_ID(), $img_size );

		echo '<img class="' . esc_attr( $img_classes ) . '" src="' . esc_url( $srf_thumbnail_url ) . '" alt="' . esc_attr( get_the_title() ) . '" srcset="' . esc_url( add_query_arg( 'w', 660, $srf_thumbnail_url ) ) . ' 660w, ' . esc_url( add_query_arg( 'w', 960, $srf_thumbnail_url ) ) . ' 960w, ' . esc_url( $srf_thumbnail_url ) . ' 1280w" sizes="(max-width: 768px) 100vw, 100vw"/>';
	}
endif;

if ( ! function_exists( 'srf_profile_thumbnail' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 */
	function srf_single_featured_image() {
		global $post;

		// TODO: Adjust the featured image to be based on an aspect ratio size - maybe.
		$thumbnail_classes = 'w-2/3 sm:w-1/3 max-h-80 sm:float-left sm:mr-10';
		$current_terms     = wp_get_post_terms( $post->ID, 'srf-resources-category', array( 'fields' => 'slugs' ) );

		if ( in_array( 'movies', $current_terms, true ) || 'srf-podcasts' === get_post_type() || in_array( 'webinars', $current_terms, true ) ) {
			return; // exit early - no featured images on these pages.
		}

		if ( 'post' !== get_post_type() && 'product' !== get_post_type() && 'srf-events' !== get_post_type() ) {
			srf_post_thumbnail( $thumbnail_classes );
		} else {
			the_post_thumbnail( 'full', array( 'class' => 'block mx-auto mb-0' ) );
		}
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

if ( ! function_exists( 'srf_post_meta' ) ) :
	/**
	 * Prints HTML for post excerpt to force "Read more"
	 */
	function srf_post_meta() {
		if ( 'post' === get_post_type() || 'srf-warriors' === get_post_type() ) {
			echo '<div class="mt-6 text-sm text-center">';
			srf_posted_on();

			$tags_list = get_the_tag_list( '', ', ' );
			if ( $tags_list ) {
				echo '<div class="post-tags mt-2 flex justify-items-center justify-center items-center">';
				echo '<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
				<path fill-rule="evenodd" d="M17.707 9.293a1 1 0 010 1.414l-7 7a1 1 0 01-1.414 0l-7-7A.997.997 0 012 10V5a3 3 0 013-3h5c.256 0 .512.098.707.293l7 7zM5 6a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd" />
				</svg>';
				echo '<span class="tags-links">' . $tags_list . '</span>'; // phpcs:ignore -- XSS OK.
				echo '</div>';
			}
			echo '</div>';
		}
	}
endif;

if ( ! function_exists( 'srf_social_icon' ) ) :
	/**
	 * Outputs SVG icons for social icons.
	 *
	 * @param string $icon Social icon.
	 * @param string $url Social icon URL.
	 */
	function srf_social_icon( $icon, $url ) {
		$social_icon = '<a class="block" href="' . esc_url( $url ) . '"><svg role="img" class="srf-social-icon fill-current text-gray-100 w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><rect x="0" fill="none" width="24" height="24"/><g>';

		switch ( $icon ) {
			case 'twitter':
				$social_icon .= '<title>Twitter</title><path d="M14.3 10.2 23.2 0h-2.1l-7.8 8.8L7.1 0H0l9.4 13.3L0 24h2.1l8.2-9.3 6.5 9.3H24l-9.7-13.8zm-2.9 3.3-.9-1.3L2.9 1.6h3.3l6.1 8.5.9 1.3 7.9 11.1h-3.3l-6.4-9z" />';
				break;
			case 'facebook':
				$social_icon .= '<title>Facebook</title><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>';
				break;
			case 'instagram':
				$social_icon .= '<title>Instagram</title><path d="M12 0C8.74 0 8.333.015 7.053.072 5.775.132 4.905.333 4.14.63c-.789.306-1.459.717-2.126 1.384S.935 3.35.63 4.14C.333 4.905.131 5.775.072 7.053.012 8.333 0 8.74 0 12s.015 3.667.072 4.947c.06 1.277.261 2.148.558 2.913.306.788.717 1.459 1.384 2.126.667.666 1.336 1.079 2.126 1.384.766.296 1.636.499 2.913.558C8.333 23.988 8.74 24 12 24s3.667-.015 4.947-.072c1.277-.06 2.148-.262 2.913-.558.788-.306 1.459-.718 2.126-1.384.666-.667 1.079-1.335 1.384-2.126.296-.765.499-1.636.558-2.913.06-1.28.072-1.687.072-4.947s-.015-3.667-.072-4.947c-.06-1.277-.262-2.149-.558-2.913-.306-.789-.718-1.459-1.384-2.126C21.319 1.347 20.651.935 19.86.63c-.765-.297-1.636-.499-2.913-.558C15.667.012 15.26 0 12 0zm0 2.16c3.203 0 3.585.016 4.85.071 1.17.055 1.805.249 2.227.415.562.217.96.477 1.382.896.419.42.679.819.896 1.381.164.422.36 1.057.413 2.227.057 1.266.07 1.646.07 4.85s-.015 3.585-.074 4.85c-.061 1.17-.256 1.805-.421 2.227-.224.562-.479.96-.899 1.382-.419.419-.824.679-1.38.896-.42.164-1.065.36-2.235.413-1.274.057-1.649.07-4.859.07-3.211 0-3.586-.015-4.859-.074-1.171-.061-1.816-.256-2.236-.421-.569-.224-.96-.479-1.379-.899-.421-.419-.69-.824-.9-1.38-.165-.42-.359-1.065-.42-2.235-.045-1.26-.061-1.649-.061-4.844 0-3.196.016-3.586.061-4.861.061-1.17.255-1.814.42-2.234.21-.57.479-.96.9-1.381.419-.419.81-.689 1.379-.898.42-.166 1.051-.361 2.221-.421 1.275-.045 1.65-.06 4.859-.06l.045.03zm0 3.678c-3.405 0-6.162 2.76-6.162 6.162 0 3.405 2.76 6.162 6.162 6.162 3.405 0 6.162-2.76 6.162-6.162 0-3.405-2.76-6.162-6.162-6.162zM12 16c-2.21 0-4-1.79-4-4s1.79-4 4-4 4 1.79 4 4-1.79 4-4 4zm7.846-10.405c0 .795-.646 1.44-1.44 1.44-.795 0-1.44-.646-1.44-1.44 0-.794.646-1.439 1.44-1.439.793-.001 1.44.645 1.44 1.439z"/>';
				break;
			case 'youtube':
				$social_icon .= '<title>YouTube</title><path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/>';
				break;
			case 'linkedin':
				$social_icon .= '<title>LinkedIn</title><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>';
				break;
			case 'tiktok':
				$social_icon .= '<title>TikTok</title><path d="M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.05-2.89-.35-4.2-.97-.57-.26-1.1-.59-1.62-.93-.01 2.92.01 5.84-.02 8.75-.08 1.4-.54 2.79-1.35 3.94-1.31 1.92-3.58 3.17-5.91 3.21-1.43.08-2.86-.31-4.08-1.03-2.02-1.19-3.44-3.37-3.65-5.71-.02-.5-.03-1-.01-1.49.18-1.9 1.12-3.72 2.58-4.96 1.66-1.44 3.98-2.13 6.15-1.72.02 1.48-.04 2.96-.04 4.44-.99-.32-2.15-.23-3.02.37-.63.41-1.11 1.04-1.36 1.75-.21.51-.15 1.07-.14 1.61.24 1.64 1.82 3.02 3.5 2.87 1.12-.01 2.19-.66 2.77-1.61.19-.33.4-.67.41-1.06.1-1.79.06-3.57.07-5.36.01-4.03-.01-8.05.02-12.07z"/>';
				break;
			case 'amazon':
				$social_icon .= '<title>Amazon</title><path d="M.045 18.02c.072-.116.187-.124.348-.022 3.636 2.11 7.594 3.166 11.87 3.166 2.852 0 5.668-.533 8.447-1.595l.315-.14c.138-.06.234-.1.293-.13.226-.088.39-.046.525.13.12.174.09.336-.12.48-.256.19-.6.41-1.006.654-1.244.743-2.64 1.316-4.185 1.726a17.617 17.617 0 01-10.951-.577 17.88 17.88 0 01-5.43-3.35c-.1-.074-.151-.15-.151-.22 0-.047.021-.09.051-.13zm6.565-6.218c0-1.005.247-1.863.743-2.577.495-.71 1.17-1.25 2.04-1.615.796-.335 1.756-.575 2.912-.72.39-.046 1.033-.103 1.92-.174v-.37c0-.93-.105-1.558-.3-1.875-.302-.43-.78-.65-1.44-.65h-.182c-.48.046-.896.196-1.246.46-.35.27-.575.63-.675 1.096-.06.3-.206.465-.435.51l-2.52-.315c-.248-.06-.372-.18-.372-.39 0-.046.007-.09.022-.15.247-1.29.855-2.25 1.82-2.88.976-.616 2.1-.975 3.39-1.05h.54c1.65 0 2.957.434 3.888 1.29.135.15.27.3.405.48.12.165.224.314.283.45.075.134.15.33.195.57.06.254.105.42.135.51.03.104.062.3.076.615.01.313.02.493.02.553v5.28c0 .376.06.72.165 1.036.105.313.21.54.315.674l.51.674c.09.136.136.256.136.36 0 .12-.06.226-.18.314-1.2 1.05-1.86 1.62-1.963 1.71-.165.135-.375.15-.63.045a6.062 6.062 0 01-.526-.496l-.31-.347a9.391 9.391 0 01-.317-.42l-.3-.435c-.81.886-1.603 1.44-2.4 1.665-.494.15-1.093.227-1.83.227-1.11 0-2.04-.343-2.76-1.034-.72-.69-1.08-1.665-1.08-2.94l-.05-.076zm3.753-.438c0 .566.14 1.02.425 1.364.285.34.675.512 1.155.512.045 0 .106-.007.195-.02.09-.016.134-.023.166-.023.614-.16 1.08-.553 1.424-1.178.165-.28.285-.58.36-.91.09-.32.12-.59.135-.8.015-.195.015-.54.015-1.005v-.54c-.84 0-1.484.06-1.92.18-1.275.36-1.92 1.17-1.92 2.43l-.035-.02zm9.162 7.027c.03-.06.075-.11.132-.17.362-.243.714-.41 1.05-.5a8.094 8.094 0 011.612-.24c.14-.012.28 0 .41.03.65.06 1.05.168 1.172.33.063.09.099.228.099.39v.15c0 .51-.149 1.11-.424 1.8-.278.69-.664 1.248-1.156 1.68-.073.06-.14.09-.197.09-.03 0-.06 0-.09-.012-.09-.044-.107-.12-.064-.24.54-1.26.806-2.143.806-2.64 0-.15-.03-.27-.087-.344-.145-.166-.55-.257-1.224-.257-.243 0-.533.016-.87.046-.363.045-.7.09-1 .135-.09 0-.148-.014-.18-.044-.03-.03-.036-.047-.02-.077 0-.017.006-.03.02-.063v-.06z"/>';
				break;
			default:
				$social_icon .= '<path d="M18 19H6c-1.1 0-2-.9-2-2V7c0-1.1.9-2 2-2h3c1.1 0 2 .9 2 2h7c1.1 0 2 .9 2 2v8c0 1.1-.9 2-2 2z"/>';
		}

		$social_icon .= '</g></svg></a>';

		echo $social_icon; // phpcs:ignore -- XSS ok
	}
endif;

if ( ! function_exists( 'srf_board_grid' ) ) :
	/**
	 * Outputs the grid for SRF Board Members.
	 */
	function srf_board_grid() {
		$args        = array(
			'posts_per_page' => 8, // phpcs:ignore -- pagination limit ok.
			'post_type'      => 'srf-team',
			'tax_query'      => array( // phpcs:ignore -- tax_query ok.
				array(
					'taxonomy' => 'srf-team-category',
					'field'    => 'slug',
					'terms'    => 'board-members',
				),
			),
		);
		$board_query = new WP_Query( $args );

		if ( $board_query->have_posts() ) :
			?>
			<div class="max-w-6xl mx-auto grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-2 mb-10">
				<?php
				/* Start the Loop */
				while ( $board_query->have_posts() ) :
					$board_query->the_post();

					/*
					* Include the Post-Type-specific template for the content.
					* If you want to override this in a child theme, then include a file
					* called content-___.php (where ___ is the Post Type name) and that will be used instead.
					*/
					get_template_part( 'template-parts/content', 'grid-items' );

				endwhile;
				?>
			</div>
			<a href="<?php echo esc_url( home_url( '/team/board-members/' ) ); ?>" class="font-sans inline-flex bg-srf-blue-500 hover:bg-srf-blue-600 rounded py-3 px-8 text-white transition duration-500 font-bold">
				View all board members
				<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline-block" fill="none" viewBox="0 0 24 24"
					stroke="currentColor">
					<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
						d="M13 7l5 5m0 0l-5 5m5-5H6" />
				</svg>
			</a>

		<?php else : ?>

			<p class="text-gray-700 text-center mb-7">No board members have been added yet!</p>

		<?php
		endif;

		/* Restore original Post Data */
		wp_reset_postdata();
	}
endif;

if ( ! function_exists( 'srf_volunteer_grid' ) ) :
	/**
	 * Outputs the grid for SRF Volunteers.
	 */
	function srf_volunteer_grid() {
		$args        = array(
			'posts_per_page' => 8, // phpcs:ignore -- pagination limit ok.
			'post_type'      => 'srf-team',
			'tax_query'      => array( // phpcs:ignore -- tax_query ok.
				array(
					'taxonomy' => 'srf-team-category',
					'field'    => 'slug',
					'terms'    => 'volunteers',
				),
			),
		);
		$board_query = new WP_Query( $args );

		if ( $board_query->have_posts() ) :
			?>
			<div class="max-w-6xl mx-auto grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-2 mb-10">
				<?php
				/* Start the Loop */
				while ( $board_query->have_posts() ) :
					$board_query->the_post();

					/*
					* Include the Post-Type-specific template for the content.
					* If you want to override this in a child theme, then include a file
					* called content-___.php (where ___ is the Post Type name) and that will be used instead.
					*/
					get_template_part( 'template-parts/content', 'grid-items' );

				endwhile;
				?>
			</div>
			<a href="<?php echo esc_url( home_url( '/team/volunteers/' ) ); ?>" class="font-sans inline-flex bg-srf-blue-500 hover:bg-srf-blue-600 rounded py-3 px-8 text-white transition duration-500 font-bold">
				View all volunteers
				<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline-block" fill="none" viewBox="0 0 24 24"
					stroke="currentColor">
					<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
						d="M13 7l5 5m0 0l-5 5m5-5H6" />
				</svg>
			</a>

		<?php else : ?>

			<p class="text-gray-700 text-center mb-7">No volunteers have been added yet!</p>

		<?php
		endif;

		/* Restore original Post Data */
		wp_reset_postdata();
	}
endif;

if ( ! function_exists( 'srf_researcher_grid' ) ) :
	/**
	 * Outputs the grid for SRF Researchers.
	 */
	function srf_leadership_grid() {
		$args        = array(
			'posts_per_page' => 8, // phpcs:ignore -- pagination limit ok.
			'post_type'      => 'srf-team',
			'tax_query'      => array( // phpcs:ignore -- tax_query ok.
				array(
					'taxonomy' => 'srf-team-category',
					'field'    => 'slug',
					'terms'    => 'us-leadership-team',
				),
			),
		);
		$board_query = new WP_Query( $args );

		if ( $board_query->have_posts() ) :
			?>
			<div class="max-w-6xl mx-auto grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-2 mb-10">
				<?php
				/* Start the Loop */
				while ( $board_query->have_posts() ) :
					$board_query->the_post();

					/*
					* Include the Post-Type-specific template for the content.
					* If you want to override this in a child theme, then include a file
					* called content-___.php (where ___ is the Post Type name) and that will be used instead.
					*/
					get_template_part( 'template-parts/content', 'grid-items' );

				endwhile;
				?>
			</div>
			<a href="<?php echo esc_url( home_url( '/team/us-leadership-team/' ) ); ?>" class="font-sans inline-flex bg-srf-blue-500 hover:bg-srf-blue-600 rounded py-3 px-8 text-white transition duration-500 font-bold">
				View full leadership team
				<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline-block" fill="none" viewBox="0 0 24 24"
					stroke="currentColor">
					<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
						d="M13 7l5 5m0 0l-5 5m5-5H6" />
				</svg>
			</a>

		<?php else : ?>

			<p class="text-gray-700 text-center mb-7">No team members have been added yet!</p>

		<?php
		endif;

		/* Restore original Post Data */
		wp_reset_postdata();
	}
endif;

if ( ! function_exists( 'srf_nav_item' ) ) :
	/**
	 * Outputs a link item for the main navigation.
	 *
	 * @param string $name The name for the nav link.
	 * @param string $url The variable name (JS) for the dropdown click binder - controlled by Alpine.
	 *
	 * TODO: Make this a little bit more flexible so we have the option to pass in a subnav or render as a single item.
	 */
	function srf_nav_item( $name, $url ) {
		$output = sprintf(
			'<li>
				<a href="%2$s" class="block py-2 text-gray-600 group rounded-md text-base font-medium hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
					%1$s
				</a>
			</li>',
			esc_html( $name ),
			esc_url( $url ),
		);

		echo $output; // phpcs:ignore -- XSS OK
	}
endif;

if ( ! function_exists( 'srf_nav_item_dropdown' ) ) :
	/**
	 * Outputs a link item for the main navigation.
	 *
	 * @param string $name The name for the nav link.
	 * @param string $event_binder The variable name (JS) for the dropdown click binder - controlled by Alpine.
	 * @param array $subnav_items An array of function calls to srf_subnav_item to populate subnav list.
	 *
	 * TODO: Make this a little bit more flexible so we have the option to pass in a subnav or render as a single item.
	 */
	function srf_nav_item_dropdown( $name, $event_binder, $subnav_items ) {
		$output = sprintf(
			'<li class="relative py-2 cursor-pointer" x-cloak @mouseleave="%1$s = false">
				<div @mouseover="%1$s = true">
					<div class="text-gray-600 group rounded-md inline-flex items-center text-base font-medium hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
						<span>%2$s</span>
						<svg class="text-gray-600 ml-1 h-5 w-5 group-hover:text-gray-900" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
							<path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
						</svg>
					</div>

					<div class="absolute z-10 -ml-4 transform transition duration-300 ease-in-out px-2 w-screen max-w-xs sm:px-0 lg:ml-0 lg:left-1/2 lg:-translate-x-1/2" :class="%1$s ? \'opacity-100 h-auto translate-y-0\' : \'opacity-0 h-0 overflow-hidden translate-y-2\'">
						<ul class="relative rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 overflow-hidden bg-white sm:p-4">%3$s</ul>
					</div>
				</div>
			</li>',
			esc_attr( $event_binder ),
			esc_html( $name ),
			implode( '', $subnav_items )
		);

		echo $output; // phpcs:ignore -- XSS OK
	}
endif;

if ( ! function_exists( 'srf_mobile_nav_item' ) ) :
	/**
	 * Outputs a link item for the main navigation.
	 *
	 * @param string $name The name for the nav link.
	 * @param string $data_item The variable name (JS) for the dropdown click binder - controlled by Alpine.
	 * @param array $subnav_items An array of function calls to srf_subnav_item to populate subnav list.
	 *
	 * TODO: Make this a little bit more flexible so we have the option to pass in a subnav or render as a single item.
	 */
	function srf_mobile_nav_item( $name, $data_item, $subnav_items ) {
		$output = sprintf(
			'<li class="bg-white" x-data="mobileDropdown(%1$s)">
				<h3
				@click="handleClick()"
				class="flex flex-row justify-between items-center font-semibold text-gray-600 p-4 cursor-pointer"
					>
					<span>%2$s</span>
					<svg xmlns="http://www.w3.org/2000/svg" :class="handleRotate()" class="h-6 w-6 text-srf-purple-500 transform transition-transform duration-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
					</svg>
				</h3>
				<ul
				x-ref="tab"
				:style="handleToggle()"
				class="overflow-hidden ml-4 max-h-0 duration-500 transition-all"
				>
					%3$s
				</ul>
			</li>',
			esc_attr( $data_item ),
			esc_html( $name ),
			implode( '', $subnav_items )
		);

		echo $output; // phpcs:ignore -- XSS OK
	}
endif;

if ( ! function_exists( 'srf_subnav_item' ) ) :
	/**
	 * Outputs a link item for the main navigation.
	 *
	 * @param string $name The name for the nav link.
	 * @param string $url The URL path for the nav link.
	 * @param boolean $is_mobile If the link is contained within the mobile nav.
	 * @param boolean $new_tab If the link should open in a new tab.
	 *
	 * @return string
	 */
	function srf_subnav_item( $name, $url, $is_mobile = false, $new_tab = false ) {
		$padding_classes = $is_mobile ? 'px-3 py-2' : 'p-3';
		$target          = $new_tab ? 'target="_blank" rel="noopener noreferrer"' : ''; // TODO: escape with wp_kses or similar.

		return '<li class="' . $padding_classes . ' rounded-lg hover:bg-gray-50"><a href="' . esc_url( $url ) . '" class="block text-base font-medium text-gray-900" ' . $target . '>' . esc_html( $name ) . '</a></li>';
	}
endif;

if ( ! function_exists( 'srf_subnav_heading' ) ) :
	/**
	 * Outputs a link item for the main navigation.
	 *
	 * @param string $name The name for the nav link.
	 */
	function srf_subnav_heading( $name ) {
		return '<h4 class="p-3 font-semibold text-srf-blue-500">' . esc_html( $name ) . '</h4>';
	}
endif;

if ( ! function_exists( 'srf_event_date' ) ) :
	/**
	 * Output for Event Dates.
	 *
	 * @output string
	 */
	function srf_event_date() {
		$meta_values = get_post_meta( get_the_ID(), 'event_date', true );

		// Bail early if no content has been added as footnotes.
		if ( empty( $meta_values ) ) {
			return;
		}

		echo '<time>' . date( 'l, F j, Y, ga', $meta_values ) . '</time>';
	}
endif;
