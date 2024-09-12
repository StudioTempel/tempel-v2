<?php

require THEME_PATH . '/vendor/autoload.php';
use YahnisElsts\PluginUpdateChecker\v5\PucFactory;

$tempel_update_checker = PucFactory::buildUpdateChecker(
    'https://github.com/StudioTempel/tempel-v2',
    THEME_PATH,
    'tempel-v2'
);

$tempel_update_checker->getVcsApi()->enableReleaseAssets();