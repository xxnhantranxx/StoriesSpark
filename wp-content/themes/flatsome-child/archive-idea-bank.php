<?php get_header(); ?>
<?php if (pll_current_language() == 'vi') { ?>
    <?php echo do_shortcode('[block id="banner-ngan-hang-y-tuong"]'); ?>
<?php } else if (pll_current_language() == 'en') { ?>
    <?php echo do_shortcode('[block id="idea-bank-banner"]'); ?>
<?php } ?>
<section class="section IdeaBankSection">
    <div class="section-bg fill"></div>
    <div class="section-content relative">
        <div class="FilterBankRow row row-small">
            <div class="FilterBankCol col large-12 medium-12 small-12 RemovePaddingBottom">
                <div class="col-inner">
                    <div class="group-filter">
                        <?php if (pll_current_language() == 'vi') { ?>
                            <div class="label">Lựa chọn lĩnh vực</div>
                        <?php } else if (pll_current_language() == 'en') { ?>
                            <div class="label">Select category</div>
                        <?php } ?>
                        <div class="dropdown-category-idea idea-lvl1">
                            <!-- Hiển thị tất cả danh mục thuộc taxonomy=category-idea&post_type=idea-bank ở lv1 -->
                            <select name="category-lvl1" class="selectCateIdea">
                                <?php if (pll_current_language() == 'vi') { ?>
                                    <option value>Chọn chuyên đề</option>
                                <?php } else if (pll_current_language() == 'en') { ?>
                                    <option value>Select topic</option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="dropdown-category-idea idea-lvl2">
                            <!-- Hiển thị tất cả danh mục thuộc taxonomy=category-idea&post_type=idea-bank ở lv2 -->
                            <select name="category-lvl2" class="selectCateIdea">
                                <?php if (pll_current_language() == 'vi') { ?>
                                    <option value>Chọn danh mục</option>
                                <?php } else if (pll_current_language() == 'en') { ?>
                                    <option value>Select category</option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="text-search">
                            <?php if (pll_current_language() == 'vi') { ?>
                                <input type="search" name="search-idea" class="searchText" placeholder="Nhập từ khoá tìm kiếm...">
                            <?php } else if (pll_current_language() == 'en') { ?>
                                <input type="search" name="search-idea" class="searchText" placeholder="Enter search keyword...">
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="ListBankCol col large-12 medium-12 small-12 RemovePaddingBottom">
                <div class="col-inner">
                    <div class="inner-list-idea"></div>
                    <div class="pagination-cntt">
                        <?php
                        //flatsome_posts_pagination();
                        ?>
                        <div id="pagination-idea"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php echo do_shortcode('[block id="bottom-idea-bank"]'); ?>
<?php get_footer(); ?>