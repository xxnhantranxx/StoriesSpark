<?php
function BreadcumbsYoatSeo($atts)
{
    extract(shortcode_atts(array(
        'class' => '',
    ), $atts));
    ob_start();
?>
    <div class="BreadcumbsYoatSeo <?php echo $class; ?>">
        <?php
        if (function_exists('yoast_breadcrumb')) {
            yoast_breadcrumb('<div class="breadcrumbs">', '</div>');
        }
        ?>
    </div>
<?php
    $contentShortcode = ob_get_contents();
    ob_end_clean();
    return $contentShortcode;
}

add_shortcode('BreadcumbsYoatSeo', 'BreadcumbsYoatSeo');
