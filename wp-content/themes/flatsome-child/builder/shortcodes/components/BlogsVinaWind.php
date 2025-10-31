<?php

function BlogsVinaWind($atts, $content)
{
    extract(shortcode_atts(array(
        'cat' => '',
        'offset' => 0,
        'count' => 6,
        'label' => '',
        'style' => 'post',
        'post_type' => 'post',
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
        <div class="item-product center-flex headding-category">
            <?php echo do_shortcode($content); ?>
            <?php
            if ($style == 'post') { ?>
                <div class="_9kid">
                    <?php if ($label != '') { ?>
                        <?php if ($post_type == 'idea-bank') { ?>
                            <a href="<?php echo get_post_type_archive_link('idea-bank'); ?>" class="button-flex myButton">
                                <span><?php echo $label; ?></span>
                            </a>
                        <?php } else { ?>
                            <a href="<?php echo esc_url(get_term_link($category)); ?>" class="button-flex myButton">
                                <span><?php echo $label; ?></span>
                            </a>
                        <?php } ?>
                    <?php } ?>
                </div>
            <?php } else { ?>
                <div class="_9hvu">
                    <a href="<?php echo esc_url(get_term_link($category)); ?>" class="_5nvr">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/video-youtube.png">
                    </a>
                </div>
            <?php } ?>
        </div>
        <div class="ListBlogsVinaWind">
            <?php
            $args = array(
                'post_type' => $post_type,
                'tax_query' => $post_type == 'idea-bank' ? array() : array(
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

                    <div class="_9nuk">
                        <div class="_9ozo <?php echo 'style-' . $style; ?>">
                            <a href="<?php the_permalink(); ?>" class="_5oau block">
                                <?php
                                // Lấy ảnh đại diện của bài viết
                                if (has_post_thumbnail()) {
                                    the_post_thumbnail('full'); // Kích thước có thể là 'thumbnail', 'medium', 'large', hoặc 'full'
                                } else {
                                    echo '<img src="' . home_url() . '/wp-content/uploads/woocommerce-placeholder.png" alt="Default Thumbnail">';
                                }
                                if ($style == 'video') { ?>
                                    <div class="_0ltz">
                                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/play_icon.png" class="_4gpv">
                                    </div>
                                <?php } ?>
                            </a>
                        </div>
                        <div class="_8npm">
                            <div class="_3dqv">
                                <a href="<?php the_permalink(); ?>" class="_4wxo textLine-2"><?php the_title(); ?></a>
                            </div>
                            <div class="_4nmk textLine-2"><?php echo get_field('thuc_trang'); ?></div>
                        </div>
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
