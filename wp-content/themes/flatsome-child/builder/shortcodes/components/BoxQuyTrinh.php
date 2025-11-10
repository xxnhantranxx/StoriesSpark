<?php
function BoxQuyTrinh($atts)
{
    extract(shortcode_atts(array(
        'image_ca_nhan' => '',
        'star_ca_nhan_1' => '',
        'star_ca_nhan_2' => '',
        'star_ca_nhan_3' => '',
        'star_ca_nhan_4' => '',
        'star_ca_nhan_5' => '',
        'image_to_chuc' => '',
        'star_to_chuc_1' => '',
        'star_to_chuc_2' => '',
        'star_to_chuc_3' => '',
        'star_to_chuc_4' => '',
        'star_to_chuc_5' => '',
        'class' => '',
    ), $atts));
    ob_start();
?>
    <div class="_6kwx <?php echo $class; ?>">
        <div class="_7lve">
            <div class="_7mmn active">
                <div class="_9xlu">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/ca_nhan.png" alt="Cá nhân">
                    <span class="_9fzu">Cá nhân</span>
                </div>
            </div>
            <div class="_7mmn">
                <div class="_9xlu">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/to_chuc.png" alt="Tổ chức">
                    <span class="_9fzu">Tổ chức</span>
                </div>
            </div>
        </div>
        <div class="_5bmy">
            <div class="BoxQuyTrinh CaNhan active">
                <div class="image-box-website">
                    <div class="image-main">
                        <img class="image-box-website-item" src="<?php echo wp_get_attachment_image_url($image_ca_nhan, 'full'); ?>">
                    </div>
                </div>
                <div class="text-box-website">
                    <div class="inner-box">
                        <div class="_3tbm">
                            <?php if ($star_ca_nhan_1) { ?>
                                <div class="box_icon_pro_4">
                                    <div class="icon-box-img">
                                        <div class="icon">
                                            <div class="icon-inner"><img decoding="async" width="73" height="70" src="<?php echo home_url(); ?>/wp-content/uploads/2025/11/sao_1.png" class="attachment-medium size-medium"></div>
                                        </div>
                                    </div>
                                    <div class="icon-box-text last-reset">
                                        <div class="text text_icon_pro_2">
                                            <p><?php echo $star_ca_nhan_1; ?></p>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if ($star_ca_nhan_2) { ?>
                                <div class="box_icon_pro_4">
                                    <div class="icon-box-img">
                                        <div class="icon">
                                            <div class="icon-inner"><img decoding="async" width="73" height="70" src="<?php echo home_url(); ?>/wp-content/uploads/2025/11/sao_2.png" class="attachment-medium size-medium"></div>
                                        </div>
                                    </div>
                                    <div class="icon-box-text last-reset">
                                        <div class="text text_icon_pro_2">
                                            <p><?php echo $star_ca_nhan_2; ?></p>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if ($star_ca_nhan_3) { ?>
                                <div class="box_icon_pro_4">
                                    <div class="icon-box-img">
                                        <div class="icon">
                                            <div class="icon-inner"><img decoding="async" width="73" height="70" src="<?php echo home_url(); ?>/wp-content/uploads/2025/11/sao_3.png" class="attachment-medium size-medium"></div>
                                        </div>
                                    </div>
                                    <div class="icon-box-text last-reset">
                                        <div class="text text_icon_pro_2">
                                            <p><?php echo $star_ca_nhan_3; ?></p>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if ($star_ca_nhan_4) { ?>
                                <div class="box_icon_pro_4">
                                    <div class="icon-box-img">
                                        <div class="icon">
                                            <div class="icon-inner"><img decoding="async" width="73" height="70" src="<?php echo home_url(); ?>/wp-content/uploads/2025/11/sao_4.png" class="attachment-medium size-medium"></div>
                                        </div>
                                    </div>
                                    <div class="icon-box-text last-reset">
                                        <div class="text text_icon_pro_2">
                                            <p><?php echo $star_ca_nhan_4; ?></p>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if ($star_ca_nhan_5) { ?>
                                <div class="box_icon_pro_4">
                                    <div class="icon-box-img">
                                        <div class="icon">
                                            <div class="icon-inner"><img decoding="async" width="73" height="70" src="<?php echo home_url(); ?>/wp-content/uploads/2025/11/sao_5.png" class="attachment-medium size-medium"></div>
                                        </div>
                                    </div>
                                    <div class="icon-box-text last-reset">
                                        <div class="text text_icon_pro_2">
                                            <p><?php echo $star_ca_nhan_5; ?></p>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="BoxQuyTrinh ToChuc">
                <div class="image-box-website">
                    <div class="image-main">
                        <img class="image-box-website-item" src="<?php echo wp_get_attachment_image_url($image_to_chuc, 'full'); ?>">
                    </div>
                </div>
                <div class="text-box-website">
                    <div class="inner-box">
                        <div class="_3tbm">
                            <?php if ($star_to_chuc_1) { ?>
                                <div class="box_icon_pro_4">
                                    <div class="icon-box-img">
                                        <div class="icon">
                                            <div class="icon-inner"><img decoding="async" width="73" height="70" src="<?php echo home_url(); ?>/wp-content/uploads/2025/11/sao_1.png" class="attachment-medium size-medium"></div>
                                        </div>
                                    </div>
                                    <div class="icon-box-text last-reset">
                                        <div class="text text_icon_pro_2">
                                            <p><?php echo $star_to_chuc_1; ?></p>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if ($star_to_chuc_2) { ?>
                                <div class="box_icon_pro_4">
                                    <div class="icon-box-img">
                                        <div class="icon">
                                            <div class="icon-inner"><img decoding="async" width="73" height="70" src="<?php echo home_url(); ?>/wp-content/uploads/2025/11/sao_2.png" class="attachment-medium size-medium"></div>
                                        </div>
                                    </div>
                                    <div class="icon-box-text last-reset">
                                        <div class="text text_icon_pro_2">
                                            <p><?php echo $star_to_chuc_2; ?></p>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if ($star_to_chuc_3) { ?>
                                <div class="box_icon_pro_4">
                                    <div class="icon-box-img">
                                        <div class="icon">
                                            <div class="icon-inner"><img decoding="async" width="73" height="70" src="<?php echo home_url(); ?>/wp-content/uploads/2025/11/sao_3.png" class="attachment-medium size-medium"></div>
                                        </div>
                                    </div>
                                    <div class="icon-box-text last-reset">
                                        <div class="text text_icon_pro_2">
                                            <p><?php echo $star_to_chuc_3; ?></p>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if ($star_to_chuc_4) { ?>
                                <div class="box_icon_pro_4">
                                    <div class="icon-box-img">
                                        <div class="icon">
                                            <div class="icon-inner"><img decoding="async" width="73" height="70" src="<?php echo home_url(); ?>/wp-content/uploads/2025/11/sao_4.png" class="attachment-medium size-medium"></div>
                                        </div>
                                    </div>
                                    <div class="icon-box-text last-reset">
                                        <div class="text text_icon_pro_2">
                                            <p><?php echo $star_to_chuc_4; ?></p>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if ($star_to_chuc_5) { ?>
                                <div class="box_icon_pro_4">
                                    <div class="icon-box-img">
                                        <div class="icon">
                                            <div class="icon-inner"><img decoding="async" width="73" height="70" src="<?php echo home_url(); ?>/wp-content/uploads/2025/11/sao_5.png" class="attachment-medium size-medium"></div>
                                        </div>
                                    </div>
                                    <div class="icon-box-text last-reset">
                                        <div class="text text_icon_pro_2">
                                            <p><?php echo $star_to_chuc_5; ?></p>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
    $contentShortcode = ob_get_contents();
    ob_end_clean();
    return $contentShortcode;
}

add_shortcode('BoxQuyTrinh', 'BoxQuyTrinh');
