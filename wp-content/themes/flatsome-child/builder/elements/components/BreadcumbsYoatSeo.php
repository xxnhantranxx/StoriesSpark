<?php
$link_img_ux_gallery = home_url().'/wp-content/themes/flatsome-child/img/admin/icon-builder/ux_gallery.svg';
add_ux_builder_shortcode('BreadcumbsYoatSeo', array(
    'name'      => __('Breadcumbs'),
    'category'  => __('Vinawind'),
    'priority'  => 10,
    'thumbnail' =>  $link_img_ux_gallery,
    'overlay'   => true,
    'options' => array(
        'settings_options' => array(
            'type'    => 'group',
			'heading' => __( 'Hướng dẫn', 'flatsome' ),
            'description' => 'Chỉnh sửa liên quan tới plugin <a target="blank" style="color:#9aa506" href="'.home_url().'/wp-admin/admin.php?page=wpseo_page_settings#/breadcrumbs">YoastSeo</a>',
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