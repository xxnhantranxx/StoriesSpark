<?php
// Shortcode build
function Team($atts, $content)
{
    extract(shortcode_atts(array(
        'class' => '',
    ), $atts));
    ob_start();
?>
    <div class="slide_ab5 <?php echo $class; ?>">
        <div class="TeamMember swiper">
            <?php
            // Check rows exists.
            if (have_rows('team', 'option')): ?>
                <div class="list_TeamMember swiper-wrapper">
                    <?php
                    // Loop through rows.
                    $i = 1;
                    while (have_rows('team', 'option')) : the_row();
                        // Load sub field value.
                        $name_member = get_sub_field('name_member', 'option');
                        $image_member = get_sub_field('image_member', 'option');
                        $office_member = get_sub_field('office_member', 'option');
                    ?>
                        <a class="box_icon_ab5 swiper-slide" href="#member_<?php echo $i; ?>">
                            <div class="icon-box-img">
                                <img src="<?php echo $image_member; ?>" class="_7deo">
                            </div>
                            <div class="icon-box-text">
                                <div class="text_icon_box_ab5">
                                    <h3 class="_4xnf"><?php echo $name_member; ?></h3>
                                    <p class="_5efc"><?php echo $office_member; ?></p>
                                </div>
                            </div>
                        </a>
                    <?php $i++; endwhile; ?>
                </div>
                <div class="pagination_team"></div>
        </div>
        <div class="_2tka">
            <div class="cntt-button-team-prev cntt-button-slide">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/icons/pngtree-left-doodle.png">
            </div>
            <div class="cntt-button-team-next cntt-button-slide">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/icons/pngtree-right-doodle.png">
            </div>
        </div>
        <?php
        $i = 1;
        while (have_rows('team', 'option')) : the_row();
            $name_member = get_sub_field('name_member', 'option');
            $image_member = get_sub_field('image_member', 'option');
            $office_member = get_sub_field('office_member', 'option');
            $description_member = get_sub_field('description_member', 'option');
        ?>
        <div id="member_<?php echo $i; ?>" class="lightbox-by-id team_member_lightbox lightbox-content mfp-hide lightbox-white" style="max-width:900px ;padding:20px">
            <div class="icon-box-img">
                <img src="<?php echo $image_member; ?>" class="_7deo">
            </div>
            <div class="icon-box-text">
                <div class="text_icon_box_ab5">
                    <h3 class="_4xnf"><?php echo $name_member; ?></h3>
                    <p class="_5efc"><?php echo $office_member; ?></p>
                    <div class="_0hlt"><?php echo $description_member; ?></div>
                </div>
            </div>
        </div>
        <?php $i++; endwhile; ?>
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

add_shortcode('Team', 'Team');
