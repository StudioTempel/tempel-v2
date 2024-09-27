<?php

namespace Tempel;

/**
 *
 * Generates a post loop
 *
 * @param string $post_type
 * @param string $partial
 * @param string $page_method 'pagination', 'infinite-scroll', 'load-more'
 * @param int $posts_per_page
 * @return void
 *
 */
function post_loop(string $post_type, string $partial, string $page_method = 'pagination', int $posts_per_page = 6): void
{
    
    if($page_method === 'load-more' || $page_method === 'infinite-scroll') {
        $posts_per_page = -1;
    }
    
    $args = [
        'post_type' => $post_type,
        'posts_per_page' => $posts_per_page,
    ];
    
    if ($page_method === 'pagination') {
        $args['paged'] = get_query_var('paged') ? get_query_var('paged') : 1;
    }
    
    
    
    $query = new \WP_Query($args);
    
    if ($query->have_posts()) {
        
        echo '<div data-method="' . $page_method . '" class="post-loop-container">';
        echo '<div class="post-loop">';
        
        foreach ($query->posts as $post) {
            partial('parts/' . $partial, ['post' => $post]);
        }
        
        echo '</div>';
        
        ?>
        <div class="nothing-found-wrapper row-center">
            <div class="nothing-found">
                <h2 class="h3">Geen resultaten gevonden</h2>
                <button class="clear-filters post-loop-button">Herstel filters</button>
            </div>
        </div>
        <?php
        
        switch ($page_method):
            case 'pagination':
                ?>
                <div class="pagination-wrapper row-center">
                    <nav class="pagination">
                        <?php
                        echo paginate_links([
                            'total' => $query->max_num_pages,
                            'type' => 'list',
                            'prev_next' => false,
                            'mid_size' => 2,
                        ]);
                        ?>
                    </nav>
                </div>
                <?php
                break;
            case 'infinite-scroll':
                ?>
                <div class="infinite-scroll row-center">
                    <?php do_action('tempel_post_loop_loader'); ?>
                </div>
                <?php
                break;
            case 'load-more':
                ?>
                <div class="load-more row-center">
                    <button class="post-loop-button" id="button-load-more">Laad meer berichten</button>
                </div>
                <?php
                break;
            default:
                ?>
                <p class="error">Invalid Page Method</p>
                <?php
                break;
        endswitch;
        
        echo '</div>';
    }
}

add_action('tempel_post_loop_loader', function () {
    ?>
    <?php partial('svg/loader'); ?>
    <?php
});

add_filter('paginate_links_output', function ($output) {
    // Replace the dots with a custom string or HTML
    $output = str_replace('&hellip;', '<span class="line"></span>', $output);
    
    return $output;
});