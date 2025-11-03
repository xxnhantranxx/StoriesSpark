<?php
// Shortcode build
function LocalStrore($atts, $content)
{
    extract(shortcode_atts(array(
        'class' => '',
    ), $atts));
    ob_start();
?>
    <div class="LocalStrore">
        <?php echo do_shortcode('[devvn_local_stores]'); ?>
    </div>

<?php echo do_shortcode($content);
    $contentShortcode = ob_get_contents();
    ob_end_clean();
    return $contentShortcode;
}

add_shortcode('LocalStrore', 'LocalStrore');
