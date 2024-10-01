<?php
/**
 * The file that defines the dynamic styles of the plugin.
 *
 * @link       https://grandplugin.com
 * @since      1.0.0
 *
 * @package    WPGP_WordPress_Slider
 * @subpackage WPGP_WordPress_Slider/public
 */
$wpgpyt_subscribe_position = wpgpyg_get_options( 'wpgpyt_subscribe_position' );

$wpgpyt_grid_section_spacing = '';
if ( 'no-space' !== $wpgpyt_player_spacing ) {

	$wpgpyt_grid_section_spacing = $wpgpyt_player_spacing_size['width'] . 'px ' . $wpgpyt_player_spacing_size['height'] . 'px';
} else {

	$wpgpyt_grid_section_spacing = '0';
}

$wpgpyg_css = array(
	'#wpgpyg--section-title-' . $post_id => array(
		'margin-bottom' => $wpgpyg_section_title_margin_bottom . 'px',
	),

);

/**
 * Dynamic Styles.
 * Working only on Grid Layout
 */
$wpgpyt_dynamic_css = '';
if ( 'grid' === $wpgpyt_display_mode ) {

	$wpgpyg_css[ '#wpgpyg--grid-' . $post_id . '.wpgpyt--cards' ] = array(
		'max-width'             => esc_attr( $wpgpyt_max_width ) . 'px',
		'grid-template-columns' => 'repeat(' . esc_attr( $wpgpyt_gallery_column ) . ', 1fr)',
		'padding'               => $wpgpyt_grid_section_spacing,
		'background-color'      => $wpgpyg_color_section_bg,
	);

	$wpgpyg_css[ '#wpgpyg--grid-' . $post_id . ' .wpgpyt--card' ] = array(
		'background-color' => $wpgpyg_color_thumbnail['background'],
	);

	$wpgpyg_css[ '#wpgpyg--grid-' . $post_id . ' .wpgpyt--card:hover' ] = array(
		'background-color' => $wpgpyg_color_thumbnail['hover'],
	);

	$wpgpyg_css[ '#wpgpyg--grid-' . $post_id . ' .wpgpyt--card-content h2' ] = array(
		'color' => $wpgpyg_color_title['color'],
	);

	$wpgpyg_css[ '#wpgpyg--grid-' . $post_id . ' .wpgpyt--card-content h2:hover' ] = array(
		'color' => $wpgpyg_color_title['hover'],
	);

	$wpgpyg_css[ '#wpgpyg--grid-' . $post_id . ' .wpgpyt--card-content .wpgpyt--desc' ] = array(
		'font-weight'    => $wpgpyg_desc_font_weight ? $wpgpyg_desc_font_weight : 'bold',
		'font-style'     => $wpgpyg_desc_font_style ? $wpgpyg_desc_font_style : '',
		'text-align'     => $wpgpyg_desc_text_align ? $wpgpyg_desc_text_align : '',
		'text-transform' => $wpgpyg_desc_text_transform ? $wpgpyg_desc_text_transform : '',
		'font-size'      => $wpgpyg_desc_font_size ? $wpgpyg_desc_font_size . 'px' : '',
		'line-height'    => $wpgpyg_desc_line_height ? $wpgpyg_desc_line_height . 'px' : '',
		'letter-spacing' => $wpgpyg_desc_letter_spacing ? $wpgpyg_desc_letter_spacing . 'px' : '',
		'color'          => $wpgpyg_color_desc['color'],
	);

	$wpgpyg_css[ '#wpgpyg--grid-' . $post_id . ' .wpgpyt--card-content .wpgpyt--desc:hover' ] = array(
		'color' => $wpgpyg_color_desc['hover'],
	);

	$wpgpyg_css[ '#wpgpyg--grid-' . $post_id . ' ul.wpgpyt--video-meta' ] = array(
		'background-color' => $wpgpyg_color_meta['background'],
	);

	$wpgpyg_css[ '#wpgpyg--grid-' . $post_id . ' ul.wpgpyt--video-meta li' ] = array(
		'color' => $wpgpyg_color_meta['text'],
	);

	$wpgpyg_css[ '#wpgpyg--grid-' . $post_id . ' ul.wpgpyt--video-meta li svg' ] = array(
		'fill' => $wpgpyg_color_meta['icon'],
	);

	$wpgpyt_dynamic_css = '@media screen and (min-width: 60em) {
		#wpgpyg--' . $post_id . ' .wpgpyt--card {
			max-width: calc(' . 100 / $wpgpyt_gallery_column . '% -  1em);
		}
	}';
}

