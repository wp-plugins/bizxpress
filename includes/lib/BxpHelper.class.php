<?php defined('ABSPATH') or die("No direct access allowed");
/**
 * @package BxpHelper
 * @desc Helper class for common functions
 * @author SiteSell, Inc.
 */
class BxpHelper extends BxpMenus {
	
	public static $instance;
	
	public function __construct()
	{
		$this->set_env();
		
		add_action('bxp_enqueue_bootstrap', array(&$this, 'enqueue_bootstrap'), 10, 2);
	}
	
	public static function bootstrap()
	{
		if (! self::$instance)
			self::$instance = new self();
		
		return self::$instance;
	}
	
	public function enqueue_bootstrap($css=false,$js=false)
	{
		if ($css)
		{
			wp_enqueue_style('bootstrap', parent::$inc_url . 'css/common/bootstrap.min.css', array(), self::VERSION);
		}
		
		if ($js)
		{
			wp_enqueue_script($this->domain . '-bootstrap', parent::$inc_url . 'js/common/bootstrap.min.js',  array('jquery'), self::VERSION, true);
		}
	}
	
	
}

/* End of BxpHelper.class.php */
/* Location: includes/lib/BxpHelper.class.php */