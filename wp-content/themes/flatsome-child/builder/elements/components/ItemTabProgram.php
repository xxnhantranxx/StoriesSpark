<?php
$link_img_forms = home_url().'/wp-content/themes/flatsome-child/img/admin/icon-builder/forms.svg';
add_ux_builder_shortcode('ItemTabProgram', array(
    'name'      => __('ItemTabProgram'),
    'category'  => __('Vinawind'),
    'priority'  => 51,
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
        'active' => array(
            'type' => 'checkbox',
            'heading' => __('Kích hoạt'),
            'default' => false,
        ),
        'class' => array(
            'type' => 'textfield',
            'heading' => 'Class',
        ),
    ),
));