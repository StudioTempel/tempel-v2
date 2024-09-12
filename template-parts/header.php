<?php add_action('tha_header_before', function () { ?>
    
    <?php if (has_post_thumbnail()):
        $size = 'full';
        if (wp_is_mobile()) $size = 'medium';
        ?>
        <div class="header-background-image">
            <?php the_post_thumbnail($size); ?>
        </div>
    <?php endif; ?>

<?php }, 10); ?>

<?php add_action('tempel_header', function () {
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
    <?php endif; ?>

<?php }, 10); ?>

<?php if (has_post_thumbnail()): ?>
    <?php tha_header_top(); ?>
    <header class="header">
        <?php tha_header_before(); ?>
        <div class="container">
            <?php tempel_header(); ?>
        </div>
        <?php tha_header_after(); ?>
    </header>
    <?php tha_header_bottom(); ?>
<?php endif; ?>
