<?php defined('ABSPATH') or die("No direct access allowed");
/*
* Plugin Name:   bizXpress
* Plugin URI:	 http://www.bizxpress.com
* Description:   bizXpress is the only plugin for WordPress that can take you from struggling webmaster or blogger to successful entrepreneur earning a sustainable income from your website. It contains everything you need to build your online business, from keyword research tools to how-to site-building and monetization articles to supportive forums. 
* Version:       1.1
* Author:        SiteSell, Inc.
* Author URI:    http://www.sitesell.com/sbiforwp
*
* License:      GNU General Public License, v2 (or newer)
* License URI:  http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
* Copyright:    2013-2015 SiteSell Inc. All Rights Reserved
*/
class BizXpress {
	
	const VERSION = '1.1';

	public $domain = 'BizXpress';
	public $my_opts_slug = 'bxp_options';
	public static $env; // public for testing
	
	protected static $inc_dir;
	protected static $inc_url;
	protected static $tmpl_dir;
	protected static $lib_dir;
	protected static $img_url;
	
	private $env_is_set = false;
	private $bxp_base_url;
	
	public static $instance;

	public function __construct() 
	{
		if (! is_admin() ) return;

		$this->init();
	}
	
	public static function bootstrap()
	{
		if (! isset(self::$instance))
			self::$instance = new self();
		
		return self::$instance;
	}
	
	
	/**
	 * @method init
	 * @desc initializes the plugin
	 */
	protected function init()
	{
		$this->set_env();
		
		// Load options class
		require_once(self::$lib_dir . 'BxpOptions.class.php');
		$this->opts = new BxpOptions();
		
		// Load menu class
		require_once(self::$lib_dir . 'BxpMenus.class.php');
		$this->menus = new BxpMenus();
		
		// Load Dashboard Widget class
		require_once(self::$lib_dir . 'BxpDashWidget.class.php');
		$this->dash_widget = new BxpDashWidget();
		
		require_once(self::$lib_dir . 'BxpHelper.class.php');
		$this->helper = BxpHelper::bootstrap();
		
		// Add menu items
		add_action('admin_menu', array(&$this->menus, 'add_main_menu'));
		add_action('admin_menu', array(&$this->menus, 'add_dashboard'));
		add_action('admin_menu', array(&$this->menus, 'add_action_guide'));
		add_action('admin_menu', array(&$this->menus, 'add_niche_research'));
		add_action('admin_menu', array(&$this->menus, 'add_bizhq'));
		add_action('admin_menu', array(&$this->menus, 'add_forums'));
		add_action('admin_menu', array(&$this->menus, 'add_guidance'));
		
		// Add option page
		add_action( 'admin_menu', array( &$this->opts, 'add_options_page' ) );
		add_action( 'admin_init', array( &$this->opts, 'init' ) );
		
		// Add dashboard RSS widget
		add_action('wp_dashboard_setup', array(&$this->dash_widget, 'add_whats_new'));
	
		// Add settings action shortcut
		add_filter('plugin_action_links', array(&$this, 'add_settings_action_link'),10,2);
		
		// Capture the dismiss click
		add_action('init', array( &$this, 'handle_decomm_dismiss' ) );
		
		// Shows the decommissioning message
		add_action('admin_notices', array( &$this, 'show_decomm_message') );
		
		// For the updater
		$plugin_string = 'bizXpress/bizXpress.php';
		add_filter( "allow_internal_update_url_{$plugin_string}", '__return_true', 10, 3 );
		add_filter( "api_urls_{$this->domain}", array( &$this, 'api_urls' ), 10, 1 );
	}
	
	
	/**
	 * Code moved from updater class to consumer class in the form of a filter
	 * @param unknown $urls
	 * @return multitype:string
	 */
	function api_urls( $urls )
	{
		return array('PRODUCTION' => 'http://wpplugins.sitesell.com/');
	}
	
	public function handle_decomm_dismiss()
	{
		if ( isset($_GET['bxp_decom_msg_dismiss']) && $_GET['bxp_decom_msg_dismiss'] )
		{
			update_option('bxp_decomm_dismiss', true);
		}
	}
	
