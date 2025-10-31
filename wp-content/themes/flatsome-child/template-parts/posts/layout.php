<?php

/**
 * Posts layout.
 *
 * @package          Flatsome\Templates
 * @flatsome-version 3.19.9
 */

do_action('flatsome_before_blog');
?>

<?php if (!is_single() && get_theme_mod('blog_featured', '') == 'top') {
    get_template_part('template-parts/posts/featured-posts');
} 
$col = 12;
if(is_single()){
    $col = 9;
}
?>
<div class="row align-center wrapper-single-post">
    <div class="_9rzy col large-<?php echo $col; ?> medium-12 small-12 RemovePaddingBottom">
        <?php if (!is_single() && get_theme_mod('blog_featured', '') == 'content') {
            get_template_part('template-parts/posts/featured-posts');
        } ?>

        <?php
        if (is_single()) {
            get_template_part('template-parts/posts/single');
            comments_template();
        } elseif (get_theme_mod('blog_style_archive', '') && (is_archive() || is_search())) {
            get_template_part('template-parts/posts/archive', get_theme_mod('blog_style_archive', ''));
        } else {
            get_template_part('template-parts/posts/archive', get_theme_mod('blog_style', 'normal'));
        }
        ?>
    </div>
</div>
<?php do_action('flatsome_after_blog');
