<?php global $block;
$tabs = $block['tabs'] ?? null;
$class = 'tabs';
$class = apply_filters('tmpl_block_tabs_class', $class);
?>

<?php if($tabs && is_array($tabs)): ?>
    <?php tempel_tabs_before(); ?>
    <section class="<?= $class; ?>">
        <?php tempel_tabs_top(); ?>
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
        <?php tempel_tabs_bottom(); ?>
    </section>
    <?php tempel_tabs_after(); ?>
<?php endif; ?>
