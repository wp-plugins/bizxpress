<div class="wp-bxp">

	<?php $this->load_template('header'); ?>

		<div class="container">

			<div class="row">

				<div class="col-lg-10 col-lg-offset-1 main">
					<h1>
					<?php _e('bizXpress Forums',$this->domain); ?> 
					</h1>
					
					
					<div class="row">
				
						<div class="col-lg-10 col-lg-offset-1 main">
 
							<div class="panel panel-info">
								
								<div class="panel-heading">
									<h2>
										<i class="icon-group big-icon"></i> <?php _e('bizXpress Forums', $this->domain); ?> 
									</h2>
									<p>
										<?php _e('Help and be helped in the most unique and complete business building community.', $this->domain); ?> 
									</p>
									<p class="golink">
										<a href="<?php echo $env->link_url('bxp_forums'); ?>" target="_blank"><?php _e('Go to the Forums',$this->domain); ?></a> 
									</p>
									<!--Latest posts...-->
								</div>
								<!--<div class="list-group">
									<a href="tnt/art1.html" class="list-group-item">link 1</a> <a href="tnt/art2.html" class="list-group-item">link 2</a> <a href="tnt/art3.html" class="list-group-item">link 3</a> 
								</div>-->
							</div>
						</div>
					</div><!-- row -->
					
					<div class="row">
						<div class="col-lg-10 col-lg-offset-1 main">
 
							<div class="panel panel-info">
								<div class="panel-heading">
									<h2>
										<i class="icon-rss big-icon"></i> <?php _e('Forum Feeds', $this->domain); ?> 
									</h2>
									<p>
										<?php _e('Want to keep in touch effortlessly? Have the latest forum posts pushed directly to your reader.', $this->domain); ?> 
									</p>
									<p class="golink">
										<?php _e('Right-click on either of the links below and copy the URL.<br />Then paste it into Feedly or another RSS reader.', $this->domain); ?>
									</p> 
								</div>
								<div class="list-group">
									<a target="_blank" href="http://rss.sitesell.com/ken-posts.rss" class="list-group-item"><?php _e('Ken\'s Feed', $this->domain); ?></a> <a target="_blank" href="http://rss.sitesell.com/latest.rss" class="list-group-item"><?php _e('Latest Forum Posts', $this->domain); ?></a><!-- <a href="resources/art3.html" class="list-group-item">link 3</a>-->
								</div>
							</div>
						</div>

				</div><!-- row -->

				<!-- row 2 -->

				
		
		</div> <!-- container -->
		
		<div class="clearer">&nbsp;</div>
			<p>&nbsp;</p>
			<p>&nbsp;</p>
		</div>
	</div><!-- wp-bxp -->
		<?php $this->load_template('footer'); ?>
</div>
