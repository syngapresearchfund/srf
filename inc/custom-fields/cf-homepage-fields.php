<?php
/**
 * Custom Fields for Event Dates.
 *
 * @since 2023-10-05 First docBlock
 * @package SRF
 */

// namespace SRF;

function srf_homepage_fields() {
	/**
	 * Initialize Custom Fields
	 */
	if (is_admin() && isset($_GET['post'])) {
        $post_id = $_GET['post']; // Get the current post ID
        $front_page_id = get_option('page_on_front'); // Get the front page ID

        // Check if the current post is the front page
        if ($post_id !== $front_page_id) {
            return;
        }
    }

	$homepage_announcement = new Fieldmanager_RichTextArea( array(
		'name' => 'homepage_announcement',
        'buttons_1' => array( 'bold', 'italic', 'link' ),
        'buttons_2' => array(),
        'editor_settings' => array(
            'quicktags' => false,
            'media_buttons' => false,
        ),
	) );

	$homepage_announcement->add_meta_box( esc_html__( 'Homepage Announcement', 'srf' ), 'page' );
}
add_action( 'fm_post_page', 'srf_homepage_fields' );
