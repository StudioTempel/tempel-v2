<?php part('navigation/nav-desktop'); ?>
<?php if (wp_is_mobile()): ?>
    <?php part('navigation/nav-mobile'); ?>
    <?php part('navigation/nav-big'); ?>
<?php endif; ?>
