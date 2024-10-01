<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://pluginic.com/
 * @since      1.0.0
 *
 * @package    WPGP_YouTube_Gallery
 * @subpackage WPGP_YouTube_Gallery/admin/partials
 */
// wp_enqueue_style( 'hfc-getting-started', esc_url( HFC_DIR_URL_FILE . 'header-footer-customizer/admin/css/hfc-main-page.css' ), array(), HEADER_FOOTER_CUSTOMIZER_VERSION );
?>
<style>
.menu-icon-hfc_blocks .wp-menu-name {
	color: #ffeb3b;
	font-weight: bold;
}

#wpbody-content > *:not(.hfc-option-body) {display: none;}
.hfc-option-body p {
	font-size: 16px;
	margin: 2px;
}
.hfc-option-body {
	position: relative;
	max-width: calc( 100% + 20px);
	display: block;
	margin-left: -20px;
}
.hfc-setting-header {
	padding: 30px 40px;
	margin-bottom: 20px;
	box-sizing: border-box;
	background-image: linear-gradient(240.75deg,#e9def0 -7.54%,#fcfdfd 55.54%,#dde8fc 101.81%);
	border-bottom: 1px solid #dedede;
}
.hfc-setting-header-info {
	display: flex;
	justify-content: center;
	align-items: center;
	gap: 30px;
}
.hfc-setting-header-info h1 {
	font-size: 37px;
	font-weight: bold;
}
#hfc-plugin-version {
	display: inline-block;
	font-size: 14px;
	padding: 2px 0;
	background: #FF0000;
	color: #fff;
	margin-left: 7px;
	border-radius: 50px;
	width: 54px;
	text-align: center;
}
.hfc-container-wrap {
	max-width: 1200px;
	margin: 0 auto;
}
.hfc-container-hero {
	display: flex;
	justify-content: center;
	gap: 25px;
}
.hfc-hero-video,
.hfc-hero-upgrade,
.hfc-testimonial,
.hfc-review {
	padding: 20px;
	background: #fff;
	box-shadow: rgba(0, 0, 0, 0.1) 0px 1px 2px 0px;
}
.hfc-hero-video {flex-basis: 70%;}
.hfc-container-ad {flex-basis: 30%;}
.hfc-hero-buttons a {
	display: inline-block;
	text-decoration: none;
	padding: 20px 10px;
	border-radius: 3px;
	background: #f44336;
	font-size: 17px;
	font-weight: bold;
	color: #fff;
	width: 100%;
	text-align: center;
	transition: .3s;
}
.hfc-hero-buttons a:hover {
	background: #2c3338;
}
.hfc-hero-buttons {
	display: flex;
	justify-content: space-evenly;
	gap: 20px;
	margin-top: 10px;
}
.hfc-hero-upgrade h2 span:before {
	color: #FF007A;
	font-size: 58px;
	line-height: 20px;
}
.hfc-hero-upgrade h2 span {
	padding-right: 44px;
}
.hfc-hero-upgrade h2 {
	font-size: 42px;
	font-weight: bold;
}
.hfc-container-ad img {
	width: 100%;
	height: auto;
	transition: .3s;
}
@media (min-width: 960px) {
	.hfc-container-ad:hover img {
		transform: translateY(-45px) scale(1.2);
	}
	.hfc-container-ad {
		overflow: hidden;
	}
}

