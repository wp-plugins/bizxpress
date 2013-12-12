/**
 * Copyright (c) 2007 Peter Michaux. All rights reserved.
 * petermichaux@gmail.com
 * http://forkjavascript.org
 * Code licensed under the MIT License:
 * http://dev.michaux.ca/svn/fork/trunk/public/javascripts/fork/MIT-LICENSE
 */

// Browser Reactions -----------------------------
// NN4.0 Syntax Error reported for ===
// NN4.8 Syntax Error because "try is a reserved identifier"
// NN6.0 untested
// NN6.1 isSupported() returns true
// FF2 isSupported() returns true
// IE4 syntax error
// IE5.01sp2 isSupported() returns false
// IE5.5 isSupported() returns true
// IE6 isSupported() returns true
// O9 isSupported() returns true
// S2 isSupported() returns true

var FORK = FORK || {};


FORK.Event = {
  
  /**
   * Cache of listeners
   * @type array
   * @private
   */
  listeners: [],

  /**
   * Cache of user-defined unload functions that will be fired
   * before all events are detached manually window.onunload
   * @type array
   * @private
   */
  unloadListeners: [],
  
  // Need this for safari bugs but treat all browsers the same.
  // so no surprises. TODO write docs about this.
  _useLegacyListener: function(type) {
    return (type === 'click' || type == 'dblclick'); // use === once here to get NN4 to syntax error asap
  },


  /**
   * Appends an event handler
   *
   * @param {Object}   el        The html element to assign the 
   *                             event to
   * @param {String}   type     The type of event to append
   * @param {Function} fn        The method the event invokes
   * @param {Object}   options   For example {scope:myObj, argument:otherObj}
   *                             The scope object will be the scope in which the handler
   *                             is called. The argument object (array, fnc, or primative etc) will be 
   *                             passed as a parameter to the handler.
   */
  addListener: function(el, type, fn, options) {
    if (!this._isSupported()) {return false;}
    if (typeof el == "string") { el = document.getElementById(el); }
    options = options || {};
    
    var obj = {el:el, type:type, fn:fn, options:options};
    // if the user chooses to override the scope, we use the custom
    // object passed in, otherwise the executing scope will be the
    // HTML element that the event is registered on
    var scope = (options.scope) ? options.scope : el;
    var argument = options.argument;
    
    // wrap the function so it executes in the correct scope;
    obj.wrappedFn = function(e) {
                      return fn.call(scope, e, argument);
                    };

    
    // we need to make sure we fire registered unload events 
    // prior to automatically unhooking them.  So we hang on to 
    // these instead of attaching them to the window and fire the
    // handlers explicitly during our one unload event.
    if ("unload" == type && this.unloadListenerAttached) {
      if (this._getCacheIndex(this.unloadListeners, el, type, fn) < 0) {
        this.unloadListeners.push(obj);
      }
      return;
    }


    var attached = false;
    
    if (this._useLegacyListener(type)) {
      if (!el['on' + type] ||
          !el['on' + type].legacyListeners) { // overwrites existing DOM0 event handler.
                                              // TODO write docs about this.

        el['on' + type] = function(e) {
                             e = e || window.event;
                             // This local variable that references the legacy listeners
                             // must not be named "legacyListeners" because
                             // Netscape 6 has a strange set of properties for
                             // arguments.callee that seems to combine all the properties
                             // of arguments.callee and the local variables.
                             //
                             // The use of slice to create a new array is in the case of a listener
                             // removing itself. Without the slice the next listener would not run
                             // as all the unrun listeners shift to an index one less. 
                             var lls = arguments.callee.legacyListeners.slice(0);
                             for (var i=0, len=lls.length; i<len; i++) {
                               var l = lls[i];
                               if (l) {
                                 /*
                                 ** Wrap handler in a try-catch so that if one handler throws an error
                                 ** then the others still run. I tested IE6, FF1.5, O9, S2 and
                                 ** they all really do behave this way.
                                 */
                                 try {
                                   // When an event fires, if one listener removes a listener that has not yet run
                                   // then when the listener that has not yet run tries to run the next line will 
                                   // error. This is good. This is because the listener that has not yet run has
                                   // had it's wrappedFn property set to null in the FORK.Event.removeListener().
                                   // The next line will throw a "wrappedFn is not a function" error.
                                   l.wrappedFn(e);
                                 } catch (er) {
                                     console.log(er);
                                 }
                               }
                             }
                           };

        el['on' + type].legacyListeners = [];

      } else if (this._getCacheIndex(el['on' + type].legacyListeners, el, type, fn) >= 0) {
        // already have this listener cached so we don't want to add it again
        return;
      }

      // cache with the handler, all legacyListeners for this element and event
      el['on' + type].legacyListeners.push(obj);
      
      attached = true;
      
    // DOM2 Event model
    } else if (el.addEventListener) {
        el.addEventListener(type, obj.wrappedFn, false);
        attached = true;
    // IE
    } else if (el.attachEvent) {
        el.attachEvent("on" + type, obj.wrappedFn);
        attached = true;
    }

    if (attached) {
      // cache all listeners
      this.listeners.push(obj);

      if ("unload" == type) {this.unloadListenerAttached = true;}
    }
  },
  
  /**
   * Removes an event handler
   *
   * @param {Object} el the html element or the id of the element to 
   * assign the event to.
   * @param {String} type the type of event to remove
   * @param {Function} fn the method the event invokes
   * @return {boolean} true if the unbind was successful, false 
   * otherwise
   */
  removeListener: function(el, type, fn) {
    if (typeof el == "string") { el = document.getElementById(el); }

    var cache = (type=='unload' ? this.unloadListeners : this.listeners);

    var i = this._getCacheIndex(cache, el, type, fn);
    if (i < 0) {return;} // not found
    var obj = cache[i];
    cache.splice(i, 1);

    if (type != 'unload') {
      if (this._useLegacyListener(type)) {
        i = this._getCacheIndex(el['on' + type].legacyListeners, el, type, fn);
        el['on' + type].legacyListeners.splice(i, 1);
        if (el['on' + type].legacyListeners.length < 1) {
          el['on' + type] = null;
        }
      } else if (el.removeEventListener) {
        el.removeEventListener(type, obj.wrappedFn, false);
      } else if (el.detachEvent) {
        el.detachEvent("on" + type, obj.wrappedFn);
      }
    }
    
    // IE memory leak
    obj.fn = null;
    // TRICKY: Do not change the following line. See note about legacy listeners
    // in try-catch in FORK.Event.addListener()
    obj.wrappedFn = null;
  },

  /**
   * @private
   * Locating the saved event handler data by function ref
   */
  _getCacheIndex: function(arr, el, type, fn) {
    for (var i=arr.length; i--; ) {
      var li = arr[i];
      if ( li && li.el == el  && li.type == type && li.fn == fn ) {
        return i;
      }
    }
    return -1;
  },

  /**
   * Removes all listeners.  Called 
   * automatically during the unload event.
   * @private
   */
  _unload: function(e) {
    e = e || window.event;
    var i, l, len;
    for (i=0,len=this.unloadListeners.length; i<len; ++i) {
      l = this.unloadListeners[i];
      if (l) {
        try {
          l.wrappedFn(e);
        } catch (err) {}
        // IE memory leak
        l.fn = null;
        l.wrappedFn = null;
      }
    }
    for (i=this.listeners.length; i-- ; ) {
      var li = this.listeners[i];
      if (li) {
        this.removeListener(li.el, li.type, li.fn);
      } 
    }
  },
  
  /**
   * Call purgeElement to remove all listeners added through the FORK.Event API
   * Always call this before removing an element from the DOM with the deep option true.
   * This method takes care of Internet Explorer memory leaks.
   *
   * @param {Object}   el        The html element to assign the 
   *                             event to
   * @param {Object}   options   For example {type:'click', deep:true}
   *                             The type specifies the type of event to purge. If omitted will purge all types.
   *                             If deep is true then all child elements will also be purged of
   *                             the same type or all depending on the type option.
   */
  purgeElement: function(el, options) {
    if (typeof el == 'string') { el = document.getElementById(el);}
    options = options || {};
    var i,
        elListeners = this._getListeners(el, options.type);

    for (i=elListeners.length; i--; ) {
      var l = elListeners[i];
      this.removeListener(el, l.type, l.fn);
    }
    
    if (options.deep && el.childNodes) {
      for (i=el.childNodes.length; i--; ) {
        this.purgeElement(el.childNodes[i], options);
      }
    }
  },

  /**
   * @private
   */
  _getListeners: function(el, type) {
    var elListeners = [];
    for (var i=this.listeners.length; i--;) {
      var l = this.listeners[i];
      if (l && l.el === el &&
          (!type || type === l.type) ) {
        elListeners.push(l);
      }
    }
    return elListeners;
  },
  
  /**
   * Stops event propagation
   * @param {Event} e the event
   */
  stopPropagation: function(e) {
    if (e.stopPropagation) {
      e.stopPropagation();
      return true;
    }
    if (e.cancelBubble !== undefined) { // cancelBubble false by default
      e.cancelBubble = true;
      return true;
    }
    return false;
  },

  /**
   * Prevents the default behavior of the event
   * @param {Event} e the event
   */
  preventDefault: function(e) {
    if (e.preventDefault) {
      e.preventDefault();
      return true;
    }
    if (e.cancelBubble !== undefined){ // can't test returnValue directly?
      e.returnValue = false;
      return true;
    }
    return false;
  },

  /**
   * Returns the event's target element
   * @param {Event} e the event
   * @return {HTMLElement} the event's target or null if one not found
   */
  getTarget: function(e) {
    var t = e.target || e.srcElement;
    return this.resolveTextNode(t);
  },

  /**
   * In some cases, some browsers will return a text node inside
   * the actual element that was targeted.  This normalizes the
   * return value for getTarget and getRelatedTarget.
   * @param {HTMLElement} node The node to resolve
   * @return {HTMLElement} the normized node
   */
  resolveTextNode: function(node) {
    if (node && node.nodeName && "#TEXT" == node.nodeName.toUpperCase()) {
      return node.parentNode;
    }
    return node;
  },

  /**
   * Returns the event's related target 
   * @param {Event} e the event
   * @return {HTMLElement} the event's relatedTarget or null if one not found
   */
  getRelatedTarget: function(e) {
    var t = e.relatedTarget;
    if (!t) {
      if (e.type == "mouseout") {
        t = e.toElement;
      } else if (e.type == "mouseover") {
        t = e.fromElement;
      }
    }
    return this.resolveTextNode(t);
  },

  /**
   * Example
   * var x = FORK.Event.getPageX(e);
   * if (isNaN(e)) {
   *  //the event's location could not be determined reliably
   * }
   */
  /**
   * More research
   * http://groups.google.com/group/comp.lang.javascript/msg/5fba397533674565
   * http://groups.google.com/group/comp.lang.javascript/msg/cb44f181aac86c37
   *
   * Note there is some 2px wierdness in Internet Explorer related to the bevel
   * around the inside of the browser window. If two values of getPageX are 
   * compared then their difference will cancel out the 2px difference.
   */
  getPageX: (function(){
              
              function page(e) {return e.pageX;} // Firefox, Safari
              var getX = FORK.Scroll.getX; // save two dot operations for efficiency
              function client(e) {return getX()+e.clientX;} // IE
              function not() {return NaN;}
              
              return function(e) {
                // Safari's clientX property is in page coordinates so we have to try
                // the old pageX property first since the pageX property is assumed
                // to be in page coordinates which is exactly what we want.
                if (typeof e.pageX == 'number') {
                  FORK.Event.getPageX = page;
                } else if (FORK.Scroll && !isNaN(FORK.Scroll.getX()) && typeof e.clientX == 'number') {
                  // If the clientX property is a number we are assuming it is in window coordinates
                  // and that we must add the page scroll amounts to get page coordinates.
                  FORK.Event.getPageX = client;
                } else {
                  FORK.Event.getPageX = not;
                }
                return FORK.Event.getPageX(e);
              };
              
             })(),

  getPageY: (function(){
    
              function page(e) {return e.pageY;}
              var getY = FORK.Scroll.getY;
              function client(e) {return getY()+e.clientY;}
              function not() {return NaN;}

              return function(e) {
                if (typeof e.pageY == 'number') {
                  FORK.Event.getPageY = page;
                } else if (FORK.Scroll && !isNaN(FORK.Scroll.getY()) && typeof e.clientY == 'number') {
                    FORK.Event.getPageY = client;
                } else {
                  FORK.Event.getPageY = not;
                }
                return FORK.Event.getPageY(e);
              };
            })(),

  _isSupported: (function() {
    var en = false;
    if (typeof (function(){}).call === "function" &&
        document.getElementById &&
        typeof([].splice) === "function" &&
        typeof([].push) === "function" &&
        (window.addEventListener || window.attachEvent)
       ) {
      en = true;
    }
    return function() {return en;};
  })(),
  
  isSupported: function() {
    var en = false;
    if (FORK.Event._isSupported() && FORK.Scroll && FORK.Scroll.isSupported()) {
      en = true;
    }
    FORK.Event.isSupported = function() {return en;};
    return en;
  }
  
};
/* handle IE memory leak on page unload */
FORK.Event.addListener(window, "unload", FORK.Event._unload, {scope: FORK.Event});