<?php
  // REQUIRED: The browser uses this to actually read our output as CSS markup
  header('content-type: text/css');



  // Define custom color/font/directory values
  // NOTE: DON'T CHANGE UNLESS ABSOLUTELY NECESSARY!!!
  define('CHARSET', 'UTF-8');
  define('IMG', 'img/'); // Image directory shortcut
  define('CSS', 'css/'); // CSS directory shortcut


  // Define color palette definitions here
  // NOTE: Change these values at-will
  define('WHITE', '#fff');
  define('BLACK', '#444'); // Off-black for taste ;)

  $graygrey = '#e3e3e3'; // Spell it how you want :P
  define('GREY', $graygrey);
  define('GRAY', $graygrey);

  define('BLUE', '#00f');
  define('RED', '#f00');
  define('ORANGE', '#f90');



  // Define our charset encoding
  echo '@charset "'.CHARSET.'";'."\r\n";


  // Include the PHPCSS class file
  require_once('inc/class.PHPCSS.php');

  // Instantiate a new CSS() object
  $css = new PHPCSS();


  // Include our resource files
  include(CSS.'normalize.css');

?>



/**
 * ------------------------ START YOUR STYLES HERE! ------------------------- *
 */



/* Use the border_radius wrapper method */
#test-border-radius { <?php $css->border_radius('4px'); ?> }

/* Use the gradient wrapper method */
#test-gradient-1 { <?php $css->gradient('linear','-45deg,'.RED.','.BLUE); ?> }
#test-gradient-2 { <?php $css->gradient('radial','-45deg,red,blue'); ?> }


/* Use the box_shadow wrapper method */
#test-box-shadow { <?php $css->box_shadow('0 2px 0 #bada55',1); ?> }


/* All previous methods wrap the prefixit() method */
/* Call this method if you want to get REALLY specific */
#test-prefixed-styles { <?php $css->prefixit('border-radius','5px',1); ?> }


<?php

  /**
* Extend PHPCSS() to do whatever you want!
*
* Use custom class extensions to define your own CSS styles/mixins
*
*
*/

  class ExtendedPHPCSS extends PHPCSS {

    function custom_gradients() {
      $gradients = 'CUSTOM GRADIENT SYNTAX HERE';
      $this->prefixit('linear-gradient', $gradients, null);
    }

  } // ExtendedCSS

  // Instantiate the new CLASS
  $extended = new ExtendedPHPCSS();

?>

/* Extended PHPCSS class to output custom CSS */
#test-custom-gradients { <?php $extended->custom_gradients(); ?> }


<?php

  include(CSS.'helper.css');
  include(CSS.'print.css');

?>


/**
* Media Queries
* @media screen
*/
@media screen and (max-width: 980px) {

} // @media max-width: 980px







<?php

  // $css->generate_stylesheet();

?>
