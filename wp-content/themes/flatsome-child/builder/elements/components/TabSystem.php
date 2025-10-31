<?php
$link_img_ux_gallery = home_url().'/wp-content/themes/flatsome-child/img/admin/icon-builder/ux_gallery.svg';
add_ux_builder_shortcode('TabSystem', array(
    'name'      => __('Tab System'),
    'category'  => __('Vinawind'),
    'priority'  => 10,
    'thumbnail' =>  $link_img_ux_gallery,
    'overlay'   => true,
    'options' => array(
        'settings_options' => array(
            'type'    => 'group',
			'heading' => __( 'Hướng dẫn', 'flatsome' ),
            'description' => 'Sửa trong quản trị Tuỳ Chọn > Hệ thống học liệu > <a target="blank" style="color:#9aa506" href="'.home_url().'/wp-admin/admin.php?page=tab-system">Hệ thống học liệu</a>',
            'options' => array(
                'img' => array(
                    'type' => 'image',
                    'heading' => __('Image'),
                    'default' => ''
                ),
                'link' => array(
                    'type' => 'textfield',
                    'heading' => 'Đường dẫn xem thêm',
                    'full_width' => true,
                ),
                'class' => array(
                    'type' => 'textfield',
                    'heading' => 'Class',
                    'full_width' => true,
                ),
            ),
        ),
    ),
));