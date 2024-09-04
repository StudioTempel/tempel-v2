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
<div class="accordion-item" data-accordion="accordion-<?= $index; ?>">
    <div class="accordion-item--header">
        <h3><?= $title; ?></h3>
        <span class="accordion-item--icon"></span>
    </div>
    <div class="accordion-item--content">
        <?= $text; ?>
    </div>
</div>
<?php endif; ?>
