<?php global $block; $class = 'accordion';
$accordion = $block['accordion'] ?? null;

$class = apply_filters('tmpl_block_accordion_class', $class);
?>
<?php if($accordion && is_array($accordion)): ?>
    <?php tempel_accordion_before(); ?>
    <section class="<?= $class; ?>">
        <?php tempel_accordion_top(); ?>
        <div class="container">
            <div class="accordion--items">
                <?php foreach ($accordion as $index => $item): ?>
                    <?php partial('parts/accordion/accordion-item', ['title' => $item['title'], 'text' => $item['text'], 'index' => $index]); ?>
                <?php endforeach; ?>
            </div>
        </div>
        <?php tempel_accordion_bottom(); ?>
    </section>
    <?php tempel_accordion_after(); ?>
<?php endif; ?>
