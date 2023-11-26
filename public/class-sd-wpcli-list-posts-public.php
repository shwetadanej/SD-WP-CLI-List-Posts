<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://shwetadanej.com
 * @since      1.0.0
 *
 * @package    Sd_Wpcli_List_Posts
 * @subpackage Sd_Wpcli_List_Posts/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Sd_Wpcli_List_Posts
 * @subpackage Sd_Wpcli_List_Posts/public
 * @author     Shweta Danej <shwetadanej@gmail.com>
 */
class Sd_Wpcli_List_Posts_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

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
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

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

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/sd-wpcli-list-posts-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

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

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/sd-wpcli-list-posts-public.js', array( 'jquery' ), $this->version, false );

	}

	/**
     * Display the number of published posts by a specific author.
     *
     * ## OPTIONS
     *
     * [--author=<username>]
     * : Specify the author's username.
     * 
     * [--a=<username>]
     * : Specify the author's username.
     * 
     * [--post_type=<post_type>]
     * : Specify the post type, if not specified default 'post' will be used.
     *
     * ## EXAMPLES
     *
     *     wp author-posts-count --author=johndoe --post_type=movie
     *     wp author-posts-count --author=johndoe
     *     wp author-posts-count --a=johndoe --post_type=movie
     *     wp author-posts-count --a=johndoe
     *     wp author-posts-count --post_type=movie
     *     wp author-posts-count
     *
     */
	public function sd_cli_register_commands()
    {
        WP_CLI::add_command('author-posts-count',  array($this, 'author_posts_count'));
    }

	/**
	 * Execute author post count command to get count of posts by author or post type
	 *
	 * @param array $args
	 * @param array $assoc_args
	 * @return void
	 */
	public function author_posts_count($args, $assoc_args)
    {
        $author = isset($assoc_args['author']) ? $assoc_args['author'] : (isset($assoc_args['a']) ? $assoc_args['a'] : '');

        $post_type = isset($assoc_args['post_type']) ? $assoc_args['post_type'] : 'post';

        if ($post_type && post_type_exists($post_type)) {
            if (!empty($author)) {
                $user = get_user_by('login', $author);
                if ($user) {
                    $author_id = $user->ID;
                    $total_posts = count_user_posts($author_id, $post_type);
                    $username = $user->user_login;
                    WP_CLI::line("{$username}: {$total_posts}");
                } else {
                    WP_CLI::error('Please specify valid username.');
                    return;
                }
            } else {
                $all_users = get_users(array('fields' => array('ID', 'user_login')));
                foreach ($all_users as $user) {
                    $author_id = $user->ID;
                    $total_posts = count_user_posts($author_id, $post_type);
                    $username = $user->user_login;
                    WP_CLI::line("{$username}: {$total_posts}");
                }
            }
        } else {
            WP_CLI::error('Given post type is invalid');
        }
    }

}
