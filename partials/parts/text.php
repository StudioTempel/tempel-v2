<?php
$default_args = [
    'text' => '',
];

if($args ?? null) {
    $args = array_merge($default_args, $args);
}

$text = $args['text'];
?>
<div class="text">
    <?= $text; ?>
</div>
