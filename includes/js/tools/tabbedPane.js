var tabbedPane = {

    init: function() {
        // find the tabbed panes in the document
        var tps = FORK.Dom.getElementsByClass('tabbedPane', {root:document.body, tag:'div'});
        for (var i=tps.length; i--;) {
          tabbedPane.initSet(tps[i]);
        }
    },
    
    addTabClickListener: function(widget, tab, tabNumber) {
        FORK.Event.addListener(tab, 'click', function() {
            tabbedPane.setCurrentPane(widget,tabNumber);
        });        
    },
    addPrevNextClickListener: function(widget, link, tabNumber) {
        FORK.Event.addListener(link, 'click', function() {
            tabbedPane.setCurrentPane(widget,tabNumber);
        });        
    },
    
    addPrevNextLink: function(widget, pane, tabNumber, text, className) {
        var prev = document.createElement('p');
        prev.innerHTML = text;
        tabbedPane.addPrevNextClickListener(widget, prev, tabNumber);
        pane.appendChild(prev);
        FORK.Dom.addClass(prev, className);
    },
    
    getTitlesForPanes: function(panes) {
      var titles = [];
      for (var i=0, len=panes.length; i<len; i++) {
          var pane = panes[i];
          var h2 = pane.getElementsByTagName('h2')[0];
          // if the first h2 has a title attribut use it as the tab text
          titles.push (h2.title || h2.innerHTML || 'tab');
          //h2.title = ""; // don't want a tool tip            
      }
      return titles;
    },
    
    createTabUl: function(el, panes) {
      // create the ul at the top of the widget for the tabs
      var ul = document.createElement('ul');
      // get the titles
      var titles = tabbedPane.getTitlesForPanes(panes);

      // add the tabs
      var tabs = [];
      for (var i=0, len=panes.length; i<len; i++) {
        var pane = panes[i];
        // add the pane's tab
        var li = document.createElement('li');
        FORK.Dom.addClass(li, 'tab_'+i)
        // if (i==0) {
        //     tabbedPane.setCurrentPane(el, li, pane);
        // }
        tabbedPane.addTabClickListener(el, li, i);      
        li.appendChild(document.createTextNode(titles[i]));
        tabs.push(li);
        ul.appendChild(li);
      }
      return ul;
    },
    
    initSet: function(el) {
        var widgetNumber = Math.round(1000000 * Math.random());
        var cs = el.childNodes;
        // find the div elements which are the panes.
        var panes = [];
        for (var i=cs.length; i--;) {
          var c = cs[i];
          if (c.tagName && c.tagName.toLowerCase() == 'div') {
            panes.unshift(c);
          }
        }
        for (var i=0, ilen=panes.length; i<ilen; i++) {
            var pane = panes[i];
            FORK.Dom.addClass(pane, 'pane_'+i);
        }
        // create the ul at the top of the widget for the tabs
        var ul = tabbedPane.createTabUl(el, panes);
        FORK.Dom.addClass(ul, 'topMenu');
        el.insertBefore(ul, el.firstChild);

        // add the previous and next links at the bottom of the pane
        var titles = tabbedPane.getTitlesForPanes(panes);
        
        // for (var i=0, len=panes.length; i<len; i++) {
        //   var pane = panes[i];
        //   if (i>0) {
        //       tabbedPane.addPrevNextLink(el, pane, i-1, '&laquo; '+titles[i-1], 'previousLink');
        //   }
        //   if (i<(panes.length-1)) {
        //       tabbedPane.addPrevNextLink(el, pane, i+1, titles[i+1]+' &raquo;', 'nextLink');
        //   }
        // }

        var ul = tabbedPane.createTabUl(el, panes);
        FORK.Dom.addClass(ul, 'bottomMenu');
        el.appendChild(ul);

        
        // widgets are display:"none" by CSS when the page loads
        tabbedPane.setCurrentPane(el,0);
        el.style.display='block';
    },
    
    setCurrentPane: function(widget, tabNumber) {
        var speed = 30; // time between animation frames
        var step = 0.2; // change in opacity per frame
        var o = 1;
        
        // what is the y-coordinate of the tabbed pane in the page?
        function getY(el) {
            var y = 0;
            for (var e = el; e; e = e.offsetParent) {
                y += e.offsetTop;
            }
            for (e = el.parentNode; e && e != document.body; e=e.parentNode) {
                if (e.scrollTop) {
                    y -= e.scrollTop;
                }
            }
            return y;
        }
        
        function fadeOut() {
            o = Math.max((o-=step), 0);
            FORK.Style.setOpacity(currentPane, o); // TODO order
            if (o > 0) {
              setTimeout(fadeOut, speed);
            } else {
                switchPane();
            }
        }
        function addCurrent() {
          var tabs = FORK.Dom.getElementsByClass('tab_'+tabNumber, {root:widget});
          for (var i=0, ilen=tabs.length; i<ilen; i++) {
              var tab = tabs[i];
              FORK.Dom.addClass(tab, 'current');
          }
          var panes = FORK.Dom.getElementsByClass('pane_'+tabNumber, {root:widget});
          for (var i=0, ilen=panes.length; i<ilen; i++) {
              var pane = panes[i];
              FORK.Dom.addClass(pane, 'current');
          }
        }
        function switchPane() {
            // set opacity on new current pane
            FORK.Style.setOpacity(pane, 0);

            // switch to new current pane
            for (var i=0; i<cs.length; i++) {
              FORK.Dom.removeClass(cs[i], 'current');
            }
            addCurrent();
            var y = getY(widget)-20;
            if (y<FORK.Scroll.getY()) {
                window.scrollTo(FORK.Scroll.getX(), y);
            }
            fadeIn();
        }
        function fadeIn() {
            o = Math.min((o+=step), 1);
            FORK.Style.setOpacity(pane, o);
            if (o < 1) {
              setTimeout(fadeIn, speed);
            }
        }
        var panes = FORK.Dom.getElementsByClass('pane_'+tabNumber, {root:widget});
        var pane = FORK.Dom.getElementsByClass('pane_'+tabNumber, {root:widget})[0];
        var cs = FORK.Dom.getElementsByClass('current', {root:widget});
        if (cs.length>0) { // if the length is not zero then it will be exactly two
            var currentPane = (cs[0].tagName && cs[0].tagName.toLowerCase=="div" ? cs[0] : cs[1]); 
            fadeOut();
        }
        else {
            // first time this function has run for this particular widget
            // and need to show the first/default pane
            addCurrent();
        }
    }

};
FORK.Event.addListener(window, 'load', tabbedPane.init, {scope:tabbedPane});
