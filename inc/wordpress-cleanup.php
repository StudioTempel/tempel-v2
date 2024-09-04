<?php

/**
 * Add custom meta tags to the header
 *
 * @return void
 */
function tmpl_header_meta_tags()
{
    echo '<meta charset="' . esc_attr(get_bloginfo('charset')) . '">';
    echo '<meta name="viewport" content="width=device-width, initial-scale=1">';
    echo '<link rel="profile" href="http://gmpg.org/xfn/11">';
    echo '<link rel="pingback" href="' . esc_url(get_bloginfo('pingback_url')) . '">';
}

add_action('wp_head', 'tmpl_header_meta_tags');

/**
 * Adds custom body classes
 *
 * @param array $classes
 *
 * @return array
 */
function tmpl_extra_body_classes(array $classes): array
{
    return $classes;
}
add_action('body_class', 'tmpl_extra_body_classes');

/**
 * Remove body classes not allowed in the whitelist
 *
 * @see https://developer.wordpress.org/reference/hooks/body_class/
 *
 * @param $classes
 * @return array
 */
function tmpl_clean_body_classes($classes)
{
    $allowed_classes = [
        'singular',
        'single',
        'page',
        'archive',
        'home',
        'search',
        'admin-bar',
        'logged-in',
        'wp-embed-responsive',
    ];
    
    return array_intersect($classes, $allowed_classes);
}
add_filter('body_class', 'tmpl_clean_body_classes');


/**
 * Cleanup nav menu classes
 *
 * @see https://developer.wordpress.org/reference/hooks/nav_menu_css_class/
 *
 * @param $classes
 * @param $menu_item
 * @param $args
 * @return mixed
 */
function tmpl_clean_nav_menu_classes($classes, $menu_item, $args): mixed
{
    if (!is_array($classes)) {
        return $classes;
    }
    
    foreach ($classes as $i => $class) {
        
        // Remove class with menu item id.
        $id = strtok($class, 'menu-item-');
        if (0 < intval($id)) {
            unset($classes[$i]);
        }
        
        // Remove menu-item-type-*.
        if (false !== strpos($class, 'menu-item-type-')) {
            unset($classes[$i]);
        }
        
        // Remove menu-item-object-*.
        if (false !== strpos($class, 'menu-item-object-')) {
            unset($classes[$i]);
        }
        
        // Change page ancestor to menu ancestor.
        if ('current-page-ancestor' === $class) {
            $classes[] = 'current-menu-ancestor';
            unset($classes[$i]);
        }
    }
    
    // Remove submenu class if depth is limited.
    if ( isset( $args->depth ) && 1 === $args->depth ) {
        $classes = array_diff( $classes, array( 'menu-item-has-children' ) );
    }
    
    return $classes;
}
add_filter('nav_menu_css_class', 'tmpl_clean_nav_menu_classes', 5, 3);

/**
 * Cleanup post classes
 *
 * @see https://developer.wordpress.org/reference/hooks/post_class/
 *
 * @param $classes
 * @return mixed
 */
function tmpl_clean_post_classes( $classes ) : mixed {
    if(!is_array($classes)) {
        return $classes;
    }
    
    $allowed_classes = [
        'entry',
        'type-' . get_post_type(),
    ];
    
    return array_intersect( $classes, $allowed_classes );
}
add_filter( 'post_class', 'tmpl_clean_post_classes' );

/**
 * Remove the archive title prefix
 *
 * @see https://developer.wordpress.org/reference/hooks/get_the_archive_title/
 *
 * @param $title
 * @return string
 */
function tmpl_archive_title_remove_prefix( $title ) {
    $title_pieces = explode( ': ', $title );
    if ( count( $title_pieces ) > 1 ) {
        unset( $title_pieces[0] );
        $title = join( ': ', $title_pieces );
    }
    return $title;
}
add_filter( 'get_the_archive_title', 'tmpl_archive_title_remove_prefix' );

/**
 * Change the archive url to the author's website
 *
 * @see https://developer.wordpress.org/reference/hooks/get_the_archive_description/
 *
 * @param $link
 * @param $author_id
 * @return string
 */
function tmpl_custom_author_url( $link, $author_id ) : string {
    $website = get_the_author_meta( 'user_url', $author_id );
    if ( ! empty( $website ) && false !== strpos( $website, home_url() ) ) {
        $link = esc_url_raw( $website );
    }
    return $link;
}
add_filter( 'author_link', 'tmpl_custom_author_url', 10, 2 );

/**
 * Custom excerpt more link
 *
 * @see https://developer.wordpress.org/reference/hooks/excerpt_more/
 *
 * @return string
 */
function tmpl_excerpt_more() : string {
    return '&hellip;';
}
add_filter( 'excerpt_more', 'tmpl_excerpt_more' );

/**
 * Add the max image width to the srcset
 *
 * @see https://developer.wordpress.org/reference/hooks/max_srcset_image_width/
 *
 * @param $max_width
 * @param $size_array
 * @return int
 */
function tmpl_max_srcset_width( $max_width, $size_array ) {
    return 2048;
}
add_filter( 'max_srcset_image_width', 'tmpl_max_srcset_width', 10, 2 );

//function tmpl_default_image_sizes( $sizes, $size, $image_src, $image_meta, $attachment_id ) {
//
//    $layout = be_page_layout();
//    if ( 'full-width-content' === $layout ) {
//        return $sizes;
//    }
//
//    $content_width = $GLOBALS['content_width'];
//
//    if ( $size[0] > $content_width ) {
//        $sizes = esc_attr( '(max-width: ' . $content_width . 'px) 100vw, ' . $content_width . 'px' );
//    }
//
//    return $sizes;
//}
//add_filter( 'wp_calculate_image_sizes', 'tmpl_default_image_sizes', 10, 5 );

function tmpl_remove_color_schemes() {
    remove_action("admin_color_scheme_picker", "admin_color_scheme_picker");
}
add_action('admin_init', 'tmpl_remove_color_schemes');

function tmpl_force_admin_color($user_id) {
    $args = array(
        'ID' => $user_id,
        'admin_color' => 'Midnight'
    );
    wp_update_user($args);
}
add_action('user_register', 'tmpl_force_admin_color');

function tmpl_disable_default_editor() {
    remove_post_type_support('post', 'editor');
    remove_post_type_support('page', 'editor');
}
add_action('init', 'tmpl_disable_default_editor');

function tmpl_dequeue_block_library_css() {
    wp_dequeue_style('wp-block-library');
    wp_dequeue_style('wp-block-library-theme');
    
    // if wooCommerce is active then dequeue it's block styles
    if (class_exists('WooCommerce')) {
        wp_dequeue_style('wc-block-style');
    }
}
add_action('wp_enqueue_scripts', 'tmpl_dequeue_block_library_css');

//function search_query_empty_redirect($query) {
//    //Filter the search query in order to find out if the query string was empty. If so, don't redirect to home but redirect to a search result page.
//    if (isset($_GET['s']) && empty($_GET['s']) && $query->is_main_query()) {
//        $query->is_search = true;
//        $query->is_home = false;
//    }
//    return $query;
//}
//
//function add_menu_item_state_classes($classes, $item)
//{
//    $activeState1 = ($item->menu_item_parent == 0 && in_array('current-menu-item', $classes));
//    $activeState2 = ($item->menu_item_parent == 0 && in_array('current-page-ancestor', $classes));
//
//    if ($activeState1 || $activeState2) {
//        $classes[] = "active";
//    }
//    return $classes;
//}