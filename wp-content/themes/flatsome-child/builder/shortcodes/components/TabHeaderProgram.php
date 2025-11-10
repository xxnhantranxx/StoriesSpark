<?php
function TabHeaderProgram($atts, $content = null){
    ob_start();
    extract(shortcode_atts(array(
        'text' => '',
        'class' => '',
    ), $atts));
    ?>
        <?php
            if($text != ''){ ?>
            <div class="_2mib"><?php echo $text; ?></div>
        <?php } ?>
        <div class="HeaderTab nav">
            <div class="HeaderTabInner swiper">
                <div class="swiper-wrapper">
                    <?php echo do_shortcode($content); ?>
                </div>
            </div>
        </div>
    <?php
    $contentShortcode = ob_get_contents();
    ob_end_clean();
    return $contentShortcode;
}
add_shortcode( 'TabHeaderProgram', 'TabHeaderProgram' );