# PHPCSS - verb - \'fiks\ ([http://git.io/ES9mpA](http://git.io/ES9mpA))

*Author:* Brandtley McMinn - [blog/portfolio](http://giggleboxstudios.net) - [@brandtleymcminn](http://twitter.com/brandtleymcminn)


## DESCRIPTION:
PHPCSS is a CSS psuedo-processor class built on PHP.

I designed it to be:

1. Server environment agnostic - PHP runs on virtually ANY server stack
2. Simple setup - Pretty much plug'n'play here
3. Simple syntax so you can hit the ground running.


## INSTALLATION:
Copy the repo contents into your project root folder and add the following CSS reference in your root document's <code>&lt;head&gt;</code> section:

<code>&lt;link rel="stylesheet" type="text/css" href="style.css.php"&gt;</code>

That's it!


## CLASS COMPONENTS:
### VARIABLES:
* Array: <code>$vendors</code> - Defines an array of vendor prefixes you wish to support.
  * Defult vendors include (<code>moz</code>,<code>webkit</code>,<code>ms</code>,<code>khtml</code>,<code>o</code>)

- - -
### METHODS:
* Public: <code>prefixit($attr,$args,$impt=null)</code> - Iterates through the <code>$vendors</code> array and echoes the appropriate prefixed CSS.
  * Public: <code>border_radius($args,$impt=null)</code> - prefixit() Wrapper method specifically for <code>border-radius</code> - accepts a <code>string</code> of shorthand or longhand values.
  * Public: <code>box_shadow($args,$impt=null)</code> - prefixit() Wrapper method specifically for <code>box-shadow</code> - accepts a <code>string</code> of shorthand or longhand values.
  * Public: <code>gradient($type,$args,$impt=null)</code> - prefixit() Wrapper method specifically for <code>gradient</code> - accepts a <code>string</code> defining the type of gradient (<code>linear</code> or <code>radial</code>) and a <code>string</code> of shorthand or longhand values.

- - -

## GENERAL USE:
### NOTE:
*This is not intended to run in a production environment!*
I've had numerous issues with PHP config errors and page header errors going from my local server to my live web server, so the time being, I advise you only use this in a development environment and copy/paste a static CSS file when you're ready to push live.

- - -

The <code>style.css.php</code> file is where you will edit and save your styles to, and has some examples of how to use the syntax. Feel free to edit it to your hearts content, however if you feel you need to add something to the <code>PHPCSS class</code>, please do so as a class extension per the example I've provided.

Use untested methods at your own risk. Future updates/merges will be provided in the <code>class.PHPCSS.php</code> file only.

I'll expand more here in future iterations ;)


## TODO LIST: (Last updated 6/6/2012)
* Add Method: <code>set_vendors</code> - Setter method to define custom array of supported vendor prefixes.
* Add Method: <code>fontface</code> - Method that iterates through a font list array to output a properly formatted @font-face list.
* Add Method: <code>font_size</code> - Method that outputs <code>pt</code>, <code>px</code> and <code>rem</code> values for <code>fontsize</code> and <code>line-height</code> attributes.
* Refactor Method: <code>gradient()</code> - Ideally this is supposed to wrap the <code>prefixit()</code> method, but the [gradient syntax](https://developer.mozilla.org/en/CSS/linear-gradient) requires the use of <code>background-image</code> as the attribute.
* Add Method: <code>generate_source()</code> - This would be a <code>private</code> magic function that would copy the generated source, minify it and dump it into a standard <code>style.css</code> file.

__/** I'm open to ideas, so hit me up on here or fork the source and make a change. If I like it, I'll merge it into the master. */__



- - -


### AUTHOR'S NOTE:
I'm providing this script because I love using this system over something like LESS or SASS. I feel it's a cleaner approach to CSS preprocessing that doesn't require learning a new syntax paradigm or frustrating setup issues and because I want to give back to the greater web/dev community for all the help and inspiration I've received over the years.

If you use this, Awesome! But what would be even better is if you credit me with a mention on [twitter](http://twitter.com/brandtleymcminn) or link back to here. I'd greatly appreciate it and would gladly reciprocate.

Please submit feedback to [labs@giggleboxstudios.net](mailto:labs@giggleboxstudios.net?subject=PHPCSS Suggestions) or fork the scripts if you have improvements you wish to make.

Peace,

Brandtley McMinn

GiggleboxStudios.net


- - -


### TROUBLESHOOTING:
_/** Waiting for feedback so I know how to support any problems that come with using the script */_


- - -

## LICENSE:

### Copyright: (c) 2011-2012 Brandtley McMinn, [http://giggleboxstudios.net](http://giggleboxstudios.net) - MIT License (MIT)

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

__THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.__
