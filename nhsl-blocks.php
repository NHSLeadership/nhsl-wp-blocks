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

    // register a dashboard group
    acf_register_block_type(array(
        'name' => 'dashboard-group',
        'title' => __('Dashboard Links'),
        'description' => __('An NHS Styled group of dashboard links with images.'),
        'render_callback' => 'nhsl_acf_block_render_callback',
        'category' => 'nhs-elements',
        'icon' => 'forms',
        'keywords' => array('dashboard', 'links', 'panel', 'homepage', 'navigation'),
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
