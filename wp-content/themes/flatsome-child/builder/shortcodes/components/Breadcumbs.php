<?php

// Block Head
function Breadcumbs($atts, $content = null){
    extract(shortcode_atts(array(
        'class' => '',
        'image' => '',
    ), $atts));
    ob_start();
    if ( empty( $image ) ) {
		return '<div class="uxb-no-content uxb-image">Upload Image...</div>';
	}
    ?>
    <div class="breadcumbs_head <?php echo $class; ?>">
        <img src="<?php echo wp_get_attachment_image_url($image, 'full'); ?>" class="img-breadcumbs">
        <div class="details_breadcumbs">
                <div class="head_bread"><?php the_title(); ?></div>
                <div class="details_list_breadcumbs">
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

add_shortcode('Breadcumbs', 'Breadcumbs');