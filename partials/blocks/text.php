<?php global $block;
$layout = $block['layout'] ?? 'text';
$position = $block['position'] ?? 'left';
$class = $layout . ' ' . $position;
$id = '';

$class = apply_filters('tmpl_block_text_class', $class, '');
?>
<?php tempel_text_before(); ?>
<section class="<?= $class; ?>">
    <?php tempel_text_top(); ?>
    <div class="container">
        <?php layout($layout, $block); ?>
    </div>
    <?php tempel_text_bottom(); ?>
</section>
<?php tempel_text_after(); ?>