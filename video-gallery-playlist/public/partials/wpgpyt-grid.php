<?php

/**
 * Provide a public-facing view for the plugin
 *
 * This file is used to markup the public-facing aspects of the plugin.
 *
 * @link       https://pluginic.com/
 * @since      1.0.0
 *
 * @package    WPGP_YouTube_Gallery
 * @subpackage WPGP_YouTube_Gallery/public/partials
 */
if ( ! isset( $wpgpyg_get_videos->error ) && ! empty( $wpgpyg_get_videos->items ) ) :

	wp_enqueue_style( $this->plugin_name . 'venobox' );
	wp_enqueue_script( $this->plugin_name . 'venobox' );
	?>

<style>
article.wpgpyt--card {
	background: rgb(238 238 238 / 30%);
	box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;
}
.wpgpyt--card a {
	color: black;
	text-decoration: none;
}
.wpgpyt--card a:hover {
	box-shadow: 3px 3px 8px hsl(0, 0%, 80%);
}

.wpgpyt--card-content {
	padding: 10px;
}

.wpgpyt--cards .wpgpyt--card-content h2 {
	margin: 0;
	padding-bottom: 10px;
	font-size: 18px;
	line-height: 24px;
	font-weight: bold;
}
.wpgpyt--card-content p {
	font-size: 16px;
	margin: 0;
	line-height: 24px;
}

/* Flexbox stuff */
.wpgpyt--cards {
	max-width: 1200px;
	margin: 0 auto;
	display: grid;
	grid-template-columns: repeat(3, 1fr);
	gap: 20px;
}
.wpgpyt--thumbnail img {
	width: 100%;
	object-fit: cover;
	display: block;
}
.centered {
	margin: 0 auto;
	padding: 0 1em;
}

/* Youtube Play Button */
picture.wpgpyt--thumbnail {
	position: relative;
	display: block;
}
.wpgpyg--wrapper {
	background: rgba(0,0,0,0.55);
	width: 50px;
	height: 25px;
	border-radius: 5px;
	padding-top: 10px;
	margin-top: -10px;
	position: absolute;
	top: 50%;
	left: 50%;
	transform: translateX(-50%) translateY(-50%);
}
picture.wpgpyt--thumbnail:hover .wpgpyg--wrapper {
	background: #cd201f;
}
.wpgpyg--tri {
	width: 0;
	height: 0;
	border-style: solid;
	border-width: 7px 0 7px 14px;
	border-color: transparent transparent transparent #ffffff;
	margin: 0 auto;
}

/* Responsive */
@media (max-width: 767px) {
	.wpgpyt--cards {grid-template-columns: repeat(2, 1fr);}
}
@media (max-width: 599px) {
	.wpgpyt--cards {grid-template-columns: repeat(1, 1fr);}
}

/* Centering the venobox iframe */
.vbox-content iframe {
	margin: 0 auto;
}

/* Video Meta */
ul.wpgpyt--video-meta {
	margin: 0;
	list-style: none;
	display: flex;
	justify-content: space-between;
	align-items: center;
	padding: 5px 10px;
	background: #e8e8e8;
	font-size: 14px;
	line-height: 20px;
}
ul.wpgpyt--video-meta li svg {width: 14px;height: 14px;}
ul.wpgpyt--video-meta li {
	display: flex;
	justify-content: center;
	align-items: center;
	gap: 5px;
}
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

<section id="wpgpyg--grid-<?php echo esc_attr( $post_id ); ?>" class="wpgpyt--cards">

	<?php
	foreach ( $wpgpyg_get_videos->items as $wpgpyg_video ) :

		if ( 'playlist' === $wpgpyt_video_from ) {

			// Playlist.
			$wpgpyg_video_id = $wpgpyg_video->snippet->resourceId->videoId;
		} else {

			// Channel.
			$wpgpyg_video_id = $wpgpyg_video->id->videoId;
		}

		if ( 'playlist' === $wpgpyt_video_from && 'public' !== $wpgpyg_video->status->privacyStatus ) {

			return;
		}

		/**
		 * Get Statistics.
		 */
		$wpgpyg_api_url_for_statistics = $wpgpyg_base_url . 'videos?part=statistics&id=' . $wpgpyg_video_id . '&key=' . $wpgpyg_api_key;
		$wpgpyg_api_ufs_request        = wp_remote_get( $wpgpyg_api_url_for_statistics );
		$wpgpyg_response               = wp_remote_retrieve_body( $wpgpyg_api_ufs_request );
		$wpgpyg_api_ufs_get_videos     = json_decode( $wpgpyg_response );
		?>
	<article class="wpgpyt--card">

		<a class="venobox" data-autoplay="true" data-vbtype="video" href="https://www.youtube.com/watch?v=<?php echo esc_html( $wpgpyg_video_id ); ?>">
			<picture class="wpgpyt--thumbnail">
				<img src="<?php echo esc_url( $wpgpyg_video->snippet->thumbnails->high->url ); ?>" alt="<?php echo esc_attr( $wpgpyg_video->snippet->title ); ?>">
				<div class="wpgpyg--wrapper">
					<div class="wpgpyg--tri"></div>
				</div>
			</picture>
		</a>

		<?php if ( $wpgpyg_video_title_show || $wpgpyg_video_desc_shows ) : ?>
		<div class="wpgpyt--card-content">

			<?php if ( $wpgpyg_video_title_show ) : ?>
			<a class="venobox" data-autoplay="true" data-vbtype="video" href="https://www.youtube.com/watch?v=<?php echo esc_html( $wpgpyg_video_id ); ?>">
				<h2><?php echo esc_html( $wpgpyg_video->snippet->title ); ?></h2>
			</a>
			<?php endif; ?>

			<?php if ( $wpgpyg_video_desc_shows ) : ?>
			<p class="wpgpyt--desc"><?php echo esc_textarea( wp_trim_words( $wpgpyg_video->snippet->description, $wpgpyg_video_desc_length, '...' ) ); ?></p>
			<?php endif; ?>
		</div>
		<?php endif; ?>

	</article>
	<?php endforeach; ?>
</section>
	<?php

	else :

		$wpgpyg_get_error_code = $wpgpyg_get_videos->error->code;
		$wpgpyg_get_error_msg  = $wpgpyg_get_videos->error->message;
		echo '<div style="width: 100%;max-width: 1200px;color: #f44336;background: #fff;padding: 20px;display: flex;justify-content: center;align-items: center;">
			<ul style="border: 1px solid;padding: 20px;list-style: none;">
				<li>Video Not Found!!</li>
				<li><strong>Error Code</strong> : ' . wp_kses_post( $wpgpyg_get_error_code ) . ' </li>
				<li><strong>Message</strong> : ' . wp_kses_post( $wpgpyg_get_error_msg ) . '</li>
			</ul>
		</div>';

endif; // if ( ! isset( $wpgpyg_get_videos->error ) )
