<?php
$link_img_ux_gallery = home_url().'/wp-content/themes/flatsome-child/img/admin/icon-builder/text_box.svg';
add_ux_builder_shortcode( 'BoxQuyTrinh', array(
    'name'      => __('Box Quy Trinh'),
    'category'  => __('IHDENSHI'),
    'priority'  => 5,
    'thumbnail' =>  $link_img_ux_gallery,
    'overlay'   => true,
    'options' => array(
        'ca_nhan_options' => array(
            'type' => 'group',
            'heading' => __( 'Setting Cá nhân' ),
            'options' => array(
                'image_ca_nhan' => array(
                    'type' => 'image',
                    'heading' => __( 'Ảnh Cá Nhân' ),
                ),
                'star_ca_nhan_1' => array(
                    'type' => 'textarea',
                    'heading' => __( 'Sao Cá Nhân 1' ),
                ),
                'star_ca_nhan_2' => array(
                    'type' => 'textarea',
                    'heading' => __( 'Sao Cá Nhân 2' ),
                ),
                'star_ca_nhan_3' => array(
                    'type' => 'textarea',
                    'heading' => __( 'Sao Cá Nhân 3' ),
                ),
                'star_ca_nhan_4' => array(
                    'type' => 'textarea',
                    'heading' => __( 'Sao Cá Nhân 4' ),
                ),
                'star_ca_nhan_5' => array(
                    'type' => 'textarea',
                    'heading' => __( 'Sao Cá Nhân 5' ),
                ),
            ),
        ),
        'to_chuc_options' => array(
            'type' => 'group',
            'heading' => __( 'Setting Tổ chức' ),
            'options' => array(
                'image_to_chuc' => array(
                    'type' => 'image',
                    'heading' => __( 'Ảnh Tổ chức' ),
                ),
                'star_to_chuc_1' => array(
                    'type' => 'textarea',
                    'heading' => __( 'Sao Tổ chức 1' ),
                ),
                'star_to_chuc_2' => array(
                    'type' => 'textarea',
                    'heading' => __( 'Sao Tổ chức 2' ),
                ),
                'star_to_chuc_3' => array(
                    'type' => 'textarea',
                    'heading' => __( 'Sao Tổ chức 3' ),
                ),
                'star_to_chuc_4' => array(
                    'type' => 'textarea',
                    'heading' => __( 'Sao Tổ chức 4' ),
                ),
                'star_to_chuc_5' => array(
                    'type' => 'textarea',
                    'heading' => __( 'Sao Tổ chức 5' ),
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