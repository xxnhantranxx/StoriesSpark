<?php
function BoxQuyTrinh($atts, $content)
{
    extract(shortcode_atts(array(
        'image' => '',
        'class' => '',
    ), $atts));
    ob_start();
?>
    <div class="BoxQuyTrinh <?php echo $class; ?>">
        <div class="image-box-website">
            <div class="_3gvm">
                <span class="_2rfk">Cá nhân</span>
            </div>
            <div class="image-main">
                <img class="image-box-website-item" src="<?php echo wp_get_attachment_image_url($image, 'full'); ?>">
            </div>
        </div>
        <div class="text-box-website">
            <div class="_7reh">
                <span class="_5eaa">Tổ chức</span>
            </div>
            <div class="inner-box">
                <div class="_3tbm">
                    <?php echo do_shortcode($content); ?>
                </div>
            </div>
        </div>
    </div>
<?php
    $contentShortcode = ob_get_contents();
    ob_end_clean();
    return $contentShortcode;
}

add_shortcode('BoxQuyTrinh', 'BoxQuyTrinh');
