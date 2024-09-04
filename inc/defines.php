<?php

// Define text domain
const LANG_KEY = 'tempel-textdomain';

// Define paths
// Not allowed to define as constant, so it will remain as a define()
define('THEME_URL', get_bloginfo('template_url'));
const ASSET_URL = THEME_URL . '/dist';
const INCLUDES_URL = THEME_URL . '/includes';
const VENDOR_URL = ASSET_URL . '/vendor';
const CSS_URL = ASSET_URL . '/css';
const JS_URL = ASSET_URL . '/js';
const IMG_URL = ASSET_URL . '/images';