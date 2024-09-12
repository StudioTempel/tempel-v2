<?php

/**
 *  Return a template from the partials folder with optional arguments
 *
 * @param $partial string The name of the partial template without the file extension
 * @param array|null $args array Optional arguments to pass to the template
 * @return void
 * @since 1.0.0
 *
 */
function partial(string $partial, array $args = null): void
{
    $template = locate_template('partials/' . $partial . '.php', false, true, $args);
    
    if ($template) include($template); else echo 'Partial not found: ' . $partial;
}

/**
 * More specific partial function for parts
 *
 * @param $partial
 * @param $args
 * @return void
 * @see partial
 *
 * @since 1.0.0
 *
 */
function part($partial, $args = null): void
{
    $template = locate_template('partials/parts/' . $partial . '.php', false, true, $args);
    
    if ($template) include($template); else echo 'Part not found: ' . $partial;
}

/**
 * More specific partial function for svg
 *
 * @param $partial
 * @return void
 * @since 1.0.0
 *
 * @see partial
 *
 */
function svg($partial)
{
    $template = locate_template('partials/svg/' . $partial . '.php', false, true);
    
    if ($template) include($template); else echo 'SVG not found: ' . $partial;
}

function get_image($image, $size = 'full', $size_mobile = 'medium', $class = null, $alt = null): void
{
    if ($image) {
        if (is_int($image)) {
            $image = wp_get_attachment_image($image, $size, false, ['class' => $class, 'alt' => $alt]);
            if(wp_is_mobile()) $image = wp_get_attachment_image($image, $size_mobile, false, ['class' => $class, 'alt' => $alt]);
            
            echo $image;
        } else {
            echo 'Provide an image ID';
        }
    }
}

/**
 * Builds and echos pagination for the current query
 *
 * @return void
 * @since 1.0.0
 *
 */
function numeric_posts_nav(): void
{
    if (is_singular())
        return;
    global $wp_query;
    /** Stop execution if there's only 1 page */
    if ($wp_query->max_num_pages <= 1) {
        echo "<script>console.log('Just enough post items for 1 page');</script>";
        return;
    }
    $paged = get_query_var('paged') ? absint(get_query_var('paged')) : 1;
    $max = intval($wp_query->max_num_pages);
    /** Add current page to the array */
    if ($paged >= 1)
        $links[] = $paged;
    /** Add the pages around the current page to the array */
    if ($paged >= 3) {
        $links[] = $paged - 1;
        $links[] = $paged - 2;
    }
    if (($paged + 2) <= $max) {
        $links[] = $paged + 2;
        $links[] = $paged + 1;
    }
    echo '<div class="pagination"><ul>' . "\n";
    /** Link to first page, plus ellipses if necessary */
    if (!in_array(1, $links)) {
        $class = 1 == $paged ? ' class="active"' : '';
        printf('<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url(get_pagenum_link(1)), '1');
        if (!in_array(2, $links))
            echo '<li class="no-follow">…</li>';
    }
    /** Link to current page, plus 2 pages in either direction if necessary */
    sort($links);
    foreach ((array)$links as $link) {
        $class = $paged == $link ? ' class="active"' : '';
        printf('<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url(get_pagenum_link($link)), $link);
    }
    /** Link to last page, plus ellipses if necessary */
    if (!in_array($max, $links)) {
        if (!in_array($max - 1, $links))
            echo '<li class="no-follow">…</li>' . "\n";
        $class = $paged == $max ? ' class="active"' : '';
        printf('<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url(get_pagenum_link($max)), $max);
    }
    echo '</ul></div>' . "\n";
}

/**
 * Includes parts based on the layout of the block
 *
 * @since 1.0.0
 *
 * @param $layout
 * @param $block
 * @return void
 */
function layout($layout, $block): void
{
    
    // Check if the layout has multiple parts separated by a hyphen
    if (strpos($layout, '-') !== false) {
        
        // get the parts of the layout
        $layout = explode('-', $layout);
        
        if (is_array($layout)) {
            // loop through the parts
            foreach ($layout as $l) {
                // get block data
                $field = $block[$l] ?? null;
                
                if ($field) {
                    // include the partial
                    partial('parts/' . $l, $field);
                }
            }
        }
    } else {
        // when the layout has only one part, include the partial
        $field = $block[$layout] ?? null;
        partial('parts/' . $layout, $field);
    }
}

function get_acf_field($field, $post_id = null)
{
    if (function_exists('get_field')) {
        return get_field($field, $post_id);
    }
    return null;
}

function get_acf_option($field)
{
    if (function_exists('get_field')) {
        return get_field($field, 'option');
    }
    return null;
}

function get_acf_image($field, $size = 'full', $size_mobile = 'large', $class = null, $alt = null)
{
    $image = get_acf_field($field);
    get_image($image, $size, $size_mobile, $class, $alt);
}

function tempel_form($form_id, $title = false, $description = false, $ajax = true) {
    if (function_exists('gravity_form')) {
        gravity_form($form_id, $title, $description, false, '', $ajax, 0);
    }
}
