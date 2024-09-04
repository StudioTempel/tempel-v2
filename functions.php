<?php

require_once "inc/core.php";

function tmpl_disable_pages() : void
{
    if (is_tag() || is_category() || is_tax() || is_date() || is_author() || is_search()) {
        global $wp_query;
        $wp_query->set_404();
        status_header(404);
        get_template_part(404);
        exit();
    }
}
add_action('template_redirect', 'tmpl_disable_pages');

/**
 * Enqueue scripts and styles with automatic versioning based on file modification time
 * Files enqueued with the 'wp_enqueue_script' hook to prevent loading on admin pages
 */
function tmpl_scripts() : void
{
    wp_enqueue_style('tmpl-swiper', get_theme_file_uri('/dist/vendor/swiper.min.css'), [], filemtime(get_theme_file_path('/dist/vendor/swiper.min.css')));
    wp_enqueue_style('tmpl-main', get_theme_file_uri('/dist/css/parent-styles.min.css'), [], filemtime(get_theme_file_path('/dist/css/styles.min.css')));
    
    wp_enqueue_script('tmpl-cookie', get_theme_file_uri('/dist/vendor/js-cookie.min.js'), array('jquery'), filemtime(get_theme_file_path('/dist/vendor/js-cookie.min.js')), true);
    wp_enqueue_script('tmpl-swiper', get_theme_file_uri('/dist/vendor/swiper.min.js'), array('jquery'), filemtime(get_theme_file_path('/dist/vendor/swiper.min.js')), true);
    wp_enqueue_script('tmpl-main', get_theme_file_uri('/dist/js/parent-scripts.min.js'), array('jquery'), filemtime(get_theme_file_path('/dist/js/scripts.min.js')), true);
    
    wp_localize_script('main', 'ajaxurl', admin_url('admin-ajax.php'));
}
add_action('wp_enqueue_scripts', 'tmpl_scripts', 10);

if(!function_exists('tmpl_setup')) {
    function tmpl_setup() : void
    {
        // Load text domain
        load_theme_textdomain(LANG_KEY, get_template_directory() . '/languages');
        
        // Editor styles
        add_theme_support('editor-styles');
        add_editor_style('dist/css/editor-styles.min.css');
        
        // Admin bar styling
        add_theme_support( 'admin-bar', array( 'callback' => '__return_false' ) );
        
        // Add feed links
        add_theme_support( 'automatic-feed-links' );
        
        // Add body open hook
        add_theme_support( 'body-open' );
        
        // Remove block templates
        remove_theme_support( 'block-templates' );
        
        // Have WordPress manage the document title
        add_theme_support( 'title-tag' );
        
        // Add support for post thumbnails (uitgelichte afbeelding)
        add_theme_support( 'post-thumbnails' );
        
        // Add support for custom logo
        add_theme_support('custom-logo');
        
        // Have WordPress output the HTML5 versions of these elements
        add_theme_support(
            'html5',
            [
                'search-form',
                'comment-form',
                'comment-list',
                'gallery',
                'caption',
                'script',
                'style',
            ]
        );
        
        // Make embeds responsive
        add_theme_support( 'responsive-embeds' );
        
        // Register Theme Menus
        register_nav_menus([
            'top' => __('Top menu', LANG_KEY),
//            'big' => __('Groot menu', LANG_KEY),
            'footer' => __('Footer menu', LANG_KEY),
        ]);
        
        // Register Sidebars
//        register_sidebar([
//            'name' => __('Sidebar', LANG_KEY),
//            'id' => 'sidebar',
//            'description' => __('Widgets in deze sidebar worden getoond op de blogpagina.', LANG_KEY),
//            'before_widget' => '<section id="%1$s" class="widget %2$s">',
//            'after_widget' => '</section>',
//            'before_title' => '<h2 class="widget-title">',
//            'after_title' => '</h2>',
//        ]);
    }
}
add_action('after_setup_theme', 'tmpl_setup');



