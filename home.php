<?php get_header(); ?>
<header class="archive">
    <div class="container">
        <article>
            <h1>Posts</h1>
        </article>
    </div>
</header>

<section class="archive">
    <div class="container">
    
        <div id="archive-filters" class="filters">
            <?php \Tempel\search_input(); ?>
        </div>
        
        <?php \Tempel\post_loop('post', 'post-item', 'infinite-scroll', 6); ?>
    </div>
</section>

<?php get_footer(); ?>

