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
    <div class="archive-block">
        <div class="content-post relative">
            <div class="_0azv row row-small">
                <div class="col large-12 medium-12 small-12 RemovePaddingBottom">
                    <div class="col-inner">
                        <div class="_2gfm">
                        <?php while (have_posts()) : the_post(); ?>
                            <div class="_2nmo">
                                <div class="_6kmd">
                                    <?php if ( has_post_thumbnail() ) : ?>
                                        <a href="<?php the_permalink(); ?>">
                                            <?php the_post_thumbnail('full'); ?>
                                        </a>
                                    <?php endif; ?>
                                </div>
                                <a class="_7pge textLine-2" href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a>
                                <div class="_8hhv"><?php echo get_the_date(); ?></div>
                                <div class="_6qtm textLine-5"><?php echo get_the_excerpt(); ?></div>
                            </div>
                            <?php endwhile; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="_8fie row row-small">
                <div class="col large-12 medium-12 small-12 RemovePaddingBottom">
                    <div class="col-inner">
                        <?php flatsome_posts_pagination(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php else : ?>

	<?php get_template_part( 'template-parts/posts/content','none'); ?>

<?php endif; ?>