<?php header('content-type:text/css');

/** =========================================
 *  Color Palette Definitions
 * ========================================== */
$white          = '#fff';
$black          = '#353535';

/* Gray values */
$lighter        = '#e3e3e3';
$light          = '#cccccc';
$medium         = '#999999';
$dark           = '#7e7e7e';
$darker         = '#454545';

/* Other colors (not grayscale) */
$blue           = '#609cd4';
$blue_dark      = '#507faa';

$cyan           = '#3a90c7';
$green          = '#9ac73a';
$orange         = '#dea332';
$pink           = '#f357a1';
$red            = '#c73a3a';


/** =========================================
 *  Column Widths
 * ========================================== */
$c1             = '63px';
$c2             = '146px';
$c3             = '229px';
$c4             = '312px';
$c5             = '395px';
$c6             = '478px';
$c7             = '561px';
$c8             = '644px';
$c9             = '727px';
$c10            = '810px';
$c11            = '893px';
$c12            = '976px';


/** =========================================
 *  CSS3 With vendor prefix generation
 * ========================================== */

/* Define the vendor prefixes you want to support */
$vendors = array('moz','webkit','ms','khtml','o');

function css($atts,$vars) {
    global $vendors;
    $string     = '';
    $attribute  = '';
    $sep        = ':';
    $end        = '';

    // CONDITION: Gradients require special formatting
    if($atts == 'linear-gradient' || $atts == 'radial-gradient') :
        $attribute  = 'background-image:';
        $sep        = '(';
        $end        = ')';
    endif;

    // Output the usual stuff
    foreach($vendors as $prefix) {
        $string .= $attribute.'-'.$prefix.'-'.$atts.$sep.$vars.$end.'; ';
    }
    // Output the W3C standard version at the end
    echo $string .= $attribute.$atts.$sep.$vars.$end.';';
}


/** =========================================
 *  Fontsize('font-size', 'line-height')
 *  Desc: This takes two arguments that are formatted
 *        as decimal strings. (eg: '1.2' or "2.4")
 *        which are converted into px and rem values
 *        respectively for both font-size and line-height attributes.
 * ========================================== */

function fontsize($size, $height) {
    $string = "";

    $fpx = str_replace('.','',$size);
    $lpx = str_replace('.','',$height);

    echo $string =  "font-size: $fpx","px; line-height: $lpx","px; font-size: $size","rem; line-height: $height","rem; ";
} // fontsize($fsize,$lheight)

