<?php
add_action('init', function() {
  register_post_type('cooking_tip', [
    'labels' => [
      'name' => 'Cooking Tips',
      'singular_name' => 'Cooking Tip',
      'add_new_item' => 'Add New Tip',
      'edit_item' => 'Edit Tip',
    ],
    'public' => true,
    'menu_icon' => 'dashicons-lightbulb',
    'supports' => ['title', 'editor', 'thumbnail'],
    'has_archive' => true,
    'show_in_rest' => true,
  ]);
});