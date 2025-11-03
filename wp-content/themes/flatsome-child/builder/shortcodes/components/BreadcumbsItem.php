<?php
function BreadcumbsItem($atts){
    ob_start();
    extract(shortcode_atts(array(
        'title' => '',
        'link' => '',
        'space' => '',
    ), $atts));
    ?>
        <a href="<?php echo $link; ?>"><?php echo $title; ?><span> <?php echo $space; ?></span></a>
    <?php
    $contentShortcode = ob_get_contents();
    ob_end_clean();
    return $contentShortcode;
}
add_shortcode( 'BreadcumbsItem', 'BreadcumbsItem' );