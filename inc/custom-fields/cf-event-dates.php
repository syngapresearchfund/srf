<?php
/**
 * Custom Fields for Event Dates.
 *
 * @since 2023-10-05 First docBlock
 * @package SRF
 */

// namespace SRF;

function srf_event_date_fields() {
	/**
	 * Initialize Custom Fields
	 */
	$event_dates = new Fieldmanager_Datepicker( array(
		'name' => 'event_date',
		'label'    => esc_html__( 'Choose date & time', 'srf' ),
		'use_time' => true,
	) );


	$event_dates->add_meta_box( esc_html__( 'Event Date', 'srf' ), 'srf-events' );
	$event_dates->add_meta_box( esc_html__( 'Event Date', 'srf' ), 'srf-resources' );
}
add_action( 'fm_post_srf-events', 'srf_event_date_fields' );
add_action( 'fm_post_srf-resources', 'srf_event_date_fields' );
