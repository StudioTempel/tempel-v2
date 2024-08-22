<nav class="top">
    <div class="container full">
        <a href="<?php echo home_url(); ?>" class="brand">
            <?php partial('svg/logo'); ?>
        </a>
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
        <a href="#" class="menu-trigger">
            <span class="line"></span>
        </a>
        <?php partial('parts/search'); ?>
    </div>
</nav>
<!---->
<!--<nav class="big">-->
<!--    <div class="container">-->
<!--        --><?php
//        $defaults = array(
//            'theme_location' => 'big',
//            'menu' => '',
//            'container' => false,
//            'container_class' => '',
//            'container_id' => '',
//            'menu_class' => '',
//            'menu_id' => '',
//            'echo' => true,
//            'fallback_cb' => 'wp_page_menu',
//            'before' => '',
//            'after' => '',
//            'link_before' => '',
//            'link_after' => '',
//            'items_wrap' => '<ul id="%1$s">%3$s</ul>',
//            'depth' => 0,
//            'walker' => ''
//        );
//        wp_nav_menu($defaults);
//        ?>
<!--    </div>-->
<!--</nav>-->