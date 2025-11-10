<?php
$link_img_forms = home_url().'/wp-content/themes/flatsome-child/img/admin/icon-builder/forms.svg';
add_ux_builder_shortcode('TabHeaderProgram', array(
    'type'      => 'container',
    'allow' => array( 'ItemTabProgram'),
    'name'      => __('TabHeaderProgram'),
    'category'  => __('Vinawind'),
    'priority'  => 52,
    'thumbnail' =>  $link_img_forms,
    'wrap'   => false,
    'inline' => true,
    'options'   => array(
        'text' => array(
            'type' => 'textfield',
            'heading' => 'Tiêu đề',
            'full_width' => true,
        ),
        'class' => array(
            'type' => 'textfield',
            'heading' => 'Class',
        ),
    ),
));