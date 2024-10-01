<?php if ( ! defined( 'ABSPATH' ) ) {
	die; } // Cannot access directly.

//
// Create a section
//
WPGP::createSection(
	$wpgp_page_opts,
	array(
		'title'  => 'Typography',
		'icon'   => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M32 32C14.3 32 0 46.3 0 64v64c0 17.7 14.3 32 32 32s32-14.3 32-32V96H192l0 128H176c-17.7 0-32 14.3-32 32s14.3 32 32 32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H256l0-128H384v32c0 17.7 14.3 32 32 32s32-14.3 32-32V64c0-17.7-14.3-32-32-32H224 32zM9.4 361.4c-12.5 12.5-12.5 32.8 0 45.3l64 64c9.2 9.2 22.9 11.9 34.9 6.9s19.8-16.6 19.8-29.6V416H320v32c0 12.9 7.8 24.6 19.8 29.6s25.7 2.2 34.9-6.9l64-64c12.5-12.5 12.5-32.8 0-45.3l-64-64c-9.2-9.2-22.9-11.9-34.9-6.9s-19.8 16.6-19.8 29.6v32H128V320c0-12.9-7.8-24.6-19.8-29.6s-25.7-2.2-34.9 6.9l-64 64z"/></svg>',
		'fields' => array(

			array(
				'type'    => 'content',
				'class'   => 'wpgp--menu-detail-wrap',
				'content' => '<div class="wpgp--menu-detail">
									<strong>Typography</strong>
									<a class="wpgp--settings-tab-help-btn" href="https://pluginic.com/support/?ref=100" target="_blank" class="">Need Help?</a>
									<br>
									<p>Arrange the content of the layout to make it more legible, readable, and appealing. You can set title font properties, description font, meta font, and other elements of your video from here. If you leave any style field empty, the particular style will be inherited from its parent element of your theme.</p>
								</div>',
			),

			array(
				'id'           => 'wpgpyg_video_title_typo',
				'type'         => 'typography',
				'title'        => __( 'Video Title Font<sup class="wpgp-title-sub-pro"><a href="#" target="_blank">PRO</a></sup>', 'wpgp-youtube-gallery' ),
				'subtitle'     => __( 'Set video title font properties.', 'wpgp-youtube-gallery' ),
				'preview'      => 'always',
				'preview_text' => __( 'Video Title Preview', 'wpgp-youtube-gallery' ),
				'color'        => false,
				'text_align'   => false,
				'class'        => 'wpgp-fieldset-pro',
			),
			array(
				'id'           => 'wpgpyg_desc_typo',
				'type'         => 'typography',
				'title'        => __( 'Description Font<sup class="wpgp-title-sub-pro"><a href="#" target="_blank">PRO</a></sup>', 'wpgp-youtube-gallery' ),
				'subtitle'     => __( 'Set video description font properties.', 'wpgp-youtube-gallery' ),
				'preview'      => 'always',
				'preview_text' => __( 'Video Description Preview', 'wpgp-youtube-gallery' ),
				'color'        => false,
				'text_align'   => false,
				'class'        => 'wpgp-fieldset-pro',
			),
			array(
				'id'           => 'wpgpyg_meta_typo',
				'type'         => 'typography',
				'title'        => __( 'Video Meta Font<sup class="wpgp-title-sub-pro"><a href="#" target="_blank">PRO</a></sup>', 'wpgp-youtube-gallery' ),
				'subtitle'     => __( 'Set video meta font properties.', 'wpgp-youtube-gallery' ),
				'preview'      => 'always',
				'preview_text' => __( 'Video Meta Preview', 'wpgp-youtube-gallery' ),
				'color'        => false,
				'text_align'   => false,
				'class'        => 'wpgp-fieldset-pro',
			),

		),
	)
);
