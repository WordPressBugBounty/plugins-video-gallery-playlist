<?php if ( ! defined( 'ABSPATH' ) ) {
	die; } // Cannot access directly.

//
// Create a section
//
WPGP::createSection(
	$wpgp_page_opts,
	array(
		'title'  => __( 'Appearance', 'wpgp-youtube-gallery' ),
		'icon'   => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M488.6 23.4c31.2 31.2 31.2 81.9 0 113.1l-352 352c-31.2 31.2-81.9 31.2-113.1 0s-31.2-81.9 0-113.1l352-352c31.2-31.2 81.9-31.2 113.1 0zM443.3 92.7c-6.2-6.2-16.4-6.2-22.6 0c-12.5 12.5-23.8 15.1-37.5 17.6l-2.5 .4c-13.8 2.5-31.6 5.6-48 22c-16.7 16.7-20.9 36-24.1 50.9l0 0v0l-.2 1c-3.4 15.6-6 26.4-15.7 36.1s-20.5 12.3-36.1 15.7l-1 .2c-14.9 3.2-34.2 7.4-50.9 24.1s-20.9 36-24.1 50.9l-.2 1c-3.4 15.6-6 26.4-15.7 36.1c-9.2 9.2-18 10.8-32.7 13.4l0 0-.9 .2c-15.6 2.8-34.9 6.9-54.4 26.4c-6.2 6.2-6.2 16.4 0 22.6s16.4 6.2 22.6 0c12.5-12.5 23.8-15.1 37.5-17.6l2.5-.4c13.8-2.5 31.6-5.6 48-22c16.7-16.7 20.9-36 24.1-50.9l.2-1c3.4-15.6 6-26.4 15.7-36.1s20.5-12.3 36.1-15.7l1-.2c14.9-3.2 34.2-7.4 50.9-24.1s20.9-36 24.1-50.9l.2-1c3.4-15.6 6-26.4 15.7-36.1c9.2-9.2 18-10.8 32.7-13.4l.9-.2c15.6-2.8 34.9-6.9 54.4-26.4c6.2-6.2 6.2-16.4 0-22.6zM191.2 479.2l288-288L495 207c10.9 10.9 17 25.6 17 41s-6.1 30.1-17 41L289 495c-10.9 10.9-25.6 17-41 17s-30.1-6.1-41-17l-15.8-15.8zM17 305C6.1 294.1 0 279.4 0 264s6.1-30.1 17-41L223 17C233.9 6.1 248.6 0 264 0s30.1 6.1 41 17l15.8 15.8-288 288L17 305z"/></svg>',
		'fields' => array(

			array(
				'type'    => 'content',
				'class'   => 'wpgp--menu-detail-wrap',
				'content' => '<div class="wpgp--menu-detail">
									<strong>Appearance</strong>
									<a class="wpgp--settings-tab-help-btn" href="https://pluginic.com/support/?ref=100?ref=100" target="_blank">Need Help?</a>
									<br>
									<p>The Appearance tab lets you choose a theme and layout and set the display mode with submenus. Before you come up with these settings, you must have an API key. <a href="' . admin_url() . 'edit.php?post_type=wpgp_youtube_gallery&page=wpgpyg_settings" target="_blank">Set your API key here</a> if you don\'t already have one.</p>
								</div>',
			),

			array(
				'id'       => 'wpgpyt_display_mode',
				'type'     => 'image_select',
				'title'    => __( 'Display Mode', 'wpgp-youtube-gallery' ),
				'subtitle' => __( 'Set a display mode.', 'wpgp-youtube-gallery' ),
				'options'  => array(
					'gallery'    => WPGP_YOUTUBE_GALLERY_DIR_URL_FILE . 'admin/img/gallery.png',
					'scroll'     => WPGP_YOUTUBE_GALLERY_DIR_URL_FILE . 'admin/img/scroll.png',
					'grid'       => WPGP_YOUTUBE_GALLERY_DIR_URL_FILE . 'admin/img/grid.png',
					'slider'     => WPGP_YOUTUBE_GALLERY_DIR_URL_FILE . 'admin/img/slider.png',
					'button'     => WPGP_YOUTUBE_GALLERY_DIR_URL_FILE . 'admin/img/button.png',
					'selfhosted' => WPGP_YOUTUBE_GALLERY_DIR_URL_FILE . 'admin/img/selfhosted.png',
				),
				'default'  => 'gallery',
				'class'    => 'wpgpyt-display-mode',
			),
			array(
				'id'         => 'wpgpyt_max_width',
				'type'       => 'number',
				'title'      => __( 'Maximum Width', 'wpgp-youtube-gallery' ),
				'subtitle'   => __( 'Maximum with of the section.', 'wpgp-youtube-gallery' ),
				'unit'       => 'px',
				'default'    => 900,
				'dependency' => array( 'wpgpyt_display_mode', '!=', 'button' ),
			),
			array(
				'id'         => 'wpgpyt_player_size_type',
				'type'       => 'button_set',
				'title'      => __( 'Player Size Type<sup class="wpgp-title-sub-pro"><a href="#" target="_blank">PRO</a></sup>', 'wpgp-youtube-gallery' ),
				'subtitle'   => __( 'Select a video player size type.', 'wpgp-youtube-gallery' ),
				'options'    => array(
					'custom' => 'Custom',
					'auto'   => 'Auto (16:9 aspect ratio)',
				),
				'default'    => 'auto',
				'dependency' => array( 'wpgpyt_display_mode', '!=', 'button' ),
				'class'      => 'wpgp-fieldset-pro',
			),
			array(
				'id'          => 'wpgpyt_player_size',
				'type'        => 'dimensions',
				'title'       => __( 'Video Player Size', 'wpgp-youtube-gallery' ),
				'subtitle'    => __( 'Size of the video player in pixel.', 'wpgp-youtube-gallery' ),
				'width_icon'  => 'width',
				'height_icon' => 'height',
				'show_units'  => false,
				'default'     => array(
					'width'  => '560',
					'height' => '315',
				),
				'dependency'  => array( 'wpgpyt_player_size_type', '==', 'custom' ),
			),
			array(
				'id'         => 'wpgpyt_player_spacing',
				'type'       => 'button_set',
				'title'      => __( 'Player/Section Spacing', 'wpgp-youtube-gallery' ),
				'subtitle'   => __( 'Set space around the player in Gallery layout.<br>or spacing around whole section in Grid layout.', 'wpgp-youtube-gallery' ),
				'options'    => array(
					'set-space' => 'Set Space',
					'no-space'  => 'No Space',
				),
				'default'    => 'no-space',
				'dependency' => array( 'wpgpyt_display_mode', '!=', 'button' ),
			),
			array(
				'id'          => 'wpgpyt_player_spacing_size',
				'type'        => 'dimensions',
				'title'       => __( 'Set Player Spacing', 'wpgp-youtube-gallery' ),
				'subtitle'    => __( 'Set player spacing in pixel.', 'wpgp-youtube-gallery' ),
				'width_icon'  => 'horizontal',
				'height_icon' => 'vertical',
				'show_units'  => false,
				'default'     => array(
					'width'  => '20',
					'height' => '20',
				),
				'dependency'  => array( 'wpgpyt_player_spacing', '==', 'set-space' ),
			),
			array(
				'id'         => 'wpgpyt_gallery_column',
				'type'       => 'spinner',
				'title'      => __( 'Grid Column', 'wpgp-youtube-gallery' ),
				'subtitle'   => __( 'Set number for the column of grid.', 'wpgp-youtube-gallery' ),
				'default'    => 4,
				'dependency' => array( 'wpgpyt_display_mode|wpgpyt_display_mode', '!=|!=', 'slider|button' ),
			),
			array(
				'id'         => 'wpgpyt_thumb_height',
				'type'       => 'button_set',
				'title'      => __( 'Thumbnail Height<sup class="wpgp-title-sub-pro"><a href="#" target="_blank">PRO</a></sup>', 'wpgp-youtube-gallery' ),
				'subtitle'   => __( 'Set thumbnail height.', 'wpgp-youtube-gallery' ),
				'options'    => array(
					'custom' => 'Custom',
					'auto'   => 'Auto',
				),
				'default'    => 'auto',
				'dependency' => array( 'wpgpyt_display_mode', '!=', 'button' ),
				'class'      => 'wpgp-fieldset-pro',
			),
			array(
				'id'         => 'wpgpyt_thumb_height_size',
				'type'       => 'number',
				'title'      => __( 'Set Thumbnail Height (Max)', 'wpgp-youtube-gallery' ),
				'subtitle'   => __( 'Set maximum thumbnail height in pixel.', 'wpgp-youtube-gallery' ),
				'unit'       => 'px',
				'default'    => 136,
				'dependency' => array( 'wpgpyt_thumb_height', '==', 'custom' ),
			),
			array(
				'id'          => 'wpgpyt_video_from',
				'type'        => 'button_set',
				'title'       => __( 'Video From', 'wpgp-youtube-gallery' ),
				'subtitle'    => __( 'Select a method to display video from.', 'wpgp-youtube-gallery' ),
				'placeholder' => 'Select an option',
				'options'     => array(
					'channel'  => 'Channel',
					'playlist' => 'Playlist',
				),
				'default'     => 'playlist',
				'dependency'  => array( 'wpgpyt_display_mode', '!=', 'button' ),
			),
			array(
				'id'         => 'wpgpyt_channel_id',
				'type'       => 'text',
				'title'      => __( 'Channel ID', 'wpgp-youtube-gallery' ),
				'subtitle'   => __( 'Set your channel ID.', 'wpgp-youtube-gallery' ),
				'desc'       => 'To get your channel ID:<br>Visit → <a href="https://www.youtube.com/account_advanced" target="_blank">YouTube Account Advanced settings</a><br>If you leave this empty, video will automatically show from your country base.',
				'default'    => 'UC3pV6eELigzhTjzBUPmT6_A',
				'dependency' => array( 'wpgpyt_display_mode|wpgpyt_video_from', '!=|==', 'button|channel' ),
			),
			array(
				'id'          => 'wpgpyt_playlist_id',
				'type'        => 'text',
				'title'       => __( 'Playlist ID', 'wpgp-youtube-gallery' ),
				'subtitle'    => __( 'Set your playlist ID.', 'wpgp-youtube-gallery' ),
				'placeholder' => __( 'https://www.youtube.com/playlist?list=', 'wpgp-youtube-gallery' ),
				'desc'        => 'View all <a href="https://www.youtube.com/view_all_playlists" target="_blank">Playlists</a>',
				'default'     => 'PLVODYj2uxE86pJ1AnK6UQIsVH9N39237G',
				'dependency'  => array( 'wpgpyt_display_mode|wpgpyt_video_from', '!=|==', 'button|playlist' ),
			),

			// Slider Settings.
			array(
				'type'       => 'subheading',
				'content'    => 'Slider Settings',
				'dependency' => array( 'wpgpyt_display_mode', '==', 'slider' ),
			),
			array(
				'id'          => 'wpgpyt_slider_per_view',
				'type'        => 'spacing',
				'title'       => __( 'Total Slide', 'wpgp-youtube-gallery' ),
				'subtitle'    => __( 'Maximum slide per view in responsive view.', 'wpgp-youtube-gallery' ),
				'top_icon'    => '<i class="fa fa-desktop"></i> Desktop',
				'bottom_icon' => '<i class="fa fa-tablet"></i> Tablet',
				'left_icon'   => '<i class="fa fa-mobile-phone"></i> Mobile',
				'unit'        => false,
				'right'       => false,
				'default'     => array(
					'top'    => '3', // Desktop.
					'bottom' => '2', // Tablet.
					'left'   => '1', // Mobile.
				),
				'dependency'  => array( 'wpgpyt_display_mode', '==', 'slider' ),
				'class'       => 'wpgp--no-placeholder wpgpyt-spacing-ico-space',
			),
			array(
				'id'         => 'wpgpyg_slider_pagination',
				'type'       => 'switcher',
				'title'      => 'Pagination',
				'text_on'    => 'Show',
				'text_off'   => 'Hide',
				'text_width' => 80,
				'default'    => true,
				'dependency' => array( 'wpgpyt_display_mode', '==', 'slider' ),
			),
			array(
				'id'         => 'wpgpyg_slider_navigation',
				'type'       => 'switcher',
				'title'      => 'Navigation',
				'text_on'    => 'Show',
				'text_off'   => 'Hide',
				'text_width' => 80,
				'default'    => true,
				'dependency' => array( 'wpgpyt_display_mode', '==', 'slider' ),
			),
			array(
				'type'       => 'subheading',
				'content'    => 'Show/Hide Components',
				'dependency' => array( 'wpgpyt_display_mode', '!=', 'button' ),
			),
			array(
				'id'         => 'wpgpyg_video_title_show',
				'type'       => 'switcher',
				'title'      => 'Show Video Title',
				'text_on'    => 'Show',
				'text_off'   => 'Hide',
				'text_width' => 80,
				'default'    => true,
				'dependency' => array( 'wpgpyt_display_mode', '!=', 'button' ),
			),
			array(
				'id'         => 'wpgpyg_video_title_ellipsis',
				'type'       => 'switcher',
				'title'      => __( 'Video Title Ellipsis<sup class="wpgp-title-sub-pro"><a href="#" target="_blank">PRO</a></sup>', 'wpgp-youtube-gallery' ),
				'subtitle'   => __( 'Show the title in 1 line.', 'wpgp-youtube-gallery' ),
				'text_on'    => __( 'Show', 'wpgp-youtube-gallery' ),
				'text_off'   => __( 'Hide', 'wpgp-youtube-gallery' ),
				'text_width' => 80,
				'default'    => true,
				'dependency' => array( 'wpgpyg_video_title_show|wpgpyt_display_mode', '==|!=', 'true|button' ),
				'class'      => 'wpgp-fieldset-pro',
			),
			array(
				'id'         => 'wpgpyg_video_desc_shows',
				'type'       => 'switcher',
				'title'      => 'Show Video Description',
				'text_on'    => 'Show',
				'text_off'   => 'Hide',
				'text_width' => 80,
				'default'    => false,
				'dependency' => array( 'wpgpyt_display_mode', '!=', 'button' ),
			),
			array(
				'id'         => 'wpgpyt_video_desc_ellipsis',
				'type'       => 'switcher',
				'title'      => __( 'Video Description Ellipsis<sup class="wpgp-title-sub-pro"><a href="#" target="_blank">PRO</a></sup>', 'wpgp-youtube-gallery' ),
				'subtitle'   => __( 'Show the description in 3 line.', 'wpgp-youtube-gallery' ),
				'text_on'    => __( 'Show', 'wpgp-youtube-gallery' ),
				'text_off'   => __( 'Hide', 'wpgp-youtube-gallery' ),
				'text_width' => 80,
				'default'    => true,
				'dependency' => array( 'wpgpyg_video_desc_shows', '==', 'true' ),
				'class'      => 'wpgp-fieldset-pro',
			),
			array(
				'id'         => 'wpgpyg_video_desc_length',
				'type'       => 'spinner',
				'title'      => __( 'Description Length<sup class="wpgp-title-sub-pro"><a href="#" target="_blank">PRO</a></sup>', 'wpgp-youtube-gallery' ),
				'subtitle'   => __( 'Trims the description to a certain number of words.', 'wpgp-youtube-gallery' ),
				'min'        => 5,
				'default'    => 34,
				'dependency' => array( 'wpgpyg_video_desc_shows|wpgpyt_video_desc_ellipsis', '==|==', 'true|true' ),
				'class'      => 'wpgp-fieldset-pro',
			),
			array(
				'id'         => 'wpgpyt_video_thumb_show',
				'type'       => 'switcher',
				'title'      => __( 'Video Thumbnails', 'wpgp-youtube-gallery' ),
				'subtitle'   => __( 'Show/Hide thumbnails.', 'wpgp-youtube-gallery' ),
				'text_on'    => __( 'Show', 'wpgp-youtube-gallery' ),
				'text_off'   => __( 'Hide', 'wpgp-youtube-gallery' ),
				'text_width' => 80,
				'default'    => true,
				'dependency' => array( 'wpgpyt_display_mode', '!=', 'button' ),
			),
			array(
				'id'         => 'wpgpyt_video_meta_show',
				'type'       => 'button_set',
				'title'      => 'Show/Hide Video Meta<sup class="wpgp-title-sub-pro"><a href="#" target="_blank">PRO</a></sup>',
				'subtitle'   => __( 'Show/Hide video statistics meta.', 'wpgp-youtube-gallery' ),
				'multiple'   => true,
				'options'    => array(
					'view'     => '<i class="fa fa-eye" aria-hidden="true"></i>View',
					'like'     => '<i class="fa fa-thumbs-up" aria-hidden="true"></i>Like',
					'favorite' => '<i class="fa fa-heart" aria-hidden="true"></i>Favorite',
					'comments' => '<i class="fa fa-comments" aria-hidden="true"></i>Comments',
				),
				'default'    => array( 'view', 'like' ),
				'dependency' => array( 'wpgpyt_display_mode', '==', 'grid' ),
				'class'      => 'wpgpyt-btnset-multiico wpgp-fieldset-pro',
			),
			array(
				'id'         => 'wpgpyt_video_meta_view_num_short',
				'type'       => 'checkbox',
				'title'      => 'Number Shorter<sup class="wpgp-title-sub-pro"><a href="#" target="_blank">PRO</a></sup>',
				'subtitle'   => 'Number shorter like (1000 to 1K) style count.',
				'label'      => 'Yes, Please do it.',
				'default'    => true,
				'dependency' => array( 'wpgpyt_display_mode|wpgpyt_video_meta_show', '==|any', 'grid|view' ),
				'class'      => 'wpgp-fieldset-pro',
			),

			// Buttons Options.
			array(
				'id'          => 'wpgpyt_single_id',
				'type'        => 'text',
				'title'       => __( 'Video Link', 'wpgp-youtube-gallery' ),
				'subtitle'    => __( 'Set Youtube link.', 'wpgp-youtube-gallery' ),
				'desc'        => __( 'You can also set Vimeo & Self hosted link from your gallery as well.', 'wpgp-youtube-gallery' ),
				'placeholder' => __( 'https://vimeo.com/351626582', 'wpgp-youtube-gallery' ),
				'default'     => 'https://youtu.be/RvrOeXvmaMY',
				'dependency'  => array( 'wpgpyt_display_mode', '==', 'button' ),
			),
			array(
				'id'         => 'wpgpyt_single_btn_txt',
				'type'       => 'text',
				'title'      => __( 'Button Text', 'wpgp-youtube-gallery' ),
				'subtitle'   => __( 'Set your button text.', 'wpgp-youtube-gallery' ),
				'desc'       => __( 'Leave this field empty, if you want to show only icon.', 'wpgp-youtube-gallery' ),
				'default'    => 'Watch Now!',
				'dependency' => array( 'wpgpyt_display_mode', '==', 'button' ),
			),
			array(
				'id'         => 'wpgpyt_single_btn_icon',
				'type'       => 'image_select',
				'title'      => 'Button Icon',
				'subtitle'   => __( 'Set your button icon.', 'wpgp-youtube-gallery' ),
				'options'    => array(
					'youtube'          => WPGP_YOUTUBE_GALLERY_DIR_URL_FILE . 'admin/img/button-icons/youtube.svg',
					'play'             => WPGP_YOUTUBE_GALLERY_DIR_URL_FILE . 'admin/img/button-icons/play.svg',
					'circle-play-fill' => WPGP_YOUTUBE_GALLERY_DIR_URL_FILE . 'admin/img/button-icons/circle-play-fill.svg',
					'circle-play-o'    => WPGP_YOUTUBE_GALLERY_DIR_URL_FILE . 'admin/img/button-icons/circle-play-o.svg',
					'file-video-fill'  => WPGP_YOUTUBE_GALLERY_DIR_URL_FILE . 'admin/img/button-icons/file-video-fill.svg',
					'file-video-o'     => WPGP_YOUTUBE_GALLERY_DIR_URL_FILE . 'admin/img/button-icons/file-video-o.svg',
					'film'             => WPGP_YOUTUBE_GALLERY_DIR_URL_FILE . 'admin/img/button-icons/film.svg',
					'forward'          => WPGP_YOUTUBE_GALLERY_DIR_URL_FILE . 'admin/img/button-icons/forward.svg',
					'video'            => WPGP_YOUTUBE_GALLERY_DIR_URL_FILE . 'admin/img/button-icons/video.svg',
					'volume-high'      => WPGP_YOUTUBE_GALLERY_DIR_URL_FILE . 'admin/img/button-icons/volume-high.svg',
					'vr-cardboard'     => WPGP_YOUTUBE_GALLERY_DIR_URL_FILE . 'admin/img/button-icons/vr-cardboard.svg',
				),
				'default'    => 'youtube',
				'class'      => 'wpgpyt-img-as-svg-select',
				'dependency' => array( 'wpgpyt_display_mode', '==', 'button' ),
			),
			array(
				'id'         => 'wpgpyt_btn_icon_size',
				'type'       => 'dimensions',
				'title'      => 'Icon Size',
				'subtitle'   => __( 'Set icon size.', 'wpgp-youtube-gallery' ),
				'default'    => array(
					'width'  => '24',
					'height' => '24',
					'unit'   => 'px',
				),
				'dependency' => array( 'wpgpyt_display_mode', '==', 'button' ),
			),
			array(
				'id'         => 'wpgpyt_btn_icon_position',
				'type'       => 'button_set',
				'title'      => __( 'Button Icon Position', 'wpgp-youtube-gallery' ),
				'subtitle'   => __( 'Set a button icon position.', 'wpgp-youtube-gallery' ),
				'options'    => array(
					'left'   => __( 'Left', 'wpgp-youtube-gallery' ),
					'center' => __( 'Center', 'wpgp-youtube-gallery' ),
					'right'  => __( 'Right', 'wpgp-youtube-gallery' ),
				),
				'default'    => 'left',
				'dependency' => array( 'wpgpyt_display_mode', '==', 'button' ),
			),
			array(
				'id'         => 'wpgpyt_btn_width',
				'type'       => 'button_set',
				'title'      => __( 'Button Width', 'wpgp-youtube-gallery' ),
				'subtitle'   => __( 'Set button width.', 'wpgp-youtube-gallery' ),
				'options'    => array(
					'full'    => __( 'Full Width', 'wpgp-youtube-gallery' ),
					'content' => __( 'Content Size', 'wpgp-youtube-gallery' ),
					'custom'  => __( 'Custom', 'wpgp-youtube-gallery' ),
				),
				'default'    => 'content',
				'dependency' => array( 'wpgpyt_display_mode', '==', 'button' ),
			),
			array(
				'id'         => 'wpgpyt_btn_width_max',
				'type'       => 'dimensions',
				'title'      => 'Maximum Width/Height',
				'subtitle'   => __( 'Set maximum width/height for button.', 'wpgp-youtube-gallery' ),
				'default'    => array(
					'width'  => '100',
					'height' => '250',
					'unit'   => 'px',
				),
				'dependency' => array( 'wpgpyt_display_mode|wpgpyt_btn_width', '==|==', 'button|custom' ),
			),
			array(
				'id'         => 'wpgpyt_single_btn_spacing',
				'type'       => 'spacing',
				'title'      => 'Button Spacing',
				'default'    => array(
					'top'    => '10',
					'right'  => '20',
					'bottom' => '10',
					'left'   => '20',
					'unit'   => 'px',
				),
				'dependency' => array( 'wpgpyt_display_mode', '==', 'button' ),
			),
			array(
				'id'         => 'wpgpyt_single_btn_border',
				'type'       => 'border',
				'title'      => 'Button Border',
				'color'      => false,
				'default'    => array(
					'top'    => '1',
					'right'  => '1',
					'bottom' => '1',
					'left'   => '1',
					'style'  => 'dashed',
					'unit'   => 'px',
				),
				'dependency' => array( 'wpgpyt_display_mode', '==', 'button' ),
			),
			array(
				'id'         => 'wpgpyt_single_btn_radius',
				'type'       => 'spacing',
				'title'      => 'Border Radius',
				'default'    => array(
					'top'    => '2',
					'right'  => '2',
					'bottom' => '2',
					'left'   => '2',
					'unit'   => 'px',
				),
				'dependency' => array( 'wpgpyt_display_mode', '==', 'button' ),
			),
			array(
				'id'         => 'wpgpyt_single_btn_position',
				'type'       => 'button_set',
				'title'      => __( 'Button Position', 'wpgp-youtube-gallery' ),
				'subtitle'   => __( 'Set a button position.', 'wpgp-youtube-gallery' ),
				'options'    => array(
					'left'   => __( 'Left', 'wpgp-youtube-gallery' ),
					'center' => __( 'Center', 'wpgp-youtube-gallery' ),
					'right'  => __( 'Right', 'wpgp-youtube-gallery' ),
				),
				'default'    => 'center',
				'dependency' => array( 'wpgpyt_display_mode', '==', 'button' ),
			),
			array(
				'id'         => 'wpgpyt_single_btn_animation',
				'type'       => 'switcher',
				'title'      => 'Button Animation<sup class="wpgp-title-sub-pro"><a href="#" target="_blank">PRO</a></sup>',
				'default'    => false,
				'dependency' => array( 'wpgpyt_display_mode', '==', 'button' ),
				'class'      => 'wpgp-fieldset-pro',
			),

		),
	)
);
