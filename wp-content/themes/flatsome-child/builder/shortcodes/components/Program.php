<?php
function Program($atts, $content = null)
{
    extract(shortcode_atts(array(
        'text' => '',
        'class' => '',
    ), $atts));
    ob_start();
?>
    <div class="Program tabbed-content">
        <?php echo do_shortcode($content); ?>
    </div>
<?php
    $contentShortcode = ob_get_contents();
    ob_end_clean();
    return $contentShortcode;
}

add_shortcode('Program', 'Program');
