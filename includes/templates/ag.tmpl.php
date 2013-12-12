<style type="text/css">
        /* action guide */

        .headline-msg {
            font-size: 12px !important;
            position: absolute;
            right: 0;
            top: -44px;
        }

        .ag-table h3 {
            margin: 0.5em 5px;
        }

        .ag-table p {
            margin: 0.2em 5px;
        }

        .ag-table td.day {
            padding: 0.5em 15px;
            text-align: center;
            font-family: Merriweather;
            vertical-align: middle;
        }

        .ag-table .iconText {
            font-size: 14px;
        }

        .ag-table .icon {
            color: #428BCA;
        }

        .ag-table .big-icon {
            vertical-align: -6px;
        }

        .ag-table small {
            font-size: 70%;
        }

        p.ag-link {
            white-space: nowrap;
        }
        
        .ag-table h3 {
        margin-bottom:0;
        }
        
        .ag-table td p {
        color:#666;
        font-size:95%;
        }
        
        .panel-title {
        font-size:20px;
        }

    </style>
    <div class="wp-bxp">

    <?php $this->load_template('header'); ?>


<div class="container">

<div class="row">

<div class="col-lg-10 col-lg-offset-1 main">

  	<h1>
		<a class="help" href="<?php echo $this->bxp_base_url; ?>help/ag-central.html" onclick="SS_openHelpPopup(this.href);return false;"><img src="<?php echo self::$img_url; ?>common/static/img/question-white-large.gif" alt="?" width="17" height="16"></a> bizXpress Action Guide
	</h1>

      <p class="headline-msg">Want to stay on track? <a target="_blank" href="<?php echo $env->link_url('bxp_action_guide'); ?>business-building-checklist.pdf" target="_blank">Click here for the bizXpress Business-Building Checklist</a></p>
	<!--<ul>
		<li>
			<a href="#VAG">bizXpress Action Guide</a>
		</li>
		<li>
			<a href="#Miscellaneous">Miscellaneous</a>
		</li> 		
		<li>
			<a href="#Supplementals">Supplementals</a>
		</li>
     </ul>-->


      <h2>Welcome to bizXpress</h2>
      
      <p>
      The bizXpress Action Guide shows you, step-by-step, how to build, market and grow your new website and online business.
      </p>
      <p>
      You can use the bizXpress Action Guide by <strong><em>watching</em></strong> (video or mobile versions), or <strong><em>reading</em></strong> (text version), or <strong><em>listening</em></strong> to the audio version, or <strong>any combination</strong> that best suits your personal learning style. <em>You</em> are in charge!
      </p>
      <p>
      <strong>Start by clicking on the <img src="<?php echo self::$img_url; ?>common/static/img/question-white-large.gif" alt="?" width="17" height="16" style="vertical-align:middle;"> button beside "bizXpress Action Guide," above.</strong> This will open a short help file that provides a few tips for getting the most out of the AG.
      </p>
      <!-- change to calloutBox -->
      <!-- We'll drop that video <div class="highlight">

        <p style="float:left;margin:4px 0 12px -29px;">
			<img src="<?php echo $env->link_url('bxp_action_guide'); ?>img/button-watch-new.gif" width="25" height="21" alt="Watch">
        </p>
        <h4>Video Introduction</h4>
        <p>
          <a href="<?php echo $env->link_url('bxp_videos'); ?>vag/intro/intro.html" title="Length: 5:57 Minutes" onclick="return popvid(this.href)">Click here to watch a short tutorial on how to get the most out of these videos.</a><br>
          <img src="<?php echo $env->link_url('bxp_action_guide'); ?>img/download-icon.gif" width="11" height="10" alt="Download"> <small><a href="http://bizxpress.sitesell.com/vag/intro/intro.zip" title="Updated: December 1, 2013" onclick="return popvid(this.href)">  (6.6MB)</a></small>
        </p>
      </div> -->

<!--============================Action Guide Videos Section==========================-->

