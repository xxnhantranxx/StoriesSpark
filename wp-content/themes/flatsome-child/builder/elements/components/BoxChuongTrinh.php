<?php
//Elements build
// accordion, block, blog_posts, button, categories, countdown, divider, forms, grid, icon_box, image_box, lightbox, map, message_box, page_title, pages, payment-icons, play, product, row, search, share, section, slider, tabs, text, text_box, title, ux_banner, ux_gallery, ux_html, ux_image
$link_img = home_url().'/wp-content/themes/flatsome-child/img/admin/icon-builder/image_box.svg';
add_ux_builder_shortcode( 'BoxChuongTrinh', array(
    'name'      => __('Box Chương Trình'),
    'category'  => __('Stories Spark'),
    'priority'  => 3,
    'thumbnail' =>  $link_img,
    'overlay'   => true,
    'options' => array(
        'img' => array(
            'type' => 'image',
            'heading' => __('Ảnh'),
            'default' => '',
            'full_width' => true,
        ),
        'text_option' => array(
            'type' => 'group',
            'heading' => __( 'Nội dung' ),
            'options' => array(
                'tuoi' => array(
                    'type' => 'textfield',
                    'heading' => 'Tuổi',
                    'full_width' => true,
                ),
                'series' => array(
                    'type' => 'textfield',
                    'heading' => 'Series',
                    'full_width' => true,
                ),
                'heading' => array(
                    'type' => 'textfield',
                    'heading' => 'Heading',
                    'full_width' => true,
                ),
                'desc' => array(
                    'type' => 'textarea',
                    'heading' => 'Mô tả',
                    'full_width' => true,
                ),
                'link' => array(
                    'type' => 'textfield',
                    'heading' => 'Đường dẫn',
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