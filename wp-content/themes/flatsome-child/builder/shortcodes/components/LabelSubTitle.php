<?php
function LabelSubTitle($atts, $content)
{
    extract(shortcode_atts(array(
        'text' => '',
        'class' => '',
    ), $atts));
    ob_start();
?>
    <h3 class="LabelSubTitle <?php echo $class; ?>">
        <span class="_5bsk"><?php echo $text; ?></span>
    </h3>
<?php
    $contentShortcode = ob_get_contents();
    ob_end_clean();
    return $contentShortcode;
}

add_shortcode('LabelSubTitle', 'LabelSubTitle');
