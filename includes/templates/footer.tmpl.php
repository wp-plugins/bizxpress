<!-- start footer -->
<div id="footer">
  <p class="legal">
	<a href="http://www.sitesell.com/s-copyrights.html" onclick="SS_openLegalPopup(this.href);return false;">&copy; SiteSell.com. All rights reserved.</a>  |
	<a href="http://www.sitesell.com/termsOfUse.html" onclick="SS_openLegalPopup(this.href);return false;">Terms of Use</a> |
	<a href="http://www.sitesell.com/privacy.html" onclick="SS_openLegalPopup(this.href);return false;">Privacy Policy</a>
  </p>
</div>


<script type="text/javascript">
    var SS_openLegalPopup = function (url) {
        var w = window.open(url, '_blank', 'toolbar=yes,location=yes,status=yes,menubar=yes,scrollbars=yes,resizable=yes,height=650,width=555');
        setTimeout(function () {
            try {
                w.focus();
            } catch (ignore) {
                // There is nothing to do here. If focus fails, it is not a fatal problem.
            }
        }, 50);
        return w;
    };
</script>
<!-- end footer -->