<?php
/**
 * Canuck Header template part - setup_2_primary_nav
 *
 * This template part is called by header-primary_nav.php and by header-secondary_nav.php
 *
 * @package     Canuck WordPress Theme
 * @copyright   Copyright (C) 2017  Kevin Archibald
 * @license     http://www.gnu.org/licenses/gpl-2.0.html
 * @author      Kevin Archibald <www.kevinsspace.ca/contact/>
 */

$contact_hours = esc_html( get_theme_mod( 'canuck_contact_hours', '' ) );
$contact_phone = esc_html( get_theme_mod( 'canuck_contact_phone', '' ) );
$contact_page = esc_url( get_theme_mod( 'canuck_contact_page', '' ) );
if ( has_nav_menu( 'canuck_social' ) || '' !== $contact_hours || '' !== $contact_phone || '' !== $contact_page ) {
	?>
	<div class="header-topstrip-wide">
		<div class="header-topstrip-wrap">
			<?php
			if ( '' !== $contact_hours || '' !== $contact_phone || '' !== $contact_page ) {
				?>
				<div class="header-topstrip-left">
					<?php
					if ( '' !== $contact_hours ) {
						?>
						<span class="contact-hours"><i class="fa fa-calendar"></i><?php echo esc_html( $contact_hours ); ?></span>
						<?php
					}
					if ( '' !== $contact_phone ) {
						?>
						<span class="contact-phone"><i class="fa fa-phone"></i><?php echo esc_html( $contact_phone ); ?></span>
						<?php
					}
					if ( '' !== $contact_page ) {
						?>
						<a class="contact-page" href="<?php echo esc_url( $contact_page ); ?>" title="<?php esc_attr_e( 'contact page', 'canuck' ); ?>"><i class="fa fa-envelope"></i></a>
						<?php
					}
					?>
				</div>
				<?php
			}
			if ( has_nav_menu( 'canuck_social' ) ) {
				?>
				<div class="header-topstrip-right">
					<?php canuck_social_menu( 'header' ); ?>
				</div>
				<?php
			}
			?>
		</div>
	</div>
	<?php
}

