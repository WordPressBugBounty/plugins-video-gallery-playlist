<?php
// Get Meta Data.
$wpgpyt_single_btn_txt       = wpgpyg_get_post_meta( $post_id, 'wpgpyt_single_btn_txt' );
$wpgpyt_single_btn_icon      = wpgpyg_get_post_meta( $post_id, 'wpgpyt_single_btn_icon' );
$wpgpyt_btn_icon_size        = wpgpyg_get_post_meta( $post_id, 'wpgpyt_btn_icon_size' );
$wpgpyt_btn_icon_position    = wpgpyg_get_post_meta( $post_id, 'wpgpyt_btn_icon_position' );
$wpgpyt_btn_width            = wpgpyg_get_post_meta( $post_id, 'wpgpyt_btn_width' );
$wpgpyt_btn_width_max        = wpgpyg_get_post_meta( $post_id, 'wpgpyt_btn_width_max' );
$wpgpyt_single_btn_spacing   = wpgpyg_get_post_meta( $post_id, 'wpgpyt_single_btn_spacing' );
$wpgpyt_single_btn_border    = wpgpyg_get_post_meta( $post_id, 'wpgpyt_single_btn_border' );
$wpgpyt_single_btn_position  = wpgpyg_get_post_meta( $post_id, 'wpgpyt_single_btn_position' );
$wpgpyt_single_btn_animation = wpgpyg_get_post_meta( $post_id, 'wpgpyt_single_btn_animation' );

// Colors.
$wpgpyg_color_button_text   = wpgpyg_get_post_meta( $post_id, 'wpgpyg_color_button_text' );
$wpgpyg_color_button_bg     = wpgpyg_get_post_meta( $post_id, 'wpgpyg_color_button_bg' );
$wpgpyg_color_button_icon   = wpgpyg_get_post_meta( $post_id, 'wpgpyg_color_button_icon' );
$wpgpyg_color_button_border = wpgpyg_get_post_meta( $post_id, 'wpgpyg_color_button_border' );

/**
 * Button Icon Position.
 */
