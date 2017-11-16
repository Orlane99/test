<?php
/**
 * Search Form WordPress file.
 *
 * This file is the search form used in the theme.
 *
 * @package     Canuck WordPress Theme
 * @copyright   Copyright (C) 2017  Kevin Archibald
 * @license     http://www.gnu.org/licenses/gpl-2.0.html
 * @author      Kevin Archibald <www.kevinsspace.ca/contact/>
 */

?>
<form method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>/">
	<div id="searchform">
		<input type="text" value="<?php the_search_query(); ?>" name="s" class="keyword" title="<?php echo esc_html__( 'search', 'canuck' ); ?>" />
		<button type="submit" class="fa fa-search" title="search"></button>
	</div>
</form>

