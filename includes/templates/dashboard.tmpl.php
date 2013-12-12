<div class="wp-bxp">

	<?php $this->load_template('header'); ?>


   <div class="container">

    <div class="row">

        <div class="col-lg-10 col-lg-offset-1 main">

        <h1>
        Welcome to bizXpress
        </h1>
        <p>
        From this page, you can click to each bizXpress section for help to get a task done, and then return here for your next "to do."
        </p>

        <div class="row">

            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h2><i class="icon-book big-icon"></i> Action Guide</h2>
                        <p>
                        The bizXpress Action Guide shows you, step-by-step, how to build, market and grow your new website and online business.
                        </p>
                    </div>
                    <div class="list-group">
                        <a class="list-group-item" href="<?php echo $env->link_url('ACTION_GUIDE'); ?>">Action Guide</a>
                        <a class="list-group-item" href="<?php echo $env->link_url('ACTION_GUIDE'); ?>">Video Action Guide</a>
                        <!--<a class="list-group-item" href="<?php echo $env->link_url('ACTION_GUIDE'); ?>#Supplementals">Supplemental Videos</a>-->
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="panel panel-info">
                    <div class="panel-heading">

                        <h2><i class="icon-gears big-icon"></i> Research</h2>
                        <p>
                        A collection of unique tools to research and develop a Site Concept that you can build into a successful online business.
                        </p>
                        <div class="news">
                            <p>Check out the MKL's latest Groups function.</p>
                        </div>
                    </div>
                    <div class="list-group">
                        <a class="list-group-item" href="<?php echo $env->link_url('bxp_brainstormit'); ?>" target="_blank">Brainstormer</a>
                        <a class="list-group-item" href="<?php echo $env->link_url('bxp_mkl'); ?>" target="_blank">MKL</a>
                        <a class="list-group-item" href="<?php echo $env->link_url('bxp_search_it'); ?>" target="_blank">Search It!</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h2><i class="icon-info-sign big-icon"></i> Business Information</h2>
                        <p>
                        A large collection of articles, books, and how-to's covering all business building topics.
                        </p>
                    </div>
                    <div class="list-group">
                        <a class="list-group-item" href="<?php echo $env->link_url('bxp_tips_n_techniques_hq'); ?>" target="_blank">Tips and Techniques HQ</a>
                        <a class="list-group-item" href="<?php echo $env->link_url('bxp_mhq'); ?>" target="_blank">Monetization HQ</a>
                        <a class="list-group-item" href="<?php echo $env->link_url('bxp_resources_hq'); ?>" target="_blank">Resources HQ</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h2><i class="icon-sun big-icon"></i> Guidance</h2>
                        <p>
                        The bizXpress Forums, world class support, your account information.
                        </p>
                    </div>
                    <div class="list-group">
                        <a class="list-group-item" href="<?php echo $env->link_url('FORUMS'); ?>" target="_blank">The bizXpress Forums - THE help and be helped online business-building community</a>
                        <a class="list-group-item" href="<?php echo $env->link_url('bxp_my_account'); ?>" target="_blank">My Account Information</a>
                        <a class="list-group-item" href="<?php echo $env->link_url('GUIDANCE'); ?>" target="_blank">Coaching HQ</a>
                        <a class="list-group-item" href="<?php echo $env->link_url('GUIDANCE'); ?>" target="_blank">Contact Support</a>
                    </div>
                </div>
            </div>

        </div><!-- row -->

        </div><!-- main -->

    </div><!-- row -->

    </div><!-- container -->
  
   <?php $this->load_template('footer'); ?>

</div><!-- wp-bxp -->   
