<?php

$link_img_text_box = home_url().'/wp-content/themes/flatsome-child/img/admin/icon-builder/text_box.svg';

add_ux_builder_shortcode('Breadcumbs', array(
    'type'      => 'container',
    'allow' => array( 'BreadcumbsItem'),
    'name'      => __('Breadcumbs'),
    'category'  => __('Bean'),
    'priority'  => 10,
    'thumbnail' =>  $link_img_text_box,
    'options' => array(
        'class' => array(
            'type' => 'textfield',
            'heading' => 'Class',
        ),
        'image' => array(
            'type' => 'image',
            'heading' => 'Ảnh'
        ),
    ),

));