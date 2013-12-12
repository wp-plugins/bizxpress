<?php defined('ABSPATH') or die("No direct access allowed");
/**
 * @package BxpMenus
 * @desc Class to control the plugin menu creation
 * @author SiteSell, Inc.
 */
class BxpMenus extends BizXpress 
{
	protected $bxp_base_url;
	static $dashboard_link;
	
	public function __construct()
	{
		if (! self::$dashboard_link)
			self::$dashboard_link = admin_url('admin.php?page=' . parent::$env->slug('DASH_SLUG'));
	}
	
	/**
	 * @method add_main_menu
	 * @desc Creates the Menu element for bXp
	 */
	public function add_main_menu()
	{
		require_once(parent::$lib_dir . 'BxpMenus/Dashboard.class.php');
		$dash = DashboardMenu::bootstrap();
		
		$id = add_menu_page(
				__('bizXpress', $this->domain), 		 // page title
				__('bizXpress', $this->domain), 		 // menu title
				'manage_options',          				 // capability
				parent::$env->slug('DASH_SLUG'),           // menu slug
				array(&$dash, 'render_page'),  			 // the callback
				parent::$inc_url . 'img/bxp-icon-sm.png'
		);
		
		add_action( 'admin_print_styles-' . $id, array(&$dash,'enqueue_styles') );
	}
	
	/**
	 * @method add_dashboard
	 * @desc Creates the Submenu for the Dashboard Page
	 */
	public function add_dashboard()
	{
		require_once(parent::$lib_dir . 'BxpMenus/Dashboard.class.php');
		$dash = DashboardMenu::bootstrap();
		
		$id = add_submenu_page(
				parent::$env->slug('DASH_SLUG'),                 // Top level slug
				__('Dashboard', $this->domain),  // Page Title
				__('Dashboard', $this->domain),  // Menu Title
				'manage_options', 				 // Capability
				parent::$env->slug('DASH_SLUG'),
				array(&$dash, 'render_page')
		);
	
		add_action( 'admin_print_styles-' . $id, array(&$dash,'enqueue_styles') );
	}
	
	/**
	 * @method add_action_guide
	 * @desc Creates the Submenu for Action Guide
	 */
	public function add_action_guide()
	{
		require_once(parent::$lib_dir . 'BxpMenus/ActionGuide.class.php');
		$ag = ActionGuideMenu::bootstrap();
		
		$id = add_submenu_page(
				parent::$env->slug('DASH_SLUG'),                    // Top level slug
				__('Action Guide', $this->domain),  // Page Title
				__('Action Guide', $this->domain),  // Menu Title
				'manage_options', 					// Capability
				parent::$env->slug('ACTION_GUIDE_SLUG'),
				array(&$ag, 'render_page')
		);

		add_action( 'admin_print_styles-' . $id, array(&$ag,'enqueue_styles') );
	}
	
	/**
	 * @method add_niche_research
	 * @desc Creates the Submenu for Niche Research
	 */
	public function add_niche_research()
	{
		require_once(parent::$lib_dir . 'BxpMenus/NicheResearch.class.php');
		$nr = NicheResearchMenu::bootstrap();
		
		$id = add_submenu_page(
				parent::$env->slug('DASH_SLUG'),           			  // Top level slug
				__('Niche Research', $this->domain),  // Page Title
				__('Niche Research', $this->domain),  // Menu Title
				'manage_options', 	 			 	  // Capability
				parent::$env->slug('NR_SLUG'),
				array(&$nr, 'render_page')
		);
	
		add_action( 'admin_print_styles-' . $id, array(&$nr,'enqueue_styles') );
	}
	
	
	/**
	 * @method add_bizhq
	 * @desc Creates the Submenu for Ebiz Info
	 */
	public function add_bizhq()
	{
		require_once(parent::$lib_dir . 'BxpMenus/BizHQ.class.php');
		$bizhq = BizHQMenu::bootstrap();

		$id = add_submenu_page(
				parent::$env->slug('DASH_SLUG'),           			  // Top level slug
				__('Biz HQs & Info', $this->domain),  // Page Title
				__('Biz HQs & Info', $this->domain),  // Menu Title
				'manage_options', 	 			 	  // Capability
				parent::$env->slug('BHQ_SLUG'),
				array(&$bizhq, 'render_page')
		);
		
		add_action( 'admin_print_styles-' . $id, array(&$bizhq,'enqueue_styles') );
	}
	
	
	/**
	 * @method add_forums
	 * @desc Creates the Submenu for Forums
	 */
	public function add_forums()
	{
		require_once(parent::$lib_dir . 'BxpMenus/Forum.class.php');
		$forum = ForumMenu::bootstrap();
		
		$id = add_submenu_page(
				parent::$env->slug('DASH_SLUG'),              // Top level slug
				__('Forums', $this->domain),  // Page Title
				__('Forums', $this->domain),  // Menu Title
				'manage_options',			  // Capability
				parent::$env->slug('FORUMS_SLUG'),
				array(&$forum, 'render_page')
		);
	
		add_action( 'admin_print_styles-' . $id, array(&$forum,'enqueue_styles') );
	}

	
	/**
	 * @method add_guidance
	 * @desc Creates the Submenu for More Guidance
	 */
	public function add_guidance()
	{
		require_once(parent::$lib_dir . 'BxpMenus/Guidance.class.php');
		$guidance = GuidanceMenu::bootstrap();
		
		$id = add_submenu_page(
				parent::$env->slug('DASH_SLUG'),              		// Top level slug
				__('More Guidance', $this->domain), // Page Title
				__('More Guidance', $this->domain), // Menu Title
				'manage_options',			  		// Capability
				parent::$env->slug('GUIDANCE_SLUG'),
				array(&$guidance, 'render_page')
		);
	
		add_action( 'admin_print_styles-' . $id, array(&$guidance,'enqueue_styles') );
	}
}


/* End of BxpMenus.class.php */
/* Location: includes/lib/BxpMenus.class.php */