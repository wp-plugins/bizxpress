<?php defined('ABSPATH') or die("No direct access allowed");
/**
 * @package BxpDashWidget
 * @desc Class to control the dashboard widget
 * @author SiteSell, Inc.
 */
class BxpDashWidget extends BizXpress {

	const WHATS_NEW_RSS_ID = 'bxp_whats_new';
	
	public $whats_new_url;
	public $widget_options = array();

	public function __construct()
	{
		$this->whats_new_url = parent::$env->get('RSS/url');
		
		$is_dev = apply_filters('bxp_is_dev','');
		
		if ($is_dev)
		{
			// Set RSS cache to 60 seconds
			add_filter( 'wp_feed_cache_transient_lifetime', create_function('$a', 'return 60;') );
		}
	}
	

	/**
	 * @package BxpDashWidget
	 * @method add_whats_new
	 * @desc Hook to create the What's New Dashboard Widget
	 */
	public function add_whats_new()
	{
		// Check if the user has selected to not receive news updates
		$my_opts = apply_filters('bxp_get_options', '');
		
		if (! isset($my_opts['bxp_news_enabled']) || ! $my_opts['bxp_news_enabled'])
			return;
		
		$update = false;
		
		$this->widget_options = $this->get_widget_options();
		$widget_id            = self::WHATS_NEW_RSS_ID;

		if ( !isset( $this->widget_options[$widget_id] ) ) 
		{
			$update = true;
			
			$this->widget_options[$widget_id] = array(
					'link' => 'http://www.bizxpress.com',
					'url' => $this->whats_new_url,
					'title' => __('bizXpress News', $this->domain),
					'items' => 5,
					'show_summary' => 0,
					'show_author' => 0,
					'show_date' => 0,
			);
		}
		elseif ( !isset( $this->widget_options[$widget_id]['url'] ) || ! $this->widget_options[$widget_id]['url'] )
		{
			// Add the URL back if it got lost after setting the RSS options
			$update = true;
			$this->widget_options[$widget_id]['url'] = $this->whats_new_url;
			unset($this->widget_options[$widget_id]['error']);
		}
		
		// Add the dashboard widget
		wp_add_dashboard_widget( $widget_id, // widget slug 
								 $this->widget_options[$widget_id]['title'], // title 
								 array(&$this, 'whats_new_rss'), // display function
								 array(&$this, 'whats_new_rss_control') // control function
		);
		
		// Save default options if needed
		if ( $update )
			update_option( 'dashboard_widget_options', $this->widget_options );
	}
	
	
	/**
	 * @package BxpDashWidget
	 * @method whats_new_rss
	 * @desc Callback for widget display 
	 */
	public function whats_new_rss()
	{	
		$this->whats_new_rss_output();
	}
	
	
	/**
	 * @package BxpDashWidget
	 * @method whats_new_rss_control
	 * @desc Controller callback to handle user preferences
	 */
	public function whats_new_rss_control()
	{
		wp_dashboard_rss_control( self::WHATS_NEW_RSS_ID, array('url' => false, 'show_author' => false) );
	}
	
	
	/**
	 * @package BxpDashWidget
	 * @method whats_new_rss_output
	 * @desc Handles the actual RSS output
	 */
	public function whats_new_rss_output() 
	{
		$widgets = $this->get_widget_options();
		$value = @$widgets[self::WHATS_NEW_RSS_ID];
		
		echo '<div class="rss-widget">';
		wp_widget_rss_output( $widgets[self::WHATS_NEW_RSS_ID] );
		echo "</div>";
	}

	
	/**
	 * @package BxpDashWidget
	 * @method get_widget_options
	 * @desc Getter for widget options so we only load them once
	 */
	public function get_widget_options($force = FALSE)
	{
		if ( empty( $this->widget_options ) || TRUE === $force )
		{
			$this->widget_options = get_option( 'dashboard_widget_options' );

			if ( ! $this->widget_options || !is_array($this->widget_options) )
						$this->widget_options = array();
		}
		
		return $this->widget_options;
	}
}

/* End of BxpDashWidget.php */
/* Location: includes/lib/BxpDashWidget.php */