<?php
$link_img_ux_gallery = home_url().'/wp-content/themes/flatsome-child/img/admin/icon-builder/text_box.svg';
add_ux_builder_shortcode( 'BoxQuyTrinh', array(
    'type' => 'container',
    'name'      => __('Box Quy Trinh'),
    'category'  => __('IHDENSHI'),
    'priority'  => 5,
    'thumbnail' =>  $link_img_ux_gallery,
    'overlay'   => true,
    'options' => array(
        'image_options' => array(
            'type' => 'group',
            'heading' => __( 'Setting Image' ),
            'options' => array(
                'image' => array(
                    'type' => 'image',
                    'heading' => __( 'Ảnh' ),
                ),
            ),
        ),
        'class' => array(
            'type' => 'textfield',
            'heading' => 'Class',
            'full_width' => true,
        ),
    ),
) );