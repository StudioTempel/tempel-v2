<?php
add_action('tha_header_before', 'header_bg_image');
function header_bg_image()
{
    if (has_post_thumbnail()):
        $size = 'full';
        if (wp_is_mobile()) $size = 'medium';
        ?>
        <div class="header-background-image">
            <?php the_post_thumbnail($size); ?>
        </div>
    <?php endif;
}

add_action('tempel_header', 'header_markup');
function header_markup()
{
    $header_text = get_field('header_text');
    $header_link = get_field('header_link');
    ?>
    
    <?php if ($header_text): ?>
        <article>
            <?php part('breadcrumbs'); ?>
            <?= $header_text; ?>
            <?php
            if ($header_link) {
                partial('parts/button', ['link' => $header_link['url'], 'title' => $header_link['title'], 'target' => $header_link['target'], 'class' => 'button--header']);
            }
            ?>
        </article>
    <?php endif;
}

