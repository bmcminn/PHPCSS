<?php

/**
 * PHPCSS - verb - \'fiks\
 *
 * PHP based CSS pseudo-processor class that supplies numerous helper methods for CSS script generation
 *
 * @package PHPCSS
 * @since 1.0
 */
class PHPCSS {


  /**
   * Supported browser vendor prefixes
   *
   * NOTE: can be overridden by set_vendors() method
   *
   * @since 1.0
   * @var array
   */
  var $vendors = array('moz','webkit','ms','khtml','o');


  /**
   * Constructor - Not sure what to do here yet...
   *
   * @since 1.0
   * @return CSS
   *===========================================*/
  function __construct() {

  } // __construct()





/**=============================================================================
 *          __  __ ______ _______ _    _  ____  _____   _____
 *         |  \/  |  ____|__   __| |  | |/ __ \|  __ \ / ____|
 *         | \  / | |__     | |  | |__| | |  | | |  | | (___
 *         | |\/| |  __|    | |  |  __  | |  | | |  | |\___ \
 *         | |  | | |____   | |  | |  | | |__| | |__| |____) |
 *         |_|  |_|______|  |_|  |_|  |_|\____/|_____/|_____/
 *
 * --------------------------------------------------------------------------- *
 *
 * NOTE: The following methods have been tested and function properly.
 *       HOWEVER, further security testing is needed to verify using these
 *       expose potential security holes.
 *
 *============================================================================*/


  /**
   * Prefixes the supplied method with the vendors in our $vendors array
   *
   * @uses    $vendors
   *
   * @param   string    $attr   Name of css attribute we're defining
   * @param   string    $args   Attribute definitions
   * @param   bool      $impt   Make it !important
   *===========================================*/
  function prefixit($attr,$args,$impt=null) {
    $vendors  = $this->vendors;

    if (!$impt == null || !$impt == false || !$impt == 0) :
      $important = ' !important';
    else :
      $important = '';
    endif;

    foreach($vendors as $vendor) {
      echo ('-'.$vendor.'-'.$attr.': '.$args.$important.'; ');
    }

    echo $attr.': '.$args.'; ';

  } // prefixit


  /**
   * Outputs vendor prefixed border-radius attributes
   *
   * @uses    $vendors
   * @uses    prefixit()
   *
   * @param   string    $args   Array of font names and variants
   * @param   bool      $impt   Make it !important
   *===========================================*/
  function border_radius($args,$impt=null) {
    $attr   = 'border-radius';
    $this->prefixit($attr, $args, $impt);
  }


  /**
   * Outputs vendor prefixed border-radius attributes
   *
   * @uses    $vendors
   * @uses    prefixit()
   *
   * @param   string    $args   Array of font names and variants
   * @param   bool      $impt   Make it !important
   *===========================================*/
  function box_shadow($args,$impt = null) {
    $attr   = 'box-shadow';
    $this->prefixit($attr, $args, $impt);
  }


  /**
   * Outputs vendor prefixed linear-gradient attributes
   *
   * @uses    $vendors
   *
   * @param   string    $type   Defines LINEAR or RADIAL
   * @param   string    $args   Array of font names and variants
   * @param   bool      $impt   Make it !important
   *===========================================*/
  function gradient($type,$args,$impt=null) {
    $attr   = $type.'-gradient';
    $vendors  = $this->vendors;

    if (!$impt == null || !$impt == false || !$impt == 0) :
      $important = ' !important';
    else :
      $important = '';
    endif;

    foreach($vendors as $vendor) {
      echo ('background-image: -'.$vendor.'-'.$attr.'('.$args.')'.$important.'; ');
    }

    echo 'background-image: '.$attr.'('.$args.'); ';

  }






/**=============================================================================
 *          _    _ _   _ _______ ______  _____ _______ ______ _____
 *         | |  | | \ | |__   __|  ____|/ ____|__   __|  ____|  __ \
 *         | |  | |  \| |  | |  | |__  | (___    | |  | |__  | |  | |
 *         | |  | | . ` |  | |  |  __|  \___ \   | |  |  __| | |  | |
 *         | |__| | |\  |  | |  | |____ ____) |  | |  | |____| |__| |
 *          \____/|_| \_|  |_|  |______|_____/   |_|  |______|_____/
 *
 *          __  __ ______ _______ _    _  ____  _____   _____ _ _ _
 *         |  \/  |  ____|__   __| |  | |/ __ \|  __ \ / ____| | | |
 *         | \  / | |__     | |  | |__| | |  | | |  | | (___ | | | |
 *         | |\/| |  __|    | |  |  __  | |  | | |  | |\___ \| | | |
 *         | |  | | |____   | |  | |  | | |__| | |__| |____) |_|_|_|
 *         |_|  |_|______|  |_|  |_|  |_|\____/|_____/|_____/(_|_|_)
 *
 * ---------------------------------------------------------------------------
 *
 * NOTE: Use the following methods at your own risk... they haven't been fully
 *       implemented yet, but I'll get them going soon as I decide how best to
 *       do so.
 *
 *============================================================================*/


  /**
  * Font family generation script
  *
  * @uses   css/font.css.php
  * @param  array   $fonts  Array of font names and variants
  *===========================================*/
  function fonts($fonts) {
    foreach ($fonts as $f) {
      echo '.'.$f.' { font-family: \''.$f.'\', sans-serif; }'."\n";
    } // foreach ($f)
  }


  /**
   * FONTSIZE FUNCTION
   *
   * @param   $size     font-size to be used with 0 leading decimal delimited float values (eg: 1.2)
   * @param   $height   line-height to be used with 0 leading decimal delimited float values (eg: 1.2)
   * @param   bool      $impt   Make it !important
   *===========================================*/

  function fontsize($size, $height, $impt = null) {
    $string = "";

    $fpx = str_replace('.','',$size);
    $lpx = str_replace('.','',$height);

    echo $string =  "font-size: ",$fpx,"px ".$impt."; line-height: ",$lpx,"px ".$impt."; font-size: ",$size,"rem ".$impt."; line-height: ",$height,"rem ".$impt."; ";
  } // fontsize($fsize,$lheight)



} // class PHPCSS()