/**
 * Dynamic Styles.
 * Working only on Slider Layout
 */
$wpgpyt_grid_responsive_width = '';
if ( 'slider' === $wpgpyt_display_mode ) {

	$wpgpyg_css[ '#wpgp--youtube-gallery-' . $post_id ] = array(
		'max-width'        => esc_attr( $wpgpyt_max_width ) . 'px',
		'background-color' => esc_attr( $wpgpyg_color_section_bg ),
	);

	if ( 'no-space' !== $wpgpyt_player_spacing ) {

		$wpgpyg_css[ '#wpgp--youtube-gallery-' . $post_id . ' .wpgp--video-container' ] = array(
			'border' => $wpgpyt_player_spacing_size['width'] . 'px solid ' . $wpgpyg_color_player_bg,
		);
	}

	$wpgpyg_css[ '#wpgp--youtube-gallery-' . $post_id . ' .swiper-slide' ] = array(
		'background-color' => esc_attr( $wpgpyg_color_thumbnail['background'] ),
	);

	$wpgpyg_css[ '#wpgp--youtube-gallery-' . $post_id . ' .swiper-slide.wpgp-player-active' ] = array(
		'background-color' => esc_attr( $wpgpyg_color_thumbnail['active'] ),
	);

	$wpgpyg_css[ '#wpgp--youtube-gallery-' . $post_id . ' .swiper-slide:hover' ] = array(
		'background-color' => esc_attr( $wpgpyg_color_thumbnail['hover'] ),
	);

	$wpgpyg_css[ '#wpgp--youtube-gallery-' . $post_id . ' .wpgpyg-vid-title' ]                                  = array(
		'color'        => esc_attr( $wpgpyg_color_title['color'] ),
		'font-size'    => esc_attr( $wpgpyg_video_title_font_size ) . 'px',
		'line-height'  => esc_attr( $wpgpyg_video_title_line_height ) . 'px',
		'letter-space' => esc_attr( $wpgpyg_video_title_letter_spacing ) . 'px',
	);
	$wpgpyg_css[ '#wpgp--youtube-gallery-' . $post_id . ' .swiper-slide.wpgp-player-active .wpgpyg-vid-title' ] = array(
		'color' => esc_attr( $wpgpyg_color_title['active'] ),
	);
	$wpgpyg_css[ '#wpgp--youtube-gallery-' . $post_id . ' .swiper-slide:hover .wpgpyg-vid-title' ]              = array(
		'color' => esc_attr( $wpgpyg_color_title['hover'] ),
	);

	$wpgpyg_css[ '#wpgp--youtube-gallery-' . $post_id . ' .wpgpyg-vid-desc' ]                                  = array(
		'color'        => esc_attr( $wpgpyg_color_desc['color'] ),
		'font-size'    => esc_attr( $wpgpyg_desc_font_size ) . 'px',
		'line-height'  => esc_attr( $wpgpyg_desc_line_height ) . 'px',
		'letter-space' => esc_attr( $wpgpyg_desc_letter_spacing ) . 'px',
	);
	$wpgpyg_css[ '#wpgp--youtube-gallery-' . $post_id . ' .swiper-slide.wpgp-player-active .wpgpyg-vid-desc' ] = array(
		'color' => esc_attr( $wpgpyg_color_desc['active'] ),
	);
	$wpgpyg_css[ '#wpgp--youtube-gallery-' . $post_id . ' .swiper-slide:hover .wpgpyg-vid-desc' ]              = array(
		'color' => esc_attr( $wpgpyg_color_desc['hover'] ),
	);
}

