<?php
function VideoWebsite($atts, $content)
{
    extract(shortcode_atts(array(
        'link' => '',
        'img' => '',
        'class' => '',
    ), $atts));
    ob_start();
?>
    <div class="VideoWebsite <?php echo $class; ?>">
        <div class="banner-video">
            <img src="<?php echo wp_get_attachment_image_url($img,'full'); ?>" class="_1arc">
            <div class="video-button-wrapper">
                <a href="<?php echo $link; ?>" class="_1blk button icon circle is-outline is-xlarge">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/icons/play_icon.png" alt="play-icon">
                </a>
            </div>
        </div>
    </div>
<?php
    $contentShortcode = ob_get_contents();
    ob_end_clean();
    return $contentShortcode;
}

add_shortcode('VideoWebsite', 'VideoWebsite');
