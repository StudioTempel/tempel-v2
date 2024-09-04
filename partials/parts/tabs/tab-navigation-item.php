<?php
$default_args = [
    'title' => '',
    'index' => 0
];


if ($args ?? null) $args = array_merge($default_args, $args);

$title = $args['title'];
$index = $args['index'];
$class = '';

if ($index === 0) {
    $class = 'active';
}
?>
<?php if($title): ?>
<li class="tab--navigation-item <?= $class; ?>" data-tab="tab-<?= $index; ?>">
    <?= $title ?>
</li>
<?php endif; ?>
