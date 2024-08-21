<?php

namespace Tempel;

require_once "core/core.php";

use Tempel\TempelCore;

if(!class_exists('Tempel')) {
    class Tempel
    {
        
        public function __construct()
        {
            add_action('template_redirect', [$this, 'disable_unwanted_pages']);
            
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
    }
}