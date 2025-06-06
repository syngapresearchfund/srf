<?php
/**
 * Template part for displaying global navigation
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @since 2021-09-02 First docBlock
 * @package SRF
 */

namespace SRF;

?>

<!-- Main top-level menu, show/hide based on mobile menu state. -->
<div class="relative bg-white px-6 lg:px-2 z-20 xl:shadow">
	<div class="container mx-auto">
		<div class="flex items-center xl:relative py-6">
			<div class="flex hover:opacity-80">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
					<span class="sr-only">SynGap Research Fund</span>
					<img class="w-auto h-9 sm:h-11 2xl:h-14"
						 src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/srf-logo.svg" alt="">
				</a>
			</div>
			<nav class="hidden xl:block ml-auto font-sans">
				<ul class="flex space-x-6">
					<?php
					srf_nav_item_dropdown(
						'About SYNGAP1',
						'openFirst',
						array(
							srf_subnav_item( 'What Is SYNGAP1?', home_url( '/what-is-syngap1/' ) ),
							srf_subnav_item( 'SYNGAP1 Census', home_url( '/how-many-people-have-syngap1-census/' ) ),
							srf_subnav_item( 'SYNGAP1 Treatment', home_url( '/syngap1-treatment/' ) ),
							srf_subnav_item( 'SYNGAP1 Pipeline', home_url( '/syngap1-related-disorder-therapeutic-pipeline/' ) ),
							srf_subnav_item( 'SYNGAP1 & Epilepsy', home_url( '/syngap1-epilepsy/' ) ),
							srf_subnav_item( 'Life Expectancy', home_url( '/blog/whats-the-life-expectancy-of-someone-with-syngap1/' ) ),
							srf_subnav_item( 'SYNGAP1 & Autism', home_url( '/blog/does-my-syngap1-child-have-autism/' ) ),
						)
					);
					srf_nav_item_dropdown(
						'About SRF',
						'openSecond',
						array(
							srf_subnav_item( 'Our Team', home_url( '/team/' ) ),
							srf_subnav_item( 'Mission & Values', home_url( '/mission-and-values/' ) ),
							srf_subnav_item( 'SRF Impact Report', home_url( '/syngap-research-fund-impact-on-the-road-to-cure-syngap1/' ) ),
							srf_subnav_item( 'Finances', home_url( '/finances/' ) ),
							srf_subnav_item( 'Documents', home_url( '/documents/' ) ),
							srf_subnav_item( 'Partners', home_url( '/partners/rare-disease/' ) ),
							srf_subnav_item( 'Donors', home_url( '/champions-of-hope/' ) ),
							srf_subnav_item( 'Sponsors', home_url( '/sponsors/' ) ),
							srf_subnav_item( 'Style Guide', home_url( '/style-guide/' ) ),
							srf_subnav_item( 'SRF UK', home_url( '/team/srf-uk/' ) ),
							srf_subnav_item( 'SRF EU', home_url( '/team/srf-eu/' ) ),
							srf_subnav_item( 'Fondo de Investigación Syngap', home_url( '/team/fondo-de-investigacion-syngap/' ) ),
							srf_subnav_item( 'Diversity, Equity, & Inclusion', home_url( '/team/dei/' ) ),
						)
					);
					srf_nav_item_dropdown(
						'Professionals',
						'openThird',
						array(
							srf_subnav_heading( 'Research' ),
							srf_subnav_item( 'Request NHS Data', home_url( '/request-nhs-data/' ) ),
							srf_subnav_heading( 'Grants' ),
							srf_subnav_item( 'Current Grants', home_url( '/resources/grants/' ) ),
							srf_subnav_item( 'How To Apply', home_url( '/syngap-research-fund-grant-program/' ) ),
							srf_subnav_item( 'Press Releases', home_url( '/press-releases/' ) ),
							srf_subnav_heading( 'Models' ),
							srf_subnav_item( 'iPS Cell Models', home_url( '/ips-cell-models/' ) ),
							srf_subnav_item( 'SYNGAP1 Mouse Models', 'https://drive.google.com/file/d/1IeW3B-SkO2ESprKHcNQ0snwpcp9uqM5e/view?usp=drive_link', false, true ),
							srf_subnav_heading( 'Advisory Boards' ),
							srf_subnav_item( 'Scientific Advisory Board', home_url( '/team/scientific-advisory-board/' ) ),
							srf_subnav_item( 'Clinical Advisory Board', home_url( '/team/clinical-advisory-board/' ) ),
						)
					);
					srf_nav_item_dropdown(
						'Families',
						'openFourth',
						array(
							srf_subnav_heading( 'Connections' ),
							srf_subnav_item( 'Connect With SRF', '/curesyngap1connect/' ),
							srf_subnav_item( 'Join SYNGAP1 Registries', home_url( '/join-the-citizen-registry/' ) ),
							srf_subnav_item( 'Studies', home_url( '/resources/studies/' ) ),
							srf_subnav_item( 'Clinical Trials', home_url( '/clinical-trials/' ) ),
							srf_subnav_item( 'Volunteer with SRF', home_url( '/volunteer-with-srf/' ) ),
							srf_subnav_item( 'Fundraising', home_url( '/srf-fundraising-resources/' ) ),
							srf_subnav_heading( 'Medical' ),
							srf_subnav_item( 'Resources for Undiagnosed', home_url( '/resources-for-undiagnosed/' ) ),
							srf_subnav_item( 'Doctors', home_url( '/doctors/' ) ),
							srf_subnav_item( 'ICD Codes', home_url( '/syngap1-icd-codes/' ) ),
							srf_subnav_heading( 'Support' ),
							srf_subnav_item( 'New Family Resources', home_url( '/syngap1-resources-for-newly-diagnosed-families/' ) ),
							srf_subnav_item( 'Adults with SYNGAP1', home_url( '/adults-with-syngap1-caregiver-resources/' ) ),
							srf_subnav_item( 'Siblings', home_url( '/sibling-support/' ) ),
							srf_subnav_item( 'Insurance', 'https://www.angelman.org/wp-content/uploads/2022/01/ASF-State-Insurance-Resource-Guide-Jan2022.pdf' ),
							srf_subnav_item( 'RARE Bears', home_url( '/rare-bears/' ) ),
							srf_subnav_item( 'Shop', home_url( '/shop/' ) ),
						)
					);
					srf_nav_item_dropdown(
						'News & Events',
						'openLast',
						array(
							srf_subnav_item( 'Events Calendar', home_url( '/calendar/' ) ),
							srf_subnav_item( 'SRF In The Press', home_url( '/srf-in-the-press/' ) ),
							srf_subnav_item( 'Newsletter', home_url( '/newsletter/' ) ),
							srf_subnav_heading( 'Stories' ),
							srf_subnav_item( 'Our Warriors', home_url( '/syngap-warriors/' ) ),
							srf_subnav_item( 'Movies', home_url( '/resources/movies/' ) ),
							srf_subnav_heading( 'Learn' ),
							srf_subnav_item( 'Webinars', home_url( '/resources/webinars/' ) ),
							srf_subnav_item( 'Podcasts', '/podcasts/' ),
							srf_subnav_item( 'Blog', home_url( '/blog/' ) ),
							srf_subnav_item( 'Recursos en Español', home_url( '/recursos-en-espanol/' ) ),
						)
					);
					?>
				</ul>
			</nav>
			<div class="-mr-2 -my-2 ml-auto xl:hidden">
				<button type="button"
						class="bg-white rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500"
						aria-expanded="false" @click="open = true">
					<span class="sr-only">Open menu</span>
					<!-- Heroicon name: outline/menu -->
					<svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
						 stroke="currentColor" aria-hidden="true">
						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
							  d="M4 6h16M4 12h16M4 18h16" />
					</svg>
				</button>
			</div>
			<!-- Desktop Header Buttons (Cart, Search, Donate) -->
			<div class="hidden xl:flex ml-6">
				<!-- Desktop shop cart. -->
				<div class="relative p-2 cursor-pointer" x-data="{ showCartCount: false }">
					<a class="cart-contents flex" href="<?php echo esc_url( wc_get_cart_url() ); ?>"
					   title="<?php esc_attr_e( 'View your shopping cart', 'srf' ); ?>"
					   @mouseover="showCartCount = true" @mouseleave="showCartCount = false">
						<?php /* translators: %d: number of items in cart */ ?>
						<svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
							<path fill="none" d="M0 0h24v24H0V0z" />
							<path fill="#4b5563"
								  d="M15.55 13c.75 0 1.41-.41 1.75-1.03l3.58-6.49c.37-.66-.11-1.48-.87-1.48H5.21l-.94-2H1v2h2l3.6 7.59-1.35 2.44C4.52 15.37 5.48 17 7 17h12v-2H7l1.1-2h7.45zM6.16 6h12.15l-2.76 5H8.53L6.16 6zM7 18c-1.1 0-1.99.9-1.99 2S5.9 22 7 22s2-.9 2-2-.9-2-2-2zm10 0c-1.1 0-1.99.9-1.99 2s.89 2 1.99 2 2-.9 2-2-.9-2-2-2z" />
						</svg>
						<span
							class="text-xs absolute w-16 -left-1 -bottom-2 transition-opacity duration-500 ease-in-out"
							:class="showCartCount ? 'opacity-100' : 'opacity-0'"
							x-cloak><?php echo wp_kses_data( sprintf( _n( '(%d item)', '(%d items)', WC()->cart->get_cart_contents_count(), 'srf' ), WC()->cart->get_cart_contents_count() ) ); ?></span>
					</a>
				</div>
				<!-- Desktop search form, show/hide input state. -->
				<div class="hidden xl:flex items-stretch"
					 x-data="{ searchOpen: false, searchClosed: true }" x-cloak>
					<form id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>" method="GET"
						  class="w-full absolute top-full right-0 z-20">
						<input type="text" name="s" placeholder="<?php esc_attr_e( 'Search...' ); ?>"
							   value="<?php the_search_query(); ?>"
							   class="w-full h-10 px-4 py-6 outline-none rounded border-2 border-gray-300 focus:border-gray-500 placeholder-gray-400 text-purple-900"
							   x-show="searchOpen"
							   x-transition
							   x-ref="input"
						>
					</form>
					<button class="inline-block p-2"
							@click="searchOpen = ! searchOpen; $nextTick( () => { $refs.input.focus(); } ); searchClosed = ! searchClosed"
							:class="searchOpen ? ' rounded bg-srf-purple-700 hover:bg-srf-purple-800 text-white' : ''">
						<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
							 stroke="currentColor" class="w-6 h-6" x-show="searchClosed">
							<path stroke-linecap="round" stroke-linejoin="round"
								  d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
						</svg>
						<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
							 stroke="currentColor" class="w-6 h-6" x-show="searchOpen">
							<path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
						</svg>
					</button>
					<a href="<?php echo esc_url( home_url( '/donate/' ) ); ?>"
					   class="hidden xl:flex items-center justify-center px-4 py-2 ml-2 whitespace-nowrap border border-transparent rounded-md shadow-sm text-base font-semibold font-sans text-white bg-srf-purple-500 hover:bg-srf-purple-700">
						Donate
					</a>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Mobile menu, show/hide based on mobile menu state. -->
