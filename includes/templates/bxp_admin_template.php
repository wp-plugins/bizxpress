<div class="wrap">
	<style>
		input.admin_checkbox {padding-right: 5px; margin-right: 5px }
	</style>
	    <?php screen_icon(); ?>
	    <h2><?php _e('bizXpress Settings', $this->domain); ?></h2>			
	    <form method="post" action="options.php">
			<?php
			// This prints out all hidden setting fields
			settings_fields( $this->my_opts_slug );
			?>
			<h3><?php _e('bizXpress News Feed',$this->domain); ?></h3>
			<input class="alignleft admin_checkbox" type="checkbox" id="bxp_news_enabled" 
				   name="<?php echo $this->my_opts_slug; ?>[bxp_news_enabled]"
				   value="1" <?php if (isset($opts['bxp_news_enabled'])) checked($opts['bxp_news_enabled']); ?>	/>
				   
			<label for="bxp_news_enabled"><?php _e('Enable bizXpress News feed on Wordpress Dashboard.',$this->domain);?></label>

			<?php if ($is_dev) : ?>
			<h3>Development Options</h3>
			<input class="alignleft admin_checkbox" type="checkbox" id="bxp_force_prod" 
				   name="<?php echo $this->my_opts_slug; ?>[bxp_force_prod]"
				   value="1" <?php if (isset($opts['bxp_force_prod'])) checked($opts['bxp_force_prod']); ?>	/>
				   
			<label for="bxp_force_prod">Force use of Production Values.</label>
			<?php endif;?>
				
			
	        <?php submit_button(); ?>
	    </form>
</div>
