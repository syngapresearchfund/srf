<?php
/**
 * Search form template.
 *
 * @since 2019-05-19 First docBlock
 * @package SRF
 */

namespace SRF;

?>

<form class="search-form" method="get" action="<?php echo esc_url( 'https://wordpress.com/go/' ); ?>">
	<input type="text" class="wpcom-h4-go-search-field" name="s1" placeholder="<?php esc_attr_e( 'Search tips' ); ?>" value="<?php the_search_query(); ?>">
	<input type="submit" value="Search" aria-hidden="true">
</form>

