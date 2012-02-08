# PHP-to-CSS
*Author:* Brandtley McMinn -- http://giggleboxstudios.net


## FILE STRUCTURE:
I tried to make this as simple to use as possible, so to start you have three (3) main files.

+   "style.css" - you link to this file in your document's &lt;head&gt; section
+   "style.css.php" - you write your CSS in this file
+   "css_update.php" - you include or require towards to top of any global php resource document in your app or site. I find including it in my functions.php (WordPress or otherwise) works nicely. This updates "style.css" on page load provided it's last mod time is newer than "style.css"


- - -

## INSTALLATION:
Setup should take a minute or two. (See TROUBLESHOOTING should you have issues)

Download the .zip from github ([http://t.co/3IqdI676] (http://t.co/3IqdI676))





### OVERVIEW:
This is a PHP based system for generating CSS dynamically without relying on SASS or SCSS. I wanted a simple way to generate CSS that supported variables, custom functions/mixins and anything else I could think of, like CSS grid generation.

I made this script for my local development workflow, because it's very much set-and-forget; which I'm a huge fan of. eg:

1. It keeps an eye on itself and updates "style.css" when it needs to. (No tedious updating)
2. I like that I can use PHP to concatenate all my CSS resources in one file. (Very little HTTP overhead ++good)
3. The functions I've built into it handle fontsize attributes in PX and REM values, so future proof while being backwards compatible.
4. It handles many vendor prefixed CSS3 attributes, and I can define which vendors I wish to support. (limits Kb bloat)
5. I like that I can dump this on any local/remote server and it works. No ruby setup and very few config headaches.
4. It's easy to push to production. Comment out the reference to "style.css.php" and you're good to go since you already reference the "style.css" in your document &lt;head&gt;

I feel this is a cleaner approach to CSS preprocessing that doesn't require learning a new syntax or method. I'm providing this script because I wanted to give back to the greater web/dev community for all the help and inspiration I've received over the years and hopefully you enjoy using this.

Please submit feedback or branch it if you have improvements you wish to make.

Peace,

Brandtley McMinn
GiggleboxStudios.net

- - -


### TROUBLESHOOTING:
*style.css isn't being updated*

- Make sure the proper css_file definition points to your "style.css" file. You have to define this manually, Because I have no idea where you may store this file in your file structure.



## LICENSE:

### Copyright: (c) 2011-2012 Brandtley McMinn, Gigglebox Studios. - MIT License (MIT)

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

*THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.*