/**
 * Dynamic Styles.
 * Working only on Button Layout
 */
if ( 'button' === $wpgpyt_display_mode ) {

	$wpgpyg_css[ '#wpgpyt-single-button-' . $post_id ] = array(
		'display'    => 'block',
		'text-align' => $wpgpyt_single_btn_position,
	);

	$wpgpyg_css[ '#wpgpyt-single-button-' . $post_id . ' .wpgpyt-btn' ] = array(
		'flex-direction'   => $wpgpyt_btn_icon_position_render,
		'padding-left'     => $wpgpyt_single_btn_spacing['left'] . $wpgpyt_single_btn_spacing['unit'],
		'padding-top'      => $wpgpyt_single_btn_spacing['top'] . $wpgpyt_single_btn_spacing['unit'],
		'padding-right'    => $wpgpyt_single_btn_spacing['right'] . $wpgpyt_single_btn_spacing['unit'],
		'padding-bottom'   => $wpgpyt_single_btn_spacing['bottom'] . $wpgpyt_single_btn_spacing['unit'],
		'color'            => $wpgpyg_color_button_text['color'],
		'background-color' => $wpgpyg_color_button_bg['background'],
		'border-color'     => $wpgpyg_color_button_border['color'],
		'border-left'      => $wpgpyt_single_btn_border['left'],
		'border-top'       => $wpgpyt_single_btn_border['top'],
		'border-right'     => $wpgpyt_single_btn_border['right'],
		'border-bottom'    => $wpgpyt_single_btn_border['bottom'],
		'border-style'     => $wpgpyt_single_btn_border['style'],
	);

	$wpgpyg_css[ '#wpgpyt-single-button-' . $post_id . ' .wpgpyt-btn:hover' ] = array(
		'color'            => $wpgpyg_color_button_text['hover'],
		'background-color' => $wpgpyg_color_button_bg['hover'],
		'border-color'     => $wpgpyg_color_button_border['hover'],
	);

	$wpgpyg_css[ '#wpgpyt-single-button-' . $post_id . ' .wpgpyt-btn svg' ] = array(
		'width'  => $wpgpyt_btn_icon_size['width'] . $wpgpyt_btn_icon_size['unit'],
		'height' => $wpgpyt_btn_icon_size['height'] . $wpgpyt_btn_icon_size['unit'],
		'fill'   => $wpgpyg_color_button_icon['color'],
	);

	$wpgpyg_css[ '#wpgpyt-single-button-' . $post_id . ' .wpgpyt-btn:hover svg' ] = array(
		'fill' => $wpgpyg_color_button_icon['hover'],
	);

	if ( 'full' === $wpgpyt_btn_width ) {

		$wpgpyg_css[ '#wpgpyt-single-button-' . $post_id . ' .wpgpyt-btn' ] += array(
			'display' => 'flex',
			'width'   => '100%',
		);
	}

	if ( $wpgpyt_single_btn_animation ) {

		$wpgpyg_css[ '#wpgpyt-single-button-' . $post_id . ' .wpgpyt-btn' ] += array(
			'transform' => 'scale(1)',
			'animation' => 'pulse 2s infinite',
		);
	}
}

$wpgpyg_css['#wpgpyt--ytsubscribe'] = array(
	'text-align' => $wpgpyt_subscribe_position,
);

/***********************
 * CSS Rendering Engine.
 */
$wpgpyg_output_css = '';

foreach ( $wpgpyg_css as $style => $style_array ) {

	$wpgpyg_output_css .= $style . '{';

	foreach ( $style_array as $property => $value ) {

		$wpgpyg_output_css .= $property . ':' . $value . ';';
	}
	$wpgpyg_output_css .= '}';
}

echo '<style>';

// Computed style.
echo esc_html( $wpgpyg_output_css );

// Other CSS.
echo esc_html( $wpgpyt_dynamic_css . $wpgpyt_grid_responsive_width );

echo '</style>';
