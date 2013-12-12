<?php defined('ABSPATH') or die("No direct access allowed");
/**
 * @package DashboardMenu
 * @desc Class to control the Dashboard static page creation
 * @author SiteSell, Inc.
 */
class DashboardMenu extends BxpMenus {
	
	static $instance;
	
	public function __construct()
	{
		$this->set_env();
	}
	
	static public function bootstrap()
	{
		if (! self::$instance)
			self::$instance = new self();
		
		return self::$instance;
	}
	
	
	public function enqueue_styles()
	{
		do_action('bxp_enqueue_bootstrap', true, true);
		#TODO: Check if this is the right CSS file. Should be a 'no-icons' file?
		
		$this->enqueue_admin_styles(true); // skip bootstrap, already enqueued
		
		wp_enqueue_style($this->domain . '-nav',  parent::$inc_url . 'css/sharedForBxp.css', array(), self::VERSION);
		
	}
	
	public function render_page()
	{
		$this->load_template('dashboard');
	}
	
}

/* End of Dashboard.class.php */
/* Location: includes/lib/BxpMenus/Dashboard.class.php */