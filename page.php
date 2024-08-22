<?php get_header();
$blocks = get_field('blocks');
if ($blocks):
    foreach ($blocks as $block):
        $block['current_post'] = $post->ID;
        partial('blocks/' . $block['acf_fc_layout']);
    endforeach;
endif;
get_footer(); ?>