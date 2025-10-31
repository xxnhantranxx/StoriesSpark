<?php
/**
 * Posts archive.
 *
 * @package          Flatsome\Templates
 * @flatsome-version 3.19.9
 */
if ( have_posts() ) : ?>
	<?php 
	$categories = get_the_category();
	$uri = $_SERVER['REQUEST_URI'];
	?>
<div class="row row-small">
	<div class="col col-12">
		<div class="col-inner">
			<h2 class="title-home has-line">Think & Share</h2>
		</div>
	</div>
</div>
<div class="row row-small top-archive-blog">
	<div class="col large-6 medium-6">
		<div class="col-inner">
			<h1 class="title-archive-blog">Chia sẻ kiến thức  & kinh nghiệm giúp bạn phát triển</h1>
		</div>
	</div>
	<div class="col large-6 medium-6 col-flex-vertical">
		<div class="col-inner">
			<p class="desc-archive-blog">Trong một thế giới liên tục thay đổi, chúng ta tự thách thức mình bằng việc tìm kiếm những giải pháp mới và học hỏi từ chính những trải nghiệm hàng ngày. Chúng tôi chia sẻ những gì chúng tôi đã học hỏi được và hy vọng được nghe suy nghĩ của bạn.</p>
			<ul class="list-isocal">
                <li class="item">
					<a href="//www.facebook.com/sharer.php?u=<?php echo home_url().$uri; ?>" data-label="Facebook" class="d-block" onclick="window.open(this.href,this.title,'width=500,height=500,top=300px,left=300px');  return false;" rel="noopener noreferrer nofollow" target="_blank"><img src="https://stywin.com/wp-content/uploads/2022/06/fb.png" alt=""></a>
					<div class="tooltip">Chia sẻ Facebook</div>
				</li>
                <li class="item"><a href="https://www.instagram.com/?url=<?php echo home_url().$uri; ?>" onclick="window.open(this.href,this.title,'width=500,height=500,top=300px,left=300px');  return false;" target="_blank" class="d-block" rel="noopener noreferrer nofollow">
					<img src="https://stywin.com/wp-content/uploads/2022/06/Group-144.png" alt=""></a>
					<div class="tooltip">Chia sẻ Instagram</div>
				</li>
                <li class="item"><a href="//pinterest.com/pin/create/button/?url=<?php echo home_url().$uri; ?>" target="_blank"  onclick="window.open(this.href,this.title,'width=500,height=500,top=300px,left=300px');  return false;" class="d-block" rel="noopener noreferrer nofollow">
					<img src="https://stywin.com/wp-content/uploads/2022/06/Group-145.png" alt=""></a>
					<div class="tooltip">Chia sẻ Pinterest</div>
				</li>
                <li class="item copyButton">
					<a href="javascript:void(0);"><img src="https://stywin.com/wp-content/uploads/2022/06/Group-146.png" alt=""></a>
					<div class="tooltip">Copy link</div>
				</li>
            </ul>
		</div>
	</div>
	<div class="col col-12 label-blog">
		<div class="col-inner">
			<h2>Chủ đề</h2>
		</div>
	</div>
</div>
<div class="row row-small main-blog">
	<div class="col large-9 col-main-blog">
		<div class="list-themes-blog">
			<?php 
				$taxonomy_name = 'category';
				$queried_object = get_queried_object();
				$term_id = $queried_object->term_id;
				
				$terms = get_terms( array(
					'taxonomy' => $taxonomy_name,
					'hide_empty' => false
				) );
				echo '<ul class="list-child-blog">';
				foreach ( $terms as $term ) {
					if($term_id == $term->term_id){
						echo '<li class="item-child active"><a href="' . get_term_link( $term, $taxonomy_name ) . '">' . $term->name . '</a></li>';
					}else{
						echo '<li class="item-child"><a href="' . get_term_link( $term, $taxonomy_name ) . '">' . $term->name . '</a></li>';
					}
				}
				echo '</ul>';
			?>
		</div>
		<div class="first-post">
			<?php
			$args = array(
                'post_type' => 'post',
                'post_status' => array(                    
                    'publish',                      
                ),
                'orderby' => 'random',
                'posts_per_page' => 1,
            );
			
			$the_query = new WP_Query($args);
			if ( $the_query->have_posts() ) :
				while ( $the_query->have_posts() ) : $the_query->the_post();
				  // Do Stuff
				  ?> 
					<div class="first-box-post">
						<div class="box-image">
							<div class="image-post-item">
								<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('full'); ?></a>
							</div>
							<div class="text-post-item">
								<div class="cate-post">
								<?php
									$term_list = get_the_terms(get_the_ID(), 'category');
									$types ='';
									foreach($term_list as $tag_name){
										$types .= '<p>'.$tag_name->name.'</p>';
									}
									echo $types;
								?>
								</div>
								<a href="<?php the_permalink(); ?>" class="title-post-item"><?php the_title(); ?></a>
								<p class="post-public">Ngày đăng: <?php echo get_the_date(); ?></p>
								<p class="description-post textLine-4"><?php echo get_the_excerpt(); ?></p>
								<a href="<?php the_permalink(); ?>" class="btn-item-post"><span>Đọc tiếp</span> <i class="fa fa-arrow-right"></i></a>
							</div>
						</div>
					</div>
				  <?php
				endwhile;
			endif;
			wp_reset_postdata(); 
			?>
		</div>
		<div class="list-post-blog">
			<div class="label-updated">Bài viết cập nhật</div>
			<div class="main-list-post">
			<?php 
			if ( $the_query->have_posts() ) :
				while ( have_posts() ) : the_post();
				  // Do Stuff
				  ?> 
					<div class="box-post-item">
						<div class="box-image">
							<div class="image-post-item">
								<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('full'); ?></a>
							</div>
							<div class="text-post-item">
								<div class="cate-post">
								<?php
									$term_list = get_the_terms(get_the_ID(), 'category');
									$types ='';
									foreach($term_list as $tag_name){
										$types .= '<p>'.$tag_name->name.'</p>';
									}
									echo $types;
								?>
								</div>
								<a href="<?php the_permalink(); ?>" class="title-post-item textLine-2"><?php the_title(); ?></a>
								<p class="post-public">Ngày đăng: <?php echo get_the_date(); ?></p>
								<p class="description-post textLine-4"><?php echo get_the_excerpt(); ?></p>
								<a href="<?php the_permalink(); ?>" class="btn-item-post"><span>Đọc tiếp</span> <i class="fa fa-arrow-right"></i></a>
							</div>
						</div>
					</div>
				  <?php
				endwhile;
				endif;
			?>
			</div>
		</div>
		<?php flatsome_posts_pagination(); ?>
	</div>
	<div class="col large-3 col-widget">
		<?php
			dynamic_sidebar('sidebar-blog-archive');
		?>
	</div>
</div>
<?php else : ?>

	<?php get_template_part( 'template-parts/posts/content','none'); ?>

<?php endif; ?>