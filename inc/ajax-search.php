<?php

add_action('wp_ajax_ajax_search', 'tmpl_ajax_search');
add_action('wp_ajax_nopriv_ajax_search', 'tmpl_ajax_search');
function tmpl_ajax_search() : void
{
    if (!isset($_GET['query']) || empty($_GET['query'])) {
        wp_send_json_error('Invalid query parameter');
    }
    
    $query = sanitize_text_field($_GET['query']);
    
    $args = array(
        's' => $query,
        'posts_per_page' => 5,
    );
    
    $search_query = new \WP_Query($args);
    
    if ($search_query->have_posts()) {
        echo '<ul>';
        while ($search_query->have_posts()) {
            $search_query->the_post();
            echo '<li><a href="' . get_permalink() . '">' . get_the_title() . '</a></li>';
        }
        echo '</ul>';
    } else {
        echo '<p>No results found</p>';
    }
    
    wp_reset_postdata();
    wp_die();
}       