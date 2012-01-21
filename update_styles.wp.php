<?php // style_update.wp.php

/**
 *  Author:     Brandtley McMinn
 *
 *  URI:        http://giggleboxstudios.net
 *  Blog:       http://the-soapbox.info/
 *
 *  Copyright:  (c) 2011-2012 Brandtley McMinn, Gigglebox Studios.
 *
 *  License:    MIT License (MIT)
 *              Permission is hereby granted, free of charge, to any person obtaining a
 *              copy of this software and associated documentation files (the "Software"),
 *              to deal in the Software without restriction, including without limitation
 *              the rights to use, copy, modify, merge, publish, distribute, sublicense,
 *              and/or sell copies of the Software, and to permit persons to whom the
 *              Software is furnished to do so, subject to the following conditions:
 *
 *              The above copyright notice and this permission notice shall be included
 *              in all copies or substantial portions of the Software.
 *
 *              THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS
 *              OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 *              FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL
 *              THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 *              LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING
 *              FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS
 *              IN THE SOFTWARE.
 */


/**
 *  IF you are using WordPress, just include this file
 *  in your functions.php file and it will do the work for you.
 */


// DEFINE SITE GLOBALS
define('SITEURL', site_url());
define('CHARSET', get_bloginfo('charset'));
define('LANGUAGE', get_bloginfo('language'));
define('TEMPLATE_URL', get_bloginfo('template_url'));

// AUTO GENERATE "style.css" FROM "style.css.php"
add_action('wp_head','auto_generate_stylesheet');

function auto_generate_stylesheet() {

    // Get our WordPress Stylesheet
    $get_stylesheet = get_bloginfo('stylesheet_url');

    // Get the string length after matching the http(s) and domain name
    $match_http     = '~https?://.+?/~';
    $http_test      = preg_match($match_http, $get_stylesheet, $match);
    $docroot_length = strlen($match[0]) - 1;

    // Get the 'DOCUMENT_ROOT' of our server
    $docroot        = $_SERVER['DOCUMENT_ROOT'];

    // Define our CSS filepath prefixed with 'DOCUMENT_ROOT'
    $css_file       = $docroot.substr($get_stylesheet, $docroot_length);

    // Define our PHP filepath prefixed with 'DOCUMENT_ROOT'
    $php_file       = $css_file.'.php';

    // Get the URI of our "style.css.php" file
    $php_cont       = file_get_contents($get_stylesheet.'.php');

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
