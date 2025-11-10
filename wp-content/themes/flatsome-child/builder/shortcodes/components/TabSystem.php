<?php
function TabSystem($atts)
{
    extract(shortcode_atts(array(
        'img' => '',
        'link' => '',
        'class' => '',
    ), $atts));
    ob_start();
    $SeriesName1 = get_field('series_1', 'option');
    $SeriesName2 = get_field('series_2', 'option');
    $SeriesName3 = get_field('series_3', 'option');
    $SeriesName4 = get_field('series_4', 'option');
?>
    <div class="TabSystem <?php echo $class; ?>">
        <div class="tab_header">
            <div class="left_tab_header">
                <div class="item_header_tab active yellow_tab">
                    <div class="star">
                        <span class="_2xdr">Series</span>
                        <span class="_1vxu">1</span>
                    </div>
                    <div class="_0jdt">
                        <span class="_0nzp"><?php echo $SeriesName1; ?></span>
                    </div>
                </div>
                <div class="item_header_tab purple_tab">
                    <div class="star">
                        <span class="_2xdr">Series</span>
                        <span class="_1vxu">2</span>
                    </div>
                    <div class="_0jdt">
                        <span class="_0nzp"><?php echo $SeriesName2; ?></span>
                    </div>
                </div>
                <div class="item_header_tab coffee_tab">
                    <div class="star">
                        <span class="_2xdr">Series</span>
                        <span class="_1vxu">3</span>
                    </div>
                    <div class="_0jdt">
                        <span class="_0nzp"><?php echo $SeriesName3; ?></span>
                    </div>
                </div>
                <div class="item_header_tab green_tab">
                    <div class="star">
                        <span class="_2xdr">Series</span>
                        <span class="_1vxu">4</span>
                    </div>
                    <div class="_0jdt">
                        <span class="_0nzp"><?php echo $SeriesName4; ?></span>
                    </div>
                </div>
            </div>
            <div class="right_tab_header yellow_tab">
                <div class="image-inner-tab">
                    <img src="<?php echo wp_get_attachment_image_url($img,'full'); ?>">
                </div>
            </div>
        </div>
        <div class="content_pannel_tab">
            <div class="pannel entry-content active">
                <div class="_8imo">
                    <?php
                    if( have_rows('list_series_1', 'option') ):
                        while( have_rows('list_series_1', 'option') ) : the_row();
                            // Get parent value.
                            $image_list_series_1 = get_sub_field('image_list_series_1', 'option');
                            $name_list_series_1 = get_sub_field('name_list_series_1', 'option');
                            ?>
                    <div class="_6typ wow animate__animated animate__zoomIn" data-wow-duration="700ms"> 
                        <a href="<?php echo $image_list_series_1; ?>" class="image-lightbox lightbox-gallery">
                            <div class="img-inner _6eij"><?php echo $name_list_series_1; ?></div>
                            <div class="_7xke"><img src="<?php echo $image_list_series_1; ?>" class="_0vtk"></div>
                        </a>
                    </div>
                    <?php
                        endwhile;
                    endif;
                    ?>
                </div>
            </div>
            <div class="pannel entry-content">
                <div class="_8imo">
                    <?php
                    if( have_rows('list_series_2', 'option') ):
                        while( have_rows('list_series_2', 'option') ) : the_row();
                            // Get parent value.
                            $image_list_series_2 = get_sub_field('image_list_series_2', 'option');
                            $name_list_series_2 = get_sub_field('name_list_series_2', 'option');
                            ?>
                    <div class="_6typ"> 
                        <a href="<?php echo $image_list_series_2; ?>" class="image-lightbox lightbox-gallery">
                            <div class="img-inner _6eij"><?php echo $name_list_series_2; ?></div>
                            <div class="_7xke"><img src="<?php echo $image_list_series_2; ?>" class="_0vtk"></div>
                        </a>
                    </div>
                    <?php
                        endwhile;
                    endif;
                    ?>
                </div>
            </div>
            <div class="pannel entry-content">
                <div class="_8imo">
                    <?php
                    if( have_rows('list_series_3', 'option') ):
                        while( have_rows('list_series_3', 'option') ) : the_row();
                            // Get parent value.
                            $image_list_series_3 = get_sub_field('image_list_series_3', 'option');
                            $name_list_series_3 = get_sub_field('name_list_series_3', 'option');
                            ?>
                    <div class="_6typ"> 
                        <a href="<?php echo $image_list_series_3; ?>" class="image-lightbox lightbox-gallery">
                            <div class="img-inner _6eij"><?php echo $name_list_series_3; ?></div>
                            <div class="_7xke"><img src="<?php echo $image_list_series_3; ?>" class="_0vtk"></div>
                        </a>
                    </div>
                    <?php
                        endwhile;
                    endif;
                    ?>
                </div>
            </div>
            <div class="pannel entry-content">
                <div class="_8imo">
                    <?php
                    if( have_rows('list_series_4', 'option') ):
                        while( have_rows('list_series_4', 'option') ) : the_row();
                            // Get parent value.
                            $image_list_series_4 = get_sub_field('image_list_series_4', 'option');
                            $name_list_series_4 = get_sub_field('name_list_series_4', 'option');
                            ?>
                    <div class="_6typ"> 
                        <a href="<?php echo $image_list_series_4; ?>" class="image-lightbox lightbox-gallery">
                            <div class="img-inner _6eij"><?php echo $name_list_series_4; ?></div>
                            <div class="_7xke"><img src="<?php echo $image_list_series_4; ?>" class="_0vtk"></div>
                        </a>
                    </div>
                    <?php
                        endwhile;
                    endif;
                    ?>
                </div>
            </div>
        </div>
        <div class="btn-readmore">
            <a href="<?php echo $link; ?>" class="_6xyk button lowercase"><span>Xem thêm</span></a>
        </div>
    </div>
<?php
    $contentShortcode = ob_get_contents();
    ob_end_clean();
    return $contentShortcode;
}

add_shortcode('TabSystem', 'TabSystem');
