<?php
$default_args = [
    'item' => [],
];

if($args ?? null) {
    $args = array_merge($default_args, $args);
}

$title = $args['item']['title'] ?? '';
$text = $args['item']['text'] ?? '';
?>

<li>
    <h3><?= $title; ?></h3>
    <p><?= $text; ?></p>
</li>