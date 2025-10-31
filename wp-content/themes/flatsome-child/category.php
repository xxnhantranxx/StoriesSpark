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
<?php echo do_shortcode('[block id="khoi-tin-tuc"]'); ?>
<section class="section IdeaBankSection">
    <div class="section-bg fill"></div>
    <div class="section-content relative">
        <div class="FilterBankRow row row-small">
            <div class="veals-mew col large-12 medium-12 small-12 RemovePaddingBottom">
                <div class="col-inner">
                    <?php if (pll_current_language() == 'vi') { ?>
                        <div class="heading-category"><h2 class="_4nsl">Tất cả <?php single_cat_title(); ?></h2></div>
                    <?php } else if (pll_current_language() == 'en') { ?>
                        <div class="heading-category"><h2 class="_4nsl">All <?php single_cat_title(); ?></h2></div>
                    <?php } ?>
                </div>
            </div>
            <div class="ListBankCol col large-12 medium-12 small-12 RemovePaddingBottom">
                <div class="col-inner">
                    <div class="inner-list-idea">
                        <?php if (have_posts()) : ?>
                            <?php while (have_posts()) : the_post(); 
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
                            <?php endwhile; ?>
                            <?php wp_reset_postdata(); ?>
                        <?php endif; ?>
                    </div>
                    <div class="pagination-cntt">
                        <?php
                        flatsome_posts_pagination();
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php echo do_shortcode('[block id="bottom-idea-bank"]'); ?>
<?php get_footer(); ?>