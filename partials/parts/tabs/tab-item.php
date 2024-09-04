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
<div class="tab-item <?= $class; ?>" data-tab="tab-<?= $index; ?>">
    <?= $text ?>
</div>
<?php endif; ?>