<div class="panel panel-primary">
    <div class="panel-heading">
        <h2 class="panel-title" id="VAG">bizXpress Action Guide</h2>
    </div>
    <div class="panel-body">
        Every successful bizXpress site begins right here.<!-- (Watch the Supplemental Videos, too!)-->
    </div>

    <!-- Table -->
    <table class="table ag-table table-striped">
    <tr id="INTRO">
        <td class="day">
            Intro
        </td>
        <td>
            <h3>The 10-DAY BIG Picture</h3>
            <p>The concept of "10 DAYs" and <strong>C <i class="icon-arrow-right red"></i> T <i class="icon-arrow-right red"></i> P <i class="icon-arrow-right red"></i> M</strong> uncovered.</p>
        </td>
        <td>
            <div class="ag-link"><i class="icon icon-book"></i> <span class="iconText"><a target="_blank" href="<?php echo $env->link_url('bxp_action_guide'); ?>intro.html">Read</a></span></div>
        </td>
        <td>
            <div class="ag-link"><i class="icon icon-play-sign"></i> <span class="iconText"><a href="<?php echo $env->link_url('bxp_videos'); ?>vag/intro/intro.html" title="Length: 09:05 Minutes" onclick="return popvid(this.href)">Watch</a></span></div>
            <div class="ag-link"><i class="icon icon-download-alt"></i> <small><a href="<?php echo $env->link_url('bxp_videos'); ?>vag/intro/intro.zip" title="Updated: December 9, 2013">  (6.1MB)</a></small></div>
        </td>
        <td>
            <div class="ag-link"><i class="icon big-icon icon-mobile-phone"></i> <span class="iconText"><a href="<?php echo $env->link_url('bxp_videos'); ?>vag/intro/intro.mp4" onclick="return popvid(this.href)">Mobile Video</a></span></div>
            <div class="ag-link"><i class="icon icon-music"></i> <span class="iconText"><a href="<?php echo $env->link_url('bxp_videos'); ?>vag/intro/intro.mp3" onclick="return popvid(this.href)">Audio Version</a></span></div>
        </td>
    </tr>
    <tr id="DAY1">
        <td class="day">
            DAY 1
        </td>
        <td>
            <h3>Master the ALL-Important Basics</h3>
            <p>Build the foundation of your business right now.</p>
        </td>
        <td>
            <div class="ag-link"><i class="icon icon-book"></i> <span class="iconText"><a target="_blank" href="<?php echo $env->link_url('bxp_action_guide'); ?>day1.html">Read</a></span></div>
        </td>
        <td>
            <div class="ag-link"><i class="icon icon-play-sign"></i> <span class="iconText"><a href="<?php echo $env->link_url('bxp_videos'); ?>vag/day1/day1.html" title="Length: 17:42 Minutes" onclick="return popvid(this.href)">Watch</a></span></div>
            <div class="ag-link"><i class="icon icon-download-alt"></i> <small><a href="<?php echo $env->link_url('bxp_videos'); ?>vag/day1/day1.zip" title="Updated: December 1, 2013">  (12.8MB)</a></small></div>
        </td>
        <td>
            <div class="ag-link"><i class="icon big-icon icon-mobile-phone"></i><span class="iconText"><a href="<?php echo $env->link_url('bxp_videos'); ?>vag/day1/day1.mp4" onclick="return popvid(this.href)">Mobile Video</a></span></div>
            <div class="ag-link"><i class="icon icon-music"></i> <span class="iconText"><a href="<?php echo $env->link_url('bxp_videos'); ?>vag/day2/day2.mp3" onclick="return popvid(this.href)">Audio Version</a></span></div>
        </td>
    </tr>
    <tr id="DAY2">
        <td class="day">
            DAY 2
        </td>
        <td>
            <h3>Find and Develop Your Best Site Concept</h3>
            <p>Your business rides on this decision.</p>
        </td>
        <td>
            <div class="ag-link"><i class="icon icon-book"></i> <span class="iconText"><a target="_blank" href="<?php echo $env->link_url('bxp_action_guide'); ?>day2.html">Read</a></span></div>
        </td>
        <td>
            <div class="ag-link"><i class="icon icon-play-sign"></i> <span class="iconText"><a href="<?php echo $env->link_url('bxp_videos'); ?>vag/day2/day2.html" title="Length: 66:44 Minutes" onclick="return popvid(this.href)">Watch</a></span></div>
            <div class="ag-link"><i class="icon icon-download-alt"></i> <small><a href="<?php echo $env->link_url('bxp_videos'); ?>vag/day2/day2.zip" title="Updated: December 4, 2013">  (51.9MB)</a></small></div>
        </td>
        <td>
            <div class="ag-link"><i class="icon big-icon icon-mobile-phone"></i> <span class="iconText"><a href="<?php echo $env->link_url('bxp_videos'); ?>vag/day2/day2.mp4" onclick="return popvid(this.href)">Mobile Video</a></span></div>
            <div class="ag-link"><i class="icon icon-music"></i> <span class="iconText"><a href="<?php echo $env->link_url('bxp_videos'); ?>vag/day2/day2.mp3" onclick="return popvid(this.href)">Audio Version</a></span></div>
        </td>
    </tr>
    <tr id="DAY3">
        <td class="day">
            DAY 3
        </td>
        <td>
            <h3>Brainstorm Profitable Topics</h3>
            <p>Finish with your "Site Content Blueprint" in hand.</p>
        </td>
        <td>
            <div class="ag-link"><i class="icon icon-book"></i> <span class="iconText"><a target="_blank" href="<?php echo $env->link_url('bxp_action_guide'); ?>day3.html">Read</a></span></div>
        </td>
        <td>
            <div class="ag-link"><i class="icon icon-play-sign"></i> <span class="iconText"><a href="<?php echo $env->link_url('bxp_videos'); ?>vag/day3/day3.html" title="Length: 44:35 Minutes" onclick="return popvid(this.href)">Watch</a></span></div>
            <div class="ag-link"><i class="icon icon-download-alt"></i> <small><a href="<?php echo $env->link_url('bxp_videos'); ?>vag/day3/day3.zip" title="Updated: December 1, 2013">  (33.4MB)</a></small></div>
        </td>
        <td>
            <div class="ag-link"><i class="icon big-icon icon-mobile-phone"></i> <span class="iconText"><a href="<?php echo $env->link_url('bxp_videos'); ?>vag/day3/day3.mp4" onclick="return popvid(this.href)">Mobile Video</a></span></div>
            <div class="ag-link"><i class="icon icon-music"></i> <span class="iconText"><a href="<?php echo $env->link_url('bxp_videos'); ?>vag/day3/day3.mp3" onclick="return popvid(this.href)">Audio Version</a></span></div>
        </td>
    </tr>
    <tr id="DAY4">
        <td class="day">
            Day 4
        </td>
        <td>
            <h3>Investigate and Plan Monetization Options</h3>
            <p>Let's show you the money potential.</p>
        </td>
        <td>
            <div class="ag-link"><i class="icon icon-book"></i> <span class="iconText"><a target="_blank" href="<?php echo $env->link_url('bxp_action_guide'); ?>day4.html">Read</a></span></div>
        </td>
        <td>
            <div class="ag-link"><i class="icon icon-play-sign"></i> <span class="iconText"><a href="<?php echo $env->link_url('bxp_videos'); ?>vag/day4/day4.html" title="Length: 49:48 Minutes" onclick="return popvid(this.href)">Watch</a></span></div>
            <div class="ag-link"><i class="icon icon-download-alt"></i> <small><a href="<?php echo $env->link_url('bxp_videos'); ?>vag/day4/day4.zip" title="Updated: December 6, 2013">  (34.6MB)</a></small></div>
        </td>
        <td>
            <div class="ag-link"><i class="icon big-icon icon-mobile-phone"></i> <span class="iconText"><a href="<?php echo $env->link_url('bxp_videos'); ?>vag/day4/day4.mp4" onclick="return popvid(this.href)">Mobile Video</a></span></div>
            <div class="ag-link"><i class="icon icon-music"></i> <span class="iconText"><a href="<?php echo $env->link_url('bxp_videos'); ?>vag/day4/day4.mp3" onclick="return popvid(this.href)">Audio Version</a></span></div>
        </td>
    </tr>
    <tr id="DAY5">
        <td class="day">
            DAY 5
        </td>
        <td>
            <h3>Refine Site Concept and Register Domain Name</h3>
            <p>It's Major Decision Time!</p>
        </td>
        <td>
            <div class="ag-link"><i class="icon icon-book"></i> <span class="iconText"><a target="_blank" href="<?php echo $env->link_url('bxp_action_guide'); ?>day5.html">Read</a></span></div>
        </td>
        <td>
            <div class="ag-link"><i class="icon icon-play-sign"></i> <span class="iconText"><a href="<?php echo $env->link_url('bxp_videos'); ?>vag/day5/day5.html" title="Length: 22:35 Minutes" onclick="return popvid(this.href)">Watch</a></span></div>
            <div class="ag-link"><i class="icon icon-download-alt"></i> <small><a href="<?php echo $env->link_url('bxp_videos'); ?>vag/day5/day5.zip" title="Updated: December 1, 2013">  (15.0MB)</a></small></div>
        </td>
        <td>
            <div class="ag-link"><i class="icon big-icon icon-mobile-phone"></i> <span class="iconText"><a href="<?php echo $env->link_url('bxp_videos'); ?>vag/day5/day5.mp4" onclick="return popvid(this.href)">Mobile Video</a></span></div>
            <div class="ag-link"><i class="icon icon-music"></i> <span class="iconText"><a href="<?php echo $env->link_url('bxp_videos'); ?>vag/day5/day5.mp3" onclick="return popvid(this.href)">Audio Version</a></span></div>
        </td>
    </tr>
    <tr id="DAY6">
        <td class="day">
            DAY 6
        </td>
        <td>
            <h3>Build a WordPress Site That Gets the Click!</h3>
            <p>Put on your hard hat for the construction phase.</p>
        </td>
        <td>
            <div class="ag-link"><i class="icon icon-book"></i> <span class="iconText"><a target="_blank" href="<?php echo $env->link_url('bxp_action_guide'); ?>day6.html">Read</a></span></div>
        </td>
        <td>
            <div class="ag-link"><i class="icon icon-play-sign"></i> <a href="<?php echo $env->link_url('bxp_videos'); ?>vag/day6/day6.html" title="Length: 45:49 Minutes" onclick="return popvid(this.href)">Watch</a></div>
            <div class="ag-link"><i class="icon icon-download-alt"></i> <small><a href="<?php echo $env->link_url('bxp_videos'); ?>vag/day6/day6.zip" title="Updated: December 1, 2013">  (39.7MB)</a></small></div>
        </td>
        <td>
            <div class="ag-link"><i class="icon big-icon icon-mobile-phone"></i> <span class="iconText"><a href="<?php echo $env->link_url('bxp_videos'); ?>vag/day6/day6.mp4" onclick="return popvid(this.href)">Mobile Video</a></span></div>
            <div class="ag-link"><i class="icon icon-music"></i> <span class="iconText"><a href="<?php echo $env->link_url('bxp_videos'); ?>vag/day6/day6.mp3" onclick="return popvid(this.href)">Audio Version</a></span></div>
        </td>
    </tr>
    <tr id="DAY7">
        <td class="day">
            DAY 7
        </td>
        <td>
            <h3>Build Free Traffic</h3>
            <p>The lifeblood of your business.</p>
        </td>
        <td>
            <div class="ag-link"><i class="icon icon-book"></i>  <span class="iconText"><a target="_blank" href="<?php echo $env->link_url('bxp_action_guide'); ?>day7.html">Read</a></span></div>
        </td>
        <td>
            <div class="ag-link"><i class="icon icon-play-sign"></i> <span class="iconText"><a href="<?php echo $env->link_url('bxp_videos'); ?>vag/day7/day7.html" title="Length: 30:43 Minutes" onclick="return popvid(this.href)">Watch</a></span></div>
            <div class="ag-link"><i class="icon icon-download-alt"></i> <small><a href="<?php echo $env->link_url('bxp_videos'); ?>vag/day7/day7.zip" title="Updated: December 4, 2013">  (21.4MB)</a></small></div>
        </td>
        <td>
            <div class="ag-link"><i class="icon big-icon icon-mobile-phone"></i> <span class="iconText"><a href="<?php echo $env->link_url('bxp_videos'); ?>vag/day7/day7.mp4" onclick="return popvid(this.href)">Mobile Video</a></span></div>
            <div class="ag-link"><i class="icon icon-music"></i> <span class="iconText"><a href="<?php echo $env->link_url('bxp_videos'); ?>vag/day7/day7.mp3" onclick="return popvid(this.href)">Audio Version</a></span></div>
        </td>
    </tr>
    <tr id="DAY8">
        <td class="day">
            DAY 8
        </td>
        <td>
            <h3>Develop Relationships</h3>
            <p>Deepen PREselling.</p>
        </td>
        <td>
            <div class="ag-link"><i class="icon icon-book"></i> <a target="_blank" href="<?php echo $env->link_url('bxp_action_guide'); ?>day8.html">Read</a></div>
        </td>
        <td>
            <div class="ag-link"><i class="icon icon-play-sign"></i> <span class="iconText"><a href="<?php echo $env->link_url('bxp_videos'); ?>vag/day8/day8.html" title="Length: 22:12 Minutes" onclick="return popvid(this.href)">Watch</a></span></div>
            <div class="ag-link"><i class="icon icon-download-alt"></i> <small><a href="<?php echo $env->link_url('bxp_videos'); ?>vag/day8/day8.zip" title="Updated: December 6, 2013">  (16.6MB)</a></small></div>
        </td>
        <td>
            <div class="ag-link"><i class="icon big-icon icon-mobile-phone"></i> <span class="iconText"><a href="<?php echo $env->link_url('bxp_videos'); ?>vag/day8/day8.mp4" onclick="return popvid(this.href)">Mobile Video</a></span></div>
            <div class="ag-link"><i class="icon icon-music"></i> <span class="iconText"><a href="<?php echo $env->link_url('bxp_videos'); ?>vag/day8/day8.mp3" onclick="return popvid(this.href)">Audio Version</a></span></div>
        </td>
    </tr>
    <tr id="DAY9">
        <td class="day">
            DAY 9
        </td>
        <td>
            <h3>Know Your Visitors</h3>
            <p>Maximize profits.</p>
        </td>
        <td>
            <div class="ag-link"><i class="icon icon-book"></i> <span class="iconText"><a target="_blank" href="<?php echo $env->link_url('bxp_action_guide'); ?>day9.html">Read</a></span></div>
        </td>
        <td>
            <div class="ag-link"><i class="icon icon-play-sign"></i> <span class="iconText"><a href="<?php echo $env->link_url('bxp_videos'); ?>vag/day9/day9.html" title="Length: 19:58 Minutes" onclick="return popvid(this.href)">Watch</a></span></div>
            <div class="ag-link"><i class="icon icon-download-alt"></i> <small><a href="<?php echo $env->link_url('bxp_videos'); ?>vag/day9/day9.zip" title="Updated: December 8, 2013">  (14.8MB)</a></small></div>
        </td>
        <td>
            <div class="ag-link"><i class="icon big-icon icon-mobile-phone"></i> <span class="iconText"><a href="<?php echo $env->link_url('bxp_videos'); ?>vag/day9/day9.mp4" onclick="return popvid(this.href)">Mobile Video</a></span></div>
            <div class="ag-link"><i class="icon icon-music"></i> <span class="iconText"><a href="<?php echo $env->link_url('bxp_videos'); ?>vag/day9/day9.mp3" onclick="return popvid(this.href)">Audio Version</a></span></div>
        </td>
    </tr>
    <tr id="DAY10">
        <td class="day">
            DAY 10
        </td>
        <td>
            <h3>Monetize<!-- &amp; Monetize It!--></h3>
            <p>Begin implementing your DAY 4 Monetization plan.</p>
        </td>
        <td>
            <i class="icon icon-book"></i> <span class="iconText"><a target="_blank" href="<?php echo $env->link_url('bxp_action_guide'); ?>day10.html">Read</a></span>
    </td>
    <td>
        <div class="ag-link"><i class="icon icon-play-sign"></i> <span class="iconText"><a href="<?php echo $env->link_url('bxp_videos'); ?>vag/day10/day10.html" title="Length: 19:45 Minutes" onclick="return popvid(this.href)">Watch</a></span></div>
        <div class="ag-link"><i class="icon icon-download-alt"></i> <small><a href="<?php echo $env->link_url('bxp_videos'); ?>vag/day10/day10.zip" title="Updated: December 1, 2013">  (13.9MB)</a></small></div>
    </td>
    <td>
        <div class="ag-link"><i class="icon big-icon icon-mobile-phone"></i> <span class="iconText"><a href="<?php echo $env->link_url('bxp_videos'); ?>vag/day10/day10.mp4" onclick="return popvid(this.href)">Mobile Video</a></span></div>
        <div class="ag-link"><i class="icon icon-music"></i> <span class="iconText"><a href="<?php echo $env->link_url('bxp_videos'); ?>vag/day10/day10.mp3" onclick="return popvid(this.href)">Audio Version</a></span></div>
    </td>
    </tr>
    </table>
