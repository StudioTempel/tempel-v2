<?php

namespace Tempel;

if(!class_exists('TempelPluginOverrides')) {
    class TempelPluginOverrides
    {
        
        public function __construct()
        {
            add_action('wp_dashboard_setup', array($this, 'remove_yoast_wincher_widget'));
            add_action('init', array($this, 'move_yoast_seo_meta_box'));
        }
        
        /**
         *
         * Remove the Yoast Wincher widget from the dashboard
         *
         */
        public function remove_yoast_wincher_widget()
        {
            remove_meta_box('wpseo-wincher-dashboard-overview', 'dashboard', 'normal');
        }
        
        /**
         *
         * Moves the Yoast SEO Meta Boxes to the bottom of the editor
         *
         */
        public function move_yoast_seo_meta_box()
        {
            add_filter('wpseo_metabox_prio', function () {
                return 'low';
            });
        }
    }
}