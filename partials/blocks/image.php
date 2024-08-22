<?php global $block;
$class = '';
$layout = $block['layout'] ?? '';
$size = $block['size'] ?? '';
?>
<section class="image <?= $class; ?>">
    <div class="container">
        <?php partial('parts/image'); ?>
    </div>
</section>