<?php // updatecss_helper.php

// Get the 'DOCUMENT_ROOT' of our server
$docroot    = $_SERVER['DOCUMENT_ROOT'];

// DEFINE SITE GLOBALS
define('BASEURL', 'maintainitapp/');
define('ASSETS', $docroot.BASEURL.'assets');

// AUTO GENERATE "style.css" FROM "style.css.php"
function auto_generate_stylesheet() {

  // Get the string length after matching the http(s) and domain name
  // $match_http     = '~https?://.+?/~';
  // $http_test      = preg_match($match_http, $get_stylesheet, $match);
  // $docroot_length = strlen($match[0]) - 1;

  // Define our CSS filepath prefixed with 'DOCUMENT_ROOT'
  $css_file       = ASSETS.'/css/style.css';

  // Define our PHP filepath prefixed with 'DOCUMENT_ROOT'
  $php_file       = $css_file.'.php';

  // Get the URI of our "style.css.php" file
  $php_cont       = file_get_contents(BASEURL.'/assets/css/style.css.php');

  // Get file MOD times for our PHP and CSS files respectively
  $php_modtime    = filemtime($php_file);
  $css_modtime    = filemtime($css_file);

  // Determine if our "style.css.php" file is newer
  if ($php_modtime > $css_modtime) :

    $css = fopen($css_file,'w');    // Open our CSS file
    fwrite($css,$php_cont);         // Write the contents of our "style.css.php" URI document to our CSS file
    fclose($css);                   // Close our CSS file

  else :
      // "style.css.php" is not new and we should leave it alone

  endif;

} // auto_generate_stylesheet()


auto_generate_stylesheet();
