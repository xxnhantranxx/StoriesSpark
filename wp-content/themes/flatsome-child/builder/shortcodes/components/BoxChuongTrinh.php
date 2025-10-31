<?php
function BoxChuongTrinh($atts, $content)
{
    extract(shortcode_atts(array(
        'img' => '',
        'tuoi' => '',
        'series' => '',
        'heading' => '',
        'desc' => '',
        'link' => '',
        'class' => '',
    ), $atts));
    ob_start();
?>
    <a class="BoxChuongTrinh block <?php echo $class; ?>" href="<?php echo $link; ?>">
        <div class="_4vle">
            <img src="<?php echo wp_get_attachment_image_url($img,'full'); ?>" class="_7axb">
        </div>
        <div class="_2qse">
            <div class="_6wjd">
                <div class="_5nld"><span><?php echo $tuoi; ?></span></div>
                <div class="_1ebl"><span><?php echo $series; ?></span></div>
                <div class="_2cpd"><span><?php echo $heading; ?></span></div>
                <div class="_1ehf"><?php echo $desc; ?></div>
            </div>
        </div>
    </a>
<?php
    $contentShortcode = ob_get_contents();
    ob_end_clean();
    return $contentShortcode;
}

add_shortcode('BoxChuongTrinh', 'BoxChuongTrinh');
