<?php tha_footer_before(); ?>
<footer>
    <?php tha_footer_top(); ?>
    <div class="container">
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
    </div>
    <?php tha_footer_bottom(); ?>
</footer>
<?php tha_footer_after(); ?>
</div>
<?php tha_body_bottom(); ?>
<?php wp_footer(); ?>
</body>
</html>
