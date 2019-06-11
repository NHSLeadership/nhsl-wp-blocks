<?php
/**
 * Plugin Name: NHS Leadership Academy Blocks for Gutenburg
 * Pre-Requisites: WordPress 5 or higher running Gutenburg. ACF Pro 5.8+
 * Plugin URI: https://github.com/NHSLeadership/nhsl-wp-blocks
 * Description: Custom Blocks for Gutenburg to align with NHSL Nightingale theme
 * Version: 1.1.3
 * Author: Tony Blacker, NHS Leadership Academy
 * Author URI: https://leadershipacademy.nhs.uk
 */

function register_acf_block_types()
{


    // register a testimonial block
    acf_register_block_type(array(
        'name' => 'testimonial',
        'title' => __('Testimonial'),
        'description' => __('An NHS custom testimonial block.'),
        'render_callback' => 'nhsl_acf_block_render_callback',
        'category' => 'nhs-elements',
        'icon' => 'format-quote',
        'keywords' => array('testimonial', 'quote'),
    ));
    // register an information card
    acf_register_block_type(array(
        'name' => 'information_card',
        'title' => __('Information card'),
        'description' => __('An NHS solid top bordered box with a call to action or important information.'),
        'render_callback' => 'nhsl_acf_block_render_callback',
        'category' => 'nhs-elements',
        'icon' => 'feedback',
        'keywords' => array('card', 'info', 'information'),
    ));
    // register a button
    acf_register_block_type(array(
        'name' => 'button',
        'title' => __('Button'),
        'description' => __('An NHS Styled button.'),
        'render_callback' => 'nhsl_acf_block_render_callback',
        'category' => 'nhs-elements',
        'icon' => 'admin-links',
        'keywords' => array('button', 'link'),
    ));
    // register a reveal block
    acf_register_block_type(array(
        'name' => 'reveal',
        'title' => __('Reveal'),
        'description' => __('An NHS Styled reveal section.'),
        'render_callback' => 'nhsl_acf_block_render_callback',
        'category' => 'nhs-elements',
        'icon' => 'arrow-down-alt2',
        'keywords' => array('reveal', 'dropdown', 'expand'),
    ));
    // register a do / dont block
    acf_register_block_type(array(
        'name' => 'do-dont-list',
        'title' => __('List of Dos or Donts'),
        'description' => __('An NHS Styled list of things to do or not to do.'),
        'render_callback' => 'nhsl_acf_block_render_callback',
        'category' => 'nhs-elements',
        'icon' => 'yes',
        'keywords' => array('list', 'do', 'dont'),
    ));
    // register a promo block
    acf_register_block_type(array(
        'name' => 'promo',
        'title' => __('Call out Box'),
        'description' => __('An NHS Styled promo / highlight box.'),
        'render_callback' => 'nhsl_acf_block_render_callback',
        'category' => 'nhs-elements',
        'icon' => 'tag',
        'keywords' => array('promo', 'panel', 'highlight', 'message'),
    ));
    // register a promo group
    acf_register_block_type(array(
        'name' => 'promo-group',
        'title' => __('Grouped Call out Boxes'),
        'description' => __('An NHS Styled group of promo / highlight boxes.'),
        'render_callback' => 'nhsl_acf_block_render_callback',
        'category' => 'nhs-elements',
        'icon' => 'forms',
        'keywords' => array('group', 'promo', 'panel', 'highlight', 'message'),
    ));
    // register a panel block
    acf_register_block_type(array(
        'name' => 'panel',
        'title' => __('Panel Element'),
        'description' => __('An NHS Styled panel box.'),
        'render_callback' => 'nhsl_acf_block_render_callback',
        'category' => 'nhs-elements',
        'icon' => 'tag',
        'keywords' => array( 'panel', 'element', 'subtle'),
    ));

    // register a group of panel blocks
    acf_register_block_type(array(
        'name' => 'panel-group',
        'title' => __('Grouped Panel Element'),
        'description' => __('An NHS Styled group of panel boxes.'),
        'render_callback' => 'nhsl_acf_block_render_callback',
        'category' => 'nhs-elements',
        'icon' => 'welcome-widgets-menus',
        'keywords' => array( 'panels', 'elements', 'group'),
    ));

}

