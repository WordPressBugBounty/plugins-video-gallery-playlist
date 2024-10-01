<?php
/**
 * Enqueuing scripts,
 * Based on gallery theme.
 */
wp_enqueue_script( $this->plugin_name . 'spidochetube' );
if ( 'gallery' !== $wpgpyt_display_mode ) {

	wp_enqueue_style( $this->plugin_name . 'darkscroll' );
	wp_enqueue_script( $this->plugin_name . 'nicescroll' );
} else {

	wp_enqueue_style( $this->plugin_name . 'minimal' );
}
/**
 * Source ID.
 */
$wpgpyg_source_id = ( 'playlist' === $wpgpyt_video_from ) ? $wpgpyg_playlist_id : $wpgpyg_channel_id;

// Description Boolean Render.
$wpgpyg_video_desc_show_render = '';
if ( $wpgpyg_video_desc_shows ) {
	if ( 'gallery' === $wpgpyt_display_mode ) {
		$wpgpyg_video_desc_show_render = 1;
	} else {
		$wpgpyg_video_desc_show_render = 0;
	}
} else {
	$wpgpyg_video_desc_show_render = 0;
}

/**
 * Check if not empty video list through first one.
 */
if ( ! empty( $wpgpyg_first_video_id ) ) {
	?>
	<script>
	(function( $ ) {
	'use strict';

		$( document ).ready(function() {

			// Initial arguments.
			var wpgpygAPIkey       = '<?php echo esc_html( $wpgpyg_api_key ); ?>';
			var wpgpygTheme        = '<?php echo esc_html( $wpgpyt_display_mode ); ?>';
			var wpgpygSource       = '<?php echo esc_html( $wpgpyt_video_from ); ?>';
			var wpgpygSourceID     = '<?php echo esc_html( $wpgpyg_source_id ); ?>';

			// Query arguments.
			var wpgpygMaxResult    = '<?php echo esc_html( $wpgpyg_max_result ); ?>';
			var wpgpygTitleShow    = '<?php echo $wpgpyg_video_title_show ? 1 : 0; ?>';
			var wpgpygDescShow     = '<?php echo esc_html( $wpgpyg_video_desc_show_render ); ?>';
			var wpgpygThumbShow    = '<?php echo $wpgpyt_video_thumb_show ? 1 : 0; ?>';
			var wpgpygPagingTxt    = '<?php echo esc_html( $wpgpyt_pagination_text ); ?>';
			var wpgpygOrder        = '<?php echo esc_html( $wpgpyg_order ); ?>';

			if('gallery' !== wpgpygTheme) {

				$('#youtube').spidochetube({
					key             : wpgpygAPIkey, // API Key
					sources         : wpgpygSource,
					id              : wpgpygSourceID, // Playlist ID
					max_results     : wpgpygMaxResult,
					title_show      : wpgpygTitleShow,
					desc_show       : wpgpygDescShow,
					thumb_show      : wpgpygThumbShow,
					paging          : 'loadmore',
					pagingTxt       : wpgpygPagingTxt,
					orderBy         : wpgpygOrder,
					scroll_duration : 500,
					complete: function(){
						// Initialize the scroll plugin after the playlist is ready
						$('#spidochetube_list').niceScroll({
							cursorcolor  : '#666',
							cursorborder : '0px solid #fff',
							autohidemode : false
						});
					}
				});
			} else {

				$('#youtube').spidochetube({
					key             : wpgpygAPIkey, // API Key
					sources         : wpgpygSource,
					id              : wpgpygSourceID, // Playlist ID
					max_results     : wpgpygMaxResult,
					title_show      : wpgpygTitleShow,
					desc_show       : wpgpygDescShow,
					thumb_show      : wpgpygThumbShow,
					paging          : 'loadmore',
					pagingTxt       : wpgpygPagingTxt,
					orderBy         : wpgpygOrder,
				});
			}

		});
	})( jQuery );
	</script>
	<style>
	#player {
		min-height: 337px !important;
	}
	#wpgpyt-wrapper {
		position: relative;
		display: grid;
	}
	.spidochetube {
		max-width: <?php echo esc_attr( $wpgpyt_max_width ); ?>px;
		margin: 0 auto;
	}
	.wpgpyt-mode-scroll .spidochetube {
		box-shadow: rgba(50, 50, 93, 0.25) 0px 6px 12px -2px, rgba(0, 0, 0, 0.3) 0px 3px 7px -3px;
	}
	.wpgpyt-mode-scroll #spidochetube_loadmore {
		color: #999;
		display: block;
		text-align: right;
		font-size: 16px;
		line-height: 20px;
	}
	<?php
	if ( 'gallery' === $wpgpyt_display_mode ) {

		// Section Background Color.
		echo '.spidochetube .spidochetube_inner {
			background-color: ' . esc_attr( $wpgpyg_color_section_bg ) . ';
		}';

		// Player Background Color.
		echo '.spidochetube #spidochetube_player {
			background-color: ' . esc_attr( $wpgpyg_color_player_bg ) . ';
		}';

		// Gallery Column.
		// Thumbnail Background Color.
		echo '#wpgpyt-wrapper .spidochetube #spidochetube_list li {
			width: calc(100% / ' . esc_attr( $wpgpyt_gallery_column ) . ' - 2%);
			background-color: ' . esc_attr( $wpgpyg_color_thumbnail['background'] ) . ';
		}';

		// Thumbnail Background Active.
		echo '#wpgpyt-wrapper .spidochetube #spidochetube_list li.spidochetube_current {
			background-color: ' . esc_attr( $wpgpyg_color_thumbnail['active'] ) . ';
		}';

		// Thumbnail Backgrond Hover.
		echo '#wpgpyt-wrapper .spidochetube #spidochetube_list li:hover {
			background-color: ' . esc_attr( $wpgpyg_color_thumbnail['hover'] ) . ';
		}';

		// Title Color, Active & Hover.
		echo '#wpgpyt-wrapper .spidochetube #spidochetube_list li a {
			color: ' . esc_attr( $wpgpyg_color_title['color'] ) . ';
		}
		#wpgpyt-wrapper .spidochetube #spidochetube_list li.spidochetube_current a {
			color: ' . esc_attr( $wpgpyg_color_title['active'] ) . ';
		}
		#wpgpyt-wrapper .spidochetube #spidochetube_list li a:hover {
			color: ' . esc_attr( $wpgpyg_color_title['hover'] ) . ';
		}';

		// Description Color, Active & Hover.
		echo '.spidochetube #spidochetube_list li a span.wpgp-sct-desc {
			color: ' . esc_attr( $wpgpyg_color_desc['color'] ) . ';
		}
		.spidochetube #spidochetube_list li.spidochetube_current a span.wpgp-sct-desc {
			color: ' . esc_attr( $wpgpyg_color_desc['active'] ) . ';
		}
		.spidochetube #spidochetube_list li a:hover span.wpgp-sct-desc {
			color: ' . esc_attr( $wpgpyg_color_desc['hover'] ) . ';
		}';

		// Title & Description Ellipsis.
		echo '.spidochetube #spidochetube_list li a span {
			font-weight: bold;
		}
		.spidochetube #spidochetube_list li a span.wpgp-sct-desc {
			white-space: break-spaces;
			overflow: hidden;
			text-overflow: ellipsis;
			display: -webkit-box;
			-webkit-line-clamp: 3;
			-webkit-box-orient: vertical;
			margin-top: 2px;
			padding-top: 2px;
			border-top: 1px solid #CFD5DD;
			font-weight: normal;
		}';

		if ( 'set-space' === $wpgpyt_player_spacing ) {

			echo '#wpgpyt-wrapper .spidochetube #spidochetube_player {
				padding: calc(' . esc_attr( $wpgpyt_player_spacing_size['height'] ) . 'px / 2) 0;
			}
			#wpgpyt-wrapper #spidochetube_player #player {
				margin: 0 auto;
				width: calc(100% - ' . esc_attr( $wpgpyt_player_spacing_size['width'] ) . 'px);
			}';
		} else {

			echo '.spidochetube #spidochetube_player {
				padding: 0 !important;
			}
			#spidochetube_player #player {
				margin: 0 !important;
				width: 100% !important;
			}';
		}
	}

	if ( 'scroll' === $wpgpyt_display_mode ) {

		if ( 'set-space' === $wpgpyt_player_spacing ) {

			echo '#spidochetube_player {padding: ' . esc_attr( $wpgpyt_player_spacing_size['height'] ) . 'px ' . esc_attr( $wpgpyt_player_spacing_size['width'] ) . 'px;}';
		}
	}
	?>
	</style>
	<section id="wpgpyt-wrapper" class="wpgpyt-mode-<?php echo esc_attr( $wpgpyt_display_mode ); ?>">
		<div id="youtube" class="spidochetube"></div>
	</section>
	<?php

} else {

	$wpgpyg_get_error_code = $wpgpyg_get_videos->error->code;
	$wpgpyg_get_error_msg  = $wpgpyg_get_videos->error->message;
	echo '<div style="width: 100%;max-width: 1200px;color: #f44336;background: #fff;padding: 20px;display: flex;justify-content: center;align-items: center;margin: 0 auto;">
			<ul style="border: 1px solid;padding: 20px;list-style: none;">
				<li>Video Not Found!!</li>
				<li><strong>Error Code</strong> : ' . wp_kses_post( $wpgpyg_get_error_code ) . ' </li>
				<li><strong>Message</strong> : ' . wp_kses_post( $wpgpyg_get_error_msg ) . '</li>
			</ul>
		</div>';
}
