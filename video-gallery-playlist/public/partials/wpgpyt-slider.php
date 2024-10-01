<?php
if ( $wpgpyg_get_videos->items ) :

	wp_enqueue_style( $this->plugin_name . 'swiper' );
	wp_enqueue_script( $this->plugin_name . 'swiper' );
	?>

<style>
.wpgp--youtube-gallery {
	max-width: 900px;
	margin: 0 auto;
}
.swiper-slide {
	background-position: center;
	background-size: contain;
	background-repeat: no-repeat;
	cursor: pointer;
	height: auto !important;
	background: aliceblue;
}
.wpgpyt-single-slide-wrap {
	box-shadow: rgba(0, 0, 0, 0.02) 0px 1px 3px 0px, rgba(27, 31, 35, 0.15) 0px 0px 0px 1px;
	margin: 1px;
	height: calc(100% - 2px);
}
.wpgpyg--wrapper {
	background: rgba(0,0,0,0.55);
	width: 50px;
	height: 24px;
	border-radius: 5px;
	padding-top: 10px;
	margin-top: -10px;
	position: absolute;
	top: 50%;
	left: 50%;
	-webkit-transform: translate(-50%);
	-ms-transform: translate(-50%);
	transform: translate(-50%);
}
.swiper-slide:hover .wpgpyg--wrapper {
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
.swiper-pagination {
	position: relative !important;
}
.swiper-pagination .swiper-pagination-bullet{
	margin: 0 3px;
}
.wpgp--video-container {
	overflow: hidden;
	position: relative;
	padding-bottom: 15px;
	margin: 0 auto;
	margin-bottom: 10px;
}
.wpgp--video-container::after {
	padding-top: 56.25%;
	display: block;
	content: '';
}
.wpgp--video-container iframe {
	position: absolute;
	top: 0;
	left: 0;
	width: 100%;
	height: 100%;
}
.swiper-slide img {
	width: 100%;
	height: auto;
	display: block;
}
.wpgpyt-slider-thumb {
	position: relative;
}
.swiper-slide .wpgpyg-vid-title {
	margin: 0;
	font-size: 17px;
	line-height: 20px;
	font-weight: bold;
}
.swiper-slide .wpgpyg-vid-desc {
	margin: 0;
	padding-top: 10px;
}
.wpgpyt-slider-inner-content {
	padding: 10px;
}

/* Pagination Navigation */
.swiper-button-prev, .swiper-button-next {color: #f44336;}
.swiper-container:hover .swiper-button-prev,
.swiper-container:hover .swiper-button-next {
	height: 100%;
	top: 0;
	background: rgb(0 0 0 / 30%);
	margin-top: 0;
	right: 0;
	width: 44px;
}
.swiper-container:hover .swiper-button-prev {
	left: 0;
}
.swiper-pagination-bullet-active {
	background: #f44336;
}
</style>
<!-- Swiper -->
<div id="wpgp--youtube-gallery-<?php echo esc_attr( $post_id ); ?>" class="wpgp--youtube-gallery">
	<div class="wpgp--video-container">
		<iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo esc_html( $wpgpyg_first_video_id ); ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
	</div>
	<div class="swiper-container">
		<div class="swiper-wrapper">
		<?php
		foreach ( $wpgpyg_get_videos->items as $wpgpyg_video ) :
			if ( 'playlist' === $wpgpyt_video_from ) {

				// Playlist.
				$wpgpyg_video_id = $wpgpyg_video->snippet->resourceId->videoId;
			} else {

				// Channel.
				$wpgpyg_video_id = $wpgpyg_video->id->videoId;
			}
			?>
			<div class="swiper-slide" data-video-id="<?php echo esc_html( $wpgpyg_video_id ); ?>">
				<div class="wpgpyt-single-slide-wrap">
					<div class="wpgpyt-slider-thumb">
						<img src="<?php echo esc_url( $wpgpyg_video->snippet->thumbnails->high->url ); ?>" alt="<?php echo esc_attr( $wpgpyg_video->snippet->title ); ?>" />
						<div class="wpgpyg--wrapper">
							<div class="wpgpyg--tri"></div>
						</div>
					</div>
					<div class="wpgpyt-slider-inner-content">
						<?php
						if ( $wpgpyg_video_title_show ) {

							echo '<h3 class="wpgpyg-vid-title">' . esc_html( $wpgpyg_video->snippet->title ) . '</h3>';
						}

						if ( $wpgpyg_video_desc_shows ) {

							echo '<p class="wpgpyg-vid-desc">' . esc_textarea( wp_trim_words( $wpgpyg_video->snippet->description, $wpgpyg_video_desc_length, '...' ) ) . '</p>';
						}
						?>
					</div>
				</div>
			</div>
			<?php endforeach; ?>
		</div>

		<!-- Add Arrows -->
		<div class="swiper-button-next"></div>
		<div class="swiper-button-prev"></div>
	</div>
	<!-- Add Pagination -->
	<div class="swiper-pagination"></div>
</div>

<!-- Initialize Swiper -->
<script>
	(function( $ ) {
	'use strict';

		$( document ).ready(function() {

			$("div.wpgp--youtube-gallery").each(function () {
				var _theGallery = $(this).attr("id");

				$(".swiper-wrapper .swiper-slide:first-child").addClass("wpgp-player-active");
				$("#" + _theGallery + " .swiper-slide").click(function () {

					/**
					 * On click, add class on active video.
					 * Which is load on the player.
					 */
					$(this).removeClass("wpgp-player-active").addClass("wpgp-player-active").siblings().removeClass("wpgp-player-active");

					/**
					 * Add video link into Iframe.
					 */
					var _videoID = $(this).data("video-id");
					$("#" + _theGallery + " iframe").attr("src", "https://www.youtube.com/embed/" + _videoID).fadeOut("fast").fadeIn("slow");
				});

			});

			// Slide per view.
			var wpgpygSpvMobile  = '<?php echo esc_html( $wpgpyg_slide_per_view_mobile ); ?>';
			var wpgpygSpvTablet  = '<?php echo esc_html( $wpgpyg_slide_per_view_tablet ); ?>';
			var wpgpygSpvDesktop = '<?php echo esc_html( $wpgpyg_slide_per_view_desktop ); ?>';

			var swiper = new Swiper('.swiper-container', {
				slidesPerView: 3,
				spaceBetween: 10,
				pagination: {
					el        : '.swiper-pagination',
					clickable : true,
					type      : 'bullets', // 'fraction' | 'progressbar' | 'custom'
				},
				navigation: {
					nextEl: '.swiper-button-next',
					prevEl: '.swiper-button-prev',
				},
				// Responsive breakpoints
				breakpoints: {
					// when window width is >= 320px
					320: {
					slidesPerView: wpgpygSpvMobile,
					spaceBetween: 0
					},
					// when window width is >= 480px
					480: {
					slidesPerView: wpgpygSpvTablet,
					spaceBetween: 20
					},
					// when window width is >= 640px
					640: {
					slidesPerView: wpgpygSpvDesktop,
					spaceBetween: 10
					}
				}
			});

		});

	})( jQuery );
</script>
		<?php
	else :
		echo '<p style="display:block;text-align:center;color:red;">No video found!</p>';
endif;
