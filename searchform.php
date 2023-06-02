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
	<input type="text" name="s" placeholder="<?php esc_attr_e( 'Search...' ); ?>" value="<?php the_search_query(); ?>" class="p-2 rounded-l outline-none border border-r-0 border-srf-purple-700 focus:border-srf-purple-800 placeholder-gray-400 text-purple-900">
	<button class="p-3 bg-srf-purple-700 hover:bg-srf-purple-800 text-white rounded-r">
		<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
 			<path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
		</svg>
	</button>
</form>
