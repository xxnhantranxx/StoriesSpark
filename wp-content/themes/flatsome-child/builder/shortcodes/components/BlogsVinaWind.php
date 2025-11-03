<?php

function BlogsVinaWind($atts, $content)
{
    extract(shortcode_atts(array(
        'cat' => '',
        'offset' => 0,
        'count' => 6,
    ), $atts));
    ob_start();

    $terms = get_terms(array(
        'taxonomy' => 'category',
        'hide_empty' => false, // để hiển thị cả những term không có bài viết nào
    ));
    $cat_ids = array();
    foreach ($terms as $term) {
        $cat_ids[] = $term->term_id;
    }
    if ($cat == '') {
        $cat =  $cat_ids;
    }

    $category = get_term($cat, 'category');
?>
    <div class="BlogsVinaWind">
        <div class="ListBlogsVinaWind">
            <?php
            $args = array(
                'post_type' => 'post',
                'tax_query' => array(
                    'relation' => 'AND',
                    array(
                        'taxonomy' => 'category',
                        'field' => 'id',
                        'terms' => $cat,
                    )
                ),
                'posts_per_page' => $count,
                'offset' => $offset,
                'order' => 'DESC',
                'orderby' => 'date',
            );
            $the_query = new WP_Query($args);

            // The Loop
            if ($the_query->have_posts()) :
                while ($the_query->have_posts()) : $the_query->the_post(); ?>
                    <div class="_2nmo">
                        <div class="_6kmd">
                            <?php if ( has_post_thumbnail() ) : ?>
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail('full'); ?>
                                </a>
                            <?php endif; ?>
                        </div>
                        <a class="_7pge textLine-2" href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a>
                        <div class="_8hhv"><?php echo get_the_date(); ?></div>
                        <div class="_6qtm textLine-5"><?php echo get_the_excerpt(); ?></div>
                    </div>
            <?php
                endwhile;
            endif;

            // Reset Post Data
            wp_reset_postdata();
            ?>
        </div>
    </div>
<?php

    $contentShortcode = ob_get_contents();
    ob_end_clean();
    return $contentShortcode;
}

add_shortcode('BlogsVinaWind', 'BlogsVinaWind');
