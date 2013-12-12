<?php defined('ABSPATH') or die("No direct access allowed");
/**
 * @package BxpOptions
 * @desc Class to control the BXP Options
 * @author SiteSell, Inc.
 */
class BxpOptions extends BizXpress
{
	private $my_opts = FALSE;
	
	function __construct()
	{
		add_filter('bxp_get_options', array(&$this, 'get_opts'), 10, 2);
	}

	/**
	 * @package BxpOptions
	 * @method add_options_page
	 * @desc Hook to create the BXP Options page
	 */
	public function add_options_page()
	{
		$page_title = __('bizXpress Options', $this->domain);
		$menu_title = $page_title;
		
		add_options_page( $page_title, $menu_title, 'manage_options', $this->my_opts_slug, array( &$this, 'load_admin_page' ) );
	}
	
	
	/**
	 * @package BxpOptions
	 * @method load_admin_page
	 * @desc Loads the admin page template
	 */
	public function load_admin_page()
	{
		$opts = $this->get_opts();
		
		// We can't use the is_dev filter here
		$is_dev = file_exists(parent::$env->env_file);
		
		include(self::$tmpl_dir . '/bxp_admin_template.php');
	}
	
	
	/**
	 * @package BxpOptions
	 * @method init
	 * @desc Registers settings, run on admin_init
	 */
	public function init()
	{
		register_setting( $this->my_opts_slug, $this->my_opts_slug, array( &$this, 'sanitize' ) );
	}
	

	/**
	 * @package BxpOptions
	 * @method sanitize
	 * @desc Sanitizes form input
	 */
	public function sanitize( $input )
	{
		$clean = array();
		
		$valid_keys = array('bxp_news_enabled' => 1, 'bxp_force_prod' => 1);
		
		foreach ((array)$input as $key => $val)
		{
			if (! isset($valid_keys[$key]) )
				continue;
				
			$clean[$key] = $val;
		}
		
		return $clean;
	}
	
	
	/**
	 * @package BxpOptions
	 * @method get_opts
	 * @desc Fetches plugin options from the db. Callable directly or via apply_filters('bxp_get_options', '')
	 */
	public function get_opts($val = array(), $force = FALSE)
	{
		// Handle calling $obj->get_opts(bool);
		if (is_bool($val))
			$force = $val;
		
		// First run ever or force reload
		if ( FALSE === $this->my_opts || TRUE === $force )
		{
			$this->my_opts = get_option( $this->my_opts_slug );

			// Option doesn't exist in the DB.
			if (FALSE === $this->my_opts)
			{
				$default = array('bxp_news_enabled' => 1);
				update_option($this->my_opts_slug, $default);
				$this->my_opts = $default;
			}
		}
		
		if ('' === $this->my_opts)
			$this->my_opts = array();
		
		return $this->my_opts;
	}
	
}

/* End of BxpOptions.class.php */
/* Location: includes/lib/BxpOptions.class.php */