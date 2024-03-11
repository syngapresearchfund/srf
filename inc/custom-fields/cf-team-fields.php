<?php
/**
 * Custom Fields for Event Dates.
 *
 * @since 2023-10-05 First docBlock
 * @package SRF
 */

// namespace SRF;

function srf_team_fields() {
	/**
	 * Initialize Custom Fields
	 */
	$state_rep = new Fieldmanager_Select( array(
		'name'  => 'state_rep',
		'label' => esc_html__( 'State Representative', 'srf' ),
	) );
	$state_advocate = new Fieldmanager_Select( array(
		'name'  => 'state_advocate',
		'label' => esc_html__( 'State Advocate', 'srf' ),
	) );


	// $event_dates->add_meta_box( esc_html__( 'Event Date', 'srf' ), 'srf-team' );
}
// TODO: Uncomment this line to add the custom fields to the team post type.
// add_action( 'fm_post_srf-team', 'srf_team_fields' );
