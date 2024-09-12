<?php
$size_class = apply_filters('nav_desktop_width', 'full');
?>
<nav id="nav-desktop" class="navigation" role="navigation">
    <div class="container <?= $size_class; ?>">
        <a href="<?php echo home_url(); ?>" class="brand">
            <?php partial('svg/logo'); ?>
        </a>
        <div class="menu">
            <?php
            $defaults = array(
                'theme_location' => 'top',
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
            <?php partial('parts/search'); ?>
        </div>
    </div>
</nav>