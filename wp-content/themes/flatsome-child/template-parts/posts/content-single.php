<?php

/**
 * Posts content single.
 *
 * @package          Flatsome\Templates
 * @flatsome-version 3.19.9
 */

?>
<div class="canalled-zati">
    <div class="section-content relative">
        <div class="row row-small">
            <div class="_0rif col large-12 medium-12 small-12">
                <div class="col-inner">
                    <div class="header-single-page">
                        <div class="title-single-page">
                            <h1><?php the_title(); ?></h1>
                        </div>
                        <div class="meta-single-page">
                            <div class="info-meta">
                                <div class="author">By <?php echo get_the_author(); ?></div>
                                <div class="date-on"><?php echo get_the_date(); ?></div>
                            </div>
                            <div class="share">
                                <div class="button-toggle-share">
                                    <span class="_5veh">Chia sẻ</span>
                                    <i class="fa-light fa-arrow-right"></i>
                                </div>
                                <div class="share-list">
                                    <?php echo do_shortcode('[share]'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="entry-content single-page">
    <?php the_content(); ?>
</div>