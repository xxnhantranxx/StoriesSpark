<?php

// function custom_posts_per_page($query) {
//     if (!is_admin() && $query->is_main_query()) {
//         // Áp dụng cho post type 'shareholders'
//         if (is_post_type_archive('shareholders')) {
//             $query->set('posts_per_page', 10);
//         }
//         // Áp dụng cho taxonomy 'category-shareholders'
//         if (is_tax('category-shareholders')) {
//             $query->set('posts_per_page', 10);
//         }
//     }
// }
// add_action('pre_get_posts', 'custom_posts_per_page');



add_action( 'init', function () {
    if ( function_exists( 'add_ux_builder_post_type' ) ) {
        add_ux_builder_post_type( 'product' );
    }
});