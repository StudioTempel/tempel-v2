<?php
//namespace Tempel;

// css version
define('CSS_VERSION', '1.0.0');
// js version
define('JS_VERSION', '1.0.0');

//Directories
define('LANG_KEY', 'tempel');
define('THEME_URL', get_bloginfo('template_url'));
define('ASSET_URL', THEME_URL . '/dist');
define('INCLUDES_URL', THEME_URL . '/includes');
define('VENDOR_URL', ASSET_URL . '/vendor');
define('CSS_URL', ASSET_URL . '/css');
define('JS_URL', ASSET_URL . '/js');
define('IMG_URL', ASSET_URL . '/images');
define('OPTIONS_KEY', 'theme_options');