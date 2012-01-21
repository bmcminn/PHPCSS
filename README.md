# PHP-to-CSS
This is a PHP based system for generating CSS dynamically without relying on SASS or SCSS or [insert other CSS pre-processor system]

## PREFACE:
I wanted a simple system to tie into my PHP based projects that gave me the ability to define variables and functions for my CSS. SASS and SCSS never did it for me, because I work on Windows with a local dev server and setting those up proved more complicated than necessary. So I made my own system.

I started development of this system back in January of 2011 a have had much success with its stability thus far. So I've decided to finally opensource it and let the greater community decide what features may improve it down the line.

---

## COMPONENTS:
### Files:
*style.css.php:*
This file is the *root of the system. All the necessary style sheets you would normally @import are simply *included as you would any other .php file.

This makes segmenting your CSS very easy and all included file dependencies are stored in the 
*update_stylesheet.wp.php:*
