<?php

/**
 * The file that defines the Shortcode of the plugin.
 *
 * @link       https://pluginic.com/
 * @since      1.0.0
 *
 * @package    WPGP_YouTube_Gallery
 * @subpackage WPGP_YouTube_Gallery/includes
 */

/**
 * The file that defines the Shortcode of the plugin.
 *
 * @since      1.0.0
 * @package    WPGP_YouTube_Gallery
 * @subpackage WPGP_YouTube_Gallery/includes
 * @author     GrandPlugin <help@grandplugin.com>
 */
class WPGP_YouTube_Gallery_Shortcode {

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
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version     = $version;

		/**
		 * A Custom function to get post meta with sanitization and validation.
		 *
		 * @param [type] $post_id Current post ID.
		 * @param string $option Meta key.
		 * @param [type] $default Default meta value.
		 * @param string $option_two Nested meta key.
		 * @param [type] $default_two Nested meta value.
		 * @return mixed
		 */
		function wpgpyg_get_post_meta( $post_id, $option = '', $default = null, $option_two = '', $default_two = null ) {

			$options = get_post_meta( $post_id, '_wpgp_page_options', true );
			if ( ! empty( $option_two ) ) {

				return ( isset( $options[ $option ][ $option_two ] ) ) ? $options[ $option ][ $option_two ] : $default_two;
			} else {

				return ( isset( $options[ $option ] ) ) ? $options[ $option ] : $default;
			}
		}

