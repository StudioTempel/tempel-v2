<?php global $block;
$class = '';
$layout = $block['layout'] ?? '';
$size = $block['size'] ?? '';
?>
<section class="text-image <?= $class; ?>">
    <div class="container">
        <?php if ($layout == 'text-image') {
            partial('parts/text');
            partial('parts/image');
        } else if ($layout == 'image-text') {
            partial('parts/image');
            partial('parts/text');
        } ?>
    </div>
</section>