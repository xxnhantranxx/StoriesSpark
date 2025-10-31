<?php
function StackingCard($atts, $content)
{
    extract(shortcode_atts(array(
        'class' => '',
    ), $atts));
    ob_start();
?>
    <div class="stacking-section <?php echo $class; ?>">
        <div class="cards">
        <?php
        $stt = 1;
            if( have_rows('stacking_card', 'option') ):
                while( have_rows('stacking_card', 'option') ) : the_row();
                    // Get parent value.
                    $title_card = get_sub_field('title_card', 'option');
                    $description_card = get_sub_field('description_card', 'option');
                    $image_card = get_sub_field('image_card', 'option');
                    ?>
                    <div class="card card-<?php echo $stt; ?>">
                        <div class="_3ykb">
                            <div class="_4dld"><?php echo $stt; ?></div>
                            <div class="_0kts">
                                <div class="_9uln textLine-2"><?php echo $title_card; ?></div>
                                <div class="_5sbg"><?php echo $description_card; ?></div>
                            </div>
                        </div>
                        <div class="_9vgk">
                            <img src="<?php echo $image_card; ?>" class="_7xbx">
                        </div>
                    </div>
            <?php
                $stt++;
                endwhile;
            endif;
        ?>
        </div>
    </div>
<?php
    $contentShortcode = ob_get_contents();
    ob_end_clean();
    return $contentShortcode;
}

add_shortcode('StackingCard', 'StackingCard');