$wpgpyt_btn_icon_position_render = '';
switch ( $wpgpyt_btn_icon_position ) {
	case 'left':
		$wpgpyt_btn_icon_position_render = 'row';
		break;

	case 'center':
		$wpgpyt_btn_icon_position_render = 'column';
		break;

	case 'right':
		$wpgpyt_btn_icon_position_render = 'row-reverse';
		break;

	default:
		$wpgpyt_btn_icon_position_render = 'row';
		break;
}
// Rendering Icon.
$wpgpyt_btn_svg_rendered = '';
switch ( $wpgpyt_single_btn_icon ) {

	case 'youtube':
		$wpgpyt_btn_svg_rendered = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path d="M549.655 124.083c-6.281-23.65-24.787-42.276-48.284-48.597C458.781 64 288 64 288 64S117.22 64 74.629 75.486c-23.497 6.322-42.003 24.947-48.284 48.597-11.412 42.867-11.412 132.305-11.412 132.305s0 89.438 11.412 132.305c6.281 23.65 24.787 41.5 48.284 47.821C117.22 448 288 448 288 448s170.78 0 213.371-11.486c23.497-6.321 42.003-24.171 48.284-47.821 11.412-42.867 11.412-132.305 11.412-132.305s0-89.438-11.412-132.305zm-317.51 213.508V175.185l142.739 81.205-142.739 81.201z"/></svg>';
		break;
	case 'play':
		$wpgpyt_btn_svg_rendered = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><path d="M361 215C375.3 223.8 384 239.3 384 256C384 272.7 375.3 288.2 361 296.1L73.03 472.1C58.21 482 39.66 482.4 24.52 473.9C9.377 465.4 0 449.4 0 432V80C0 62.64 9.377 46.63 24.52 38.13C39.66 29.64 58.21 29.99 73.03 39.04L361 215z"/></svg>';
		break;
	case 'circle-play-fill':
		$wpgpyt_btn_svg_rendered = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M512 256c0 141.4-114.6 256-256 256S0 397.4 0 256S114.6 0 256 0S512 114.6 512 256zM188.3 147.1c-7.6 4.2-12.3 12.3-12.3 20.9V344c0 8.7 4.7 16.7 12.3 20.9s16.8 4.1 24.3-.5l144-88c7.1-4.4 11.5-12.1 11.5-20.5s-4.4-16.1-11.5-20.5l-144-88c-7.4-4.5-16.7-4.7-24.3-.5z"/></svg>';
		break;
	case 'circle-play-o':
		$wpgpyt_btn_svg_rendered = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M188.3 147.1C195.8 142.8 205.1 142.1 212.5 147.5L356.5 235.5C363.6 239.9 368 247.6 368 256C368 264.4 363.6 272.1 356.5 276.5L212.5 364.5C205.1 369 195.8 369.2 188.3 364.9C180.7 360.7 176 352.7 176 344V167.1C176 159.3 180.7 151.3 188.3 147.1V147.1zM512 256C512 397.4 397.4 512 256 512C114.6 512 0 397.4 0 256C0 114.6 114.6 0 256 0C397.4 0 512 114.6 512 256zM256 48C141.1 48 48 141.1 48 256C48 370.9 141.1 464 256 464C370.9 464 464 370.9 464 256C464 141.1 370.9 48 256 48z"/></svg>';
		break;
	case 'file-video-fill':
		$wpgpyt_btn_svg_rendered = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><path d="M64 0C28.7 0 0 28.7 0 64V448c0 35.3 28.7 64 64 64H320c35.3 0 64-28.7 64-64V160H256c-17.7 0-32-14.3-32-32V0H64zM256 0V128H384L256 0zM64 288c0-17.7 14.3-32 32-32h96c17.7 0 32 14.3 32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V288zM300.9 397.9L256 368V304l44.9-29.9c2-1.3 4.4-2.1 6.8-2.1c6.8 0 12.3 5.5 12.3 12.3V387.7c0 6.8-5.5 12.3-12.3 12.3c-2.4 0-4.8-.7-6.8-2.1z"/></svg>';
		break;
	case 'file-video-o':
		$wpgpyt_btn_svg_rendered = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><path d="M365.3 93.38l-74.63-74.64C278.6 6.742 262.3 0 245.4 0H64C28.65 0 0 28.65 0 64l.0065 384c0 35.34 28.65 64 64 64H320c35.2 0 64-28.8 64-64V138.6C384 121.7 377.3 105.4 365.3 93.38zM336 448c0 8.836-7.164 16-16 16H64.02c-8.838 0-16-7.164-16-16L48 64.13c0-8.836 7.164-16 16-16h160L224 128c0 17.67 14.33 32 32 32h79.1V448zM240 288c0-17.67-14.33-32-32-32h-96c-17.67 0-32 14.33-32 32v96c0 17.67 14.33 32 32 32h96c17.67 0 32-14.33 32-32v-16.52l43.84 30.2C292.3 403.5 304 397.6 304 387.4V284.6c0-10.16-11.64-16.16-20.16-10.32L240 304.5V288z"/></svg>';
		break;
	case 'film':
		$wpgpyt_btn_svg_rendered = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M0 96C0 60.7 28.7 32 64 32H448c35.3 0 64 28.7 64 64V416c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V96zM48 368v32c0 8.8 7.2 16 16 16H96c8.8 0 16-7.2 16-16V368c0-8.8-7.2-16-16-16H64c-8.8 0-16 7.2-16 16zm368-16c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V368c0-8.8-7.2-16-16-16H416zM48 240v32c0 8.8 7.2 16 16 16H96c8.8 0 16-7.2 16-16V240c0-8.8-7.2-16-16-16H64c-8.8 0-16 7.2-16 16zm368-16c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V240c0-8.8-7.2-16-16-16H416zM48 112v32c0 8.8 7.2 16 16 16H96c8.8 0 16-7.2 16-16V112c0-8.8-7.2-16-16-16H64c-8.8 0-16 7.2-16 16zM416 96c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V112c0-8.8-7.2-16-16-16H416zM160 128v64c0 17.7 14.3 32 32 32H320c17.7 0 32-14.3 32-32V128c0-17.7-14.3-32-32-32H192c-17.7 0-32 14.3-32 32zm32 160c-17.7 0-32 14.3-32 32v64c0 17.7 14.3 32 32 32H320c17.7 0 32-14.3 32-32V320c0-17.7-14.3-32-32-32H192z"/></svg>';
		break;
	case 'forward':
		$wpgpyt_btn_svg_rendered = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M52.5 440.6c-9.5 7.9-22.8 9.7-34.1 4.4S0 428.4 0 416V96C0 83.6 7.2 72.3 18.4 67s24.5-3.6 34.1 4.4L224 214.3V256v41.7L52.5 440.6zM256 352V256 128 96c0-12.4 7.2-23.7 18.4-29s24.5-3.6 34.1 4.4l192 160c7.3 6.1 11.5 15.1 11.5 24.6s-4.2 18.5-11.5 24.6l-192 160c-9.5 7.9-22.8 9.7-34.1 4.4s-18.4-16.6-18.4-29V352z"/></svg>';
		break;
	case 'video':
		$wpgpyt_btn_svg_rendered = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path d="M0 128C0 92.7 28.7 64 64 64H320c35.3 0 64 28.7 64 64V384c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V128zM559.1 99.8c10.4 5.6 16.9 16.4 16.9 28.2V384c0 11.8-6.5 22.6-16.9 28.2s-23 5-32.9-1.6l-96-64L416 337.1V320 192 174.9l14.2-9.5 96-64c9.8-6.5 22.4-7.2 32.9-1.6z"/></svg>';
		break;
	case 'volume-high':
		$wpgpyt_btn_svg_rendered = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><path d="M533.6 32.5C598.5 85.3 640 165.8 640 256s-41.5 170.8-106.4 223.5c-10.3 8.4-25.4 6.8-33.8-3.5s-6.8-25.4 3.5-33.8C557.5 398.2 592 331.2 592 256s-34.5-142.2-88.7-186.3c-10.3-8.4-11.8-23.5-3.5-33.8s23.5-11.8 33.8-3.5zM473.1 107c43.2 35.2 70.9 88.9 70.9 149s-27.7 113.8-70.9 149c-10.3 8.4-25.4 6.8-33.8-3.5s-6.8-25.4 3.5-33.8C475.3 341.3 496 301.1 496 256s-20.7-85.3-53.2-111.8c-10.3-8.4-11.8-23.5-3.5-33.8s23.5-11.8 33.8-3.5zm-60.5 74.5C434.1 199.1 448 225.9 448 256s-13.9 56.9-35.4 74.5c-10.3 8.4-25.4 6.8-33.8-3.5s-6.8-25.4 3.5-33.8C393.1 284.4 400 271 400 256s-6.9-28.4-17.7-37.3c-10.3-8.4-11.8-23.5-3.5-33.8s23.5-11.8 33.8-3.5zM301.1 34.8C312.6 40 320 51.4 320 64V448c0 12.6-7.4 24-18.9 29.2s-25 3.1-34.4-5.3L131.8 352H64c-35.3 0-64-28.7-64-64V224c0-35.3 28.7-64 64-64h67.8L266.7 40.1c9.4-8.4 22.9-10.4 34.4-5.3z"/></svg>';
		break;
	case 'vr-cardboard':
		$wpgpyt_btn_svg_rendered = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><path d="M576 64H64C28.7 64 0 92.7 0 128V384c0 35.3 28.7 64 64 64H184.4c24.2 0 46.4-13.7 57.2-35.4l32-64c8.8-17.5 26.7-28.6 46.3-28.6s37.5 11.1 46.3 28.6l32 64c10.8 21.7 33 35.4 57.2 35.4H576c35.3 0 64-28.7 64-64V128c0-35.3-28.7-64-64-64zM224 240c0 35.3-28.7 64-64 64s-64-28.7-64-64s28.7-64 64-64s64 28.7 64 64zm256 64c-35.3 0-64-28.7-64-64s28.7-64 64-64s64 28.7 64 64s-28.7 64-64 64z"/></svg>';
		break;

	default:
		$wpgpyt_btn_svg_rendered = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path d="M549.655 124.083c-6.281-23.65-24.787-42.276-48.284-48.597C458.781 64 288 64 288 64S117.22 64 74.629 75.486c-23.497 6.322-42.003 24.947-48.284 48.597-11.412 42.867-11.412 132.305-11.412 132.305s0 89.438 11.412 132.305c6.281 23.65 24.787 41.5 48.284 47.821C117.22 448 288 448 288 448s170.78 0 213.371-11.486c23.497-6.321 42.003-24.171 48.284-47.821 11.412-42.867 11.412-132.305 11.412-132.305s0-89.438-11.412-132.305zm-317.51 213.508V175.185l142.739 81.205-142.739 81.201z"/></svg>';
		break;
}

