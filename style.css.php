<?php

/**
 *  File Name:  style.css.php
 *
 *  Author:     Brandtley McMinn
 *  URI:        http://giggleboxstudios.net
 *  Github:     https://github.com/bmcminn
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

header('content-type:text/css');

// Include assets
include_once('css/globals.css.php');
include_once('css/normalize.css');
/* OR */
// include_once('css/reset.css');
/* I don't recommend using both normalize.css AND reset.css to avoid conflicts */

?>@charset "utf-8";

/**
* File Name: style.css.php
* Author: Brandtley McMinn - http://giggleboxstudios.net
* Description: Root file for defining all your CSS styles.
* It is roughly based on aspects I like from
* the HTML5 boilerplate framework by Paul Irish (@paul_irish) (http://html5boilerplate.com)
* It automatically pulls in all respective files and generates a single valid CSS file.
*/

/* Start all site styles here */

/* BASE HTML STYLES
=============================================*/
body { font: 62.5% Helmet, Freesans, sans-serif; background: <?php echo $white; ?>; }
body, select, input, textarea { color: <?php echo $black; ?>; font-size: 1.0rem; }

a, a:hover, a:visited { color: <?php echo $white; ?>; text-decoration: none; }

::-moz-selection { background: <?php echo $blue; ?>; color: <?php echo $white; ?>; text-shadow: none; }
::selection { background: <?php echo $blue; ?>; color: <?php echo $white; ?>; text-shadow: none; }

a:link { -webkit-tap-highlight-color: #fcd700; }

ins { background-color: #fcd700; color: #000; text-decoration: none;}
mark { background-color: #fcd700; color: #000; font-style: italic; font-weight: bold;}


/* HEADER:
=============================================*/



/* BODY:
=============================================*/



/* FOOTER: F***YEAH FOOTERS!!
=============================================*/



/* Non-semantic helper classes
=============================================*/
.ir { display: block; border: 0; text-indent: -999em; overflow: hidden; background-repeat: no-repeat; text-align: left; direction: ltr; }
.ir br { display: none; }

.hidden { display: none; visibility: hidden; }

.visuallyhidden { border: 0; clip: rect(0 0 0 0); height: 1px; margin: -1px; overflow: hidden; padding: 0; position: absolute; width: 1px; }
.visuallyhidden.focusable:active,
.visuallyhidden.focusable:focus { clip: auto; height: auto; margin: 0; overflow: visible; position: static; width: auto; }

.invisible { visibility: hidden; }

.clearfix:before, .clearfix:after { content: ""; display: table; }
.clearfix:after { clear: both; }
.clearfix { zoom: 1; }


/* JS BASED MEDIA QUERIES
===============================================*/
.container { max-width: 940px; margin: 0 auto; padding-left: 15px; padding-right: 15px; }
.container.w480 { padding-left: 10px; padding-right: 10px; }

.w480 #site-nav { float: left; }
.w480 #site-nav .site-nav-parent { margin-left: 0; margin-right: 3%; }
.w480 #site-logo { width: 80%; background-position: top center; margin: 0 auto 5px; }

<?php include_once('css/print.css'); // based on http://code.google.com/p/universal-ie6-css/ ?>
<?php include_once('css/mediaqueries.css.php'); ?>
