<div class="wp-bxp">

		<?php $this->load_template('header'); ?>

		<div class="container">

			<div class="row">

			<div class="col-lg-10 col-lg-offset-1 main">

				<h1>
				Business Information
				</h1>

				<div class="row">

					<div class="col-lg-6 col-md-6 col-sm-6">
						<div class="panel panel-info">

							<div class="panel-heading">
								<h2>
									<i class="icon-file-text-alt big-icon"></i> Tips and Techniques HQ
								</h2>
								<p>
								Articles on various topics related to your business.
								</p>
								<p class="golink">
									<a target="_blank" href="<?php echo $env->link_url('bxp_tips_n_techniques_hq') ?>">Go to the TNT HQ</a>
								</p>
								<!--Latest articles...-->
							</div>

							<!--<div class="list-group">
								<a href="tnt/art1.html" class="list-group-item">link 1</a>
								<a href="tnt/art2.html" class="list-group-item">link 2</a>
								<a href="tnt/art3.html" class="list-group-item">link 3</a>
							</div>-->

						</div>
					</div>

					<div class="col-lg-6 col-md-6 col-sm-6">
						<div class="panel panel-info">

							<div class="panel-heading">
								<h2>
									<i class="icon-money big-icon"></i> Monetization HQ
								</h2>
								<p>
								Articles with ideas and tips on monetizing your site.
								</p>
								<p class="golink">
								<a target="_blank" href="<?php echo $env->link_url('bxp_mhq'); ?>">Go to the Monetization HQ</a>
								</p>
								<!--Latest articles...-->
							</div>

							<!--<div class="list-group">
								<a href="mhq/art1.html" class="list-group-item">link 1</a>
								<a href="mhq/art2.html" class="list-group-item">link 2</a>
								<a href="mhq/art3.html" class="list-group-item">link 3</a>
							</div>-->
						</div>
					</div>
				</div> <!-- row -->

				<!-- row 2 -->

				<div class="row">

					<div class="col-lg-6 col-md-6 col-sm-6">
						<div class="panel panel-info">

							<div class="panel-heading">
								<h2>
									<i class="icon-gears big-icon"></i> Resources HQ
								</h2>
								<p>
								Recommended resources, including WordPress themes and plugins, to add to your site.
								</p>
								<p class="golink">
									<a target="_blank" href="<?php echo $env->link_url('bxp_resources_hq'); ?>">Go to the Resources HQ</a>
								</p>
								<!--Newest additions...-->
							</div>

							<!--<div class="list-group">
								<a href="resources/art1.html" class="list-group-item">link 1</a>
								<a href="resources/art2.html" class="list-group-item">link 2</a>
								<a href="resources/art3.html" class="list-group-item">link 3</a>
							</div>-->
						</div>
					</div>

					<div class="col-lg-6 col-md-6 col-sm-6">
						<div class="panel panel-info">

							<div class="panel-heading">
								<h2>
									<i class="icon-book big-icon"></i> Books
								</h2>
								<p>
								PDF books to round out your business-building knowledge.
								</p>
								<p>
								Click to read them in your browser, or right-click to download them...
								</p>
							</div>

							<div class="list-group">
								<a class="list-group-item" href="<?php echo $env->link_url('bxp_tips_n_techniques_hq'); ?>mycps.pdf" target="_blank">Make Your Content PREsell!</a>
								<a class="list-group-item" href="<?php echo $env->link_url('bxp_mhq'); ?>MYWS.pdf" target="_blank">Make Your Words Sell!</a>
								<a class="list-group-item" href="<?php echo $env->link_url('bxp_mhq'); ?>MYKS.pdf" target="_blank">Make Your Knowledge Sell!</a>
							</div>
						</div>
					</div>
				</div><!-- row -->


				<div class="clearer">&nbsp;</div>

				<p>&nbsp;</p>
				<p>&nbsp;</p>

			</div>

		</div>
</div><!-- wp-bxp-->
		<?php $this->load_template('footer'); ?>
</div>
