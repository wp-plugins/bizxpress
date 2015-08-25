<?php defined('ABSPATH') or die("No direct access allowed");
/**
 * @package ActionGuideMenu
 * @desc Class to control the ActionGuide page creation
 * @author SiteSell, Inc.
 */
class ActionGuideMenu extends BxpMenus {
	
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
		
		wp_enqueue_script($this->domain . '-base', parent::$inc_url . 'js/common/base.js', array('jquery'), self::VERSION);
		wp_enqueue_script($this->domain . '-dom', parent::$inc_url . 'js/tools/dom.js', array($this->domain . '-base'), self::VERSION);
		wp_enqueue_script($this->domain . '-scroll', parent::$inc_url . 'js/tools/scroll.js', array($this->domain . '-dom'), self::VERSION);
		wp_enqueue_script($this->domain . '-event', parent::$inc_url . 'js/tools/event.js', array($this->domain . '-scroll'), self::VERSION);
		wp_enqueue_script($this->domain . '-style', parent::$inc_url . 'js/tools/style.js', array($this->domain . '-event'), self::VERSION);
		wp_enqueue_script($this->domain . '-tabbedPane', parent::$inc_url . 'js/tools/tabbedPane.js', array($this->domain . '-style'), self::VERSION);
		wp_enqueue_script($this->domain . '-popvids-quicktour', parent::$inc_url . 'js/demo/misc/popvids-quicktour.js', array($this->domain . '-tabbedPane'), self::VERSION);
		wp_enqueue_script($this->domain . '-popvids', parent::$inc_url . 'js/demo/misc/popvids.js', array($this->domain . '-popvids-quicktour'), self::VERSION);
		
		do_action('bxp_enqueue_bootstrap', false, true);
		
		wp_enqueue_style($this->domain . '-nav',  parent::$inc_url . 'css/panel.css', array(), self::VERSION);
	}
	
	public function render_page()
	{
		$this->load_template('ag');
	}
	
}

/* End of ActionGuide.class.php */
/* Location: includes/lib/BxpMenus/ActionGuide.class.php */