<?php
/**
 * Security headers
 * https://securityheaders.com/
 */
// Strict-Transport-Security: https://scotthelme.co.uk/hsts-the-missing-link-in-tls/
header("Strict-Transport-Security: max-age=31536000; includeSubDomains");
// X-Frame-Options:  https://scotthelme.co.uk/hardening-your-http-response-headers/#x-frame-options
header("X-Frame-Options: SAMEORIGIN");
// X-Content-Type-Options: https://scotthelme.co.uk/hardening-your-http-response-headers/#x-content-type-options
header("X-Content-Type-Options: nosniff");
// Referrer-Policy: https://scotthelme.co.uk/a-new-security-header-referrer-policy/
header("Referrer-Policy: no-referrer-when-downgrade");
// Feature-Policy: https://scotthelme.co.uk/a-new-security-header-feature-policy/
header("Feature-Policy: geolocation 'none'; midi 'none'; notifications 'none'; push 'none'; sync-xhr 'none'; microphone 'none'; camera 'none'; magnetometer 'none'; gyroscope 'none'; speaker 'none'; vibrate 'none'; fullscreen 'none'; payment 'none';");
// Content-Security-Policy: https://scotthelme.co.uk/content-security-policy-an-introduction/
header("Content-Security-Policy: script-src 'self' 'unsafe-inline' https://cdn.cookielaw.org https://www.google.com https://www.gstatic.com https://use.typekit.net https://ajax.googleapis.com https://studiotempel.nl https://www.google-analytics.com https://cdn.jsdelivr.net; style-src 'self' 'unsafe-inline' https://code.jquery.com https://studiotempel.nl https://www.google.com https://www.gstatic.com https://fonts.googleapis.com; object-src 'none';");
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta name="author" content="Studio Tempel - Strategisch ontwerp- en internetbureau | studiotempel.nl">
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?php wp_title(); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php partial('blocks/navigation'); ?>
<?php //partial('blocks/header'); ?>


