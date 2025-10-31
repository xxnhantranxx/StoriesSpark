<?php
$link_img_forms = home_url().'/wp-content/themes/flatsome-child/img/admin/icon-builder/forms.svg';
add_ux_builder_shortcode('BlogsVinaWind', array(
    'type' => 'container',
    'name'      => __('Tin tức'),
    'category'  => __('Vinawind'),
    'priority'  => 9,
    'thumbnail' =>  $link_img_forms,
    'wrap'   => false,
    'inline' => true,
    'options'   => array(
        'cat' => array(
            'type' => 'select',
            'heading' => 'Category',
            'param_name' => 'cat',
            'full_width' => true,
            'default' => '',
            'conditions' => 'post_type == "post"',
            'config' => array(
                'multiple' => false,
                'placeholder' => 'Select...',
                'termSelect' => array(
                    'post_type' => 'post',
                    'taxonomies' => 'category'
                ),
            )
        ),
        'post_type' => array(
            'type' => 'select',
            'heading' => 'Post Type',
            'default' => 'post',
            'options' => array(
                'post' => 'Post',
                'idea-bank' => 'Idea Bank',
            ),
        ),
        'offset' => array(
            'type' => 'slider',
            'heading' => 'Offset',
            'default' => 0,
            'unit'    => 'count',
            'max' => 20,
            'min' => 0,
        ),
        'cout' => array(
            'type' => 'slider',
            'heading' => 'Tổng',
            'default' => 6,
            'unit'    => 'count',
            'max' => 20,
            'min' => 0,
        ),
        'style' => array(
            'type' => 'radio-buttons',
            'heading' => __('Phong cách'),
            'default' => 'post',
            'options' => array(
                'post'  => array( 'title' => 'Normal'),
                'video'  => array( 'title' => 'Video'),
            ),
        ),
        'label' => array(
            'type' => 'textfield',
            'conditions' => 'style == "post"',
            'heading' => __( 'Nhãn' ),
            'default' => '',
        ),
    )
));