// Check if function exists and hook into setup.
if (function_exists('acf_register_block_type')) {
    add_action('acf/init', 'register_acf_block_types');
}

function nhsl_acf_block_render_callback($block)
{
    // convert name ("acf/testimonial") into path friendly slug ("testimonial")
    $slug = str_replace('acf/', '', $block['name']);
    // include a template part from within the "template-parts/block" folder
    if (file_exists(plugin_dir_path(__FILE__) . "/blocks/content-{$slug}.php")) {
        include(plugin_dir_path(__FILE__) . "/blocks/content-{$slug}.php");
    }
}

//register a block category for the ACF blocks
function nhsl_acf_block_categories($categories, $post)
{
    /*if ( $post->post_type !== 'post' ) {
        return $categories;
    }*/
    return array_merge(
        $categories,
        array(
            array(
                'slug' => 'nhs-elements',
                'title' => __('NHS Block Elements', 'nhsl_blocks'),
            ),
        )
    );
}

add_filter('block_categories', 'nhsl_acf_block_categories', 10, 2);

add_filter('acf/settings/save_json', 'nhsl_acf_json_save_point');

function nhsl_acf_json_save_point( $path ) {
    $path = plugin_dir_path(__FILE__) . '/acf-json';
    return $path;

}
add_filter('acf/settings/load_json', 'nhsl_acf_json_load_point');

function nhsl_acf_json_load_point( $paths ) {
    unset($paths[0]);
    $paths[] = plugin_dir_path(__FILE__) . '/acf-json';
    return $paths;

}

