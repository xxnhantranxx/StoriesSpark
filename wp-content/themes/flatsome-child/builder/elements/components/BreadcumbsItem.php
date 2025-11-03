<?php
$link_img_forms = home_url().'/wp-content/themes/flatsome-child/img/admin/icon-builder/forms.svg';
add_ux_builder_shortcode('BreadcumbsItem', array(
    'name'      => __('Breadcumbs Item'),
    'category'  => __('Bean'),
    'priority'  => 5,
    'thumbnail' =>  $link_img_forms,
    'wrap'   => false,
    'inline' => true,
    'options'   => array(
        'title' => array(
            'type' => 'textfield',
            'heading' => 'Nội dung',
        ),
        'link' => array(
            'type' => 'textfield',
            'heading' => 'Đường dẫn',
        ),
        'space' => array(
            'type' => 'textfield',
            'heading' => 'Ngăn cách',
        ),
    ),
));