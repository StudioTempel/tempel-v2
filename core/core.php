<?php

namespace Tempel;

require_once "plugin_overrides.php";
require_once "defines.php";

use Tempel\TempelPluginOverrides;

if(!class_exists('TempelCore')) {
    class TempelCore {
        
        public function __construct()
        {
            
            add_action('after_setup_theme', array($this, 'theme_supports'));
            
            add_action('init', array($this, 'register_menus'));
            
            add_action('init', array($this, 'plugin_overrides'));
            
            add_action('admin_init', array($this, 'remove_color_scheme_selector'));
            
            add_filter('pre_get_posts', array($this, 'search_query_empty_redirect'));
            
            add_filter('nav_menu_css_class', array($this, 'add_menu_item_state_classes'), 10, 2);
            
            add_action('user_register', array($this, 'set_default_admin_color'));
            
            add_action('init', array($this, 'remove_default_editor'));
            
            add_action('wp_enqueue_scripts', array($this, 'dequeue_block_library_css'));
            
            add_action('admin_init', array($this, 'add_tinymce_styles'));
            
            add_filter('admin_footer_text',array($this, 'overwrite_footer_message'));
            
            add_action('init', array($this, 'init_acf_options_page'));
            
            new TempelPluginOverrides();
        }
        
        public function theme_supports() {
            
            // Add support for post thumbnails (uitgelichte afbeelding)
            add_theme_support('post-thumbnails');
            
            add_theme_support('title-tag');
            
            add_theme_support('html5', array(
                'search-form',
                'comment-form',
                'comment-list',
                'gallery',
                'caption',
            ));
            
            add_theme_support('custom-logo');
        }
        
        public function register_menus() {
            // Add WordPress menu locations for the theme.
            register_nav_menus(array(
                'top' => __('Top menu', LANG_KEY),
                'big' => __('Groot menu', LANG_KEY),
                'footer' => __('Footer menu', LANG_KEY),
            ));
        }
        
        public function plugin_overrides() {
            // Move all Yoast SEO metaboxes to the bottom of the page
            add_filter('wpseo_metabox_prio', function () {
                return 'low';
            });
        }
        
        public function search_query_empty_redirect($query) {
            //Filter the search query in order to find out if the query string was empty. If so, don't redirect to home but redirect to a search result page.
            if (isset($_GET['s']) && empty($_GET['s']) && $query->is_main_query()) {
                $query->is_search = true;
                $query->is_home = false;
            }
            return $query;
        }
        
        public function add_menu_item_state_classes($classes, $item)
        {
            $activeState1 = ($item->menu_item_parent == 0 && in_array('current-menu-item', $classes));
            $activeState2 = ($item->menu_item_parent == 0 && in_array('current-page-ancestor', $classes));
            
            if ($activeState1 || $activeState2) {
                $classes[] = "active";
            }
            return $classes;
        }
        
        public function remove_color_scheme_selector() {
            if (is_admin()) {
                remove_action("admin_color_scheme_picker", "admin_color_scheme_picker");
            }
        }
        
        public function set_default_admin_color($user_id)
        {
            $args = array(
                'ID' => $user_id,
                'admin_color' => 'Midnight'
            );
            wp_update_user($args);
        }
        
        public function remove_default_editor()
        {
            remove_post_type_support('post', 'editor');
            remove_post_type_support('page', 'editor');
        }
        
        public function dequeue_block_library_css()
        {
            wp_dequeue_style('wp-block-library');
            wp_dequeue_style('wp-block-library-theme');
            wp_dequeue_style('wc-block-style'); // Remove WooCommerce block CSS
        }
        
        public function add_tinymce_styles() {
            add_editor_style($stylesheet = 'includes/mce.css');
        }
        
        function overwrite_footer_message()
        {
            echo '<span id="footer-thankyou">Tempel thema door <a href="http://www.studiotempel.nl" target="_blank">Studio Tempel</a></span>';
        }
        
        public function init_acf_options_page() {
            //Add the ACF options page, we almost always use it
            if( function_exists('acf_add_options_page') ) {
                acf_add_options_page(array(
                    'page_title' 	=> 'Algemeen',
                    'menu_title'	=> 'Algemeen',
                    'menu_slug' 	=> 'theme-general-settings',
                    'capability'	=> 'edit_posts',
                    'redirect'		=> false
                ));
            }
        }
    }
    
    new TempelCore();
}