		/**
		 * A Custom function to get post options settings with sanitization and validation.
		 *
		 * @param string $option Options key.
		 * @param [type] $default Default option value.
		 * @param string $option_two Nested option key.
		 * @param [type] $default_two Nested option value.
		 * @return mixed
		 */
		function wpgpyg_get_options( $option = '', $default = null, $option_two = '', $default_two = null ) {

			$options = get_option( '_wpgp_option_settings' );
			if ( ! empty( $option_two ) ) {

				return ( isset( $options[ $option ][ $option_two ] ) ) ? $options[ $option ][ $option_two ] : $default_two;
			} else {

				return ( isset( $options[ $option ] ) ) ? $options[ $option ] : $default;
			}
		}

	}

	/**
	 * A shortcode for this plugin.
	 *
	 * @since   1.0.0
	 * @param   string $atts attribute of this shortcode.
	 */
	public function wpgp_shortcode_execute( $atts ) {

		$post_id = intval( $atts['id'] );

		// General Settings.
		$wpgpyg_section_title_margin_bottom = wpgpyg_get_post_meta( $post_id, 'wpgpyg_section_title_margin_bottom' );
		$wpgpyt_display_mode                = wpgpyg_get_post_meta( $post_id, 'wpgpyt_display_mode' );
		$wpgpyt_player_spacing              = wpgpyg_get_post_meta( $post_id, 'wpgpyt_player_spacing' );
		$wpgpyt_player_spacing_size         = wpgpyg_get_post_meta( $post_id, 'wpgpyt_player_spacing_size' );
		$wpgpyt_gallery_column              = wpgpyg_get_post_meta( $post_id, 'wpgpyt_gallery_column' );
		$wpgpyt_max_width                   = wpgpyg_get_post_meta( $post_id, 'wpgpyt_max_width' );
		$wpgpyt_video_from                  = wpgpyg_get_post_meta( $post_id, 'wpgpyt_video_from' );
		$wpgpyg_channel_id                  = wpgpyg_get_post_meta( $post_id, 'wpgpyt_channel_id' );
		$wpgpyg_playlist_id                 = wpgpyg_get_post_meta( $post_id, 'wpgpyt_playlist_id' );
		$wpgpyg_video_title_show            = wpgpyg_get_post_meta( $post_id, 'wpgpyg_video_title_show' );
		$wpgpyg_video_desc_shows            = wpgpyg_get_post_meta( $post_id, 'wpgpyg_video_desc_shows' );
		$wpgpyg_video_desc_length           = wpgpyg_get_post_meta( $post_id, 'wpgpyg_video_desc_length' );
		$wpgpyt_video_thumb_show            = wpgpyg_get_post_meta( $post_id, 'wpgpyt_video_thumb_show' );

		// Slide per view.
		$wpgpyg_slide_per_view_desktop = wpgpyg_get_post_meta( $post_id, 'wpgpyt_slider_per_view', null, 'top' );
		$wpgpyg_slide_per_view_tablet  = wpgpyg_get_post_meta( $post_id, 'wpgpyt_slider_per_view', null, 'bottom' );
		$wpgpyg_slide_per_view_mobile  = wpgpyg_get_post_meta( $post_id, 'wpgpyt_slider_per_view', null, 'left' );

		// Control Settings.
		$wpgpyg_max_result      = wpgpyg_get_post_meta( $post_id, 'wpgpyt_max_result' );
		$wpgpyg_order           = wpgpyg_get_post_meta( $post_id, 'wpgpyt_search_order' );
		$wpgpyt_video_duration  = wpgpyg_get_post_meta( $post_id, 'wpgpyt_video_duration' );
		$wpgpyt_pagination_show = wpgpyg_get_post_meta( $post_id, 'wpgpyt_pagination_show' );
		$wpgpyt_pagination_text = wpgpyg_get_post_meta( $post_id, 'wpgpyt_pagination_text' );

		// Color Settings.
		$wpgpyg_color_section_bg = wpgpyg_get_post_meta( $post_id, 'wpgpyg_color_section_bg' );
		$wpgpyg_color_player_bg  = wpgpyg_get_post_meta( $post_id, 'wpgpyg_color_player_bg' );
		$wpgpyg_color_thumbnail  = wpgpyg_get_post_meta( $post_id, 'wpgpyg_color_thumbnail' );
		$wpgpyg_color_title      = wpgpyg_get_post_meta( $post_id, 'wpgpyg_color_title' );
		$wpgpyg_color_desc       = wpgpyg_get_post_meta( $post_id, 'wpgpyg_color_desc' );
		$wpgpyg_color_meta       = wpgpyg_get_post_meta( $post_id, 'wpgpyg_color_meta' );

		/**
		 * The API.
		 */
		$wpgpyg_api_key = wpgpyg_get_options( 'wpgp_api_key' );

		ob_start();

		if ( 'button' === $wpgpyt_display_mode ) {

			$wpgpyt_single_id = wpgpyg_get_post_meta( $post_id, 'wpgpyt_single_id' );
			if ( ! empty( $wpgpyt_single_id ) ) {

				include WPGP_YOUTUBE_GALLERY_DIR_PATH_FILE . 'public/partials/wpgpyt-button.php';
			} else {

				echo '<p style="color: red;text-align: center;">No button link found!</p>';
			}
		} elseif ( empty( $wpgpyg_api_key ) ) {

			echo '<p style="background-color: #f44336;color: #fff8dc;padding: 5px 15px;">Please set your API key here → <a style="color: #fff;text-decoration: underline;" href="' . esc_url( admin_url() ) . 'edit.php?post_type=wpgp_youtube_gallery&page=wpgpyg_settings" target="_blank">Settings Page</a></p>';

		} else {

			require WPGP_YOUTUBE_GALLERY_DIR_PATH_FILE . 'public/partials/wpgpyt-query.php';

			switch ( $wpgpyt_display_mode ) {
				case 'gallery':
					include WPGP_YOUTUBE_GALLERY_DIR_PATH_FILE . 'public/partials/wpgpyt-gallery.php';
					break;

				case 'scroll':
					include WPGP_YOUTUBE_GALLERY_DIR_PATH_FILE . 'public/partials/wpgpyt-gallery.php';
					break;

				case 'grid':
					include WPGP_YOUTUBE_GALLERY_DIR_PATH_FILE . 'public/partials/wpgpyt-grid.php';
					break;

				case 'slider':
					include WPGP_YOUTUBE_GALLERY_DIR_PATH_FILE . 'public/partials/wpgpyt-slider.php';
					break;

				default:
					include WPGP_YOUTUBE_GALLERY_DIR_PATH_FILE . 'public/partials/wpgpyt-grid.php';
					break;
			}

			echo '<style>' . wpgpyg_get_options( 'wpgpyt_custom_css' ) . '</style>';

		}
		require WPGP_YOUTUBE_GALLERY_DIR_PATH_FILE . 'public/wpgp-youtube-gallery-dynamic-styles.php';

		return ob_get_clean();
	}

	/**
	 * Another shortcode only for subscribe button.
	 *
	 * @return mixed
	 */
	public function wpgp_shortcode_subscribe() {

		ob_start();

		include WPGP_YOUTUBE_GALLERY_DIR_PATH_FILE . 'public/partials/wpgpyt-subscribe.php';

		return ob_get_clean();
	}

}
