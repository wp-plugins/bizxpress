<?php defined('ABSPATH') or die("No direct access allowed");
/**
 * @package ForumMenu
 * @desc Class to control the forum page creation
 * @author SiteSell, Inc.
 */
class ForumMenu extends BxpMenus {
	
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
		$this->enqueue_admin_styles();
		
		wp_enqueue_style($this->domain . '-nav',  parent::$inc_url . 'css/panel.css', array(), self::VERSION);
		
		do_action('bxp_enqueue_bootstrap', false, true);
	}
	
	public function render_page()
	{
		$this->load_template('forums');
	}
	
}

/* End of Forum.class.php */
/* Location: includes/lib/BxpMenus/Forum.class.php */