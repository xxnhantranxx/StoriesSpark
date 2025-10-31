<?php get_header('dark'); ?>
<section class="section breadcrumb-category">
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
<section class="section MainSingleIdea">
	<div class="section-bg fill"></div>
	<div class="section-content relative">
        <div class="caviller-beg row row-small">
            <div class="acquired-cosy col large-8 medium-8 small-12 RemovePaddingBottom">
                <div class="col-inner">
                    <div class="category_idea">
                    <?php
                    $terms = get_the_terms(get_the_ID(), 'category-idea');
                    if ($terms && !is_wp_error($terms)) {
                        $term = $terms[0]; // Lấy danh mục đầu tiên
                        echo '<span class="category-name">' . esc_html($term->name) . '</span>';
                    }
                    ?>
                    </div>
                    <h1 class="title-idea-single"><?php the_title(); ?></h1>
                    <div class="content-idea-single">
						<?php if (get_field('de_xuat')) { ?>
                            <h2 class="label">Đề xuất</h2>
							<p><?php echo get_field('de_xuat'); ?></p>
                        <?php } ?>
						<?php if (get_field('doi_tuong')) { ?>
                            <h2 class="label">Đối tượng</h2>
							<p><?php echo get_field('doi_tuong'); ?></p>
                        <?php } ?>
						<?php if (get_field('tac_dong')) { ?>
                            <h2 class="label">Tác động</h2>
							<p><?php echo get_field('tac_dong'); ?></p>
                        <?php } ?>
						<?php if (get_field('thoi_diem_boi_canh')) { ?>
                            <h2 class="label">Thời điểm, Bối cảnh</h2>
							<p><?php echo get_field('thoi_diem_boi_canh'); ?></p>
                        <?php } ?>
						<?php if (get_field('thuc_trang')) { ?>
                            <h2 class="label">Thực trạng</h2>
							<p><?php echo get_field('thuc_trang'); ?></p>
                        <?php } ?>
					</div>
					<?php if (get_field('Contributor')) { ?>
					<div class="Contributor">
                        <?php if (pll_current_language() == 'vi') { ?>
                            <div class="label">Đóng góp bởi:</div>
                        <?php } else if (pll_current_language() == 'en') { ?>
                            <div class="label">Contributed by:</div>
                        <?php } ?>
                        <div class="ValueContributor"><?php echo get_field('Contributor'); ?></div>
                    </div>
					<?php } ?>
                </div>
            </div>
            <div class="merely-uke col large-4 medium-4 small-12 RemovePaddingBottom">
                <div class="col-inner">
                    <div class="heading-sidebar-idea">
                        <?php if (pll_current_language() == 'vi') { ?>
                            <h4 class="_0ypx">Ý tưởng liên quan</h4>
                        <?php } else if (pll_current_language() == 'en') { ?>
                            <h4 class="_0ypx">Related ideas</h4>
                        <?php } ?>
                    </div>
                    <div class="list_related_idea">
                        <?php
                        // Lấy danh mục của bài viết hiện tại
                        $current_post_id = get_the_ID();
                        $categories = get_the_terms($current_post_id, 'category-idea');
                        
                        if ($categories && !is_wp_error($categories)) {
                            // Lấy ID của các danh mục
                            $category_ids = wp_list_pluck($categories, 'term_id');
                            
                            // Thiết lập tham số truy vấn
                            $related_args = array(
                                'post_type'      => 'idea-bank',
                                'posts_per_page' => 6,
                                'post__not_in'   => array($current_post_id),
                                'tax_query'      => array(
                                    array(
                                        'taxonomy' => 'category-idea',
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
                                    <div class="item_related_idea">
                                        <div class="image-box">
                                            <a href="<?php the_permalink(); ?>" class="_4thn block">
                                                <?php if ($thumbnail) : ?>
                                                    <img src="<?php echo esc_url($thumbnail); ?>" alt="<?php the_title_attribute(); ?>">
                                                <?php endif; ?>
                                            </a>
                                        </div>
                                        <div class="text-box">
                                            <div class="title_idea_widget">
                                                <a href="<?php the_permalink(); ?>" class="textLine-2"><?php the_title(); ?></a>
                                            </div>
                                            <div class="desc_idea_widget textLine-1"><?php echo get_field('thuc_trang'); ?></div>
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
                        }
                        ?>
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
<?php get_footer(); ?>