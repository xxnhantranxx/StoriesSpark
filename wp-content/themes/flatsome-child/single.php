<?php
/**
 * The blog template file.
 *
 * @package          Flatsome\Templates
 * @flatsome-version 3.16.0
 */

get_header('dark');

?>

<div id="content" class="blog-wrapper blog-single page-wrapper">
    <section class="section breadcrumb-category no-padding">
        <div class="bg section-bg fill bg-fill bg-loaded"></div>
        <div class="section-content relative">
            <div class="row row-small">
                <div class="col large-12 medium-12 small-12 RemovePaddingBottom">
                    <div class="col-inner">
                        <?php
                        if (function_exists('yoast_breadcrumb')) {
                            yoast_breadcrumb('<div class="breadcrumbs">', '</div>');
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
	<?php get_template_part( 'template-parts/posts/layout', get_theme_mod('blog_post_layout','right-sidebar') ); ?>
    <section class="section IdeaBankSection">
        <div class="section-bg fill"></div>
        <div class="section-content relative">
            <div class="dieters-pews row row-small">
                <div class="veals-mew col large-12 medium-12 small-12 RemovePaddingBottom">
                    <div class="col-inner">
                        <?php if (pll_current_language() == 'vi') { ?>
                            <div class="heading-category"><h2 class="_4nsl">Tin tức liên quan</h2></div>
                        <?php } else if (pll_current_language() == 'en') { ?>
                            <div class="heading-category"><h2 class="_4nsl">Related news</h2></div>
                        <?php } ?>
                    </div>
                </div>
                <div class="ListBankCol col large-12 medium-12 small-12 RemovePaddingBottom">
                    <div class="col-inner">
                        <div class="inner-list-idea">
                            <?php
                            // Lấy danh mục của bài viết hiện tại
                            $current_post_id = get_the_ID();
                            $categories = get_the_terms($current_post_id, 'category');
                            
                            if ($categories && !is_wp_error($categories)) {
                                // Lấy ID của các danh mục
                                $category_ids = wp_list_pluck($categories, 'term_id');
                                
                                // Thiết lập tham số truy vấn
                                $related_args = array(
                                    'post_type'      => 'post',
                                    'posts_per_page' => 3,
                                    'post__not_in'   => array($current_post_id),
                                    'tax_query'      => array(
                                        array(
                                            'taxonomy' => 'category',
                                            'field'    => 'term_id',
                                            'terms'    => $category_ids,
                                        ),
                                    ),
                                    'orderby'        => 'rand',
                                );
                                
                                // Thực hiện truy vấn
                                $related_query = new WP_Query($related_args);
                                
                                // Hiển thị bài viết liên quan
                                if ($related_query->have_posts()) :
                                    while ($related_query->have_posts()) : $related_query->the_post();
                                        $thumbnail = get_the_post_thumbnail_url(get_the_ID(), 'full');
                                        ?>
                                        <div class="item-idea">
                                            <div class="image-idea">
                                                <a href="<?php the_permalink(); ?>" class="_5oau block">
                                                    <img src="<?php echo $thumbnail; ?>" class="attachment-full size-full wp-post-image" decoding="async">
                                                </a>
                                            </div>
                                            <div class="text-box-idea">
                                                <div class="_3dqv">
                                                    <a href="<?php the_permalink(); ?>" class="_4wxo textLine-2"><?php the_title(); ?></a>
                                                </div>
                                                <div class="_4nmk textLine-2">
                                                    <?php echo the_excerpt(); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                    endwhile;
                                    wp_reset_postdata();
                                else :
                                    if (pll_current_language() == 'vi') {
                                        echo '<p>Không có bài viết liên quan.</p>';
                                    } else if (pll_current_language() == 'en') {
                                        echo '<p>No related posts.</p>';
                                    }
                                endif;
                            } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php if (pll_current_language() == 'vi') { ?>
        <?php echo do_shortcode('[block id="bottom-ngan-hang-y-tuong"]'); ?>
    <?php } else if (pll_current_language() == 'en') { ?>
        <?php echo do_shortcode('[block id="bottom-idea-bank"]'); ?>
    <?php } ?>
</div>

<?php get_footer();
