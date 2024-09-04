<?php get_header(); $type = get_post_type(); ?>
<header>
    <div class="container">
        <article>
            <h1><?php echo post_type_archive_title('', false); ?></h1>
        </article>
    </div>
</header>
<section class="posts">
    <div class="container">
        
        <?php
        
        $args = array(
            'post_type' => $type,
            'paged' => $paged,
            'posts_per_page' => 10,
        );
        
        $query = new WP_Query($args);
        ?>
        <?php if ( $query->have_posts() ) { ?>
            <?php while ($query->have_posts()) {
                $query->the_post(); ?>
                <article>
                    <a href="<?php echo the_permalink(); ?>" class="post">
                        
                        <div class="thumb">
                            <?php echo the_post_thumbnail('large'); ?>
                        </div>
                        <span class="meta">
                            <?php echo get_the_date(); ?>
                        </span>
                        <h3><?php echo the_title(); ?></h3>
                    </a>
                </article>
            <?php }
        } else { ?>
            <article>
                <h3>Geen berichten gevonden</h3>
            </article>
        <?php }
        echo numeric_posts_nav();
        ?>
    </div>
</section>

<?php get_footer(); ?>
