# PHP-to-CSS
* Author: Brandtley McMinn
* URI: http://giggleboxstudios.net
* Blog: http://the-soapbox.info/

## DESCRIPTION:

This is a PHP based system for generating CSS dynamically without relying on SASS or SCSS or [insert other CSS pre-processor system]

---

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

## LICENSE:

##Copyright: (c) 2011-2012 Brandtley McMinn, Gigglebox Studios. - MIT License (MIT)

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
