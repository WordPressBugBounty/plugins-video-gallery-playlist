<?php if ( ! defined( 'ABSPATH' ) ) {
	die; } // Cannot access directly.

//
// Metabox of the PAGE and POST both.
// Set a unique slug-like ID
//
$wpgp_meta_opts = '_wpgp_shortcode_meta';

//
// Create a metabox
//
WPGP::createMetabox(
	$wpgp_meta_opts,
	array(
		'title'     => 'Shortcode',
		'post_type' => 'wpgp_youtube_gallery',
		'context'   => 'side',
	)
);

//
// Create a section
//
if ( isset( $_GET['post'] ) ) {

	WPGP::createSection(
		$wpgp_meta_opts,
		array(
			'fields' => array(

				array(
					'type'  => 'shortcode',
					'class' => 'wpgp--shortcode-field',
				),
			),
		)
	);
} else {

	WPGP::createSection(
		$wpgp_meta_opts,
		array(
			'fields' => array(

				array(
					'type'    => 'content',
					'content' => 'Shortcode will appear here after publish the slider.',
				),

			),
		)
	);
}
