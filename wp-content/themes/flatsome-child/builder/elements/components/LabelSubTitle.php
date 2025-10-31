<?php
$link_img_ux_gallery = home_url().'/wp-content/themes/flatsome-child/img/admin/icon-builder/play.svg';
add_ux_builder_shortcode( 'LabelSubTitle', array(
    'name'      => __('LabelSubTitle'),
    'category'  => __('Stories Spark'),
    'priority'  => 2,
    'thumbnail' =>  $link_img_ux_gallery,
    'overlay'   => true,
    'options' => array(
        'text' => array(
            'type' => 'textfield',
            'heading' => 'Text',
            'full_width' => true,
        ),
        'class' => array(
            'type' => 'textfield',
            'heading' => 'Class',
            'full_width' => true,
        ),
    ),
) );