<?php global $block;
$class = 'image';
$size = $block['size'] ?? '';
$image = $block['image'] ?? '';

add_action('image_markup', function ($image) {
    partial('parts/image', ['image' => $image]);
});

$class = apply_filters('tmpl_block_image_class', $class);

?>
<?php tempel_image_before(); ?>
<section class="<?= $class; ?>">
    <?php tempel_image_top(); ?>
    <div class="container <?= $size; ?>">
        <?php do_action('image_markup', $image); ?>
    </div>
    <?php tempel_image_bottom(); ?>
</section>
<?php tempel_image_after(); ?>