</div>

<!-- ============================Supplemental Videos Section========================= 
      <h2 id="Supplementals"> Supplemental Videos</h2>
      <p>
        These videos present additional information about specific BizXpress tools.
      </p>
      <table class="agTable" cellspacing="0">
      <tr>
          <td>
            <img src="<?php echo $env->link_url('bxp_action_guide'); ?>img/all-days.gif" alt="ALL DAYS">
          </td>
          <td class="subDays" style="padding-left:20px;">
            <strong>The bizXpress Forums</strong>
          </td>
          <td>
          </td>
          <td style="text-align: right;">
            <img src="<?php echo $env->link_url('bxp_action_guide'); ?>img/button-watch-new.gif" alt="Watch" width="25" height="21"> <span class="iconText"><a href="<?php echo $env->link_url('bxp_videos'); ?>miniguides/forums/forums.html" title="Length: 21:39 Minutes" onclick="return popvid(this.href)">Watch</a></span>
            <br>
            <img src="<?php echo $env->link_url('bxp_action_guide'); ?>img/download-icon.gif" alt="Download" width="11" height="10"> <small><a href="<?php echo $env->link_url('bxp_videos'); ?>miniguides/forums/forums.zip" title="Updated: December 1, 2013" onclick="return popvid(this.href)">  (16.6MB)</a></small>
          </td>
          <td>
          </td>
        </tr>

        <tr id="DAY2">
          <td>
            <img src="<?php echo $env->link_url('bxp_action_guide'); ?>img/day2.gif" alt="DAY 2">
          </td>
          <td class="subDays" style="padding-left:20px;">
            <strong>Niche-Choosing</strong>
          </td>
          <td>
          </td>
         <td style="text-align: right;">
            <img src="<?php echo $env->link_url('bxp_action_guide'); ?>img/button-watch-new.gif" width="25" height="21" alt="Watch"><span class="iconText"><a href="<?php echo $env->link_url('bxp_videos'); ?>miniguides/niche/niche.html" title="Length: 21:23 Minutes" onclick="return popvid(this.href)">Watch</a></span>
            <br>
            <img src="<?php echo $env->link_url('bxp_action_guide'); ?>img/download-icon.gif" width="11" height="10" alt="Download"> <small><a href="<?php echo $env->link_url('bxp_videos'); ?>miniguides/niche/niche.zip" title="Updated: December 1, 2013" onclick="return popvid(this.href)">  (15.3MB)</a></small>
          </td>
          <td>
          </td>
        </tr>

        <tr id="DAY3">
          <td>
            <img src="<?php echo $env->link_url('bxp_action_guide'); ?>img/day3.gif" alt="DAY 3">
          </td>
          <td class="subDays" style="padding-left:20px;">
            <strong>TIER Structure</strong>
          </td>
          <td>
          </td>
         <td style="text-align: right;">
            <img src="<?php echo $env->link_url('bxp_action_guide'); ?>img/button-watch-new.gif" width="25" height="21" alt="Watch"><span class="iconText"><a href="<?php echo $env->link_url('bxp_videos'); ?>miniguides/tier/tier.html" title="Length: 26:01 Minutes" onclick="return popvid(this.href)">Watch</a></span>
            <br>
            <img src="<?php echo $env->link_url('bxp_action_guide'); ?>img/download-icon.gif" width="11" height="10" alt="Download"> <small><a href="<?php echo $env->link_url('bxp_videos'); ?>miniguides/tier/tier.zip" title="Updated: December 1, 2013" onclick="return popvid(this.href)">  (24.4MB)</a></small>
          </td>
          <td>
          </td>
        </tr>
      </table>-->

		<table border="0" cellspacing="0" style="text-align:center;width:100%;margin:12px auto;font-size: 12px;">
			<tr>
				<td>
					<p>
					<strong><img src="<?php echo self::$img_url; ?>/actionguide/img/star.gif" width="9" height="9" style="margin-bottom:4px;" alt="Useful URLs"> Useful bizXpress URLs <img src="<?php echo self::$img_url; ?>/actionguide/img/star.gif" alt="Useful URLs" width="9" height="9" style="margin-bottom:4px;"></strong>
					</p>
				</td>
			</tr>
			<tr>
				<td>
					<a href="<?php echo $env->link_url('FORUMS'); ?>" target="_blank">Forums</a> | <a href="<?php echo $env->link_url('GUIDANCE'); ?>" target="_blank">Support</a>
				</td>
			</tr>
			<tr>
				<td>
					<a href="<?php echo $env->link_url('bxp_tips_n_techniques_hq'); ?>" target="_blank">Tips and Techniques HQ</a> | <a href="<?php echo $env->link_url('bxp_mhq'); ?>" target="_blank">Monetization HQ</a> | <a href="<?php echo $env->link_url('bxp_resources_hq'); ?>" target="_blank">Resources HQ</a>
				</td>
			</tr>
		</table>

</div><!-- main -->

</div><!-- row -->

</div><!-- container -->
    
		
		<?php $this->load_template('footer'); ?>
</div><!-- wp-bxp -->