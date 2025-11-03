<?php
/**
 * Post archive title.
 *
 * @package          Flatsome\Templates
 * @flatsome-version 3.16.0
 */

?>

<div class="breadcumbs_head">
    <img decoding="async" src="<?php echo home_url(); ?>/wp-content/uploads/2025/11/banner-ketcaucc.png" class="img-breadcumbs">
    <div class="details_breadcumbs">
        <div class="head_bread"><?php echo single_cat_title( '', false ); ?></div>
        <div class="details_list_breadcumbs">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>">Trang chủ<span> /</span></a>
            <?php if ( is_category() ) : ?>
                <a href="javascript:void(0)"><?php echo single_cat_title( '', false ); ?><span> </span></a>
            <?php endif; ?>
        </div>
    </div>
</div>