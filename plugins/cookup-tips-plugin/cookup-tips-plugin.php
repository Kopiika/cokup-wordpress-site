<?php
/**
 * Plugin Name: Cooking Tips Plugin
 * Description: Adds a "Cooking Tips" custom post type with a widget and shortcode to display them.
 * Version: 1.0
 * Author: Eleonora Kopiika
 */

if (!defined('ABSPATH')) exit; 

require_once plugin_dir_path(__FILE__) . 'includes/cpt.php';
require_once plugin_dir_path(__FILE__) . 'includes/meta-box.php';
require_once plugin_dir_path(__FILE__) . 'includes/shortcode.php';
require_once plugin_dir_path(__FILE__) . 'includes/widget.php';

function cookup_tips_enqueue_styles() {
	wp_enqueue_style('cookup-tips-style', plugin_dir_url(__FILE__) . 'css/style.css');
}
add_action('wp_enqueue_scripts', 'cookup_tips_enqueue_styles');