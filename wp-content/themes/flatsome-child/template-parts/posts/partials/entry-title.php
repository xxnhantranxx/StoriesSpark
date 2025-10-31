<?php
/**
 * Post-entry title.
 *
 * @package          Flatsome\Templates
 * @flatsome-version 3.19.9
 */

if ( is_single() ) :
	if ( get_theme_mod( 'blog_single_header_category', 1 ) ) :
		echo '<h6 class="entry-category is-xsmall">';
		echo get_the_category_list( __( ', ', 'flatsome' ) );
		echo '</h6>';
	endif;
else :
	echo '<h6 class="entry-category is-xsmall">';
	echo get_the_category_list( __( ', ', 'flatsome' ) );
	echo '</h6>';
endif;

if ( is_single() ) :
	if ( get_theme_mod( 'blog_single_header_title', 1 ) ) :
		// Kiểm tra xem bài viết có tag không
        if ( function_exists('yoast_breadcrumb') ) {
            yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
        }
		echo '<h1 class="entry-title">' . get_the_title() . '</h1>';
	endif;
else :
	echo '<h2 class="entry-title"><a href="' . get_the_permalink() . '" rel="bookmark" class="plain">' . get_the_title() . '</a></h2>';
	echo '<div class="entry-divider is-divider small"></div>';
endif;
?>

<?php
$single_post = is_singular( 'post' );
if ( $single_post && get_theme_mod( 'blog_single_header_meta', 1 ) ) : ?>
	<div class="entry-meta-customize">
		<div class="category"><i class="fa-light fa-tags"></i> <div class="text-category"><?php echo get_the_category_list( __( ', ', 'flatsome' ) ); ?></div></div>
		<div class="date_single"><i class="fa-light fa-calendar-days"></i> <?php echo get_the_date();?></div>
		<div class="author_singe"><i class="fa-light fa-user"></i> <?php echo get_the_author();?></div>
	</div>
<?php elseif ( ! $single_post && 'post' == get_post_type() ) : ?>
	<div class="entry-meta uppercase is-xsmall">
		<?php flatsome_posted_on(); ?>
	</div>
<?php endif; ?>
