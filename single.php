<?php get_header(); $type = get_post_type(); ?>

<header style="background: url('<?php echo the_post_thumbnail_url('full'); ?>') center no-repeat;">
    
    <div class="container">
        <article>
            <a href="<?php echo get_post_type_archive_link($type); ?>" class="return">Terug naar overzicht</a>
            
            <h1><?php echo the_title(); ?></h1>
    </div>
    </article>

</header>
<section class="text">
    <div class="container">
        <article>
            <p class="meta"><?php echo get_the_date(); ?></p>
            <?php if (have_posts()): while (have_posts()): the_post(); ?>
                <?php echo the_content(); ?>
            <?php endwhile; endif; ?>
        </article>
    </div>
</section>
<section class="more-posts">
    <div class="container">
        <article>
            <h2>Meer  <?php echo $type ?></h2>
        </article>
        <div class="post-slider">
            <div class="swiper-wrapper">
                <?php
                
                $args = array(
                    'post_type' => $type,
                    'post__not_in' => array(get_the_ID())
                );
                $query = new WP_Query($args);
                ?>
                <?php if ( $query->have_posts() ) { ?>
                    
                    
                    <?php while ($query->have_posts()) {
                        $query->the_post(); ?>
                        <div class="swiper-slide">
                            <a href="<?php echo the_permalink(); ?>" class="post">
                                
                                <div class="thumb">
                                    <?php echo the_post_thumbnail('large'); ?>
                                </div>
                                <span class="meta">
                            <?php echo get_the_date(); ?>
                        </span>
                                <h3><?php echo the_title(); ?></h3>
                            </a>
                        </div>
                    <?php }
                } else { ?>
                    <article>
                        <h3>Geen berichten gevonden</h3>
                    </article>
                <?php }
                ?>
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>
