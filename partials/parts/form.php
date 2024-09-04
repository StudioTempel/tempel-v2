<?php
$default_args = [
    'form' => '',
];

if ($args ?? null) $args = array_merge($default_args, $args);

$id = $args['form'];
?>

<?php if($id && function_exists('gravity_form')): ?>
    <div class="form">
        <?php gravity_form($id, false, false, false, '', true, 1); ?>
    </div>
<?php endif; ?>


