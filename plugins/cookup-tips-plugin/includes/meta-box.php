<?php
add_action('add_meta_boxes', function() {
  add_meta_box('tip_author_box', 'Author of the Tip', 'tip_author_callback', 'cooking_tip');
});

function tip_author_callback($post) {
  $value = get_post_meta($post->ID, '_tip_author', true);
  echo '<input type="text" name="tip_author" value="' . esc_attr($value) . '" placeholder="e.g. Chef Anna" />';
}

add_action('save_post', function($post_id) {
  if (array_key_exists('tip_author', $_POST)) {
    update_post_meta($post_id, '_tip_author', sanitize_text_field($_POST['tip_author']));
  }
});