/* Feature list */
.hfc-hero-upgrade li {
	color: #000;
	background: rgb(231 231 231 / 50%);
	padding: 6px 28px 10px;
	font-size: 19px;
	line-height: 26px;
	position: relative;
	margin-bottom: 13px;
	text-shadow: 0 1px 0 rgb(1 108 82 / 50%);
}
.hfc-hero-upgrade li:before {
	position: absolute;
	left: -7px;
	top: 8px;
	width: 30px;
	height: 30px;
	content: "";
	background-repeat: no-repeat;
	background-size: cover;
	background-image: url("data:image/svg+xml,%3Csvg fill='darkgreen' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' version='1.1' viewBox='0 0 700 700'%3E%3Cg%3E%3Cpath d='m283.89 373.55s0-108.52-104.79-134.72l78.59-48.66 67.367 82.336s157.18-145.95 209.57-149.7c0 0 48.652 11.234 67.355 52.398 0.011719 0-187.1 52.395-318.1 198.34z'/%3E%3Cpath d='m457.26 126.97v-26.602h-359.27v359.27h359.27l-0.003906-186.99c-19.504 11.43-39.699 24.652-59.871 39.387v87.707h-239.52v-239.51h239.52v10.434c19.672-15.57 40.195-30.836 59.867-43.699z'/%3E%3Cuse x='70' y='644' xlink:href='%23w'/%3E%3Cuse x='90.550781' y='644' xlink:href='%23d'/%3E%3Cuse x='104.359375' y='644' xlink:href='%23b'/%3E%3Cuse x='123.347656' y='644' xlink:href='%23a'/%3E%3Cuse x='142.242188' y='644' xlink:href='%23c'/%3E%3Cuse x='155.628906' y='644' xlink:href='%23b'/%3E%3Cuse x='174.617188' y='644' xlink:href='%23o'/%3E%3Cuse x='204.410156' y='644' xlink:href='%23n'/%3E%3Cuse x='224.453125' y='644' xlink:href='%23m'/%3E%3Cuse x='252.453125' y='644' xlink:href='%23l'/%3E%3Cuse x='272.726562' y='644' xlink:href='%23a'/%3E%3Cuse x='291.621094' y='644' xlink:href='%23k'/%3E%3Cuse x='320.796875' y='644' xlink:href='%23f'/%3E%3Cuse x='330.394531' y='644' xlink:href='%23j'/%3E%3Cuse x='350.328125' y='644' xlink:href='%23f'/%3E%3Cuse x='369.671875' y='644' xlink:href='%23v'/%3E%3Cuse x='391.34375' y='644' xlink:href='%23i'/%3E%3Cuse x='411.277344' y='644' xlink:href='%23h'/%3E%3Cuse x='420.875' y='644' xlink:href='%23g'/%3E%3Cuse x='440.808594' y='644' xlink:href='%23u'/%3E%3Cuse x='466.675781' y='644' xlink:href='%23a'/%3E%3Cuse x='485.570312' y='644' xlink:href='%23h'/%3E%3Cuse x='495.167969' y='644' xlink:href='%23f'/%3E%3Cuse x='504.765625' y='644' xlink:href='%23a'/%3E%3Cuse x='70' y='672' xlink:href='%23t'/%3E%3Cuse x='82.183594' y='672' xlink:href='%23d'/%3E%3Cuse x='95.992188' y='672' xlink:href='%23e'/%3E%3Cuse x='115.226562' y='672' xlink:href='%23k'/%3E%3Cuse x='154.152344' y='672' xlink:href='%23c'/%3E%3Cuse x='167.535156' y='672' xlink:href='%23i'/%3E%3Cuse x='187.46875' y='672' xlink:href='%23b'/%3E%3Cuse x='216.207031' y='672' xlink:href='%23s'/%3E%3Cuse x='239.640625' y='672' xlink:href='%23e'/%3E%3Cuse x='258.878906' y='672' xlink:href='%23g'/%3E%3Cuse x='278.8125' y='672' xlink:href='%23j'/%3E%3Cuse x='308.492188' y='672' xlink:href='%23r'/%3E%3Cuse x='329.015625' y='672' xlink:href='%23d'/%3E%3Cuse x='342.820312' y='672' xlink:href='%23e'/%3E%3Cuse x='362.058594' y='672' xlink:href='%23q'/%3E%3Cuse x='371.65625' y='672' xlink:href='%23b'/%3E%3Cuse x='390.648438' y='672' xlink:href='%23p'/%3E%3Cuse x='407.242188' y='672' xlink:href='%23c'/%3E%3C/g%3E%3C/svg%3E");
}
.hfc-hero-upgrade {
	position: relative;
	background: rgb(245 255 246 / 50%);
	border: 20px solid #fff;
}
a.hfc-hero-btn-pro {
	display: inline-block;
	margin-top: 5px;
	text-decoration: none;
	background: #e91e63;
	padding: 16px 24px 18px;
	border-radius: 4px;
	color: #fff;
	font-size: 19px;
	font-weight: bold;
	box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
	text-shadow: 1px 1px 8px rgb(0 0 0 / 50%);
	border: 1px solid transparent;
	transition: .3s;
}
a.hfc-hero-btn-pro:hover {
	box-shadow: rgb(0 0 0 / 44%) 0px 3px 8px;
}
a.hfc-hero-btn-pro span {
	transition: .3s;
}
a.hfc-hero-btn-pro:hover span {
	display: inline-block;
	transform: translateX(6px);
}

.hfc-upgrade-feature-list {
	display: flex;
	gap: 30px;
}
.hfc-upgrade-feature-list ul {
	flex-basis: 100%;
	padding-left: 10px;
}

