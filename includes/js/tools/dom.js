/**
 * Copyright (c) 2006, Yahoo! Inc. All rights reserved.
 * Code licensed under the BSD License:
 * http://developer.yahoo.net/yui/license.txt
 * Version: 0.11.3
 *
 * Modified by Peter Michaux Nov 2006
 * for inclusion in the Fork JavaScript library
 * http://forkjavascript.org
 */

// Browser Reactions -----------------------------
// NN4.0 Syntax Error reported for ===
// NN4.8 isSupported() returns false
// NN6.0 untested
// NN6.1 isSupported() returns true
// IE4 syntax error because test regexp in isSupported() has "Unexpected quantifier"
// IE5.01sp2 syntax error because test regexp in isSupported() has "Unexpected quantifier"
// IE5.5 isSupported() returns true


var FORK = FORK || {};

FORK.Dom = {
  
  getElementsBy: function(method, tag, root) {
    tag = tag || '*';
    if (typeof root == "string") { root = document.getElementById(root); }
    root = root || document;

    var nodes = [];
    var elements = root.getElementsByTagName(tag);

    if ( !elements.length && tag == '*' && root.all ) {
      elements = root.all; // IE < 6
    }

    for (var i=0, len=elements.length; i<len; ++i) {
      if (method(elements[i])) { nodes[nodes.length] = elements[i]; }
    }

    return nodes;
  },

  hasClass: function(el, className) {
    if (typeof el == 'string') { el = document.getElementById(el);}
    var re = new RegExp('(?:^|\\s+)' + className + '(?:\\s+|$)');
    return re.test(el.className);
  },

  getElementsByClass: function(className, options) {
    options = options || {};
    var thisC = this;
    var method = function(el) { return thisC.hasClass(el, className); };
    return this.getElementsBy(method, options.tag, options.root);
  },

  addClass: function(el, className) {
    if (typeof el == 'string') { el = document.getElementById(el);}
    if (this.hasClass(el, className)) { return; } // already present
    el.className = [el.className, className].join(' ');
  },

  removeClass: function(el, className) {
    if (typeof el == 'string') { el = document.getElementById(el);}
    if (!this.hasClass(el, className)) { return; } // not present
    var re = new RegExp('(?:^|\\s+)' + className + '(?:\\s+|$)', 'g');
    var c = el.className;
    el.className = c.replace(re, ' ');
    if ( this.hasClass(el, className) ) { // in case of multiple adjacent
      this.removeClass(el, className);
    }
  },
  
  isSupported: (function() {
    // IE 5.01 has regular expressions but they are not powerful enough.
    // Try one here that has all the power required for this lib to run
    // and browsers without enough power will show a syntax error as this page loads
    // and FORK and FORK.Dom will never be defined
    var re = /(?:^|\s+)a(?:\s+|$)/g,
        en = false;

    if (document.getElementById &&
        //document.getElementsByTagName && // very old and should be no need to test
        //typeof [].join === "function" &&
        typeof RegExp === "function" &&
        typeof "".replace === "function" &&
        "a".match(re) // Opera 6.0.6 doesn't syntax error on the regular expression above but this match will return null
      ) {
      en = true;
    }    
    return function() {return en;};
  })()

};