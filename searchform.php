<?php
/**
 * Search form template.
 *
 * @since 2019-05-19 First docBlock
 * @package SRF
 */

namespace SRF;

?>

<form id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>" method="GET" class="flex justify-center">
	<input type="text" name="s" placeholder="<?php esc_attr_e( 'Search tips' ); ?>" value="<?php the_search_query(); ?>" class="p-3 rounded-l outline-none border-2 border-r-0 border-srf-purple-700 focus:border-srf-purple-800 placeholder-srf-purple-400 text-purple-900">
	<button class="p-3 bg-srf-purple-700 hover:bg-srf-purple-800 text-white rounded-r">Submit</button>
</form>
