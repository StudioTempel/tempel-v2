<?php

function tmpl_footer_markup()
{
    ?>
    <?php $footer_text = get_field('footer_text', 'option');
    if ($footer_text) {
        echo '<article>' . $footer_text . '</article>';
    } ?>
    <article class="navigation">
        <?php
        $defaults = array(
            'theme_location' => 'footer',
            'menu' => '',
            'container' => false,
            'container_class' => '',
            'container_id' => '',
            'menu_class' => '',
            'menu_id' => '',
            'echo' => true,
            'fallback_cb' => 'wp_page_menu',
            'before' => '',
            'after' => '',
            'link_before' => '',
            'link_after' => '',
            'items_wrap' => '<ul id="%1$s">%3$s</ul>',
            'depth' => 0,
            'walker' => ''
        );
        wp_nav_menu($defaults);
        ?>
    </article>
    <article>
        <?php partial('parts/socials'); ?>
    </article>
    <article>
        <?php partial('parts/builtby'); ?>
    </article>
    <?php
}
add_action('tmpl_footer', 'tmpl_footer_markup');