<?php global $block;
$list = $block['list'] ?? [];
?>
<section class="list">
    <div class="container">
        <?php if ($list && is_array($list)): ?>
            <ul>
                <?php foreach ($list as $item): ?>
                    <?php partial('parts/list-item', ['item' => $item]); ?>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    </div>
</section>
