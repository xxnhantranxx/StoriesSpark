<?php
$link_img_ux_gallery = home_url().'/wp-content/themes/flatsome-child/img/admin/icon-builder/ux_gallery.svg';
add_ux_builder_shortcode('StackingCard', array(
    'name'      => __('StackingCard'),
    'category'  => __('Vinawind'),
    'priority'  => 11,
    'thumbnail' =>  $link_img_ux_gallery,
    'overlay'   => true,
    'options' => array(
        'settings_options' => array(
            'type'    => 'group',
			'heading' => __( 'Hướng dẫn', 'flatsome' ),
            'description' => 'Sửa trong quản trị Tuỳ Chọn > StackingCard > <a target="blank" style="color:#9aa506" href="'.home_url().'/wp-admin/admin.php?page=stacking-card">Stacking Card</a>',
            'options' => array(
                'class' => array(
                    'type' => 'textfield',
                    'heading' => 'Class',
                    'full_width' => true,
                ),
            ),
        ),
    ),
));