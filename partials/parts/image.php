<?php
$default_args = [
    'image' => '',
];

if($args ?? null) {
    $args = array_merge($default_args, $args);
}

$image = $args['image'];
?>

<?php if (is_int($image)): ?>
<div class="image">
    <?= get_image($image); ?>
</div>
<?php endif; ?>
