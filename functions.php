<?php

namespace Tempel;


require_once "core/core.php";

use Tempel\TempelCore;

if (!class_exists('Tempel')) {
    class Tempel
    {

        public function __construct()
        {
            add_action('template_redirect', [$this, 'disable_unwanted_pages']);
            add_action('init', [$this, 'enqueue_files']);
            add_action('wp_ajax_nopriv_ajax_search', [$this, 'ajax_search']);
            add_action('wp_ajax_ajax_search', [$this, 'ajax_search']);
            new TempelCore();
        }

        /**
         * Return a 404 on all Tag, Category, Taxonomy, Date, Author and Search pages
         */
        public function disable_unwanted_pages()
        {
            if (is_tag() || is_category() || is_tax() || is_date() || is_author() || is_search()) {
                global $wp_query;
                $wp_query->set_404();
                status_header(404);
                get_template_part(404);
                exit();
            }
        }

        function ajax_search()
        {
            if (!isset($_GET['query']) || empty($_GET['query'])) {
                wp_send_json_error('Invalid query parameter');
            }

            $query = sanitize_text_field($_GET['query']);

            $args = array(
                's' => $query,
                'posts_per_page' => 5,
            );

            $search_query = new WP_Query($args);

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

        function enqueue_files()
        {
            error_log('enqueue_files function is being called.');
            if (!is_admin()) {
                wp_enqueue_style('swiper', VENDOR_URL . '/swiper.min.css', null, CSS_VERSION);
                wp_enqueue_style('main', CSS_URL . '/styles.min.css', null, CSS_VERSION);
                wp_enqueue_script('cookie', VENDOR_URL . '/js-cookie.min.js', array('jquery'), JS_VERSION, true);
                wp_enqueue_script('swiper', VENDOR_URL . '/swiper.min.js', array('jquery'), JS_VERSION, true);
                wp_enqueue_script('main', JS_URL . '/scripts.min.js', array('jquery'), JS_VERSION, true);
            }
        }


    }

    new Tempel();
}









