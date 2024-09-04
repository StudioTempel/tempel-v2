<?php global $block;
$tabs = $block['tabs'] ?? null
?>

<?php if($tabs && is_array($tabs)): ?>
    <section class="tabs">
        <div class="container">
            <ul class="tabs--navigation">
                <?php foreach ($tabs as $index => $tab): ?>
                    <?php partial('parts/tabs/tab-navigation-item', ['title' => $tab['title'], 'index' => $index]); ?>
                <?php endforeach; ?>
            </ul>
            <div class="tabs--items">
                <?php foreach ($tabs as $index => $tab): ?>
                    <?php partial('parts/tabs/tab-item', ['text' => $tab['text'], 'index' => $index]); ?>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
<?php endif; ?>
