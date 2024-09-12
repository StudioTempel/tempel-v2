<?php
$default_args = [
    'title' => '',
    'content' => '',
    'index' => 0
];

if ($args ?? null) $args = array_merge($default_args, $args);

$title = $args['title'];
$text = $args['text'];
$index = $args['index'];
?>

<?php if($title && $text): ?>
<?php tempel_accordion_item_before(); ?>
<div class="accordion-item" data-accordion="accordion-<?= $index; ?>">
    <?php tempel_accordion_item_top(); ?>
    <div class="accordion-item--header">
        <h3><?= $title; ?></h3>
        <span class="accordion-item--icon"></span>
    </div>
    <div class="accordion-item--content">
        <?= $text; ?>
    </div>
    <?php tempel_accordion_item_bottom(); ?>
</div>
<?php tempel_accordion_item_after(); ?>
<?php endif; ?>