/* Testimonials */
.hfc-testimonial-stars:before {
	position: absolute;
	left: 22px;
	top: 30px;
	width: 91px;
	height: 17px;
	content: "";
	background-image: url("https://wpqode.com/wp-content/uploads/star-icon.svg");
	background-repeat-x: repeat;
	background-repeat-y: no-repeat;
}
.hfc-testimonial-column {
	position: relative;
	flex-basis: calc(50% - 62px);
	border: 1px solid rgb(103 58 183 / 15%);
	background: rgb(103 58 183 / 5%);
	padding: 25px;
	padding-top: 50px;
}
.hfc-testimonial-columns {
	display: flex;
	flex-wrap: wrap;
	gap: 20px;
}

.hfc-testimonial-client {
	display: flex;
	justify-content: left;
	align-items: center;
	gap: 15px;
}

.hfc-testimonial-client-ghost p {
}

.hfc-testimonial-client-ghost h4 {
	font-size: 17px;
	font-weight: bold;
	line-height: 20px;
	margin: 0;
}

.hfc-testimonial-client img {
	border-radius: 10px;border: 1px solid rgb(158 158 158 / 50%);
	box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;
}

/* Responsive */
@media (max-width: 960px) {
	.hfc-container-hero,
	.hfc-upgrade-feature-list {flex-wrap: wrap;}
	.hfc-hero-video {flex-basis: 100%;}
	.hfc-container-ad {flex-basis: 100%;}
}

