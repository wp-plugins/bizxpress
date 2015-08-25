<?php defined('ABSPATH') or die("No direct access allowed");
/**
 * @desc Plugin Updater class
 */
if ( ! class_exists('SS_Plugin_Updater') )
{
	class SS_Plugin_Updater
	{
		public static $instances;
			
		const VERSION = '1.0.4';

		private $slug;
		private $plugin_string;

		private $api_urls;


		public function __construct($slug, $plugin_string='')
		{
			if (! is_admin() )
				return;
			
			$this->slug = $slug;
			$this->plugin_string = $plugin_string ? $plugin_string : $this->slug .'/'. $this->slug .'.php';
				
			$this->api_urls = apply_filters( "api_urls_{$slug}", array() );
				
			// Take over the update check
			add_filter('pre_set_site_transient_update_plugins', array(&$this,'check_for_plugin_update'), 10, 1);

			// Take over the Plugin info screen
			add_filter( 'plugins_api', array( &$this,'plugin_api_call' ), 10000, 3);

			add_filter( 'https_local_ssl_verify', '__return_false' );
			add_filter( 'block_local_requests', '__return_false' );
			add_filter( 'http_request_timeout', create_function( '', 'return 10;' ) );
			
			// Allow updating from release2/wpupdates
			add_filter('http_request_host_is_external', array(&$this, 'allow_internal_update_url'), 10, 3);
		}

		
		public static function bootstrap($slug, $plugin_string='')
		{
			if (! isset(self::$instances[$slug]))
				self::$instances[$slug] = new self($slug, $plugin_string);
				
			return self::$instances[$slug];
		}

		/**
		 * @since 1.0.2
		 * @desc Explicitly allow release2/wpupdates to serve as update repo thanks to wp-includes/http.php:489
		 */
		function allow_internal_update_url( $ret, $host, $url )
		{
			return apply_filters("allow_internal_update_url_{$this->plugin_string}", $ret, $host, $url);
		}

		/**
		 * @desc Checks SiteSell repo for any plugin updates
		 * @param object $checked_data
		 */
		public function check_for_plugin_update($checked_data)
		{
			global $wp_version;

			//Comment out these two lines during testing.
			if (empty($checked_data->checked))
				return $checked_data;

			$args = array(
					'slug' => $this->slug,
					'version' => $checked_data->checked[$this->plugin_string],
					'wp_version' => $wp_version,
					'client_ip'  => $_SERVER['REMOTE_ADDR'],
					'client_ua'  => $_SERVER['HTTP_USER_AGENT'],
					'client_ref' => get_bloginfo('url') . '/' . $_SERVER['PHP_SELF'], 
			);
			
			$args = apply_filters("ss_plugin_updater_extra_args_{$this->slug}", $args);
			
			$request_string = array(
					'body' => array(
							'action' => 'basic_check',
							'request' => serialize($args),
							'api-key' => md5(get_bloginfo('url'))
					),
					'user-agent' => 'WordPress/' . $wp_version . '; ' . get_bloginfo('url')
			);

			// Start checking for an update
			$raw_response = wp_remote_post($this->get_api_url(), $request_string);

			$response = '';
				
			if (!is_wp_error($raw_response) && ($raw_response['response']['code'] == 200))
				$response = maybe_unserialize($raw_response['body']);

			if (is_object($response) && !empty($response) && isset($response->new_version)) // Feed the update data into WP updater
				if (version_compare($args->version, $response->new_version, '<'))
					$checked_data->response[$this->plugin_string] = $response;

			return $checked_data;
		}


		/**
		 * @desc Fetches updates from SiteSell Repo
		 * @param $res, $action, $args
		 */
		public function plugin_api_call($res, $action, $args)
		{
			global $wp_version;

			if (!isset($args->slug) || ($args->slug != $this->slug))
				return $res;

			// Get the current version
			$plugin_info     = get_site_transient('update_plugins');
			$current_version = $plugin_info->checked[$this->plugin_string];
			$args->version   = $current_version;

			$request_string = array(
					'body' => array(
							'action' => $action,
							'request' => serialize($args),
							'api-key' => md5(get_bloginfo('url'))
					),
					'user-agent' => 'WordPress/' . $wp_version . '; ' . get_bloginfo('url')
			);

			$request = wp_remote_post($this->get_api_url(), $request_string);

			if (is_wp_error($request))
			{
				$res = new WP_Error('plugins_api_failed', __('An Unexpected HTTP Error occurred during the API request.</p> <p><a href="?" onclick="document.location.reload(); return false;">Try again</a>'), $request->get_error_message());
			}
			else
			{
				$res = maybe_unserialize($request['body']);

				if ($res === false)
				{
					$res = new WP_Error('plugins_api_failed', __('An unknown error occurred'), $request['body']);
				}
			}

			return $res;
		}
		
		
		/**
		 * @desc Returns the correct api_url for the environment
		 */
		protected function get_api_url()
		{
			$env = (string) getenv('SS_DEPLOYMENT');

			if ($env && array_key_exists($env, $this->api_urls))
				return $this->api_urls[$env];
			
			return $this->api_urls['default'];
		}
	}
}

/* End of file plugin-updater.class.php */
/* Location: repo/clients/plugins/plugin-updater.class.php */
