<?php get_header(); ?>

<?php partial('parts/search'); ?>
<?php if (have_posts()): while (have_posts()): the_post(); ?>
    <a href="<?php echo get_permalink(); ?>"><?php echo get_the_title(); ?></a>
<?php endwhile; endif; ?>
<?php get_footer(); ?>