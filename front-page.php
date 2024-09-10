<?php get_header();
global $post; ?>

<?php tha_content_before(); ?>

    <main id="main">
        <?php tha_content_top(); ?>
        
        <?php
        $blocks = get_field('blocks');
        if ($blocks):
            tha_content_while_before();
            foreach ($blocks as $block):
                $block['current_post'] = $post->ID;
                partial('blocks/' . $block['acf_fc_layout']);
            endforeach;
            tha_content_while_after();
        endif;
        ?>
        
        <?php tha_content_bottom(); ?>
    </main>

<?php tha_content_after(); ?>

<?php get_footer(); ?>