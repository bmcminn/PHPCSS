<?php
/**
 * PHPCSS - verb - \fiks\ - to put in order or in good condition... (http://dictionary.reference.com/browse/fix)
 *
 * PHP based CSS pseudo-processor class that supplies numerous helper methods for CSS script generation
 *
 * @package      PHPCSS
 * @version      1.3
 * @author       Brandtley McMinn <labs@giggleboxstudios.net>
 * @copyright    2011-2012 Brandtley McMinn
 * @license      http://creativecommons.org/licenses/by-sa/3.0/legalcode - CC BY-SA 3.0
 *
 * @todo
 *   - Changed method name from generate_css() to generate_stylesheet() for symantic purposes
 *   - Refactor generate_font_face() to iterate through the defined font directory for all fonts needed instead of having to define an array
 *
 *
 * CHANGE LOG:
 * -----------------------------------------------------------------------------
 *
 *  08/02/2012:
 *    - Corrected an error in set_vendors() method; running recursive function instead of setting the $vendors class var
 *    - Added fonts management and generation scripts
 *      - Added $fonts_dir array variable
 *      - Added $font_list array variable
 *      - Added set_fonts_dir() method
 *      - Added set_font_list() method
 *      - Added generate_font_face() method for outputting a list of @font-face
 *    - Added copyright and license spec to script (finally... :P)
 *
 *
 *  07/24/2012:
 *    - Added _echo() method
 *      - Changed all method output from 'return' to 'echo' by default (cuz I'm lazy :P)
 *      - Changed method name from important() to _important() - all private class methods now prefixed with an underscore (_example($args))
 *    - Updated README.md with appropriate documentation
 *    - New methods planned out in UNTESTED METHODS section
 *
 *
 *  06/17/2012:
 *    - Added set_vendors() method
 *    - Updated README.md with appropriate documentation
 *    - Updated __construct to include set_vendors method when initialized
 *    - Fixed source documentation errors
 *    - Psuedo coded the generate_css() method
 *
 *
 *  06/09/2012:
 *    - Added fontsize() method
 *    - Updated README.md with appropriate documentation
 *
 *
 *
 * COMMENTS:
 * -----------------------------------------------------------------------------
 *
 *   ASCII Text headers by : http://www.patorjk.com/software/taag/#p=display&f=Computer&t=methods
 *     font: Computer
 *
 *
 *
 * LICENSE:
 * -----------------------------------------------------------------------------
 *
 * This work is licensed under the Creative Commons Attribution-ShareAlike 3.0 Unported License.
 * To view a copy of this license, visit http://creativecommons.org/licenses/by-sa/3.0/.
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
  var $vendors    = array('moz','webkit','ms','khtml','o');

  var $fonts_dir  = '';

  // Scheduled for outmoding
  var $font_list  = array();


  /**
   * Constructor - Not sure what to do here yet...
   * @since 1.0
   * @param array     $assign_vendors   If supplied, overrides the vendor prefix array list when the object is initialized
   * @return false
   *===========================================*/
  function __construct($assign_vendors = null) {

    // Override our $vendors array if provided
    if ($assign_vendors) :
      $this->vendors = $assign_vendors;
    endif;

  } // __construct()


  /**
   * Deconstructor - Not sure what to do here yet...
   * @since 1.2
   * @return true
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
   * Sets the vendor prefixes we will support in our PHPCSS object
   * @since   1.2
   * @uses    function  set_vendors()   Assigns new base vendors array
   * @param   array     $vendors[]      Array defining each browser vendor we plan to support
   * @return  false
   *===========================================*/
  function set_vendors($vendors = array()) {

    $this->set_vendors($vendors);

    return false;

  } // set_vendors() {...}


  /**
   * Sets our projects font directory
   * @since   1.3
   * @param   string      $dir          The directory where our font files are located
   * @return  false
   *===========================================*/
  public function set_fonts_dir($dir = '') {

    $this->fonts_dir = $dir;
    return false;

  } // set_fonts_dir() {...}


  /**
   * Set the list of fonts from our font directory we should use
   * @since   1.3
   * @param   string      $list         Array listing the specific fonts we should load
   * @return  false
   *===========================================*/
  public function set_font_list($list = array()) {

    $this->font_list = $list;
    return false;

  } // set_fonts_dir() {...}


  /**
   * Prefixes the supplied method with the vendors in our $vendors array
   *
   * @since   1.1
   *
   * @uses    $vendors[]
   * @uses    important()
   *
   * @param   string      $attr         Name of css attribute we're defining
   * @param   string      $args         Attribute definitions
   * @param   bool        $impt         Make it !important
   * @param   bool        $echo         Echo the output if True
   *
   * @return  string
   *===========================================*/
  public function prefixit($attr,$args,$impt=null,$echo=true) {

    $vendors  = $this->vendors;
    $string   = '';

    // Is this !important...
    $important = $this->_important($impt);

    // Iterate through our vendors and concatinate the results
    foreach($vendors as $vendor) {
      $string .= '-'.$vendor.'-'.$attr.': '.$args.$important.'; ';
    }

    // Assemble output string
    $string .= $attr.': '.$args.$important.'; ';

    // Output our CSS
    $this->_echo($echo, $string);

  } // prefixit() {...}


  /**
   * Outputs vendor prefixed border-radius attributes
   *
   * @since   1.0
   *
   * @uses    $vendors[]
   * @uses    prefixit()
   *
   * @param   string      $args         Array of font names and variants
   * @param   bool        $impt         Make it !important
   * @param   bool        $echo         Echo the output if True
   *
   * @return  string
   *===========================================*/
  public function border_radius($args,$impt=null,$echo=true) {

    $attr   = 'border-radius';

    return $this->prefixit($attr, $args, $impt, $echo);

  } // border_radius() {...}


  /**
   * Outputs vendor prefixed box-shadow attributes
   *
   * @since   1.0
   *
   * @uses    $vendors[]
   * @uses    prefixit()
   *
   * @param   string      $args         Array of font names and variants
   * @param   bool        $impt         Make it !important
   * @param   bool        $echo         Echo the output if True
   *
   * @return  string
   *===========================================*/
  public function box_shadow($args,$impt=null,$echo=true) {

    $attr   = 'box-shadow';

    return $this->prefixit($attr, $args, $impt, $echo);

  } // box_shadow() {...}


  /**
   * Outputs vendor prefixed linear-gradient attributes
   *
   * @since   1.0
   *
   * @uses    $vendors[]
   * @uses    _important()
   *
   * @param   string      $type         Defines LINEAR or RADIAL
   * @param   string      $args         Array of font names and variants
   * @param   bool        $impt         Make it !important
   * @param   bool        $echo         Echo the output if True
   *
   * @return  string
   *===========================================*/
  public function gradient($type,$args,$impt=null,$echo=true) {

    $attr     = $type.'-gradient';
    $vendors  = $this->vendors;
    $string   = '';

    // Is this !important...
    $important = $this->_important($impt);

    // Iterate through our vendors and concatinate the results
    foreach($vendors as $vendor) {
      $string .= 'background-image: -'.$vendor.'-'.$attr.'('.$args.')'.$important.'; ';
    }

    // Assemble output string
    $string .= 'background-image: '.$attr.'('.$args.')'.$important.';';

    // Output our CSS
    $this->_echo($echo, $string);

  } // gradient() {...}


  /**
   * Outputs a respective values for font-size and line-height attributes as px/pt with REM fallback
   *
   * @since   1.1
   *
   * @param   string      $fontsize     String value denoted as a float value with leading zero delimitation
   * @param   string      $lineheight   String value denoted as a float value with leading zero delimitation
   * @param   string      $unit         Defines initial font measurement unit (default is 'px')
   * @param   bool        $impt         Make it !important
   * @param   bool        $echo         Echo the output if True
   *
   * @return  string
   *===========================================*/
  public function fontsize($fontsize,$lineheight,$unit='px',$impt=null,$echo=true) {

    $string         = '';

    // Is this !important...
    $important      = $this->_important($impt);

    // Take the decimal out of our arguments
    $fontsize_rem   = $fontsize;
    $fontsize       = str_replace('.', '', $fontsize);
    $lineheight_rem = $lineheight;
    $lineheight     = str_replace('.', '', $lineheight);

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
      $string .= $val[0].': '.$val[1].$unit.$important.'; ';
      $string .= $val[0].': '.$val[2].'rem'.$important.'; ';
    }

    // Output our CSS
    $this->_echo($echo, $string);

  } // fontsize() {...}


  /**
   * Outputs a list of @font-face webfonts
   * @since   1.3
   *
   * @return  false
   *===========================================*/
  public function generate_webfonts() {

    $font_dir  = $this->fonts_dir;
    $font_list = $this->font_list;
    $font_face = '';

    $stripped  = '';

    $font_face = "\r\n\r\n/**------------------------ @FONT-FACE ------------------------*/\r\n";

    foreach ($font_list as $font => $weights) :

      foreach ($weights as $weight) :

        $font_location = $font_dir.$font.'/'.$weight;

        // Give us a clean name we can use - delimited by font weight per the file name
        $stripped  = preg_replace('/\-webfont/', '', $weight);
        $stripped  = preg_replace('/\-/', '', $stripped);

        // Generate our source and append it to our $font_face string
        $font_face .= "
@font-face {
  font-family: '$stripped';
  src: url('$font_location.eot');
  src: url('$font_location.eot?#iefix') format('embedded-opentype'),
  url('$font_location.woff') format('woff'),
  url('$font_location.ttf') format('truetype'),
  url('$font_location.svgz#$stripped') format('svg'),
  url('$font_location.svg#$stripped') format('svg');
  font-weight: normal;
  font-style: normal;
}
";
      endforeach; // foreach ($fonts as $font)

    endforeach; // foreach ($font_list as $fonts)

    // Output our $font_face string
    echo $font_face;

    return false;

  } // generate_webfonts()


  /**
   * Tests and returns if our value is !important or not
   *
   * @since   1.1
   *
   * @param   bool      $impt           Make it !important
   *
   * @return  string
   *===========================================*/
  private function _important($impt) {

    $important = '';

    // If it's important, append !important to our output
    if ($impt) :
      $important = ' !important';
    endif;

    return $important;

  } // important()


  /**
   * Tests and returns or echoes our value
   *
   * @since   1.3
   *
   * @param   bool      $echo           Echo the supplied string
   * @param   string    $string         The string to be echoed or returned
   *
   * @return  string
   *===========================================*/
  private function _echo($echo, $string) {

    // Return or output our string
    if ($echo) :
      echo $string;
    else :
      return $string;
    endif;

  } // echo ()







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
   * @todo need to add different $minify flags to customize the minified output
   *
   * @since   1.3  .::.  Officially implemented in 1.3 - Designed in 1.2
   *
   * @param   bool      $minify         Calls the minification script when True to compress the generated CSS file
   * @param   string    $file_name      Override the default filename of the generated stylesheet - default is "style.css"
   * @param   string    $target_dir     Override the default output directory - default is the same direcotyr as source file
   *
   * @return  bool      false           Outputs a static .css file
   *===========================================*/
  function generate_stylesheet($minify=null, $file_name='style.css', $target_dir=__DIR__) {

    $stylecssphp = file_get_contents('http://localhost/github/PHPCSS/style.css.php');
    //
    // $docroot = $_SERVER['DOCUMENT_ROOT'];

    echo $stylecssphp;

    echo $target_dir;

    echo $_SERVER['DOCUMENT_ROOT'];

    // Figure out what directory we're in
    //   Designate in a variable
    $source_directory       = '';
    $destination_directory  = '';

    // Define a regex to strip the server hostname
    $baseurl_regex = '/http(s)?:\/\/\S+?\//';


    // Call the source file
    //   Read in the contents

    // Determine what "header" comment blocks are present and maintain them in a variable

    // Are we minifying the source?
    if ($minify) :

      // Minify source code

    endif;

    // Write (modified) source to destination file
    //   Close file


    // Don't return anything
    return false;

  } // generate_css($minify) {...}


  /**
   * Mods a provided hex code depending on the paramater passed to it
   *
   * @since   1.3
   *
   * @param   string    $color          The color HEX code that is to be modified
   * @param   string    $mod_type       Defines the name of the color mod to be applied
   * @param   float     $percentage     Defines the percentage the effect should have - Defaults to 50%
   *
   * @return  string    $mod_color      The final output string of our modded color
   *===========================================*/
  function color_mod($color, $mod_type='lighten', $percentage = 0.5) {

    $color = '';
    $modded_color = '';

    switch ($mod_type) {
      case 'lighten':
        // Run color modification code here and write it back to $color

        $modded_color = $color;
        break;

      case 'darken':
        // Run color modification code here and write it back to $color

        $modded_color = $color;

        break;

    } // switch ($mod_type)

    // Print our modded color value
    return $modded_color;

  } // color_mod()




} // class PHPCSS()
