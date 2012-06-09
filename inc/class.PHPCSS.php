<?php

/**
 * PHPCSS - verb - \'fiks\
 *
 * PHP based CSS pseudo-processor class that supplies numerous helper methods for CSS script generation
 *
 * @package      PHPCSS
 * @version      1.1
 * @author       Brandtley McMinn <labs@giggleboxstudios.net>
 *
 * Last updated: 06/09/2012
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
   * @since   1.1
   *
   * @uses    $vendors
   *
   * @param   string    $attr   Name of css attribute we're defining
   * @param   string    $args   Attribute definitions
   * @param   bool      $impt   Make it !important
   * @param   bool      $echo   Echo the output if True
   *
   * @return  string
   *===========================================*/
  function prefixit($attr,$args,$impt=null,$echo=null) {
    $vendors  = $this->vendors;
    $string = '';

    // Is this !important...
    $important = $this->important($impt);

    // Iterate through our vendors and concatinate the results
    foreach($vendors as $vendor) {
      $string .= '-'.$vendor.'-'.$attr.': '.$args.$important.'; ';
    }

    $string .= $attr.': '.$args.$important.'; ';

    // Return or Echo $string depending on the $echo parameter
    if ($echo == null) :
      return $string;
    else :
      echo $string;
    endif;

  } // prefixit() {...}



  /**
   * Outputs vendor prefixed border-radius attributes
   *
   * @since   1.0
   *
   * @uses    $vendors
   * @uses    prefixit()
   *
   * @param   string    $args   Array of font names and variants
   * @param   bool      $impt   Make it !important
   * @param   bool      $echo   Echo the output if True
   *
   * @return  string
   *===========================================*/
  function border_radius($args,$impt=null,$echo=null) {
    $attr   = 'border-radius';
    $this->prefixit($attr, $args, $impt, $echo);
  } // border_radius() {...}



  /**
   * Outputs vendor prefixed border-radius attributes
   *
   * @since   1.0
   *
   * @uses    $vendors
   * @uses    prefixit()
   *
   * @param   string    $args   Array of font names and variants
   * @param   bool      $impt   Make it !important
   * @param   bool      $echo   Echo the output if True
   *
   * @return  string
   *===========================================*/
  function box_shadow($args,$impt=null,$echo=null) {
    $attr   = 'box-shadow';
    $this->prefixit($attr, $args, $impt, $echo);
  } // box_shadow() {...}



  /**
   * Outputs vendor prefixed linear-gradient attributes
   *
   * @since   1.0
   *
   * @uses    $vendors
   *
   * @param   string    $type   Defines LINEAR or RADIAL
   * @param   string    $args   Array of font names and variants
   * @param   bool      $impt   Make it !important
   * @param   bool      $echo   Echo the output if True
   *
   * @return  string
   *===========================================*/
  function gradient($type,$args,$impt=null,$echo=null) {
    $attr     = $type.'-gradient';
    $vendors  = $this->vendors;
    $string   = '';

    // Is this !important...
    $important = $this->important($impt);

    // Iterate through our vendors and concatinate the results
    foreach($vendors as $vendor) {
      $string .= 'background-image: -'.$vendor.'-'.$attr.'('.$args.')'.$important.'; ';
    }

    $string .= 'background-image: '.$attr.'('.$args.')'.$important.';';

    // Return or output our string
    if ($echo == null) :
      return $string;
    else :
      echo $string;
    endif;

  } // gradient() {...}



  /**
   * Outputs a respective values for font-size and line-height attributes as px/pt with REM fallback
   *
   * @since   1.1
   *
   * @param   string    $fontsize       String value denoted as a float value with leading zero delimitation
   * @param   string    $lineheight     String value denoted as a float value with leading zero delimitation
   * @param   string    $type           Defines initial font measurement unit (default is 'px')
   * @param   bool      $impt           Make it !important
   * @param   bool      $echo           Echo the output if True
   *
   * @return  string
   *===========================================*/
  function fontsize($fontsize,$lineheight,$type='px',$impt=null,$echo=null) {

    $string   = '';

    // Is this !important...
    $important = $this->important($impt);

    // Take the decimal out of our arguments
    $fontsize_rem = $fontsize;
    $fontsize = str_replace('.', '', $fontsize);

    $lineheight_rem = $lineheight;
    $lineheight = str_replace('.', '', $lineheight);

    // Define the arrays we'll iterate through to generate the markup
    $vals = array(
      array(
        'font-size',
        $fontsize,
        $fontsize_rem
        ),
      array(
        'line-height',
        $lineheight,
        $lineheight_rem
        )

      ); // $vals = array


    // Iterate through our $types and generate the markup
    foreach ($vals as $val) {
      $string .= $val[0].': '.$val[1].$type.$important.'; ';
      $string .= $val[0].': '.$val[2].'rem'.$important.'; ';
    }

    // Return or output our string
    if ($echo == null) :
      return $string;
    else :
      echo $string;
    endif;

  } // fontsize() {...}



  /**
   * Tests and returns if our value is !important or not
   *
   * @since   1.1
   *
   * @param   bool      $impt           Make it !important
   *
   * @return  string
   *===========================================*/
  private function important($impt) {

    $important = '';

    // If it's important, append !important to our output
    if ($impt !== null || $impt !== false || $impt !== 0) :
      $important = ' !important';
    endif;

    return $important;
  } // important()


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


} // class PHPCSS()
