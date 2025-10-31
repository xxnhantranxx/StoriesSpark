<?php
$link_img_ux_gallery = home_url().'/wp-content/themes/flatsome-child/img/admin/icon-builder/text_box.svg';
add_ux_builder_shortcode( 'BoxWebsite', array(
    'type' => 'container',
    'name'      => __('Box Website'),
    'category'  => __('IHDENSHI'),
    'priority'  => 3,
    'thumbnail' =>  $link_img_ux_gallery,
    'overlay'   => true,
    'options' => array(
        'image_options' => array(
            'type' => 'group',
            'heading' => __( 'Setting Image' ),
            'options' => array(
                'align' => array(
                    'type' => 'radio-buttons',
                    'heading' => __('Vị trí ảnh'),
                    'default' => 'left',
                    'options' => array(
                        'left'  => array( 'title' => 'Trái'),
                        'right'  => array( 'title' => 'Phải'),
                    ),
                ),
                'image' => array(
                    'type' => 'image',
                    'heading' => __( 'Ảnh' ),
                ),
            ),
        ),
        'text_options' => array(
            'type' => 'group',
            'heading' => __( 'Setting Text' ),
            'options' => array(
                'icon' => array(
                    'type' => 'image',
                    'heading' => 'Icon',
                    'default' => ''
                ),
                'sub_title' => array(
                    'type' => 'textfield',
                    'heading' => 'Tiêu đề phụ',
                    'full_width' => true,
                ),
                'title' => array(
                    'type' => 'textfield',
                    'heading' => 'Tiêu đề',
                    'full_width' => true,
                ),
                'ranger_date' => array(
                    'type' => 'textfield',
                    'heading' => 'Ngày',
                    'full_width' => true,
                ),
                'desc' => array(
                    'type' => 'textarea',
                    'heading' => 'Nội dung',
                    'full_width' => true,
                ),
                'button' => array(
                    'type' => 'textfield',
                    'heading' => 'Nút',
                    'full_width' => true,
                ),
                'link' => array(
                    'type' => 'textfield',
                    'heading' => 'Link',
                    'full_width' => true,
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