	public function show_decomm_message()
	{
		$is_dismissed = get_option('bxp_decomm_dismiss');
		$url          = esc_url( add_query_arg( 'bxp_decom_msg_dismiss', 1 ) );
		
		
		if ( ! $is_dismissed ) :
		
		?>
		<div class="update-nag"><p><?php _e('Dear bizXpress User,<br>The plugin developer SiteSell Inc. 
		will be retiring the existing bizXpress plugin and replacing it with a brand new plugin called 
		"SBI! for WP." This new plugin is part of a complete online business-building program that thousands 
		of entrepreneurs have used to build successful online businesses. 
		Learn more about SBI! for WP at: <a target="_new" href="http://www.sitesell.com/sbiforwp/index.html">http://www.sitesell.com/sbiforwp/</a>.', 
		$this->domain);?></p>
		<p style="text-align:right"><a href="<?php echo $url; ?>"><?php _e('Dismiss'); ?></a></p>
		</div>
		<?php
		
		endif;
	}
	
	
	/**
	 * @method set_env
	 * @desc Environment settings
	 */
	protected function set_env()
	{
		if ($this->env_is_set)
			return;
		
		self::$inc_dir  = trailingslashit(dirname(__FILE__)) . 'includes/';
		self::$tmpl_dir = self::$inc_dir . 'templates/';
		self::$lib_dir  = self::$inc_dir . 'lib/';
		
		self::$inc_url  = trailingslashit(plugins_url('includes', __FILE__));
		
		self::$img_url = self::$inc_url . 'img/';
		
		$my_opts = get_option($this->my_opts_slug);
		$force_prod = (isset($my_opts['bxp_force_prod']) && $my_opts['bxp_force_prod']);
		
		// Load environment settings
		require_once(self::$lib_dir . 'BxpEnvironment.class.php');
		self::$env = Bxp_Environment::bootstrap($force_prod);
		
		$this->bxp_base_url = self::$env->get('BASE/url');
		
		$this->env_is_set = true;
	}
	
	/**
	 * @method add_settings_action_link
	 * @desc Adds the 'Settings' link to our plugin in the Installed Plugins page
	 */
	public function add_settings_action_link($links, $file)
	{
		static $this_plugin;
		
		if (!$this_plugin) 
			$this_plugin = plugin_basename(__FILE__);
		
		if ($file == $this_plugin) 
		{
			$settings_link = sprintf('<a href="%s/wp-admin/admin.php?page=%s">Settings</a>', get_bloginfo('wpurl'), $this->my_opts_slug);
			$links[] = $settings_link;
		}
		
		return $links;
	}
	
	/**
	 * @method enqueue_admin_styles
	 * @desc Adds the admin stylesheet, accessed by BxpMenus and kids
	 */
	public function enqueue_admin_styles($skip_bootstrap=false)
	{
		// Externals
		if (false === $skip_bootstrap)
			do_action('bxp_enqueue_bootstrap', true);
		
		
		wp_enqueue_style('font-awesome', self::$inc_url . 'css/common/font-awesome.css', array(), self::VERSION);
		wp_enqueue_style('font-roboto', '//fonts.googleapis.com/css?family=Roboto');
		wp_enqueue_style('font-merryweather', '//fonts.googleapis.com/css?family=Merriweather');
		
		// Ours
		wp_enqueue_style($this->domain . '-sidemenu',  self::$inc_url . 'css/common/sidemenu.css', array(), self::VERSION);
		wp_enqueue_style($this->domain . '-base',  self::$inc_url . 'css/common/base.css', array(), self::VERSION);
		wp_enqueue_style($this->domain . '-nav',  self::$inc_url . 'css/common/nav.css', array(), self::VERSION);
		wp_enqueue_style($this->domain . '-admin',  self::$inc_url . 'css/admin.css', array(), self::VERSION);
	}
	
	
	/**
	 * @method load_template
	 */
	protected function load_template($name, $params=array(), $want_return=false)
	{
		if (! self::$tmpl_dir)
			$this->set_env();
		
		$suffix = '.tmpl.php';
		
		if (substr($name,(strlen($suffix) * -1)) !== $suffix)
			$name .= $suffix;
		
		foreach ($params as $key => $val)
			$$key = $val;
		
		
		$env =& self::$env;
		
		
		if ($want_return)
			ob_start();
		
		if (! file_exists(self::$tmpl_dir . $name))
			echo "File not found: $name";
		else
			include(self::$tmpl_dir . $name);
		
		if ($want_return)
			return ob_get_contents();
	}
}

$ss_bxp = BizXpress::bootstrap();


/* End of bizXpress.php */
/* Location: bizXpress.php */
