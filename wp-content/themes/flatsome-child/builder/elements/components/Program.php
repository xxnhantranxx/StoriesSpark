<?php
$link_img_ux_gallery = home_url().'/wp-content/themes/flatsome-child/img/admin/icon-builder/ux_gallery.svg';
add_ux_builder_shortcode('Program', array(
    'name'      => __('Program'),
    'category'  => __('Vinawind'),
    'priority'  => 12,
    'thumbnail' =>  $link_img_ux_gallery,
    'overlay'   => true,
    'options' => array(
        'settings_options' => array(
            'type'    => 'group',
			'heading' => __( 'Hướng dẫn', 'flatsome' ),
            'description' => 'Sửa trong quản trị Tuỳ Chọn > Program > <a target="blank" style="color:#9aa506" href="'.home_url().'/wp-admin/admin.php?page=program">Program</a>',
            'options' => array(
                'text' => array(
                    'type' => 'textfield',
                    'heading' => 'Tiêu đề',
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