<?php

require_once '../../../wp-load.php';

// $wf_items = file_get_contents( '_resources/webflow-collections/JSON/SRF-Blog-Categories.json' );
$wf_items = file_get_contents( '_resources/webflow-collections/JSON/SRF-Blog-Posts.json' );
$item_array = json_decode( $wf_items, true);

// var_dump( $item_array );

foreach ( $item_array as $key => $value ) {
	// echo $item_array[$key]['Name'] . "\n";

	// wp_insert_term(
	// 	$item_array[$key]['Name'],
	// 	'category',
	// 	array(
	// 		'description' => $item_array[$key]['Description'],
	// 		'slug' => $item_array[$key]['Slug'],
	// 	)
	// );

	$formatted_date = strtotime( substr( $item_array[$key]['Published On'], 0, -29 ) );

	$post_args = array(
		'post_author'   => 1,
		'post_date' => date( 'Y-m-d H:i:s', $formatted_date ),
		'post_title'    => $item_array[$key]['Name'],
		'post_name'    => $item_array[$key]['Slug'],
		'post_content'  => $item_array[$key]['Post Body'],
		// 'post_category' => array( 5 ),
		'comment_status' => 'closed',
		'ping_status' => 'closed',
		'post_status' => 'publish',
		'post_type' => 'post',
	);

	wp_insert_post( $post_args );
}