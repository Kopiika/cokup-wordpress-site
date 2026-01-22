<?php

// Standard theme functions

function cookup_theme_setup() {
    // Automatic <title> tag
    add_theme_support('title-tag');

    // Featured Image support
    add_theme_support('post-thumbnails');

    // HTML5 markup for the search form
    add_theme_support('html5', array('search-form'));
}
add_action('after_setup_theme', 'cookup_theme_setup');


// Menu

function cookup_register_menus() {
    register_nav_menus([
        'main-menu' => __('Main Menu', 'cookup'),
    ]);
}
add_action('init', 'cookup_register_menus');


// Enqueuing styles and scripts

function cookup_assets() {
    wp_enqueue_style('style', get_stylesheet_uri());
    wp_enqueue_script(
        'cookup-script',
        get_template_directory_uri() . '/js/cookup.js',
        array('jquery'),
        '1.0.0',
        true
    );
}
add_action('wp_enqueue_scripts', 'cookup_assets');


// Custom Post Type for subscriptions

function cookup_subscribers_cpt() {
    $labels = [
        'name' => 'Subscribers',
        'singular_name' => 'Subscriber',
        'menu_name' => 'Subscribers',
        'add_new_item' => 'Add New Subscriber',
        'edit_item' => 'Edit Subscriber',
        'view_item' => 'View Subscriber',
    ];

    $args = [
        'labels' => $labels,
        'public' => false,
        'show_ui' => true,
        'show_in_menu' => true,
        'capability_type' => 'post',
        'supports' => ['title'],
        'menu_icon' => 'dashicons-email',
    ];

    register_post_type('subscriber', $args);
}
add_action('init', 'cookup_subscribers_cpt');


// Font Awesome for icons

function cookup_load_fontawesome() {
    wp_enqueue_style(
        'font-awesome',
        'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css',
        [],
        '6.5.0'
    );
}
add_action('wp_enqueue_scripts', 'cookup_load_fontawesome');


// Search posts by title (for the Recipes page)

function recipes_search_filter($query) {
    if ($query->is_main_query() && !is_admin()) {
        if (is_page() && get_page_template_slug(get_queried_object_id()) === 'page-recipes.php') {
            $search_term = isset($_GET['s']) ? sanitize_text_field($_GET['s']) : '';
            if (!empty($search_term)) {
                // Limit the search to standard posts only
                $query->set('post_type', 'post');
            }
        }
    }
}
add_action('pre_get_posts', 'recipes_search_filter');
