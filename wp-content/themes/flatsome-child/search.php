<?php
/**
 * The blog template file.
 *
 * @package          Flatsome\Templates
 * @flatsome-version 3.16.0
 */
get_header();

$s = get_search_query();

// Kiểm tra nếu từ khóa tìm kiếm rỗng hoặc ít hơn 3 ký tự
if (empty($s) || strlen($s) < 3) {
    $total_results = 0;
    $query_product = null;
    $query_post = null;
    $query_page = null;
} else {
    // Truy vấn sản phẩm
    $args_product = array(
        'post_type'      => 'product',
        'posts_per_page' => -1,
        'orderby'        => 'title',
        'order'          => 'ASC',
        's'              => $s,
        'post_status'    => 'publish'
    );
    $query_product = new WP_Query($args_product);

    // Truy vấn bài viết
    $args_post = array(
        'post_type'      => 'post',
        'posts_per_page' => -1,
        'orderby'        => 'title',
        'order'          => 'ASC',
        's'              => $s,
        'post_status'    => 'publish'
    );
    $query_post = new WP_Query($args_post);

    // Truy vấn trang
    $args_page = array(
        'post_type'      => 'page',
        'posts_per_page' => -1,
        'orderby'        => 'title',
        'order'          => 'ASC',
        's'              => $s,
        'post_status'    => 'publish'
    );
    $query_page = new WP_Query($args_page);

    // Tổng số kết quả
    $total_results = $query_product->found_posts + $query_post->found_posts + $query_page->found_posts;
}

?>
<section class="_8aoy section">
    <div class="section-bg fill"></div>
    <div class="section-content relative">
        <div class="_3prq row">
            <div class="col large-12 medium-12 small-12 RemovePaddingBottom">
                <div class="col-inner">
                    <div class="_7mzt">
                        <h2>Kết quả tìm kiếm cho: "<?php echo esc_html($s); ?>"</h2>
                    </div>
                    <div class="search-count">Tìm thấy <span><?php echo $total_results; ?></span> kết quả</div>
                    <div class="_7yzl list_search_result">
                        <?php if ($query_product->have_posts()) : ?>
                            <ul class="search-results product-results">
                                <?php while ($query_product->have_posts()) : $query_product->the_post(); ?>
                                    <li class="item product">
                                        <a class="_4nnm" href="<?php the_permalink(); ?>">
                                            <?php
                                            if (has_post_thumbnail()) {
                                                echo get_the_post_thumbnail();
                                            } else {
                                                echo '<img src="' . get_stylesheet_directory_uri() . '/img/image-plaholder.jpg" alt="Placeholder Image">';
                                            }
                                            ?>
                                        </a>

                                        <div class="_9lfn">
                                            <a href="<?php the_permalink(); ?>" class="_1hgo textLine-1"><?php the_title(); ?></a>
                                            <div class="_1srv type textLine-1">Sản phẩm - <?php the_permalink(); ?></div>
                                            <div class="_5khu textLine-3"><?php the_excerpt(); ?></div>
                                        </div>
                                    </li>
                                <?php endwhile; ?>
                            </ul>
                        <?php endif; ?>

                        <?php if ($query_post->have_posts()) : ?>
                            <ul class="search-results post-results">
                                <?php while ($query_post->have_posts()) : $query_post->the_post(); ?>
                                    <li class="item post">
                                        <a class="_4nnm" href="<?php the_permalink(); ?>">
                                            <?php
                                            if (has_post_thumbnail()) {
                                                echo get_the_post_thumbnail();
                                            } else {
                                                echo '<img src="' . get_stylesheet_directory_uri() . '/img/image-plaholder.jpg" alt="Placeholder Image">';
                                            }
                                            ?>
                                        </a>

                                        <div class="_9lfn">
                                            <a href="<?php the_permalink(); ?>" class="_1hgo textLine-1"><?php the_title(); ?></a>
                                            <div class="_1srv type textLine-1">Tin tức - <?php the_permalink(); ?></div>
                                            <div class="_5khu textLine-3"><?php the_excerpt(); ?></div>
                                        </div>
                                    </li>
                                <?php endwhile; ?>
                            </ul>
                        <?php endif; ?>

                        <?php if ($query_page->have_posts()) : ?>
                            <ul class="search-results page-results">
                                <?php while ($query_page->have_posts()) : $query_page->the_post(); ?>
                                    <li class="item page">
                                        <a class="_4nnm" href="<?php the_permalink(); ?>">
                                            <?php
                                            if (has_post_thumbnail()) {
                                                echo get_the_post_thumbnail();
                                            } else {
                                                echo '<img src="' . get_stylesheet_directory_uri() . '/img/image-plaholder.jpg" alt="Placeholder Image">';
                                            }
                                            ?>
                                        </a>

                                        <div class="_9lfn">
                                            <a href="<?php the_permalink(); ?>" class="_1hgo textLine-1"><?php the_title(); ?></a>
                                            <div class="_1srv type textLine-1">Trang - <?php the_permalink(); ?></div>
                                            <div class="_5khu textLine-3"><?php the_excerpt(); ?></div>
                                        </div>
                                    </li>
                                <?php endwhile; ?>
                            </ul>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
wp_reset_postdata();
get_footer();
?>