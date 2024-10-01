<?php if ( ! defined( 'ABSPATH' ) ) {
	die; } // Cannot access directly.

//
// Create a section
//
WPGP::createSection(
	$wpgp_page_opts,
	array(
		'title'  => __( 'Controls', 'wpgp-youtube-gallery' ),
		'icon'   => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M0 416c0-17.7 14.3-32 32-32l54.7 0c12.3-28.3 40.5-48 73.3-48s61 19.7 73.3 48L480 384c17.7 0 32 14.3 32 32s-14.3 32-32 32l-246.7 0c-12.3 28.3-40.5 48-73.3 48s-61-19.7-73.3-48L32 448c-17.7 0-32-14.3-32-32zm192 0c0-17.7-14.3-32-32-32s-32 14.3-32 32s14.3 32 32 32s32-14.3 32-32zM384 256c0-17.7-14.3-32-32-32s-32 14.3-32 32s14.3 32 32 32s32-14.3 32-32zm-32-80c32.8 0 61 19.7 73.3 48l54.7 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-54.7 0c-12.3 28.3-40.5 48-73.3 48s-61-19.7-73.3-48L32 288c-17.7 0-32-14.3-32-32s14.3-32 32-32l246.7 0c12.3-28.3 40.5-48 73.3-48zM192 64c-17.7 0-32 14.3-32 32s14.3 32 32 32s32-14.3 32-32s-14.3-32-32-32zm73.3 0L480 64c17.7 0 32 14.3 32 32s-14.3 32-32 32l-214.7 0c-12.3 28.3-40.5 48-73.3 48s-61-19.7-73.3-48L32 128C14.3 128 0 113.7 0 96S14.3 64 32 64l86.7 0C131 35.7 159.2 16 192 16s61 19.7 73.3 48z"/></svg>',
		'fields' => array(

			array(
				'type'    => 'content',
				'class'   => 'wpgp--menu-detail-wrap',
				'content' => '<div class="wpgp--menu-detail">
									<strong>Controls</strong>
									<a class="wpgp--settings-tab-help-btn" href="https://pluginic.com/support/?ref=100" target="_blank" class="">Need Help?</a>
									<br>
									<p>With this control panel, you can add an elegant and professional video gallery to your site. The Query and Player Settings let you arrange the video layout on your site the way you want. For query settings, the latest functionality of the API version is used. Besides, all the options are specific to exactly what you need on your website.</p>
								</div>',
			),

			array(
				'id'          => 'wpgpyt_search_order',
				'type'        => 'select',
				'title'       => __( 'Order', 'wpgp-youtube-gallery' ),
				'subtitle'    => __( 'Specifies the method that will be used to order resources.<br><span style="color: #f44336;">Sorting is not working if the videos display from playlist(Youtube api limitation).</span>', 'wpgp-youtube-gallery' ),
				'placeholder' => 'Select an option',
				'help'        => 'The API doesn\'t have a sorting option for listing playlist items.',
				'options'     => array(
					'date'       => __( 'Date', 'wpgp-youtube-gallery' ),
					'rating'     => __( 'Rating', 'wpgp-youtube-gallery' ),
					'relevance'  => __( 'Relevance', 'wpgp-youtube-gallery' ),
					'title'      => __( 'Title', 'wpgp-youtube-gallery' ),
					'videoCount' => __( 'Video Count', 'wpgp-youtube-gallery' ),
					'viewCount'  => __( 'View Count', 'wpgp-youtube-gallery' ),
				),
				'default'     => 'date',
			),
			array(
				'id'       => 'wpgpyt_max_result',
				'type'     => 'spinner',
				'title'    => __( 'Total Video', 'wpgp-youtube-gallery' ),
				'subtitle' => __( 'Specifies the maximum number of videos that showed. Acceptable values are 0 to 50(youtube api limitation), inclusive. The default value is 8.', 'wpgp-youtube-gallery' ),
				'min'      => 0,
				'max'      => 50,
				'default'  => 20,
			),
			array(
				'id'       => 'wpgpyt_published_before_after',
				'type'     => 'button_set',
				'title'    => __( 'Published', 'wpgp-youtube-gallery' ),
				'subtitle' => __( 'To show videos at the specified date.', 'wpgp-youtube-gallery' ),
				'help'     => 'The API doesn\'t have a sorting option for listing playlist items.',
				'options'  => array(
					'before'  => __( 'Before', 'wpgp-youtube-gallery' ),
					'current' => __( 'Current', 'wpgp-youtube-gallery' ),
					'after'   => __( 'After', 'wpgp-youtube-gallery' ),
				),
				'default'  => 'current',
			),
			array(
				'id'         => 'wpgpyt_date_before',
				'type'       => 'date',
				'title'      => __( 'Published Before<sup class="wpgp-title-sub-pro"><a href="#" target="_blank">PRO</a></sup>', 'wpgp-youtube-gallery' ),
				'subtitle'   => __( 'Show only videos created before or at the specified date.', 'wpgp-youtube-gallery' ),
				'settings'   => array(
					'dateFormat' => 'yy-mm-dd',
				),
				'dependency' => array( 'wpgpyt_published_before_after', '==', 'before' ),
				'class'      => 'wpgp-fieldset-pro',
			),
			array(
				'id'         => 'wpgpyt_date_after',
				'type'       => 'date',
				'title'      => __( 'Published After<sup class="wpgp-title-sub-pro"><a href="#" target="_blank">PRO</a></sup>', 'wpgp-youtube-gallery' ),
				'subtitle'   => __( 'Show only videos created at or after the specified date.', 'wpgp-youtube-gallery' ),
				'settings'   => array(
					'dateFormat' => 'yy-mm-dd',
				),
				'dependency' => array( 'wpgpyt_published_before_after', '==', 'after' ),
				'class'      => 'wpgp-fieldset-pro',
			),
			array(
				'id'       => 'wpgpyt_video_duration',
				'type'     => 'radio',
				'title'    => __( 'Video Duration', 'wpgp-youtube-gallery' ),
				'subtitle' => __( 'Show only videos with matching duration.<br><span style="color: #f44336;">Duration not working, if the videos display from playlist(Youtube api limitation).</span>', 'wpgp-youtube-gallery' ),
				'options'  => array(
					'any'    => __( 'Any – This is the default value.', 'wpgp-youtube-gallery' ),
					'long'   => __( 'Long – Only include videos longer than 20 minutes.', 'wpgp-youtube-gallery' ),
					'medium' => __( 'Medium – Only include videos that are between four and 20 minutes long (inclusive).', 'wpgp-youtube-gallery' ),
					'short'  => __( 'Short – Only include videos that are less than four minutes long.', 'wpgp-youtube-gallery' ),
				),
				'default'  => 'any',
			),
			array(
				'id'         => 'wpgpyt_pagination_show',
				'type'       => 'switcher',
				'title'      => __( 'Show Pagination', 'wpgp-youtube-gallery' ),
				'subtitle'   => __( 'Show/Hide pagination.', 'wpgp-youtube-gallery' ),
				'text_on'    => __( 'Show', 'wpgp-youtube-gallery' ),
				'text_off'   => __( 'Hide', 'wpgp-youtube-gallery' ),
				'text_width' => 80,
				'default'    => true,
			),
			array(
				'id'         => 'wpgpyt_pagination_text',
				'type'       => 'text',
				'title'      => 'Pagination Text',
				'default'    => 'More',
				'dependency' => array( 'wpgpyt_pagination_show', '==', 'true' ),
			),

			array(
				'type'    => 'subheading',
				'content' => 'Player Settings',
			),
			array(
				'id'       => 'wpgpyt_player_frameborder',
				'type'     => 'switcher',
				'title'    => 'Frame Border<sup class="wpgp-title-sub-pro"><a href="#" target="_blank">PRO</a></sup>',
				'subtitle' => __( 'Whether to display a border around the player or not.', 'wpgp-youtube-gallery' ),
				'text_on'  => 'On',
				'text_off' => 'Off',
				'default'  => false,
				'class'    => 'wpgp-fieldset-pro',
			),
			array(
				'id'       => 'wpgpyt_player_fullscreen',
				'type'     => 'switcher',
				'title'    => 'Fullscreen Button<sup class="wpgp-title-sub-pro"><a href="#" target="_blank">PRO</a></sup>',
				'subtitle' => __( 'Displaying a fullscreen button on the player.', 'wpgp-youtube-gallery' ),
				'text_on'  => 'On',
				'text_off' => 'Off',
				'default'  => true,
				'class'    => 'wpgp-fieldset-pro',
			),
			array(
				'id'       => 'wpgpyt_player_controls',
				'type'     => 'switcher',
				'title'    => 'Player Controls<sup class="wpgp-title-sub-pro"><a href="#" target="_blank">PRO</a></sup>',
				'subtitle' => __( 'Whether the video player controls are displayed or not.', 'wpgp-youtube-gallery' ),
				'text_on'  => 'On',
				'text_off' => 'Off',
				'default'  => true,
				'class'    => 'wpgp-fieldset-pro',
			),
			array(
				'id'       => 'wpgpyt_player_autoplay',
				'type'     => 'switcher',
				'title'    => 'Autoplay<sup class="wpgp-title-sub-pro"><a href="#" target="_blank">PRO</a></sup>',
				'subtitle' => __( 'On/Off autoplay the video after initial page loaded.', 'wpgp-youtube-gallery' ),
				'text_on'  => 'On',
				'text_off' => 'Off',
				'default'  => false,
				'class'    => 'wpgp-fieldset-pro',
			),
			array(
				'id'       => 'wpgpyt_player_autoplay_delay',
				'type'     => 'number',
				'title'    => __( 'Autoplay Delay Time<sup class="wpgp-title-sub-pro"><a href="#" target="_blank">PRO</a></sup>', 'wpgp-youtube-gallery' ),
				'subtitle' => __( 'Autoplay the video after n second of page loads(in n seconds).<br>Make it 0 to start video at the beginning.', 'wpgp-youtube-gallery' ),
				'after'    => '&nbsp;(sec)',
				'default'  => 0,
				'class'    => 'wpgp-fieldset-pro',
			),
			array(
				'id'       => 'wpgpyt_player_rel_videos',
				'type'     => 'switcher',
				'title'    => 'Related Videos<sup class="wpgp-title-sub-pro"><a href="#" target="_blank">PRO</a></sup>',
				'subtitle' => __( 'The player shows related videos when playback of the initial video ends.', 'wpgp-youtube-gallery' ),
				'text_on'  => 'On',
				'text_off' => 'Off',
				'default'  => false,
				'class'    => 'wpgp-fieldset-pro',
			),
			array(
				'id'       => 'wpgpyt_player_start_time',
				'type'     => 'number',
				'title'    => __( 'Specific Start Time<sup class="wpgp-title-sub-pro"><a href="#" target="_blank">PRO</a></sup>', 'wpgp-youtube-gallery' ),
				'subtitle' => __( 'The video starting at a specific start time(in n seconds).', 'wpgp-youtube-gallery' ),
				'after'    => '&nbsp;(sec)',
				'default'  => 0,
				'class'    => 'wpgp-fieldset-pro',
			),
			array(
				'id'       => 'wpgpyt_iframe_origin',
				'type'     => 'text',
				'title'    => 'Origin<sup class="wpgp-title-sub-pro"><a href="#" target="_blank">PRO</a></sup>',
				'subtitle' => __( 'Specify your domain/brand as the origin.<br>Make it blank to unset origin.', 'wpgp-youtube-gallery' ),
				'default'  => '',
				'class'    => 'wpgp-fieldset-pro',
			),

		),
	)
);
