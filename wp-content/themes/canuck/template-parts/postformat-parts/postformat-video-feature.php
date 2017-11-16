<?php
/**
 * Template Part, blog add the embeded video as a feature
 *
 * @package     Canuck WordPress Theme
 * @copyright   Copyright (C) 2017  Kevin Archibald
 * @license     http://www.gnu.org/licenses/gpl-2.0.html
 * @author      Kevin Archibald <www.kevinsspace.ca/contact/>
 */

$embed = canuck_media_grabber();
$post_style = esc_html( get_theme_mod( 'canuck_blog_style', 'top_feature' ) );
if ( '' !== $embed ) {
	?>
	<div class="video-post-feature">
		<?php
		if ( 'top_feature' !== $post_style && 'side_feature' !== $post_style ) {
			$background_image_url = get_template_directory_uri() . '/images/video.jpg';
			?>
			<img src="<?php echo esc_url( $background_image_url ); ?>" alt="<?php esc_attr_e( 'video background', 'canuck' ); ?>">
			<div class="video-post-feature-overlay">
				<div class="video-post-feature">
					<?php
					echo $embed;// XSS OK. will not work if escaped.
					?>
				</div>
			</div>
			<?php
		} else {
			?>
			<div class="video-post-feature">
				<?php
				echo $embed;// XSS OK. will not work if escaped.
				?>
			</div>
			<?php
		}
		?>
	</div>
	<?php
} else {
	?>
	<div class="video-post-feature">
		<?php
		$background_image_url = get_template_directory_uri() . '/images/novideo.jpg';
		echo '<img src="' . esc_url( $background_image_url ) . '" alt="' . esc_attr__( 'video background', 'canuck' ) . '">';
		?>
	</div>
	<?php
}// End if().
