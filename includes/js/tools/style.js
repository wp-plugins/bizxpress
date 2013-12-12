var FORK = FORK || {};
FORK.Style = {
  setOpacity: function(el, val) {
    if (typeof el == 'string') {el=document.getElementById(el);}
    if (val<0.00001) {val = 0;}
    var s = el.style;
    if (typeof s.filter == 'string') {
      s.filter = s.filter.replace(/alpha\([^\)]*\)/gi,'') + ((val < 1) ? 'alpha(opacity='+val*100+')' : '');

      if (!el.currentStyle ||
          !el.currentStyle.hasLayout) {
        el.style.zoom = 1;
      }
    } else {
      s.opacity = val;
      s.MozOpacity = val;
      s.KhtmlOpacity = val;
    }
  }
};