$wpgpyt_kses_allowed_svg = array(
	'svg'   => array(
		'class'           => true,
		'aria-hidden'     => true,
		'aria-labelledby' => true,
		'role'            => true,
		'xmlns'           => true,
		'width'           => true,
		'height'          => true,
		'viewbox'         => true, // <= Must be lower case!
	),
	'g'     => array( 'fill' => true ),
	'title' => array( 'title' => true ),
	'path'  => array(
		'd'    => true,
		'fill' => true,
	),
);

// Enqueueing.
wp_enqueue_style( $this->plugin_name . 'venobox' );
wp_enqueue_script( $this->plugin_name . 'venobox' );
?>
<style>
.vbox-content iframe {
	margin: 0 auto;
}
.wpgpyt-btn svg {
	width: 24px;
	height: 24px;
	fill: #fff;
}
.wpgpyt-btn {
	box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
	text-decoration: none;
	padding: 10px 20px;
	color: #fff;
	background-color: #dc3545;
	display: inline-flex;
	justify-content: center;
	align-items: center;
	gap: 10px;
	margin: 0 auto;
	font-size: 18px;
	line-height: 20px;
	transition: .3s;
	text-decoration: none !important;
}
.wpgpyt-btn:hover {
	box-shadow: 0 10px 20px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23);
}
<?php
if ( $wpgpyt_single_btn_animation ) {

	echo '@keyframes pulse {
		0% {
			transform: scale(0.95);
			box-shadow: 0 0 0 0 ' . esc_attr( $wpgpyg_color_button_bg['background'] ) . ';
		}
	
		70% {
			transform: scale(1);
			box-shadow: 0 0 0 10px transparent;
		}
	
		100% {
			transform: scale(0.95);
			box-shadow: 0 0 0 0 transparent;
		}
	}';
}
?>
</style>

<script>
jQuery(function($) {

	new VenoBox({
		selector        : '.venobox',
		maxWidth        : '100vh',
		overlayColor    : 'rgba(23, 23, 23, 0.95)',
		popup           : true,
		ratio           : '16x9', // '1x1' | '4x3' | '21x9' | 'full'
		share           : true,
		shareStyle      : 'bar', // 'block' | 'pill' | 'transparent'
		spinner         : 'bounce', // 'plane', 'chase', 'wave', 'pulse', 'flow', 'swing', 'circle', 'circle-fade', 'grid', 'fold, 'wander'
		spinColor       : '#d2d2d2',
		toolsBackground : '#1C1C1C',
		toolsColor      : '#d2d2d2'
	});
});
</script>

<div id="wpgpyt-single-button-<?php echo esc_attr( $post_id ); ?>">
	<a class="venobox wpgpyt-btn" data-autoplay="true" data-vbtype="video" href="<?php echo esc_url( $wpgpyt_single_id ) . '">' . wp_kses( $wpgpyt_btn_svg_rendered, $wpgpyt_kses_allowed_svg ) . esc_html( $wpgpyt_single_btn_txt ); ?></a>
</div>
