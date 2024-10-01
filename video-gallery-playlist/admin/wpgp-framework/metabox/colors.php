<?php if ( ! defined( 'ABSPATH' ) ) {
	die; } // Cannot access directly.

//
// Create a section
//
WPGP::createSection(
	$wpgp_page_opts,
	array(
		'title'  => __( 'Colors', 'wpgp-youtube-gallery' ),
		'icon'   => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><path d="M192 496c97.2 0 176-78.8 176-176c0-74.1-102.3-230.6-150.9-300.7c-12.3-17.7-37.8-17.7-50.1 0C118.3 89.4 16 245.9 16 320c0 97.2 78.8 176 176 176zM112 320c0 44.2 35.8 80 80 80c8.8 0 16 7.2 16 16s-7.2 16-16 16c-61.9 0-112-50.1-112-112c0-8.8 7.2-16 16-16s16 7.2 16 16z"/></svg>',
		'class'  => 'wpgpyt-section-colors',
		'fields' => array(

			array(
				'type'    => 'content',
				'class'   => 'wpgp--menu-detail-wrap',
				'content' => '<div class="wpgp--menu-detail">
									<strong>Colors</strong>
									<a class="wpgp--settings-tab-help-btn" href="https://pluginic.com/support/?ref=100" target="_blank" class="">Need Help?</a>
									<br>
									<p>Here you\'ll find more than just the basic colors to play with. You can easily change the colors of gallery interface elements like section background to the player background, thumbnails, grid, video title, description, scrollable background, scroll layout, and anything else to match your website.</p>
								</div>',
			),

			array(
				'id'      => 'wpgpyg_color_section_bg',
				'type'    => 'color',
				'title'   => 'Section Background',
				'default' => 'transparent',
			),
			array(
				'id'      => 'wpgpyg_color_player_bg',
				'type'    => 'color',
				'title'   => 'Player Background',
				'default' => '#D6D6DF',
			),
			array(
				'id'      => 'wpgpyg_color_thumbnail',
				'type'    => 'color_group',
				'title'   => 'Thumbnail/Grid',
				'options' => array(
					'background' => 'Background',
					'active'     => 'Active',
					'hover'      => 'Hover',
				),
				'default' => array(
					'background' => '#FFFFFF',
					'active'     => '#595E6E',
					'hover'      => '#D6D6DF',
				),
			),
			array(
				'id'      => 'wpgpyg_color_title',
				'type'    => 'color_group',
				'title'   => 'Video Title',
				'options' => array(
					'color'  => 'Color',
					'active' => 'Active',
					'hover'  => 'Hover',
				),
				'default' => array(
					'color'  => '#666666',
					'active' => '#EEEEEE',
					'hover'  => '#000000',
				),
			),
			array(
				'id'      => 'wpgpyg_color_desc',
				'type'    => 'color_group',
				'title'   => 'Video Description',
				'options' => array(
					'color'  => 'Color',
					'active' => 'Active',
					'hover'  => 'Hover',
				),
				'default' => array(
					'color'  => '#666666',
					'active' => '#EEEEEE',
					'hover'  => '#000000',
				),
			),
			array(
				'id'       => 'wpgpyg_color_meta',
				'type'     => 'color_group',
				'title'    => 'Video Meta',
				'subtitle' => 'Video meta in Grid section.',
				'options'  => array(
					'icon'       => 'Icon',
					'text'       => 'Text',
					'background' => 'Background',
				),
				'default'  => array(
					'icon'       => '#222222',
					'text'       => '#222222',
					'background' => '#e8e8e8',
				),
			),

			//
			// Scroll Layout - Color Options.
			//
			array(
				'type'    => 'subheading',
				'content' => '<img src="' . WPGP_YOUTUBE_GALLERY_DIR_URL_FILE . 'admin/img/Scroll-layout.png"><span>Color For Scroll Layout<br><i>The scroll colors and color palettes are only for scroll layout.</i></span>',
				'class'   => 'wpgpyg-sl-subheading',
			),
			array(
				'id'      => 'wpgpyg_color_scrollbar_bg',
				'type'    => 'color',
				'title'   => 'Scrollbar Background<sup class="wpgp-title-sub-pro"><a href="#" target="_blank">PRO</a></sup>',
				'default' => '#D6D6DF',
				'class'   => 'wpgp-fieldset-pro',
			),
			array(
				'id'      => 'wpgpyg_color_scrollbar_border',
				'type'    => 'border',
				'title'   => 'Scrollbar Border<sup class="wpgp-title-sub-pro"><a href="#" target="_blank">PRO</a></sup>',
				'all'     => true,
				'default' => array(
					'all'   => '0',
					'style' => 'solid',
					'color' => '#fff',
					'unit'  => 'px',
				),
				'class'   => 'wpgp-fieldset-pro',
			),
			array(
				'id'       => 'wpgpyt_scroll_layout_color_from',
				'type'     => 'button_set',
				'title'    => __( 'Scroll Layout Color Type<sup class="wpgp-title-sub-pro"><a href="#" target="_blank">PRO</a></sup>', 'wpgp-youtube-gallery' ),
				'subtitle' => __( 'Select a color type for scroll layout.', 'wpgp-youtube-gallery' ),
				'options'  => array(
					'palette' => 'Palette',
					'pick'    => 'Pick (From top options)',
				),
				'default'  => 'palette',
				'class'    => 'wpgp-fieldset-pro',
			),
			array(
				'id'         => 'wpgpyt_scroll_layout_color_palette',
				'type'       => 'palette',
				'title'      => 'Scroll Layout Color Palette<sup class="wpgp-title-sub-pro"><a href="#" target="_blank">PRO</a></sup>',
				'subtitle'   => __( 'If you don\'t want to use color palette just use upper color fields.', 'wpgp-youtube-gallery' ),
				'options'    => array(
					'set1' => array( '#111', '#202325', '#666' ),
					'set2' => array( '#140D36', '#2D2455', '#281E58' ),
					'set3' => array( '#002430', '#014C6E', '#5D7043', '#ffffff' ),
					'set4' => array( '#110016', '#340143', '#252956', '#B996FF' ),
					'set5' => array( '#bbd5ff', '#ccab5e', '#fff55f', '#197c5d' ),
				),
				'default'    => 'set1',
				'dependency' => array( 'wpgpyt_scroll_layout_color_from', '==', 'palette' ),
				'class'      => 'wpgp-fieldset-pro',
			),

			//
			// Button Layout - Color Options.
			//
			array(
				'type'    => 'subheading',
				'content' => '<img src="' . WPGP_YOUTUBE_GALLERY_DIR_URL_FILE . 'admin/img/button-64.png"><span>Color For Button Layout<br><i>Below options are only for layout.</i></span>',
				'class'   => 'wpgpyg-sl-subheading wpgpyt-depend-on-button-layout',
			),
			array(
				'id'      => 'wpgpyg_color_button_text',
				'type'    => 'color_group',
				'title'   => 'Button Text',
				'options' => array(
					'color' => 'Color',
					'hover' => 'Hover',
				),
				'default' => array(
					'color' => '#FFFFFF',
					'hover' => '#FFFFFF',
				),
				'class'   => 'wpgpyt-depend-on-button-layout',
			),
			array(
				'id'      => 'wpgpyg_color_button_bg',
				'type'    => 'color_group',
				'title'   => 'Button Background',
				'options' => array(
					'background' => 'Background',
					'hover'      => 'Hover',
				),
				'default' => array(
					'background' => '#dc3545',
					'hover'      => '#a51522',
				),
				'class'   => 'wpgpyt-depend-on-button-layout',
			),
			array(
				'id'      => 'wpgpyg_color_button_icon',
				'type'    => 'color_group',
				'title'   => 'Button Icon',
				'options' => array(
					'color' => 'Color',
					'hover' => 'Hover',
				),
				'default' => array(
					'color' => '#FFFFFF',
					'hover' => '#FFFFFF',
				),
				'class'   => 'wpgpyt-depend-on-button-layout',
			),
			array(
				'id'      => 'wpgpyg_color_button_border',
				'type'    => 'color_group',
				'title'   => 'Border Color',
				'options' => array(
					'color' => 'Color',
					'hover' => 'Hover',
				),
				'default' => array(
					'color' => '#dc3545',
					'hover' => '#a51522',
				),
				'class'   => 'wpgpyt-depend-on-button-layout',
			),

		),
	)
);
