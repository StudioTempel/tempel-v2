<?php global $block;
$class = '';
$size = $block['size'] ?? '';
$image = $block['image'] ?? '';

add_action('image_markup', function ($image) {
    partial('parts/image', ['image' => $image]);
})

?>
<section class="image <?= $class; ?>">
    <?php do_action('image_before'); ?>
    <div class="container <?= $size; ?>">
        <?php do_action('image_markup', $image); ?>
    </div>
    <?php do_action('image_after'); ?>
</section>