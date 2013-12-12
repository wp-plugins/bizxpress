<?php defined('ABSPATH') or die("No direct access allowed");

class Bxp_Environment {
	
	protected $settings = array();
	
	public static $instance; 
	
	// need to be public for testing
	public $env_file;
	public $links_file;
	
	const DASH_SLUG         = 'bxp_Dashboard';
	const ACTION_GUIDE_SLUG = 'bxp_ActionGuide';
	const NR_SLUG           = 'bxp_NicheResearch';
	const BHQ_SLUG          = 'bxp_BizHQ';
	const FORUMS_SLUG       = 'bxp_Forums';
	const GUIDANCE_SLUG     = 'bxp_Guidance';
	
	/**
	 * @package Bxp_Environment
	 * @method __construct
	 * @desc Constructor
	 */
	public function __construct($force_prod=false)
	{
		$this->env_file = dirname(__FILE__) . '/../dev_info.json';
		
		if ( $this->is_dev( $force_prod ) )
		{
			$this->settings = json_decode(file_get_contents($this->env_file));
		}
		else
		{
			$this->settings['BASE']['url'] = '//bizxpress.sitesell.com';
			$this->settings['RSS']['url']  = 'http://bizxpress.sitesell.com/rss/news.rss';
		}
		
		// Set up links based on the .ini file
		$this->links_file   = dirname(__FILE__) . '/../bxp_links.ini';
		$cluster_servername = str_replace('//','',$this->settings['BASE']['url']);
		$links              = parse_ini_file($this->links_file, true);
		
		foreach ($links as $key => $val)
		{
			$links[$key] = str_replace('{__BXP_CLUSTER_SERVERNAME__}', $cluster_servername, $val);
		}
		
		$this->settings['_links'] = $links;
		
		$this->set_admin_urls();
		
		// Handy filters
		$this->add_filters();
	}

	
	public static function bootstrap($force_prod=false)
	{
		if (! isset(self::$instance))
			self::$instance = new self($force_prod);
		
		return self::$instance;
	}
	
	private function set_admin_urls()
	{
		foreach (array('DASH', 'ACTION_GUIDE', 'NR', 'BHQ', 'FORUMS', 'GUIDANCE') as $slug )
		{
			$url = admin_url('admin.php?page=' . $this->slug($slug));
			$this->settings['_links'][$slug]['url'] = $url;
		}
	}
	
	
	/**
	 * @package Bxp_Environment
	 * @method add_filters
	 * @desc Method to add WP filters
	 */
	public function add_filters()
	{
		add_filter('bxp_is_dev', array(&$this, 'is_dev'), 10, 0);
	}
	
	
	/**
	 * @package Bxp_Environment
	 * @method get
	 * @desc XPath-like Getter for the env variables
	 */
	public function get($path)
	{
		$path = explode('/', $path);
		
		$setting = $this->settings;
		foreach($path as $piece){
			$setting = $setting[$piece];
		}
		
		return $setting;
	}
	
	
	/**
	 * @package Bxp_Environment
	 * @method is_dev
	 * @desc Checks if it's a dev environment
	 */
	public function is_dev($force_prod=false)
	{
		if ( ! isset( $this->is_dev ) )
		{
			$this->is_dev = ( $force_prod ) ? false : file_exists( $this->env_file );
		}
		
		return $this->is_dev;
	}
	
	
	/**
	 * @package Bxp_Environment
	 * @method link_url
	 * @desc Returns the requested URL for a link or the empty string if not set
	 */
	public function link_url($name)
	{
		return isset($this->settings['_links'][$name]) ? $this->settings['_links'][$name]['url'] : ''; 
	}
	
	
	/**
	 * @package Bxp_Environment
	 * @method slug
	 * @desc Returns the constant value for a given slug
	 */
	public function slug($name)
	{
		$name = strtoupper($name);
		
		if ('_SLUG' !== substr($name, -5))
			$name .= '_SLUG';
		
		return @constant('self::'.$name) ? constant('self::'.$name) : null;
	}
}

/* End of environment.class.php */
/* Location: includes/lib/environment.class.php */