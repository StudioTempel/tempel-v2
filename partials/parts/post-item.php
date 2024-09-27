<?php
if($args) {
    $post = $args['post'];
}
?>
<article class="post">
    <a href="">
        <div class="thumbnail">
            <?= get_the_post_thumbnail($post); ?>
        </div>
        <div class="post-content">
            <time datetime="<?php echo get_the_date('Y-m-d', $post); ?>"><?php echo get_the_date('d F Y', $post); ?></time>
            <h2 class="h4"><?= get_the_title($post); ?></h2>
        </div>
    </a>
</article>