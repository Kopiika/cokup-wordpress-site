<?php
// Shortcode for a list of tips (page Cooking Tips)
add_shortcode('cooking_tips', function($atts) {
    $atts = shortcode_atts([
        'count' => 3, 
        'type' => 'latest'
    ], $atts);

    $args = [
        'post_type' => 'cooking_tip',
        'posts_per_page' => $atts['count'],
    ];

    if ($atts['type'] === 'random') {
        $args['orderby'] = 'rand';
    } else {
        $args['orderby'] = 'date'; 
        $args['order'] = 'DESC';
    }

    $query = new WP_Query($args);
    ob_start();

    if ($query->have_posts()) {
        echo '<div class="cooking-tips">';
        while ($query->have_posts()) {
            $query->the_post();
            $author = get_post_meta(get_the_ID(), '_tip_author', true);
            echo '<div class="tip-card">';
            echo '<h3>' . get_the_title() . '</h3>';
            echo '<div class="tip-content">' . get_the_content() . '</div>';
            if ($author) {
                echo '<p class="tip-author"><em>By ' . esc_html($author) . '</em></p>';
            }
            echo '</div>';
        }
        echo '</div>';
    } else {
        echo '<p>No tips found.</p>';
    }

    wp_reset_postdata();
    return ob_get_clean();
});

// Shortcode for one block
add_shortcode('cooking_tip_block', function($atts) {
    $query = new WP_Query([
        'post_type' => 'cooking_tip',
        'posts_per_page' => 1,
        'orderby' => 'rand'
    ]);

    ob_start();

    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            $author = get_post_meta(get_the_ID(), '_tip_author', true);
            echo '<div class="cooking-tip-block">';
            echo '<p class="tip-content">' . get_the_content() . '</p>';
            if ($author) {
                echo '<p class="tip-author">— ' . esc_html($author) . '</p>';
            }
            echo '</div>';
        }
    }

    wp_reset_postdata();
    return ob_get_clean();
});
