<?php
function BoxWebsite($atts, $content)
{
    extract(shortcode_atts(array(
        'align' => 'left',
        'image' => '',
        'icon' => '',
        'sub_title' => '',
        'title' => '',
        'ranger_date' => '',
        'desc' => '',
        'button' => '',
        'link' => '',
        'class' => '',
    ), $atts));
    ob_start();
?>
    <div class="BoxWebsite <?php echo $class; ?> <?php echo $align; ?>">
        <?php if ($align == 'left') { ?>
            <div class="image-box-website">
                <div class="image-main">
                    <div class="image-box wow animate__animated animate__zoomInDown" data-wow-duration="700ms">
                        <img class="image-box-website-item" src="<?php echo wp_get_attachment_image_url($image, 'full'); ?>">
                    </div>
                </div>
            </div>
        <?php } ?>
        <div class="text-box-website">
            <div class="inner-box">
                <?php if ($icon) { ?>
                    <div class="icon-box">
                        <img src="<?php echo wp_get_attachment_image_url($icon, 'full'); ?>">
                    </div>
                <?php } ?>
                <?php if ($sub_title) { ?>
                    <div class="sub-title light_title wow animate__animated animate__bounceIn" data-wow-duration="1000ms"><?php echo $sub_title; ?></div>
                <?php } ?>
                <?php if ($title) { ?>
                    <div class="_3jta wow animate__animated animate__bounceIn" data-wow-duration="1000ms" data-wow-delay="500ms">
                        <h4 class="_1yba"><?php echo $title; ?></h4>
                    </div>
                <?php } ?>
                <?php if ($ranger_date) { ?>
                    <div class="ranger-date wow animate__animated animate__bounceIn" data-wow-duration="1000ms" data-wow-delay="800ms">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/ranger_date.png" class="ranger-date-img">
                        <span class="ranger-date-text"><?php echo $ranger_date; ?></span>
                    </div>
                <?php } ?>
                <?php if ($desc) { ?>
                    <div class="_1cbw wow animate__animated animate__fadeInUp" data-wow-duration="500ms" data-wow-delay="500ms">
                        <p class="_5efw"><?php echo $desc; ?></p>
                    </div>
                <?php } ?>
                <?php if ($button) { ?>
                    <div class="button-box wow animate__animated animate__fadeInUp" data-wow-duration="500ms" data-wow-delay="1000ms">
                        <a href="<?php echo $link; ?>" class="button-box-link button"><span><?php echo $button; ?></span></a>
                    </div>
                <?php } ?>
                <div class="_3tbm wow animate__animated animate__fadeInUp" data-wow-duration="500ms" data-wow-delay="1000ms"><?php echo do_shortcode($content); ?></div>
            </div>
        </div>
        <?php if ($align == 'right') { ?>
            <div class="image-box-website">
                <div class="image-main">
                    <div class="image-box wow animate__animated animate__zoomIn" data-wow-duration="1200ms">
                        <img class="image-box-website-item" src="<?php echo wp_get_attachment_image_url($image, 'full'); ?>">
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
<?php
    $contentShortcode = ob_get_contents();
    ob_end_clean();
    return $contentShortcode;
}

add_shortcode('BoxWebsite', 'BoxWebsite');
