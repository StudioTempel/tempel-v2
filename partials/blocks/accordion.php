<?php global $block;
$accordion = $block['accordion'] ?? null;
?>
<?php if($accordion && is_array($accordion)): ?>
    <section class="accordion">
        <div class="container">
            <div class="accordion--items">
                <?php foreach ($accordion as $index => $item): ?>
                    <?php partial('parts/accordion/accordion-item', ['title' => $item['title'], 'text' => $item['text'], 'index' => $index]); ?>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
<?php endif; ?>
