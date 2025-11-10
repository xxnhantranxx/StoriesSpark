<?php
$link_img_forms = home_url().'/wp-content/themes/flatsome-child/img/admin/icon-builder/forms.svg';
add_ux_builder_shortcode('TabContentProgram', array(
    'type'      => 'container',
    'name'      => __('TabContentProgram'),
    'category'  => __('Vinawind'),
    'priority'  => 55,
    'thumbnail' =>  $link_img_forms,
    'wrap'   => false,
    'inline' => true,
    'options'   => array(
        'age_program' => array(
            'type' => 'textfield',
            'heading' => 'Tuổi',
            'full_width' => true,
        ),
        'series_program' => array(
            'type' => 'textfield',
            'heading' => 'Series',
            'full_width' => true,
        ),
        'image_program' => array(
            'type' => 'image',
            'heading' => 'Ảnh',
            'full_width' => true,
        ),
        'next_program' => array(
            'type' => 'textfield',
            'heading' => 'Đường dẫn tiếp theo',
            'full_width' => true,
        ),
        'prev_program' => array(
            'type' => 'textfield',
            'heading' => 'Đường dẫn trước đó',
            'full_width' => true,
        ),
        'class' => array(
            'type' => 'textfield',
            'heading' => 'Class',
        ),
    ),
));