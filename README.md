# PHPCSS - ([http://git.io/ES9mpA](http://git.io/ES9mpA))

*Pronounced: "FIXED"*

*Author:* Brandtley McMinn -

blog/portfolio - [http://giggleboxstudios.net](http://giggleboxstudios.net)

twitter - [http://twitter.com/brandtleymcminn](&#64;brandtleymcminn)


## INSTALLATION:
To keep things as simple as possible, dump these files where ever your index file is located.

+ "style.css" - Link to this file in your document's &lt;head&gt; section.
+ "style.css.php" - *ONLY* edit this file.
+ "globals.css.php" - Defines all variables and functions to be used in "style.css.php"
+ "css_update.php" - Include this document towards to top of any global php resource document in your app or site. I find including it in my functions.php (WordPress or otherwise) works nicely.

And you're done! Well... Almost.

The next section goes over some of the finer points.


## GETTING STARTED:
The idea is simplicity, so the only file you will need to edit is "style.css.php".

Open it up and look over the source.

Basically, follow the commented instructions I've provided within the file itself and don't touch anything above or below sections where noted.

ie: _/* DON'T EDIT [ABOVE/BELOW] THIS LINE */_

When you call a function or a variable, just open up a PHP statement like you normally would and be sure to close it when you're finished.

You do this and things will get along just fine. Save the file and reload your page, the script does a check to see if "style.css.php" is newer than "style.css". If it is, then we write its contents to "style.css" and viola!

(See TROUBLESHOOTING if you have any issues)


- - -


### AUTHOR'S NOTE:
I made this script because I like to set-and-forget things. It's a simple PHP based system for generating CSS in a dynamic fashion without having to configure a CSS preprocessor or manually updating files. I wanted a simple way to generate CSS that supported variables, custom functions/mixins and anything else I could think of and worked across all of my main production platforms, and so I made PHPCSS.

PHPCSS sports the following features.

1. Monitors itself and updates "style.css" when it needs to. (No tedious, manual updating)
2. Server agnositic, so you can use it on any server that supports PHP. (Most any server does anyway)
3. Concatenates all CSS resources in one file via include/require statements. (Very little HTTP overhead ++good)
4. Predefined functions that provide:
    - Fontsize and line-height attributes in PX and REM values, (future proof typesetting while being backwards compatible)
    - Define which vendor prefixes to support via array definition.
    - Vendor prefixed CSS3 attributes with standard attribute.
5. Push your site live with one code change. Comment out the reference to "style.css.php" and you're good to go since you already reference the "style.css" in your document &lt;head&gt;

I'm providing this script since I feel this is a cleaner approach to CSS preprocessing that doesn't require learning a new syntax or frustrating setup issues, and because I wanted to give back to the greater web/dev community for all the help and inspiration I've received over the years.

If you use this, Awesome! But I would appreciate you crediting me with a mention on twitter or link back to here.

Please submit feedback or fork the scripts if you have improvements you wish to make.

Peace,

Brandtley McMinn
GiggleboxStudios.net


- - -


### TO-DO LIST:

1. Integrate CSSrefresh-like dynamic CSS updates without reloading page via AJAX call to css_update.php. (Similar to [http://cssrefresh.frebsite.nl/](http://cssrefresh.frebsite.nl/))
    - This would eliminate needing to include PHP resources, and result in link a JS file in the &lt;head&gt; section instead.
2. Possible version control on css_update? (Remove older style.css files to a repo bin for backup purposes)

* I'm open to ideas, so hit me up on here or fork the source and make a change. If I like it, I'll merge it into the master *


- - -


### TROUBLESHOOTING:
* Waiting for feedback so I know how to support any problems that come with using the script *


- - -

## LICENSE:

### Copyright: (c) 2011-2012 Brandtley McMinn, [http://giggleboxstudios.net](http://giggleboxstudios.net) - MIT License (MIT)

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

__THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.__
