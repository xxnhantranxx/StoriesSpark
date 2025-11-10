<?php
function ItemTabProgram($atts){
    ob_start();
    extract(shortcode_atts(array(
        'title' => '',
        'link' => '',
        'active' => false,
        'class' => '',
    ), $atts));
    ?>
        <div class="swiper-slide tab <?php echo $class; ?> <?php if($active){ echo 'active'; } ?>">
            <a href="<?php echo $link; ?>" class="ItemTab">
                <div class="TitleTab"><?php echo $title; ?></div>
            </a>
        </div>
    <?php
    $contentShortcode = ob_get_contents();
    ob_end_clean();
    return $contentShortcode;
}
add_shortcode( 'ItemTabProgram', 'ItemTabProgram' );