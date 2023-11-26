<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://shwetadanej.com
 * @since      1.0.0
 *
 * @package    Sd_Wpcli_List_Posts
 * @subpackage Sd_Wpcli_List_Posts/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Sd_Wpcli_List_Posts
 * @subpackage Sd_Wpcli_List_Posts/admin
 * @author     Shweta Danej <shwetadanej@gmail.com>
 */
class Sd_Wpcli_List_Posts_Admin
{

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * Display name of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_display_name    The display name of this plugin.
	 */
	private $plugin_display_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct($plugin_name, $version, $plugin_display_name)
	{

		$this->plugin_name = $plugin_name;
		$this->version = $version;
		$this->plugin_display_name = $plugin_display_name;
	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles()
	{

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Sd_Wpcli_List_Posts_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Sd_Wpcli_List_Posts_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/sd-wpcli-list-posts-admin.css', array(), $this->version, 'all');
	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts()
	{

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Sd_Wpcli_List_Posts_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Sd_Wpcli_List_Posts_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'js/sd-wpcli-list-posts-admin.js', array('jquery'), $this->version, false);
	}

	/**
	 * Create menu page for the SD WP CLI LIST POST command
	 *
	 * @return void
	 */
	public function sd_cli_option_page()
	{
		add_menu_page(
			$this->plugin_display_name,
			$this->plugin_display_name,
			'edit_posts',
			$this->plugin_name,
			array($this,'sd_wp_cli_menu_page_callback'),
			'dashicons-admin-generic',
		);
	}

	/**
	 * Callback function to show the menu page fo the SD WP CLI LIST POST command
	 *
	 * @return void
	 */
	public function sd_wp_cli_menu_page_callback()
	{
		require_once plugin_dir_path( __FILE__ ) . '/partials/sd-wpcli-list-posts-admin-display.php';
	}

	/**
	 * Execute command as per the data send from the from and show the output of the command
	 *
	 * @return void
	 */
	public function sd_cli_command_execute(){
		$data =  array();
		$data['status'] = false;
		$data['message'] = __("Something went wrong, please try again.", "sd-wpcli-list-posts");
		if (isset($_POST['sd_cli_command_execute_nonce']) && wp_verify_nonce($_POST['sd_cli_command_execute_nonce'], 'sd_cli_command_execute_action')) {
			$is_valid_user = true;
			$is_valid_post_type = true;
			$author= sanitize_text_field($_POST['sd_cli_command_author']);
			$post_type = sanitize_text_field($_POST['sd_cli_command_post_type']);
			$command_to_execute = "wp author-posts-count ";
			if($author){
				$user = get_user_by('login', $author);
				if($user){
					$is_valid_user = true;
					$command_to_execute .= "--a=".$author;
				}else{
					$is_valid_user = false;
				}
			}

			if($post_type){
				if(post_type_exists($post_type)){
					$command_to_execute .= "--post_type=".$post_type;
				}else{
					$is_valid_post_type = false;
				}
			}

			if(!$is_valid_user || !$is_valid_post_type){
				$data['message'] = __("Author or Post type does not exist.", "sd-wpcli-list-posts");
			}else{
				$data['message'] = nl2br(shell_exec($command_to_execute));
				$data['status'] = true;
			}

		}
		
		wp_send_json_success($data);
		wp_die();
	}
}
