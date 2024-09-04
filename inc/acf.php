<?php

namespace Tempel\ACF;

/**
 * Register Options Page
 */
function register_options_page() {
    if ( function_exists( 'acf_add_options_page' ) ) {
        acf_add_options_page(
            [
                'page_title'      => __( 'Site Options', LANG_KEY ),
                'menu_title'      => __( 'Site Options', LANG_KEY ),
                'menu_slug'       => 'site-options',
                'icon_url'        => 'dashicons-admin-generic',
                'capability'      => 'edit_posts',
                'update_button'   => __( 'Update', LANG_KEY ),
                'updated_message' => __( 'Options Updated', LANG_KEY ),
            ]
        );
    }
}
add_action( 'init', __NAMESPACE__ . '\\register_options_page' );