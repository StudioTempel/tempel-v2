<?php

/**
 * Echoes the breadcrumbs
 *
 * @return void
 */
function tmpl_breadcrumbs()
{
    if (function_exists('yoast_breadcrumb')) {
        yoast_breadcrumb('<p id="breadcrumbs">', '</p>');
    }
}

/**
 * Removes the Yoast Wincher widget from the dashboard
 *
 * @see https://developer.wordpress.org/reference/hooks/wp_dashboard_setup/
 *
 * @return void
 */
function tmpl_remove_wincher_widget(): void
{
    remove_meta_box('wpseo-wincher-dashboard-overview', 'dashboard', 'normal');
}
add_action('wp_dashboard_setup', 'tmpl_remove_wincher_widget', 999);

/**
 * Moves the Yoast SEO Meta Boxes to the bottom of the editor
 *
 * @return void
 */
function tmpl_move_yoast_boxes(): void
{
    add_filter('wpseo_metabox_prio', function () {
        return 'low';
    });
}
add_action('init', 'tmpl_move_yoast_boxes', 999);