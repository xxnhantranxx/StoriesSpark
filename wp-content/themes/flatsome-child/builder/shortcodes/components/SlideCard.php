<?php
// Shortcode build
function Sun_SlideCard($atts, $content)
{
    extract(shortcode_atts(array(
        'class' => '',
    ), $atts));
    ob_start();
?>
    <div class="Sun_SlideCard swiper <?php echo $class; ?>">
        <?php
        // Check rows exists.
        if( have_rows('video_card', 'option') ):?>
        <div class="_6kbg swiper-wrapper">
            <?php 
            // Loop through rows.
            while( have_rows('video_card', 'option') ) : the_row();
            // Load sub field value.
            $image_video_card = get_sub_field('image_video_card', 'option');
            $link_video_card = get_sub_field('link_video_card', 'option');
            $name_video_card = get_sub_field('name_video_card', 'option');
            $chuc_vu_card = get_sub_field('chuc_vu_card', 'option');
            ?>
            <div class="_4gxe swiper-slide">
                <div class="_5sef">
                    <div class="VideoWebsite">
                        <div class="banner-video">
                            <img decoding="async" src="<?php echo $image_video_card; ?>" class="_1arc">
                            <div class="video-button-wrapper">
                                <a href="<?php echo $link_video_card; ?>" class="_1blk button icon circle is-outline is-xlarge">
                                    <img decoding="async" src="<?php echo get_stylesheet_directory_uri(); ?>/img/icons/play_icon.png" alt="play-icon">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="text text_video_s8">
                        <h3><?php echo $name_video_card; ?></h3>
                        <p><?php echo $chuc_vu_card; ?></p>
                    </div>
                </div>
            </div>
            <?php endwhile;?>
        </div>
    </div>
    <?php
    // No value.
    else :
        // Do something...
    endif;?>
        
    <?php echo do_shortcode($content);
    $contentShortcode = ob_get_contents();
    ob_end_clean();
    return $contentShortcode;
}

add_shortcode('Sun_SlideCard', 'Sun_SlideCard');
