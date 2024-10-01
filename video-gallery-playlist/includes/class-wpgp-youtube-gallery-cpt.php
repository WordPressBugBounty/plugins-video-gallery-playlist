<?php

/**
 * The file that defines the Custom Post Type of the plugin.
 *
 * @link       https://pluginic.com/
 * @since      1.0.0
 *
 * @package    WPGP_YouTube_Gallery
 * @subpackage WPGP_YouTube_Gallery/includes
 */

/**
 * The file that defines the Custom Post Type of the plugin.
 *
 * @since      1.0.0
 * @package    WPGP_YouTube_Gallery
 * @subpackage WPGP_YouTube_Gallery/includes
 * @author     GrandPlugin <help@grandplugin.com>
 */
class WPGP_YouTube_Gallery_CPT {

	/**
	 * The unique identifier of this plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $plugin_name    The string used to uniquely identify this plugin.
	 */
	protected $plugin_name;

	/**
	 * The current version of the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $version    The current version of the plugin.
	 */
	protected $version;

	/**
	 * Settings page ID for wpgp-youtube-gallery settings.
	 */
	const PAGE_ID = 'wpgp_youtube_gallery';

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version     = $version;

	}

	/**
	 * Custom Post Type of the Plugin.
	 *
	 * @since    1.0.0
	 */
	public function wpgp_custom_post_type() {

		$labels = apply_filters(
			self::PAGE_ID . '_post_type_labels',
			array(
				'name'               => esc_html_x( 'Manage Galleries', 'wpgp-youtube-gallery' ),
				'singular_name'      => esc_html_x( 'Galleries', 'wpgp-youtube-gallery' ),
				'add_new'            => esc_html__( 'Add New', 'wpgp-youtube-gallery' ),
				'add_new_item'       => esc_html__( 'Add New Gallery', 'wpgp-youtube-gallery' ),
				'edit_item'          => esc_html__( 'Edit Galleries', 'wpgp-youtube-gallery' ),
				'new_item'           => esc_html__( 'New Galleries', 'wpgp-youtube-gallery' ),
				'view_item'          => esc_html__( 'View  Galleries', 'wpgp-youtube-gallery' ),
				'search_items'       => esc_html__( 'Search Galleries', 'wpgp-youtube-gallery' ),
				'not_found'          => esc_html__( 'No Gallery found.', 'wpgp-youtube-gallery' ),
				'not_found_in_trash' => esc_html__( 'No Gallery found in trash.', 'wpgp-youtube-gallery' ),
				'parent_item_colon'  => esc_html__( 'Parent Item:', 'wpgp-youtube-gallery' ),
				'menu_name'          => esc_html__( 'YouTube Gallery', 'wpgp-youtube-gallery' ),
				'all_items'          => esc_html__( 'Manage Galleries', 'wpgp-youtube-gallery' ),
			)
		);

		$args = apply_filters(
			self::PAGE_ID . '_post_type_args',
			array(
				'labels'              => $labels,
				'public'              => false,
				'hierarchical'        => false,
				'exclude_from_search' => true,
				'show_ui'             => true,
				'show_in_admin_bar'   => false,
				'menu_position'       => apply_filters( self::PAGE_ID . '_menu_position', 25 ),
				'menu_icon'           => 'dashicons-video-alt3',
				'rewrite'             => false,
				'query_var'           => false,
				'imported'            => true,
				'supports'            => array( 'title' ),
			)
		);
		register_post_type( self::PAGE_ID, $args );

	}

	/**
	 * Change Galleries updated messages.
	 *
	 * @param string $messages The Update messages.
	 * @return statement
	 */
	public function wpps_updated_messages( $messages ) {
		global $post, $post_ID;
		$messages[ self::PAGE_ID ] = array(
			0  => '', // Unused. Messages start at index 1.
			1  => sprintf( __( 'Galleries updated.', 'wpgp-youtube-gallery' ) ),
			2  => '',
			3  => '',
			4  => __( ' updated.', 'wpgp-youtube-gallery' ),
			5  => isset( $_GET['revision'] ) ? sprintf( __( 'Galleries restored to revision from %s', 'wpgp-youtube-gallery' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
			6  => sprintf( __( 'Galleries published.', 'wpgp-youtube-gallery' ) ),
			7  => __( 'Galleries saved.', 'wpgp-youtube-gallery' ),
			8  => sprintf( __( 'Galleries submitted.', 'wpgp-youtube-gallery' ) ),
			9  => sprintf( __( 'Galleries scheduled for: <strong>%1$s</strong>.', 'wpgp-youtube-gallery' ), date_i18n( __( 'M j, Y @ G:i', 'wpgp-youtube-gallery' ), strtotime( $post->post_date ) ) ),
			10 => sprintf( __( 'Galleries draft updated.', 'wpgp-youtube-gallery' ) ),
		);
		return $messages;
	}

	/**
	 * Admin help page
	 *
	 * @since    2.0.0
	 */
	public function wpgp_help_admin_submenu() {
		add_submenu_page(
			'edit.php?post_type=' . self::PAGE_ID,
			__( 'Help', 'wpgp-youtube-gallery' ),
			__( 'Help', 'wpgp-youtube-gallery' ),
			'manage_options',
			'grandplugin_help',
			array( $this, 'ptc_help_callback' )
		);

		$wpgpyt_redirect_link = 'https://pluginic.com/plugins/video-gallery-playlist/?ref=100';
		add_submenu_page(
			'edit.php?post_type=' . self::PAGE_ID,
			'',
			'<span style="display: flex;align-items: center;gap: 5px;color: #8bc34a;"><i class="dashicons dashicons-superhero-alt"></i> ' . esc_html__( 'Go Pro', 'post-block' ) . '</span>',
			'manage_options',
			$wpgpyt_redirect_link
		);
	}

	/**
	 * Add action links.
	 *
	 * @param Array $actions Get all action links.
	 * @param Sting $plugin_file Get all plugin file paths.
	 * @return Array
	 */
	public function wpgp_add_action_plugin( $actions, $plugin_file ) {

		static $plugin;

		if ( ! isset( $plugin ) ) {

			$plugin = WPGPYT_BASENAME_FILE;
		}

		if ( $plugin == $plugin_file ) {

			$site_link = array( 'support' => '<a href="https://pluginic.com/support/?ref=100?ref=100" target="_blank">Support</a>' );
			$settings  = array( 'settings' => '<a href="' . admin_url() . 'edit.php?post_type=wpgp_youtube_gallery&page=wpgpyg_settings">' . __( 'Settings', 'General' ) . '</a>' );

			// Add link before Deactivate.
			$actions = array_merge( $site_link, $actions );
			$actions = array_merge( $settings, $actions );

			// Add link after Deactivate.
			$actions[] = '<a href="https://pluginic.com/plugins/video-gallery-playlist/?ref=100" target="_blank">' . __( '<svg style="width: 14px;height: 14px;margin-bottom: -2px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 36 36"><path fill="#4caf50" d="M35 19c0-2.062-.367-4.039-1.04-5.868-.46 5.389-3.333 8.157-6.335 6.868-2.812-1.208-.917-5.917-.777-8.164.236-3.809-.012-8.169-6.931-11.794 2.875 5.5.333 8.917-2.333 9.125-2.958.231-5.667-2.542-4.667-7.042-3.238 2.386-3.332 6.402-2.333 9 1.042 2.708-.042 4.958-2.583 5.208-2.84.28-4.418-3.041-2.963-8.333C2.52 10.965 1 14.805 1 19c0 9.389 7.611 17 17 17s17-7.611 17-17z"/><path fill="#cddc39" d="M28.394 23.999c.148 3.084-2.561 4.293-4.019 3.709-2.106-.843-1.541-2.291-2.083-5.291s-2.625-5.083-5.708-6c2.25 6.333-1.247 8.667-3.08 9.084-1.872.426-3.753-.001-3.968-4.007C7.352 23.668 6 26.676 6 30c0 .368.023.73.055 1.09C9.125 34.124 13.342 36 18 36s8.875-1.876 11.945-4.91c.032-.36.055-.722.055-1.09 0-2.187-.584-4.236-1.606-6.001z"/></svg><span style="font-weight: bold;color: #4caf50;"> Go Pro</span>', 'General' ) . '</a>';
		}

		return $actions;
	}

	/**
	 * Safe Welcome Page Redirect.
	 *
	 * Safe welcome page redirect which happens only
	 * once and if the site is not a network or MU.
	 *
	 * @since 1.0.0
	 */
	public function wpgp_safe_welcome_redirect() {
		// Bail if no activation redirect transient is present. (if ! true).
		if ( ! get_transient( '_wpgp_safe_redirect' ) ) {
			return;
		}

		// Delete the redirect transient.
		delete_transient( '_wpgp_safe_redirect' );

		// Bail if activating from network or bulk sites.
		if ( is_network_admin() || isset( $_GET['activate-multi'] ) ) {
			return;
		}

		// Redirects to a specific Page.
		wp_safe_redirect(
			add_query_arg(
				array(
					'post_type' => self::PAGE_ID,
					'page'      => 'grandplugin_help',
				),
				admin_url( 'edit.php' )
			)
		);

	}

	/**
	 * Admin help callback function
	 *
	 * @since    1.0.0
	 */
	public function ptc_help_callback() {

		include_once WPGP_YOUTUBE_GALLERY_DIR_PATH_FILE . '/admin/partials/wpgp-youtube-gallery-admin-display.php';
	}

	
	/**
	 * Add new custom columns.
	 *
	 * @param [type] $columns The columns.
	 * @return statement
	 */
	public function wpgp_admin_column( $columns ) {
		return array(
			'cb'        => '<input type="checkbox" />',
			'title'     => __( 'Name', 'wpgp-youtube-gallery' ),
			'layout'    => __( 'Layout', 'wpgp-youtube-gallery' ),
			'shortcode' => __( 'Shortcode', 'wpgp-youtube-gallery' ),
			'date'      => __( 'Date', 'wpgp-youtube-gallery' ),
		);
	}

	/**
	 * Display admin columns content.
	 *
	 * @param mix    $column The columns.
	 * @param string $post_id The post ID.
	 * @return void
	 */
	public function wpgp_admin_field( $column, $post_id ) {

		$options             = get_post_meta( $post_id, '_wpgp_page_options', true );
		$wpgpyt_display_mode = isset( $options['wpgpyt_display_mode'] ) ? $options['wpgpyt_display_mode'] : '--';
		switch ( $column ) {
			case 'shortcode':
				echo '<input title="Copy the Shortcode" style="width:180px;padding:2px 12px;color:#e91e63;text-align:center;cursor:copy;" type="text" onClick="this.select();" readonly="readonly" value="[wptube id=&quot;' . esc_attr( $post_id ) . '&quot;]"/>';
				break;
			default:
				echo '<span>' . esc_html( strtoupper( $wpgpyt_display_mode ) ) . '</span>';
		}
	}

	/**
	 * Bottom review notice.
	 *
	 * @param string $wpgp_text The review notice.
	 * @return string
	 */
	public function wpgp_review_text( $wpgp_text ) {

		$screen = get_current_screen();
		if ( self::PAGE_ID === get_post_type() || ( self::PAGE_ID . '_page_grandplugin_help' === $screen->id ) ) {

			$wpgp_url  = 'https://wordpress.org/support/plugin/video-gallery-playlist/reviews/?filter=5#new-post';
			$wpgp_text = sprintf( __( 'If you love this plugin, please leave us a <a href="%s" target="_blank">&#9733;&#9733;&#9733;&#9733;&#9733;</a> rating. Your review is so important to us and we are delighted you are happy to share your experience with others on this platform.', 'wpgp-youtube-gallery' ), $wpgp_url );
		}

		return $wpgp_text;
	}

}
