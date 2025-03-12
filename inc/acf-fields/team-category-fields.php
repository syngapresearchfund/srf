<?php
/**
 * ACF Field Group: Team Category Fields
 *
 * @package SRF
 */

if (function_exists('acf_add_local_field_group')):

    acf_add_local_field_group(array(
        'key' => 'group_team_category_fields',
        'title' => 'Team Category Fields',
        'fields' => array(
            array(
                'key' => 'field_team_intro_text',
                'label' => 'Introduction Text',
                'name' => 'team_intro_text',
                'type' => 'wysiwyg',
                'instructions' => 'Add introduction text for this team category.',
                'required' => 0,
            ),
            array(
                'key' => 'field_team_category_logo',
                'label' => 'Team Category Logo',
                'name' => 'team_category_logo',
                'type' => 'image',
                'instructions' => 'Upload a logo specific to this team category (optional).',
                'required' => 0,
                'return_format' => 'array',
                'preview_size' => 'medium',
                'library' => 'all',
            ),
            array(
                'key' => 'field_team_after_content',
                'label' => 'After Content',
                'name' => 'team_after_content',
                'type' => 'wysiwyg',
                'instructions' => 'Add content to display after the team members grid.',
                'required' => 0,
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'taxonomy',
                    'operator' => '==',
                    'value' => 'srf-team-category',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => true,
        'description' => '',
        'show_in_rest' => 0,
    ));

endif;