if (function_exists('acf_add_local_field_group')):

    acf_add_local_field_group(array(
        'key' => 'group_5cf7f43cd000b',
        'title' => 'Button',
        'fields' => array(
            array(
                'key' => 'field_5cf7f46d57f17',
                'label' => 'Button Text',
                'name' => 'text',
                'type' => 'text',
                'instructions' => 'The text you would like to show on the button',
                'required' => 1,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_5cf7f4a857f18',
                'label' => 'Button Link',
                'name' => 'link',
                'type' => 'link',
                'instructions' => '',
                'required' => 1,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'return_format' => 'url',
            ),
            array(
                'key' => 'field_5cf7f4c157f19',
                'label' => 'Button width',
                'name' => 'width',
                'type' => 'radio',
                'instructions' => 'Would you like this button to be full width, or just the size of the text?',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'choices' => array(
                    'full' => 'Full Width',
                    'natural' => 'Size of Text',
                ),
                'allow_null' => 0,
                'other_choice' => 0,
                'default_value' => 'full',
                'layout' => 'vertical',
                'return_format' => 'value',
                'save_other_choice' => 0,
            ),
            array(
                'key' => 'field_5cf7f56557f1a',
                'label' => 'Button Colour',
                'name' => 'colour',
                'type' => 'radio',
                'instructions' => 'Would you like the button to be Blue (standard), Green (call to action) or white (secondary)',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'choices' => array(
                    'primary' => 'Blue',
                    'submit' => 'Green',
                    'secondary' => 'White',
                ),
                'allow_null' => 1,
                'other_choice' => 0,
                'default_value' => 'primary',
                'layout' => 'vertical',
                'return_format' => 'value',
                'save_other_choice' => 0,
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'block',
                    'operator' => '==',
                    'value' => 'acf/button',
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
    ));

    acf_add_local_field_group(array(
        'key' => 'group_5cf7edc91b08d',
        'title' => 'Information Card',
        'fields' => array(
            array(
                'key' => 'field_5cf7edd839d3e',
                'label' => 'Title',
                'name' => 'title',
                'type' => 'text',
                'instructions' => 'Title for info card',
                'required' => 1,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_5cf7ef4f39d3f',
                'label' => 'Body',
                'name' => 'body',
                'type' => 'wysiwyg',
                'instructions' => 'Text to show within the info card',
                'required' => 1,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'tabs' => 'all',
                'toolbar' => 'full',
                'media_upload' => 1,
                'delay' => 0,
            ),
            array(
                'key' => 'field_5cf7ef6a39d40',
                'label' => 'Call to action text',
                'name' => 'button_text',
                'type' => 'text',
                'instructions' => 'Label for the button to click',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_5cf7ef8b39d41',
                'label' => 'Call to action link',
                'name' => 'call_to_action_link',
                'type' => 'link',
                'instructions' => 'The link where you wish the user to go when they click the call to action button',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'return_format' => 'url',
            ),
            array(
                'key' => 'field_5cf7efc639d42',
                'label' => 'Width',
                'name' => 'width',
                'type' => 'number',
                'instructions' => 'How wide do you wish this box to be? 12 = full width, 6 = half width, 4 = third width, 3 = quarter width',
                'required' => 1,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => 12,
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'min' => 1,
                'max' => 12,
                'step' => 1,
            ),
            array(
                'key' => 'field_5cf7f00f39d43',
                'label' => 'Box Type',
                'name' => 'box_type',
                'type' => 'radio',
                'instructions' => 'What would you like this box to display as? Normal = blue border, Alert = red border',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'choices' => array(
                    'information' => 'Normal',
                    'alert' => 'Alert',
                ),
                'allow_null' => 1,
                'other_choice' => 0,
                'default_value' => 'information',
                'layout' => 'vertical',
                'return_format' => 'value',
                'save_other_choice' => 0,
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'block',
                    'operator' => '==',
                    'value' => 'acf/information-card',
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
    ));

    acf_add_local_field_group(array(
        'key' => 'group_5cf8e26ebd88b',
        'title' => 'Reveal',
        'fields' => array(
            array(
                'key' => 'field_5cf8e3333873e',
                'label' => 'Title',
                'name' => 'title',
                'type' => 'text',
                'instructions' => '',
                'required' => 1,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_5cf8e39e3873f',
                'label' => 'Content',
                'name' => 'content',
                'type' => 'textarea',
                'instructions' => '',
                'required' => 1,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => '',
                'maxlength' => '',
                'rows' => '',
                'new_lines' => '',
            ),
            array(
                'key' => 'field_5cf8e3e338740',
                'label' => 'Start Opened?',
                'name' => 'open',
                'type' => 'true_false',
                'instructions' => 'Would you like this element to initially show as opened (tick), or closed (unticked)?',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'message' => '',
                'default_value' => 0,
                'ui' => 0,
                'ui_on_text' => '',
                'ui_off_text' => '',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'block',
                    'operator' => '==',
                    'value' => 'acf/reveal',
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
    ));

    acf_add_local_field_group(array(
        'key' => 'group_5cf7e56739fb9',
        'title' => 'Testimonial',
        'fields' => array(
            array(
                'key' => 'field_5cf7e5b94e616',
                'label' => 'Invert?',
                'name' => 'invert',
                'type' => 'true_false',
                'instructions' => 'If false, the quote will be normal text on white background. If true, this will be a purple highlighted box with white text',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'message' => '',
                'default_value' => 0,
                'ui' => 0,
                'ui_on_text' => '',
                'ui_off_text' => '',
            ),
            array(
                'key' => 'field_5cf7e5e44e617',
                'label' => 'Quote',
                'name' => 'quote',
                'type' => 'textarea',
                'instructions' => 'Full snippet of quoted text',
                'required' => 1,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => '',
                'maxlength' => '',
                'rows' => '',
                'new_lines' => '',
            ),
            array(
                'key' => 'field_5cf7e5ff4e618',
                'label' => 'Name',
                'name' => 'name',
                'type' => 'text',
                'instructions' => 'Name of author / person to whom quote is attributed',
                'required' => 1,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_5cf7e6154e619',
                'label' => 'Role',
                'name' => 'role',
                'type' => 'text',
                'instructions' => 'Job Title or Role of person being quoted',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_5cf7e62a4e61a',
                'label' => 'Organisation',
                'name' => 'organisation',
                'type' => 'text',
                'instructions' => 'Organisation person being quoted belongs to',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'maxlength' => '',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'block',
                    'operator' => '==',
                    'value' => 'acf/testimonial',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'seamless',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => true,
        'description' => '',
    ));

endif;
