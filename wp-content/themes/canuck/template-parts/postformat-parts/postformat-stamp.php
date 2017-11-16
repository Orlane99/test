<?php
/**
 * Canuck Post Format Standard
 *
 * @package     Canuck WordPress Theme
 * @copyright   Copyright (C) 2017  Kevin Archibald
 * @license     http://www.gnu.org/licenses/gpl-2.0.html
 * @author      Kevin Archibald <www.kevinsspace.ca/contact/>
 */

?>
<div class="post-wrap-stamp">
	<div class="stamp-feature">
		<?php
		if ( ! post_password_required() ) {
			if ( has_post_format( 'audio' ) ) {
				get_template_part( '/template-parts/postformat-parts/postformat', 'audio-feature' );
			} elseif ( has_post_format( 'gallery' ) ) {
				get_template_part( '/template-parts/postformat-parts/postformat', 'gallery-feature' );
			} elseif ( has_post_format( 'image' ) ) {
				get_template_part( '/template-parts/postformat-parts/postformat', 'image-feature' );
			} elseif ( has_post_format( 'quote' ) ) {
				get_template_part( '/template-parts/postformat-parts/postformat', 'quote-feature' );
			} elseif ( has_post_format( 'video' ) ) {
				get_template_part( '/template-parts/postformat-parts/postformat', 'video-feature' );
			} else {
				get_template_part( '/template-parts/postformat-parts/postformat', 'standard-feature' );
			}
		} else {
			$background_image_url = get_template_directory_uri() . '/images/password800.jpg';
			echo '<img src="' . esc_url( $background_image_url ) . '" alt="' . esc_attr__( 'password reqired', 'canuck' ) . '">';
		}
		?>
	</div>
	<div class="post-overlay-stamp">
		<div class="post-overlay-stamp-wrap">
			<h2 class="stamp-title">
				<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
			</h2>
			<div class="stamp-meta">
				<?php
				canuck_post_meta_timestamp();
				canuck_comments_link();
				canuck_post_meta_no_title();
				?>
			</div>
		</div>
	</div>
</div>

