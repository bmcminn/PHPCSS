<?php

/**
 * PHPCSS - verb - \'fiks\
 *
 * PHP based CSS pseudo-processor class that supplies numerous helper methods for CSS script generation
 *
 * @package      PHPCSS
 * @version      1.2
 * @author       Brandtley McMinn <labs@giggleboxstudios.net>
 *
 * Change Log:
 *
 *  06/17/2012:
 *    - Added set_vendors() method
 *    - Updated README.md with appropriate documentation
 *    - Updated __construct to include set_vendors method when initialized
 *    - Fixed source documentation errors
 *    - Psuedo coded the generate_css() method
 *
 *  06/09/2012:
 *    - Added fontsize() method
 *    - Updated README.md with appropriate documentation
 *
 * Comments:
 *   ASCII Text headers by : http://www.patorjk.com/software/taag/#p=display&f=Computer&t=methods
 *     font: Computer
 *
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
   *
   * @param   array     $assign_vendors   Array defining our vendor prefixes when the object is initialized
   *
   * @return false
   *===========================================*/
  function __construct($assign_vendors = null) {

    // Initialize our $vendors array if provided
    if ($assign_vendors !== null) :

      $this->vendors = $assign_vendors;

    endif;

  } // __construct()


  /**
   * Constructor - Not sure what to do here yet...
   *
   * @since 1.2
   * @return false
   *===========================================*/
  function __destruct() {

    return true;

  } // __destruct()




