<?php if ( ! defined( 'ABSPATH' ) ) {
	die; } // Cannot access directly.

//
// Metabox of the PAGE.
// Set a unique slug-like ID.
//
$wpgp_page_opts = '_wpgp_page_options';

//
// Create a metabox.
//
WPGP::createMetabox(
	$wpgp_page_opts,
	array(
		'title'        => '<img src="' . WPGP_YOUTUBE_GALLERY_DIR_URL_FILE . 'admin/img/icon-128x128.png" alt="WP Gallery For YouTube">Gallery For YouTube<span>' . WPGP_YOUTUBE_GALLERY_VERSION . '</span>',
		'post_type'    => 'wpgp_youtube_gallery',
		'show_restore' => true,
		'theme'        => 'light',
		'class'        => 'wpgp--metabox-options',
	)
);
