## Magento Minify HTML

### Magento module
Minify HTML for Magento to help improve Google Page Speed rank.


### Synopsis
This Magento module ports the html minify code from minify into a Magento module to minify html output from Magento pages.

The html is modified with the http_response_send_before event. The minified html is returned to the system and should then be cached as usual.


### Version
***
	@version		0.1.0
	@since			05 2015
	@author			gaiterjones
	@documentation	blog.gaiterjones.com
	@twitter		twitter.com/gaiterjones
	
### Installation

modman
modman clone https://github.com/gaiterjones/magento-minifyhtml

manual
Extract the module and copy the files to the /app folder of your magento installation. Refresh your cache, log out of admin and back in again.

### Configuration

Enable or Disable the module output under 

	System>Configuration>General->Minify HTML
	



## License

The MIT License (MIT)
Copyright (c) 2015 Peter Jones

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.