/* Remove Footer */
#wpfooter {
	display: none !important;
}
</style>
<div class="hfc-option-body">
	<div class="hfc-setting-header">
		<div class="hfc-setting-header-info">
			<img src="<?php echo esc_url( WPGP_YOUTUBE_GALLERY_DIR_URL_FILE . 'admin/img/icon-128x128.png' ); ?>" alt="WP YouTube Gallery">
			<div class="hfc-plugin-about">
				<h1>WP YouTube Gallery<sup id="hfc-plugin-version"><?php echo esc_html( WPGP_YOUTUBE_GALLERY_VERSION ); ?></sup></h1>
				<p>Thank you for installing.</p>
				<p>Most Powerful &amp; Advanced Plugin!</p>
			</div>
		</div>
	</div>

	<div class="hfc-container-wrap">
		<div class="hfc-container-overview">
			<div class="hfc-container-hero">
				<div class="hfc-hero-video">
					<iframe width="100%" height="400" src="https://www.youtube.com/embed/N6GopKZiuGw" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
					<div class="hfc-hero-buttons">
						<a href="<?php echo esc_url( get_admin_url() . 'post-new.php?post_type=wpgp_youtube_gallery' ); ?>" target="_blank">Add New Gallery</a>
						<a href="https://pluginic.com/docs/video-gallery-playlist-overview/?ref=100" target="_blank">Documentation</a>
						<a href="https://demo.pluginic.com/video-gallery-playlist/?ref=100" target="_blank">Live Demo</a>
					</div>
				</div>
				<div class="hfc-container-ad">
					<a href="https://pluginic.com/plugins/video-gallery-playlist/?ref=100" target="_blank">
						<picture>
							<source media="(max-width:960px)" srcset="<?php echo esc_url( WPGP_YOUTUBE_GALLERY_DIR_URL_FILE . 'admin/img/banner-960x340.jpg' ); ?>">
							<img src="<?php echo esc_url( WPGP_YOUTUBE_GALLERY_DIR_URL_FILE . 'admin/img/banner-340x520.jpg' ); ?>">
						</picture>
					</a>
				</div>
			</div>
		</div>
		<div class="hfc-spacer" style="height: 20px;"></div>
		<div class="hfc-hero-upgrade">
			<h2><span class="dashicons dashicons-superhero-alt"></span>Pro Feature List :</h2>
			<div class="hfc-upgrade-feature-list">
				<ul>
					<li>Fully responsive, SEO-friendly & optimized.</li>
					<li>Advanced Shortcode Generator.</li>
					<li>Advanced Shortcode Generator.</li>
					<li>Slide Anything (e.g. Image, Post, Product, Content, Video, Text, HTML, Shortcodes, etc.)</li>
					<li>Display posts from multiple Categories, Tags, Formats, or Types. (e.g. Latest, Taxonomies, Specific, etc.).</li>
					<li>Multiple Functions on the same page.</li>
					<li>Multiple Functions on the same page.</li>
					<li>100+ Visual Customization options.</li>
					<li>Drag & Drop Function builder (image, content, video, etc.).</li>
					<li>Drag & Drop Function builder (image, content, video, etc.).</li>
					<li>Image Function with internal and external links.</li>
					<li>Image Function with caption and description.</li>
				</ul>
				<ul>
					<li>Image Content Position (Bottom, Top, Right, and Overlay).</li>
					<li>Show/hide image caption and description.</li>
					<li>Post Function with Title, image, excerpt, read more, category, date, author, tags, comments, etc.).</li>
					<li>Post excerpt, full content, and content with the limit.</li>
					<li>WooCommerce Product Function.</li>
					<li>Show/hide the standard product contents (product name, image, price, excerpt, read more, rating, add to cart, etc.).</li>
					<li>Supported YouTube, Vimeo, Dailymotion, mp4, WebM, and even self-hosted video.</li>
					<li>Add Custom Video Thumbnails (for self-hosted) and video icon.</li>
					<li>Function Mode (standard, center, ticker).</li>
					<li>8+ Different navigation positions.</li>
					<li>Typography & Styling options (840+ Google fonts).</li>
				</ul>
			</div>
			<a class="hfc-hero-btn-pro" href="#" target="_blank">Upgrade to Pro <span>→</span></a>
		</div>
		<div class="hfc-spacer" style="height: 20px;"></div>
		<div class="hfc-testimonial">
			<div class="hfc-testimonial-columns">
				<div class="hfc-testimonial-column">
					<span class="hfc-testimonial-stars"></span>
					<p style="font-size:18px;line-height:1.3;margin-bottom:15px">“The plugin is not the most stylish or feature-packed, but it’s powerful, flexible, and quite simple.</p>
					<div class="hfc-testimonial-client">
						<img width="50" height="50" src="<?php echo esc_url( WPGP_YOUTUBE_GALLERY_DIR_URL_FILE . 'admin/img/client-1.jpg' ); ?>" alt="" class="wp-image-3273">
						<div class="hfc-testimonial-client-ghost">
							<h4>Chelsea Head</h4>
							<p>Serial Entrepreneur</p>
						</div>
					</div>
				</div>
				<div class="hfc-testimonial-column">
					<span class="hfc-testimonial-stars"></span>
					<p style="font-size:18px;line-height:1.3;margin-bottom:15px">“Suitable for all types of websites, large or small. Easy to set up and lots of documentation to help you.</p>
					<div class="hfc-testimonial-client">
						<img width="50" height="50" src="<?php echo esc_url( WPGP_YOUTUBE_GALLERY_DIR_URL_FILE . 'admin/img/client-2.jpg' ); ?>" alt="" class="wp-image-3273">
						<div class="hfc-testimonial-client-ghost">
							<h4>Bert Mora</h4>
							<p>UI Developer</p>
						</div>
					</div>
				</div>
				<div class="hfc-testimonial-column">
					<span class="hfc-testimonial-stars"></span>
					<p style="font-size:18px;line-height:1.3;margin-bottom:15px">“There’s no doubt it is a great plugin. I am using the free plan and am extremely happy with the results.</p>
					<div class="hfc-testimonial-client">
						<img width="50" height="50" src="<?php echo esc_url( WPGP_YOUTUBE_GALLERY_DIR_URL_FILE . 'admin/img/client-3.jpg' ); ?>" alt="" class="wp-image-3273">
						<div class="hfc-testimonial-client-ghost">
							<h4>Carol Stokes</h4>
							<p>IT Specialist</p>
						</div>
					</div>
				</div>
				<div class="hfc-testimonial-column">
					<span class="hfc-testimonial-stars"></span>
					<p style="font-size:18px;line-height:1.3;margin-bottom:15px">“The plugin met all my expectations! It’s easy to use and everything works as it should. I recommend it!</p>
					<div class="hfc-testimonial-client">
						<img width="50" height="50" src="<?php echo esc_url( WPGP_YOUTUBE_GALLERY_DIR_URL_FILE . 'admin/img/client-4.jpg' ); ?>" alt="" class="wp-image-3273">
						<div class="hfc-testimonial-client-ghost">
							<h4>Roman Rybakov</h4>
							<p>Frontend Engineer</p>
						</div>
					</div>
				</div>
				<a href="https://wordpress.org/support/plugin/video-gallery-playlist/reviews/?filter=5" target="_blank" style="margin: 0 auto;">See reviews from free users →</a>
			</div>
		</div>
	</div>
</div>
<?php
