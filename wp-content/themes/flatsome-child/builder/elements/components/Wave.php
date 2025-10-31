<?php
$link_img_ux_gallery = home_url().'/wp-content/themes/flatsome-child/img/admin/icon-builder/play.svg';
add_ux_builder_shortcode( 'Wave', array(
    'name'      => __('Wave'),
    'category'  => __('Stories Spark'),
    'priority'  => 1,
    'thumbnail' =>  $link_img_ux_gallery,
    'overlay'   => true,
    'options' => array(
        'color_1' => array(
            'type'     => 'colorpicker',
            'heading'  => __( 'Màu 1', 'flatsome' ),
            'format'   => 'rgb',
            'position' => 'bottom right',
            'helpers'  => require( __DIR__ . '/../helpers/colors.php' ),
        ),
        'color_2' => array(
            'type'     => 'colorpicker',
            'heading'  => __( 'Màu 2', 'flatsome' ),
            'format'   => 'rgb',
            'position' => 'bottom right',
            'helpers'  => require( __DIR__ . '/../helpers/colors.php' ),
        ),
        'img' => array(
            'type' => 'image',
            'heading' => __('Image'),
            'default' => ''
        ),
        'class' => array(
            'type' => 'textfield',
            'heading' => 'Class',
            'full_width' => true,
        ),
    ),
) );