/**=============================================================================
*
 *    eeeeeee eeee eeeee e   e eeeee eeeee eeeee
 *    8  8  8 8      8   8   8 8  88 8   8 8   "
 *    8e 8  8 8eee   8e  8eee8 8   8 8e  8 8eeee
 *    88 8  8 88     88  88  8 8   8 88  8    88
 *    88 8  8 88ee   88  88  8 8eee8 88ee8 8ee88
 *
 * --------------------------------------------------------------------------- *
 *
 * NOTE: The following methods have been tested and function properly.
 *       HOWEVER, further security testing is needed to verify using these
 *       expose potential security holes.
 *
 *============================================================================*/


  /**
   *  Sets the vendor prefixes we will support in our PHPCSS object
   *
   * @since 1.2
   *
   * @uses    function  set_vendors()   Assigns new base vendors array
   *
   * @param   array     $vendors        Array defining each browser vendor we plan to support
   *
   * @return  false
   *===========================================*/
  function set_vendors($vendors = array()) {

    $this->set_vendors($vendors);

    return false;

  } // set_vendors() {...}



  /**
   * Prefixes the supplied method with the vendors in our $vendors array
   *
   * @since   1.1
   *
   * @uses    $vendors
   * @uses    important()
   *
   * @param   string      $attr         Name of css attribute we're defining
   * @param   string      $args         Attribute definitions
   * @param   bool        $impt         Make it !important
   * @param   bool        $echo         Echo the output if True
   *
   * @return  string
   *===========================================*/
  function prefixit($attr,$args,$impt=null,$echo=null) {

    $vendors  = $this->vendors;
    $string   = '';

    // Is this !important...
    $important = $this->important($impt);

    // Iterate through our vendors and concatinate the results
    foreach($vendors as $vendor) {
      $string .= '-'.$vendor.'-'.$attr.': '.$args.$important.'; ';
    }

    // Assemble output string
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
   * @param   string      $args         Array of font names and variants
   * @param   bool        $impt         Make it !important
   * @param   bool        $echo         Echo the output if True
   *
   * @return  string
   *===========================================*/
  function border_radius($args,$impt=null,$echo=null) {

    $attr   = 'border-radius';

    return $this->prefixit($attr, $args, $impt, $echo);

  } // border_radius() {...}



  /**
   * Outputs vendor prefixed box-shadow attributes
   *
   * @since   1.0
   *
   * @uses    $vendors
   * @uses    prefixit()
   *
   * @param   string      $args         Array of font names and variants
   * @param   bool        $impt         Make it !important
   * @param   bool        $echo         Echo the output if True
   *
   * @return  string
   *===========================================*/
  function box_shadow($args,$impt=null,$echo=null) {

    $attr   = 'box-shadow';

    return $this->prefixit($attr, $args, $impt, $echo);

  } // box_shadow() {...}



  /**
   * Outputs vendor prefixed linear-gradient attributes
   *
   * @since   1.0
   *
   * @uses    $vendors
   * @uses    important()
   *
   * @param   string      $type         Defines LINEAR or RADIAL
   * @param   string      $args         Array of font names and variants
   * @param   bool        $impt         Make it !important
   * @param   bool        $echo         Echo the output if True
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

    // Assemble output string
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
   * @param   string      $fontsize     String value denoted as a float value with leading zero delimitation
   * @param   string      $lineheight   String value denoted as a float value with leading zero delimitation
   * @param   string      $type         Defines initial font measurement unit (default is 'px')
   * @param   bool        $impt         Make it !important
   * @param   bool        $echo         Echo the output if True
   *
   * @return  string
   *===========================================*/
  function fontsize($fontsize,$lineheight,$type='px',$impt=null,$echo=null) {

    $string   = '';

    // Is this !important...
    $important = $this->important($impt);

    // Take the decimal out of our arguments
    $fontsize_rem = $fontsize;
    $fontsize     = str_replace('.', '', $fontsize);

    $lineheight_rem = $lineheight;
    $lineheight   = str_replace('.', '', $lineheight);

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
    if ($impt !== null && $impt !== false && $impt !== 0) :
      $important = ' !important';
    endif;

    return $important;

  } // important()




/**=============================================================================
 *
 *    8""""8
 *    8    8 eeee eeeee eeeee  eeee eeee eeeee eeeee eeee eeeee
 *    8e   8 8    8   8 8   8  8    8  8 8   8   8   8    8   8
 *    88   8 8eee 8eee8 8eee8e 8eee 8e   8eee8   8e  8eee 8e  8
 *    88   8 88   88    88   8 88   88   88  8   88  88   88  8
 *    88eee8 88ee 88    88   8 88ee 88e8 88  8   88  88ee 88ee8
 *
 * ---------------------------------------------------------------------------
 *
 * NOTE: The following methods will be deleted in later source revisions...
 *       Bottom line, don't use them :P
 *
 *============================================================================*/






/**=============================================================================
 *
 *    e   e eeeee eeeee eeee eeeee eeeee eeee eeeee
 *    8   8 8   8   8   8    8   "   8   8    8   8
 *    8e  8 8e  8   8e  8eee 8eeee   8e  8eee 8e  8
 *    88  8 88  8   88  88      88   88  88   88  8
 *    88ee8 88  8   88  88ee 8ee88   88  88ee 88ee8
 *
 *    eeeeeee eeee eeeee e   e eeeee eeeee eeeee
 *    8  8  8 8      8   8   8 8  88 8   8 8   "
 *    8e 8  8 8eee   8e  8eee8 8   8 8e  8 8eeee
 *    88 8  8 88     88  88  8 8   8 88  8    88
 *    88 8  8 88ee   88  88  8 8eee8 88ee8 8ee88
 *
 * ---------------------------------------------------------------------------
 *
 * NOTE: Use the following methods at your own risk... they haven't been fully
 *       implemented yet, but I'll get them going soon as I decide how best to
 *       do so.
 *
 *============================================================================*/


  /**
   * Called at the end of your file; This method generates a static CSS file ready for production
   *
   * @since   1.2
   *
   * @param   bool      $minify         Calls the minification script when True to compress the generated CSS file
   *
   * @return  bool      false           Outputs a static .css file
   *===========================================*/
  function generate_css($minify=null) {

    // Figure out what directory we're in
    //   Designate in a variable
    $source_directory       = '';
    $destination_directory  = '';

    // Call the source file
    //   Read in the contents

    // Determine what "header" comment blocks are present and maintain them in a variable

    // Are we minifying the source?
    if ($minify !== null) :

      // Minify source code

    endif;

    // Write (modified) source to destination file
    //   Close file


    // Don't return anything
    return false;

  } // generate_css($minify) {...}



} // class PHPCSS()
