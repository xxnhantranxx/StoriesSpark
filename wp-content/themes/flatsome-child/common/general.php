<?php

//Cho phepos viết shortcode vào cf7
add_filter( 'wpcf7_form_elements', 'mycustom_wpcf7_form_elements' );

function mycustom_wpcf7_form_elements( $form ) {
$form = do_shortcode( $form );

return $form;
}

function filter_search_by_title($where, $wp_query) {
    global $wpdb;
    if ($search_term = $wp_query->get('s')) {
        $where .= " AND {$wpdb->posts}.post_title LIKE '%" . esc_sql($search_term) . "%'";
    }
    return $where;
}
add_filter('posts_where', 'filter_search_by_title', 10, 2);

// add widget new
function my_widget(){
    register_sidebar( array(
        'name' => __( 'Sidebar Archive Blog', 'flatsome' ),
        'id' => 'sidebar-blog-archive',
        'description' => __( 'Khu vực hiển thị sidebar trang lưu trữ blogs', 'flatsome' ),
        'before_widget' => '<aside class="customize-element-widget-block">',
        'after_widget' => '</aside>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ) );
}
add_action( 'widgets_init', 'my_widget' );

// Hàm lấy danh mục con dựa trên danh mục cha
function get_child_categories() {
    $parent_id = isset($_POST['parent_id']) ? intval($_POST['parent_id']) : 0;
    
    $args = array(
        'taxonomy' => 'category-idea',
        'hide_empty' => false,
        'parent' => $parent_id
    );
    
    $categories = get_terms($args);
    
    $response = array();
    if (!empty($categories) && !is_wp_error($categories)) {
        foreach ($categories as $category) {
            $response[] = array(
                'id' => $category->term_id,
                'name' => $category->name
            );
        }
    }
    
    wp_send_json_success($response);
}
add_action('wp_ajax_get_child_categories', 'get_child_categories');
add_action('wp_ajax_nopriv_get_child_categories', 'get_child_categories');

// Tùy chỉnh số bài viết hiển thị cho idea-bank
function set_idea_bank_posts_per_page($query) {
    if (!is_admin() && $query->is_main_query() && is_post_type_archive('idea-bank')) {
        $query->set('posts_per_page', 15); // Số bài viết muốn hiển thị
    }
}
add_action('pre_get_posts', 'set_idea_bank_posts_per_page');

// Hàm lọc bài viết theo danh mục
function filter_idea_posts() {
    $category_id = isset($_POST['category_id']) ? $_POST['category_id'] : null;
    $page = isset($_POST['page']) ? intval($_POST['page']) : 1;
    $search = isset($_POST['search']) ? sanitize_text_field($_POST['search']) : '';
    
    $args = array(
        'post_type' => 'idea-bank',
        'posts_per_page' => 15,
        'paged' => $page
    );

    // Thêm điều kiện tìm kiếm trong tiêu đề nếu có từ khóa
    if (!empty($search)) {
        $args['title_filter'] = $search;
    }

    // Chỉ thêm tax_query khi có category_id
    if ($category_id) {
        $args['tax_query'] = array(
            array(
                'taxonomy' => 'category-idea',
                'field' => 'term_id',
                'terms' => $category_id
            )
        );
    }
    
    $query = new WP_Query($args);
    
    $response = array(
        'posts' => array(),
        'max_num_pages' => $query->max_num_pages
    );
    
    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            $image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
            
            $response['posts'][] = array(
                'title' => get_the_title(),
                'excerpt' => get_field('thuc_trang'),
                'permalink' => get_permalink(),
                'image' => $image[0]
            );
        }
        wp_reset_postdata();
    }
    
    wp_send_json_success($response);
}
add_action('wp_ajax_filter_idea_posts', 'filter_idea_posts');
add_action('wp_ajax_nopriv_filter_idea_posts', 'filter_idea_posts');

// Thêm filter để tìm kiếm trong tiêu đề
function title_filter($where, $wp_query) {
    global $wpdb;
    if ($search_term = $wp_query->get('title_filter')) {
        $where .= $wpdb->prepare(
            " AND {$wpdb->posts}.post_title LIKE %s AND {$wpdb->posts}.post_type = 'idea-bank'",
            '%' . $wpdb->esc_like($search_term) . '%'
        );
    }
    return $where;
}
add_filter('posts_where', 'title_filter', 10, 2);