<div class="absolute z-20 top-0 -inset-x-0 p-2 transition transform origin-top-right xl:hidden" x-show="open"
	 x-transition x-cloak>
	<div class="rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 bg-white divide-y-2 divide-gray-50">
		<div class="pt-5 pb-6 px-5">
			<div class="flex items-center justify-between">
				<div>
					<img class="w-auto h-9"
						 src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/srf-logo.svg"
						 alt="Workflow">
				</div>
				<div class="-mr-2">
					<button type="button"
							class="bg-white rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500"
							@click="open = false">
						<span class="sr-only">Close menu</span>
						<!-- Heroicon name: outline/x -->
						<svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
							 stroke="currentColor" aria-hidden="true">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
								  d="M6 18L18 6M6 6l12 12" />
						</svg>
					</button>
				</div>
			</div>
			<div class="mt-6">
				<nav class="grid gap-y-8 font-sans">
					<ul>
						<?php
						srf_mobile_nav_item(
							'About SYNGAP1',
							'1',
							array(
								srf_subnav_item( 'What Is SYNGAP1?', home_url( '/what-is-syngap1/' ) ),
								srf_subnav_item( 'SYNGAP1 Census', home_url( '/how-many-people-have-syngap1-census/' ) ),
								srf_subnav_item( 'SYNGAP1 Treatment', home_url( '/syngap1-treatment/' ) ),
								srf_subnav_item( 'SYNGAP1 Pipeline', home_url( '/syngap1-related-disorder-therapeutic-pipeline/' ) ),
								srf_subnav_item( 'SYNGAP1 & Epilepsy', home_url( '/syngap1-epilepsy/' ) ),
								srf_subnav_item( 'Life Expectancy', home_url( '/blog/whats-the-life-expectancy-of-someone-with-syngap1/' ) ),
								srf_subnav_item( 'SYNGAP1 & Autism', home_url( '/blog/does-my-syngap1-child-have-autism/' ) ),
							)
						);
						srf_mobile_nav_item(
							'About SRF',
							'2',
							array(
								srf_subnav_item( 'Our Team', home_url( '/team/' ) ),
								srf_subnav_item( 'Mission & Values', home_url( '/mission-and-values/' ) ),
								srf_subnav_item( 'SRF Impact Report', home_url( '/syngap-research-fund-impact-on-the-road-to-cure-syngap1/' ) ),
								srf_subnav_item( 'Finances', home_url( '/finances/' ) ),
								srf_subnav_item( 'Documents', home_url( '/documents/' ) ),
								srf_subnav_item( 'Partners', home_url( '/partners/rare-disease/' ) ),
								srf_subnav_item( 'Donors', home_url( '/champions-of-hope/' ) ),
								srf_subnav_item( 'Sponsors', home_url( '/sponsors/' ) ),
								srf_subnav_item( 'Style Guide', home_url( '/style-guide/' ) ),
								srf_subnav_item( 'SRF UK', home_url( '/team/srf-uk/' ) ),
								srf_subnav_item( 'SRF EU', home_url( '/team/srf-eu/' ) ),
								srf_subnav_item( 'Fondo de Investigación Syngap', home_url( '/team/fondo-de-investigacion-syngap/' ) ),
								srf_subnav_item( 'Diversity, Equity, & Inclusion', home_url( '/team/dei/' ) ),
							)
						);
						srf_mobile_nav_item(
							'Professionals',
							'3',
							array(
								srf_subnav_heading( 'Research' ),
								srf_subnav_item( 'Request NHS Data', home_url( '/request-nhs-data/' ) ),
								srf_subnav_heading( 'Grants' ),
								srf_subnav_item( 'Current Grants', home_url( '/resources/grants/' ) ),
								srf_subnav_item( 'How To Apply', home_url( '/syngap-research-fund-grant-program/' ) ),
								srf_subnav_item( 'Press Releases', home_url( '/press-releases/' ) ),
								srf_subnav_heading( 'Models' ),
								srf_subnav_item( 'iPS Cell Models', home_url( '/ips-cell-models/' ) ),
								srf_subnav_item( 'SYNGAP1 Mouse Models', 'https://drive.google.com/file/d/1IeW3B-SkO2ESprKHcNQ0snwpcp9uqM5e/view?usp=drive_link', false, true ),
								srf_subnav_heading( 'Advisory Boards' ),
								srf_subnav_item( 'Scientific Advisory Board', home_url( '/team/scientific-advisory-board/' ) ),
								srf_subnav_item( 'Clinical Advisory Board', home_url( '/team/clinical-advisory-board/' ) ),
							)
						);  // phpcs:ignore -- XSS OK
						srf_mobile_nav_item(
							'Families',
							'4',
							array(
								srf_subnav_heading( 'Connections' ),
								srf_subnav_item( 'Connect With SRF', '/curesyngap1connect/' ),
								srf_subnav_item( 'Join SYNGAP1 Registries', home_url( '/join-the-citizen-registry/' ) ),
								srf_subnav_item( 'Studies', home_url( '/resources/studies/' ) ),
								srf_subnav_item( 'Clinical Trials', home_url( '/clinical-trials/' ) ),
								srf_subnav_item( 'Volunteer with SRF', home_url( '/volunteer-with-srf/' ) ),
								srf_subnav_item( 'Fundraising', home_url( '/srf-fundraising-resources/' ) ),
								srf_subnav_heading( 'Medical' ),
								srf_subnav_item( 'Resources for Undiagnosed', home_url( '/resources-for-undiagnosed/' ) ),
								srf_subnav_item( 'Doctors', home_url( '/doctors/' ) ),
								srf_subnav_item( 'ICD Codes', home_url( '/syngap1-icd-codes/' ) ),
								srf_subnav_heading( 'Support' ),
								srf_subnav_item( 'New Family Resources', home_url( '/syngap1-resources-for-newly-diagnosed-families/' ) ),
								srf_subnav_item( 'Adults with SYNGAP1', home_url( '/adults-with-syngap1-caregiver-resources/' ) ),
								srf_subnav_item( 'Siblings', home_url( '/sibling-support/' ) ),
								srf_subnav_item( 'Insurance', 'https://www.angelman.org/wp-content/uploads/2022/01/ASF-State-Insurance-Resource-Guide-Jan2022.pdf' ),
								srf_subnav_item( 'RARE Bears', home_url( '/rare-bears/' ) ),
								srf_subnav_item( 'Shop', home_url( '/shop/' ) ),
							)
						);  // phpcs:ignore -- XSS OK
						srf_mobile_nav_item(
							'News & Events',
							'5',
							array(
								srf_subnav_item( 'Events Calendar', home_url( '/calendar/' ) ),
								srf_subnav_item( 'SRF In The Press', home_url( '/srf-in-the-press/' ) ),
								srf_subnav_item( 'Newsletter', home_url( '/newsletter/' ) ),
								srf_subnav_heading( 'Stories' ),
								srf_subnav_item( 'Our Warriors', home_url( '/syngap-warriors/' ) ),
								srf_subnav_item( 'Movies', home_url( '/resources/movies/' ) ),
								srf_subnav_heading( 'Learn' ),
								srf_subnav_item( 'Webinars', home_url( '/resources/webinars/' ) ),
								srf_subnav_item( 'Podcasts', '/podcasts/' ),
								srf_subnav_item( 'Blog', home_url( '/blog/' ) ),
								srf_subnav_item( 'Recursos en Español', home_url( '/recursos-en-espanol/' ) ),
							)
						);  // phpcs:ignore -- XSS OK
						?>
						<li class="p-4 cursor-pointer">
							<a class="cart-contents flex" href="<?php echo esc_url( wc_get_cart_url() ); ?>"
							   title="<?php esc_attr_e( 'View your shopping cart', 'srf' ); ?>">
								<?php /* translators: %d: number of items in cart */ ?>
								<svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
									<path fill="none" d="M0 0h24v24H0V0z" />
									<path fill="#4b5563"
										  d="M15.55 13c.75 0 1.41-.41 1.75-1.03l3.58-6.49c.37-.66-.11-1.48-.87-1.48H5.21l-.94-2H1v2h2l3.6 7.59-1.35 2.44C4.52 15.37 5.48 17 7 17h12v-2H7l1.1-2h7.45zM6.16 6h12.15l-2.76 5H8.53L6.16 6zM7 18c-1.1 0-1.99.9-1.99 2S5.9 22 7 22s2-.9 2-2-.9-2-2-2zm10 0c-1.1 0-1.99.9-1.99 2s.89 2 1.99 2 2-.9 2-2-.9-2-2-2z" />
								</svg>
								<span
									class="text-xs"><?php echo wp_kses_data( sprintf( _n( '(%d item)', '(%d items)', WC()->cart->get_cart_contents_count(), 'srf' ), WC()->cart->get_cart_contents_count() ) ); ?></span>
							</a>
						</li>
					</ul>
				</nav>
			</div>
		</div>
		<div class="py-6 px-5 space-y-6">
			<form id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>" method="GET"
				  class="flex justify-center">
				<input type="text" name="s" placeholder="<?php esc_attr_e( 'Search...' ); ?>"
					   value="<?php the_search_query(); ?>"
					   class="w-full p-2 rounded outline-none border-2 border-srf-purple-700 focus:border-srf-purple-800 placeholder-gray-400 text-purple-900">
			</form>
		</div>
		<div class="py-6 px-5 space-y-6">
			<a href="<?php echo esc_url( home_url( '/donate/' ) ); ?>"
			   class="w-full flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-srf-purple-500 hover:bg-srf-purple-600">
				Donate
			</a>
		</div>
	</div>
</div>
