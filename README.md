# PHPCSS - ([http://git.io/ES9mpA](http://git.io/ES9mpA))

*Pronounced: "FIXED"*

*Author:* Brandtley McMinn - [blog/portfolio](http://giggleboxstudios.net) - [@brandtleymcminn](http://twitter.com/brandtleymcminn)


## INSTALLATION:
To keep things as simple as possible, dump these files where ever your index file is located.

+ <code>style.css</code> - Link to this file in your document's <code>&lt;head&gt;</code> section.
+ <code>style.css.php</code> - *ONLY* edit this file.
+ <code>globals.css.php</code> - Defines all variables and functions to be used in <code>style.css.php</code>
+ <code>css_update.php</code> - Include this document towards to top of any global php resource document in your app or site. I find including it in my <code>functions.php</code> (WordPress or otherwise) works nicely.

And you're done! Well... Almost.

The next section goes over some of the finer points.


## GETTING STARTED:
The idea is simplicity, so the only file you will need to edit is <code>style.css</code>.

Open it up and look over the source.

Basically, follow the commented instructions I've provided within the file itself and don't touch anything above or below sections where noted.

ie: <code>_/* DON'T EDIT [ABOVE/BELOW] THIS LINE */_</code>

When you call a function or a variable, just open up a <code>&lt;?php</code> statement like you normally would and be sure to close it when you're finished.

You do this and things will get along just fine. Save the file and reload your page, the script does a check to see if <code>style.css.php</code> is newer than <code>style.css</code>. If it is, then we write its contents to <code>style.css</code> and viola!

(See TROUBLESHOOTING if you have any issues)


- - -


### AUTHOR'S NOTE:
I made this script because I like to set-and-forget things. It's a simple PHP based system for generating CSS in a dynamic fashion without having to configure a CSS preprocessor or manually updating files. I wanted a simple way to generate CSS that supported variables, custom functions/mixins and anything else I could think of and worked across all of my main production platforms, and so I made PHPCSS.

PHPCSS sports the following features.

1. Monitors itself and updates <code>style.css</code> when it needs to. (No tedious, manual updating)
2. Server agnositic, so you can use it on any server that supports PHP4/5. (Most any server does anyway)
3. Concatenates all CSS resources in one file via include/require statements. (Very little HTTP overhead ++good)
4. Predefined functions that provide:
    - <code>fontsize</code> and <code>line-height</code> attributes in PX and REM values, (future proof typesetting while being backwards compatible)
    - Define which vendor prefixes to support via array definition.
    - Vendor prefixed CSS3 attributes with standard attribute definition.
5. Push your site live with one code change. Comment out the reference to <code>style.css.php</code> and you're good to go since you already reference the <code>style.css</code> in your document &lt;head&gt;

I'm providing this script because this is a cleaner approach to CSS preprocessing that doesn't require learning a new syntax or frustrating setup issues and because I want to give back to the greater web/dev community for all the help and inspiration I've received over the years.

If you use this, Awesome! But what would be even better is you crediting me with a mention on twitter or link back to here. I'd greatly appreciate it and would gladly reciprocate.

Please submit feedback or fork the scripts if you have improvements you wish to make.

Peace,

Brandtley McMinn

GiggleboxStudios.net


- - -


### TO-DO LIST:

1. Integrate dynamic CSS updates without reloading page, via AJAX call to <code>css_update.php</code>. (Similar to [http://cssrefresh.frebsite.nl/](http://cssrefresh.frebsite.nl/))
    - This would eliminate needing to include PHP resources, in favor of linking a JS file in the &lt;head&gt; section.
2. Possible version control on <code>css_update.php</code>? (Remove older <code>style.css</code> files to a repo bin for backup purposes)
3. Double check any possible security exploits... I'm not an expert in this arena, so any help would be greatly appreciated. <code>css_update.php</code> doesn't accept any input values, nor does it read any values defined by the URL, so I don't think injection hacks could be applied.

__/** I'm open to ideas, so hit me up on here or fork the source and make a change. If I like it, I'll merge it into the master. */__


- - -


### TROUBLESHOOTING:
_/** Waiting for feedback so I know how to support any problems that come with using the script */_


- - -

## LICENSE:

### Copyright: (c) 2011-2012 Brandtley McMinn, [http://giggleboxstudios.net](http://giggleboxstudios.net) - MIT License (MIT)

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

__THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.__
