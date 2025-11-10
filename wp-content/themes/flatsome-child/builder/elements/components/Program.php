<?php
$link_img_ux_gallery = home_url().'/wp-content/themes/flatsome-child/img/admin/icon-builder/ux_gallery.svg';
add_ux_builder_shortcode('Program', array(
    'type'      => 'container',
    'allow' => array( 'TabHeaderProgram','TabContentProgram'),
    'name'      => __('Program'),
    'category'  => __('Vinawind'),
    'priority'  => 12,
    'thumbnail' =>  $link_img_ux_gallery,
    'overlay'   => true,
    'options' => array(
        'settings_options' => array(
            'type'    => 'group',
			'heading' => __( 'Hướng dẫn', 'flatsome' ),
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