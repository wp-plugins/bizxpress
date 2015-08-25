/**
 * Copyright (c) 2007 Peter Michaux. All rights reserved.
 * petermichaux@gmail.com
 * http://forkjavascript.org
 * Code licensed under the MIT License:
 * http://dev.michaux.ca/svn/fork/trunk/public/javascripts/fork/MIT-LICENSE
 *
 * This code is based on Richard Cornford's jibbering tutorial on feature detection
 * http://www.jibbering.com/faq/faq_notes/not_browser_detect.html#bdScroll
 */


// Browser Reactions -----------------------------
// NN4.0 Syntax Error reported for ===
// NN4.8 isSupported() returns false
// NN6.0 untested
// NN6.1 isSupported() returns true
// IE4 isSupported() returns true
// IE5.01sp2 isSupported() returns true


var FORK = FORK || {};

FORK.Scroll = {
  
  getX: function() {
    FORK.Scroll.setup();
    return FORK.Scroll.getX();
  },
  
  getY: function() {
    FORK.Scroll.setup();
    return FORK.Scroll.getY();
  },
  
  setup: (function(){
    var global = this;

    return function() {
      var readScroll,
          readScrollY = 'scrollTop',
          readScrollX = 'scrollLeft';

      if (typeof global.pageXOffset == 'number') {
        readScroll = global;
        readScrollY = 'pageYOffset';
        readScrollX = 'pageXOffset';

      } else if ((typeof document.compatMode === 'string') &&
                 (document.compatMode.indexOf('CSS') >= 0) &&
                 (document.documentElement) &&
                 (typeof document.documentElement.scrollLeft=='number')) {

        readScroll =  document.documentElement;

      } else if ((document.body) &&
                 (typeof document.body.scrollLeft === 'number')) {
        readScroll =  document.body;    
      } else {
        FORK.Scroll.getX = FORK.Scroll.getY = function() {return NaN;};
        return;
      }
      FORK.Scroll.getX = function() {return readScroll[readScrollX];};
      FORK.Scroll.getY = function() {return readScroll[readScrollY];};  
    };
    
  })(),
  
  isSupported: function() {
    var en = true;
    
    if (isNaN(FORK.Scroll.getX())) {
      en = false;
    }
    
    FORK.Scroll.isSupported = function() {return en;};
    return en;
  }

};