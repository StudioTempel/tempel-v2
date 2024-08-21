<?php global $block;
$class = '';
$layout = $block['layout'];
$size = $block['size'];
?>
<section class="text <?= $class; ?>">
    <div class="container">
        <?php if ($layout == 'text') {
            // get text part
        } else if ($layout == 'text-form') {
            // get text part
            // get form part
        } else if ($layout == 'text-image') {
        } ?>

    </div>
</section>