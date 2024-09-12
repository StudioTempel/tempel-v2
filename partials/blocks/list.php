<?php global $block;
$list = $block['list'] ?? [];

$class = 'list';
$class = apply_filters('tmpl_block_list_class', $class);
?>
<?php tempel_list_before(); ?>
<section class="<?= $class; ?>">
    <?php tempel_list_top(); ?>
    <div class="container">
        <?php if ($list && is_array($list)): ?>
            <ul>
                <?php foreach ($list as $item): ?>
                    <?php partial('parts/list-item', ['item' => $item]); ?>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    </div>
    <?php tempel_list_bottom(); ?>
</section>
<?php tempel_list_after(); ?>
