<?php
$default_args = [
    'text' => '',
    'index' => 0
];


if ($args ?? null) $args = array_merge($default_args, $args);

$text = $args['text'];
$index = $args['index'];
$class = '';

if ($index === 0) {
    $class = 'active';
}
?>

<?php if($text): ?>
<?php tempel_tabs_item_before(); ?>
<div class="tab-item <?= $class; ?>" data-tab="tab-<?= $index; ?>">
    <?php tempel_tabs_item_top(); ?>
    <?= $text ?>
    <?php tempel_tabs_item_bottom(); ?>
</div>
<?php tempel_tabs_item_after(); ?>
<?php endif; ?>
