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

<div class="relative bg-white px-6 lg:px-0" x-data="{ open: false, openFirst: false, openSecond: false, openThird: false, openFourth: false, openLast: false }">
	<div class="container mx-auto">
		<div class="flex justify-between items-center py-6 lg:justify-start lg:space-x-9">
			<div class="flex justify-start lg:w-0 lg:flex-1">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
					<span class="sr-only">SynGap Research Fund</span>
					<img class="w-auto h-9 sm:h-10" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/srf-logo.svg" alt="">
				</a>
			</div>
			<div class="-mr-2 -my-2 xl:hidden">
				<button type="button" class="bg-white rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500" aria-expanded="false" @click="open = true">
					<span class="sr-only">Open menu</span>
					<!-- Heroicon name: outline/menu -->
					<svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
					<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
					</svg>
				</button>
			</div>
			<!-- Desktop menu, show/hide dropdown items on item state. -->
			<nav class="hidden xl:block font-sans">
				<ul class="flex space-x-6">
					<?php
					srf_nav_item(
						'What is SYNGAP1?',
						'openFirst',
						array(
							srf_subnav_item( 'Analytics', '#' ),
							srf_subnav_item( 'Engagement', '#' ),
							srf_subnav_item( 'Security', '#' ),
							srf_subnav_item( 'Integrations', '#' ),
							srf_subnav_item( 'Automations', '#' ),
						)
					);
					srf_nav_item(
						'About Us',
						'openSecond',
						array(
							srf_subnav_heading( 'Our Team' ),
							srf_subnav_item( 'Meet Our Team', home_url( '/team/' ) ),
							srf_subnav_item( 'Meet Our Warriors', home_url( '/warriors/' ) ),
							srf_subnav_heading( 'About SRF' ),
							srf_subnav_item( 'Integrations', '#' ),
							srf_subnav_item( 'Automations', '#' ),
						)
					);
					srf_nav_item(
						'Patients & Caregivers',
						'openThird',
						array(
							srf_subnav_item( 'Analytics', '#' ),
							srf_subnav_item( 'Engagement', '#' ),
							srf_subnav_item( 'Security', '#' ),
							srf_subnav_item( 'Integrations', '#' ),
							srf_subnav_item( 'Automations', '#' ),
						)
					);
					srf_nav_item(
						'Professionals',
						'openFourth',
						array(
							srf_subnav_item( 'Analytics', '#' ),
							srf_subnav_item( 'Engagement', '#' ),
							srf_subnav_item( 'Security', '#' ),
							srf_subnav_item( 'Integrations', '#' ),
							srf_subnav_item( 'Automations', '#' ),
						)
					);
					srf_nav_item(
						'Resources',
						'openLast',
						array(
							srf_subnav_item( 'Analytics', '#' ),
							srf_subnav_item( 'Engagement', '#' ),
							srf_subnav_item( 'Security', '#' ),
							srf_subnav_item( 'Integrations', '#' ),
							srf_subnav_item( 'Automations', '#' ),
						)
					);
					?>
				</ul>
			</nav>
			<a href="<?php echo esc_url( home_url( '/donate/' ) ); ?>" class="hidden xl:flex items-center justify-center px-4 py-2 whitespace-nowrap border border-transparent rounded-md shadow-sm text-base font-semibold font-sans text-white bg-srf-blue-500 hover:bg-srf-blue-700">
				Donate
			</a>
		</div>
	</div>

	<!-- Mobile menu, show/hide based on mobile menu state. -->
	<div class="absolute z-10 top-0 -inset-x-0 p-2 transition transform origin-top-right lg:hidden" x-show="open" x-transition>
		<div class="rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 bg-white divide-y-2 divide-gray-50">
			<div class="pt-5 pb-6 px-5">
				<div class="flex items-center justify-between">
					<div>
					<img class="w-auto h-9" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/srf-logo.svg" alt="Workflow">
					</div>
					<div class="-mr-2">
					<button type="button" class="bg-white rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500" @click="open = false">
						<span class="sr-only">Close menu</span>
						<!-- Heroicon name: outline/x -->
						<svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
						</svg>
					</button>
					</div>
				</div>
				<div class="mt-6">
					<nav class="grid gap-y-8 font-sans">
						<ul>
							<?php
							echo srf_subnav_item( 'Analytics', '#' );  // phpcs:ignore -- XSS OK
							echo srf_subnav_item( 'Engagement', '#' );  // phpcs:ignore -- XSS OK
							echo srf_subnav_item( 'Security', '#' );  // phpcs:ignore -- XSS OK
							echo srf_subnav_item( 'Integrations', '#' );  // phpcs:ignore -- XSS OK
							echo srf_subnav_item( 'Automations', '#' );  // phpcs:ignore -- XSS OK
							?>
						</ul>
					</nav>
				</div>
			</div>
			<div class="py-6 px-5 space-y-6">
				<a href="#" class="w-full flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-srf-purple-500 hover:bg-srf-purple-600">
					Donate
				</a>
			</div>
		</div>
	</div>
</div>
