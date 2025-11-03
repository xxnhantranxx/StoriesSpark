<?php
function Program($atts)
{
    extract(shortcode_atts(array(
        'text' => '',
        'class' => '',
    ), $atts));
    ob_start();
    $program = get_field('program', 'option');
?>
    <div class="Program tabbed-content">
        <?php
            if($text != ''){ ?>
            <div class="_2mib"><?php echo $text; ?></div>
        <?php } ?>
        <div class="HeaderTab nav">
            <div class="HeaderTabInner swiper GalleryArea">
                <div class="swiper-wrapper">
                    <?php
                        if( have_rows('program', 'option') ):
                            while( have_rows('program', 'option') ) : the_row();
                                // Get parent value.
                                $series_program = get_sub_field('series_program', 'option');
                                ?>
                        <div class="swiper-slide tab">
                            <div class="ItemTab">
                                <div class="TitleTab"><?php echo $series_program; ?></div>
                            </div>
                        </div>
                        <?php
                                $first_item = false;
                            endwhile;
                        endif;
                    ?>
                </div>
            </div>
        </div>
        <div class="TabContent tab-panels">
            <div class="swiper TabContentInner GalleryArea">
                <div class="swiper-wrapper">
                    <?php
                        if( have_rows('program', 'option') ):
                            while( have_rows('program', 'option') ) : the_row();
                                // Get parent value.
                                $series_program = get_sub_field('series_program', 'option');
                                $age_program = get_sub_field('age_program', 'option');
                                $content_program = get_sub_field('content_program', 'option');
                                $image_program = get_sub_field('image_program', 'option');
                                ?>
                        <div class="entry-content swiper-slide">
                            <div class="_9yga">
                                <div class="_2sxn">
                                    
                                        <div class="_3yaj"><span class="_8day"><?php echo $age_program; ?></span></div>
                                        <div class="_2cjk">
                                            <div class="_0cff"><?php echo $series_program; ?></div>
                                            <div class="_2hxn"><?php echo $content_program; ?></div>
                                        </div>
                                    
                                </div>
                                <div class="_5wax">
                                    <img src="<?php echo $image_program; ?>" class="_4ajq">
                                </div>
                            </div>
                        </div>
                        <?php
                                $first_item = false;
                            endwhile;
                        endif;
                    ?>
                </div>
            </div>
            <div class="NavigationTab">
                <div class="TabNext">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/icons/pngtree-right-doodle.png">
                </div>
                <div class="TabPrev">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/icons/pngtree-left-doodle.png">
                </div>
            </div>
        </div>
    </div>
<?php
    $contentShortcode = ob_get_contents();
    ob_end_clean();
    return $contentShortcode;
}

add_shortcode('Program', 'Program');
