(function() {
	var global = this;

	// Browser detection for Chrome and Safari
	ua = navigator.userAgent.toLowerCase(),
	check = function(r){
		return r.test(ua);
	}
	isChrome = check(/\bchrome\b/);
	isWebKit = check(/webkit/);
	isSafari = !isChrome && check(/safari/);
	isSafari5 = isSafari && check(/version\/5/);	
	
	// Function for video links in help
	function doOpenVid(url, name, params) {
		
		// Default function parameters
		var options = {
			'toolbar':    'no',
			'location':   'no',
			'status':     'no',
			'menubar':    'no',
			'scrollbars': 'no',
			'resizable':  'yes'
		};
		
		// Merge default parameters with passed parameters
		for (var p in params) {
			options[p] = params[p];
		}
		
		// Convert the parameters into their window.open function equivalents
		var aOptions = []
		for (var p in options) {
			aOptions.push(p+'='+options[p]);
		}
		
		// Check if the new window can be focused
		var w = window.open(url, name, aOptions.join(','));  
		if (w && typeof w.focus != 'undefined') {
			w.focus();
		}
	}
  
	// Video links in help to open without browser menu, status bar, etc.
	// pre-set to 856px wide and 522px high;
	// Include this in the link to the video: onclick="return popvid(this.href)"
	global.popvid = function(url, width, height) {
		var height = isSafari5 ? 462 : 522;
		doOpenVid(url, 'videos', {width: 856, height: height});
		return false;
	};
  
})();