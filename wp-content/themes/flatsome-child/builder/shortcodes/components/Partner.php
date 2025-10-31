<?php
// Shortcode build
function Partner($atts, $content)
{
    extract(shortcode_atts(array(
        'class' => '',
    ), $atts));
    ob_start();
?>
    <div class="_1uei">
        <div class="Partner swiper <?php echo $class; ?>">
            <?php
            $images = get_field('partner', 'option');
            // Check rows exists.
            if (have_rows('partner', 'option')): ?>
                <div class="list_Partner swiper-wrapper">
                    <?php
                    // Loop through rows.
                    while (have_rows('partner', 'option')) : the_row();
                        // Load sub field value.
                        $name_partner = get_sub_field('name_partner', 'option');
                        $image_logo_partner = get_sub_field('image_logo_partner', 'option');
                        $url_partner = get_sub_field('url_partner', 'option');
                    ?>
                        <div class="item_Partner swiper-slide">
                            <div class="_1ldb">
                                <a href="<?php echo $url_partner; ?>" class="_3byi block" title="<?php echo $name_partner; ?>" target="_blank">
                                    <img src="<?php echo $image_logo_partner; ?>" class="_6aya">
                                </a>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
        </div>
        <!-- <div class="_2tka">
            <div class="cntt-button-partner-prev cntt-button-slide"><i class="fa-light fa-arrow-left-long"></i></div>
            <div class="cntt-button-partner-next cntt-button-slide"><i class="fa-light fa-arrow-right-long"></i></div>
        </div> -->
    </div>
<?php
            // No value.
            else :
            // Do something...
            endif; ?>

<?php echo do_shortcode($content);
    $contentShortcode = ob_get_contents();
    ob_end_clean();
    return $contentShortcode;
}

add_shortcode('Partner', 'Partner');
