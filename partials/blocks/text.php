<?php global $block;
$layout = $block['layout'] ?? 'text';
$position = $block['position'] ?? 'left';
$class = $layout . ' ' . $position;
$id = '';

$class = apply_filters('tmpl_block_text_class', $class, '');
?>
<section class="<?= $class; ?>">
    <?php do_action('text_before'); ?>
    <div class="container">
        <?php layout($layout, $block); ?>
    </div>
    <?php do_action('text_after'); ?>
</section>
