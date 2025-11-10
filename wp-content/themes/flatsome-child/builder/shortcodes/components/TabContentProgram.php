<?php
function TabContentProgram($atts, $content = null){
    ob_start();
    extract(shortcode_atts(array(
        'age_program' => '',
        'series_program' => '',
        'content_program' => '',
        'image_program' => '',
        'next_program' => '',
        'prev_program' => '',
        'class' => '',
    ), $atts));
    ?>
        <div class="TabContent tab-panels">
            <div class="TabContentInner">
                <div class="entry-content">
                    <div class="_9yga">
                        <div class="_2sxn">
                            <div class="_3yaj"><span class="_8day"><?php echo $age_program; ?></span></div>
                            <div class="_2cjk">
                                <div class="_0cff"><?php echo $series_program; ?></div>
                                <div class="_2hxn">
                                    <?php echo do_shortcode($content); ?>
                                </div>
                            </div>
                        </div>
                        <div class="_5wax">
                            <img ecoding="async" src="<?php echo wp_get_attachment_image_url($image_program,'full'); ?>" class="_4ajq">
                        </div>
                    </div>
                </div>
            </div>
            <div class="NavigationTab">
                <div class="TabNext">
                    <a href="<?php echo $next_program; ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/icons/pngtree-right-doodle.png"></a>
                </div>
                <div class="TabPrev">
                    <a href="<?php echo $prev_program; ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/icons/pngtree-left-doodle.png"></a>
                </div>
            </div>
        </div>
    <?php
    $contentShortcode = ob_get_contents();
    ob_end_clean();
    return $contentShortcode;
}
add_shortcode( 'TabContentProgram', 'TabContentProgram' );