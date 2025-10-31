<?php
function Wave($atts, $content)
{
    extract(shortcode_atts(array(
        'color_1' => '#9EC56E',
        'color_2' => '#5C8920',
        'img' => '',
        'class' => '',
    ), $atts));
    ob_start();
?>
    <div class="wave-container <?php echo $class; ?>">
        <svg class="waveSvg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1920 150" preserveAspectRatio="none">
            <path class="wave wave1" fill="<?php echo $color_2; ?>" d="" />
            <path class="wave wave2" fill="<?php echo $color_1; ?>" d="" />
        </svg>
        <?php
        if($img != ''):
        ?>
        <img src="<?php echo wp_get_attachment_image_url($img,'full'); ?>" class="_5wqe">
        <?php endif; ?>
    </div>
<?php
    $contentShortcode = ob_get_contents();
    ob_end_clean();
    return $contentShortcode;
}

add_shortcode('Wave', 'Wave');
