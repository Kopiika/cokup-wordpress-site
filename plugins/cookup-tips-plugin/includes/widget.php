<?php
class Cooking_Tips_Widget extends WP_Widget {
  function __construct() {
    parent::__construct('cooking_tips_widget', 'Cooking Tips Widget');
  }

  function widget($args, $instance) {
    echo $args['before_widget'];
    echo $args['before_title'] . 'Cooking Tips' . $args['after_title'];
    echo do_shortcode('[cooking_tips count="3" type="random"]');
    echo $args['after_widget'];
  }
}

add_action('widgets_init', function() {
  register_widget('Cooking_Tips_Widget');
});