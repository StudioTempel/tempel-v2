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
<?php if ($title): ?>
    <?php tempel_tabs_nav_before(); ?>
    <li class="tab--navigation-item <?= $class; ?>" data-tab="tab-<?= $index; ?>">
        <?php tempel_tabs_nav_top(); ?>
        <?= $title ?>
        <?php tempel_tabs_nav_bottom(); ?>
    </li>
    <?php tempel_tabs_nav_after(); ?>
<?php endif; ?>
