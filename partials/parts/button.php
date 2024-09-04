<?php
$default_args = [
    'link' => '',
    'title' => '',
    'target' => '_self',
    'class' => '',
];

if($args ?? null) {
    $args = array_merge($default_args, $args);
}

$link = $args['link'];
$title = $args['title'];
$target = $args['target'];
$class = $args['class'];
?>

<?php if ($link): ?>
    <a href="<?= $link; ?>" target="<?= $target; ?>" class="button <?= $class; ?>"><?= $title; ?></a>
<?php endif; ?>

