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
<div class="relative bg-white px-6 lg:px-0 z-10 xl:shadow">
	<div class="container mx-auto">
		<div class="flex justify-between items-center py-6 lg:justify-start lg:space-x-9">
			<div class="flex justify-start lg:w-0 lg:flex-1 hover:opacity-80">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
					<span class="sr-only">SynGap Research Fund</span>
					<img class="w-auto h-9 sm:h-14" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/srf-logo.svg" alt="">
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
					srf_nav_item( 'About', home_url( '/about/' ) );
					srf_nav_item( 'Blog', home_url( '/news/' ) );
					srf_nav_item( 'Shop', home_url( '/shop/' ) );
					srf_nav_item( 'Contact', home_url( '/contact/' ) );
					?>
				</ul>
			</nav>
			<a href="<?php echo esc_url( home_url( '/donate/' ) ); ?>" class="hidden xl:flex items-center justify-center px-4 py-2 whitespace-nowrap border border-transparent rounded-md shadow-sm text-base font-semibold font-sans text-white bg-srf-blue-500 hover:bg-srf-blue-700">
				Donate
			</a>
		</div>
	</div>
</div>

<!-- Main secondary menu, show/hide based on mobile menu state. -->
<div class="hidden xl:block relative bg-gray-200 px-6 lg:px-0">
	<div class="container mx-auto py-2 flex items-center lg:justify-center">
		<!-- Desktop menu, show/hide dropdown items on item state. -->
		<nav class="hidden xl:block font-sans">
			<ul class="flex space-x-6">
				<?php
				srf_nav_item_dropdown(
					'What is SYNGAP1?',
					'openFirst',
					array(
						srf_subnav_item( 'What is SYNGAP1?', home_url( '/what-is-syngap1/' ) ),
						srf_subnav_item( 'SYNGAP1 Treatment', home_url( '/syngap1-treatment/' ) ),
						srf_subnav_item( 'Syngap1 Epilepsy', '/syngap1-epilepsy/' ),
						srf_subnav_item( 'Life Expectancy', '/whats-the-life-expectancy-of-someone-with-syngap1/' ),
						srf_subnav_item( 'SYNGAP1 & Autism', '/does-my-syngap1-child-have-autism/' ),
					)
				);
				srf_nav_item_dropdown(
					'About Us',
					'openSecond',
					array(
						srf_subnav_heading( 'Our Team' ),
						srf_subnav_item( 'Meet Our Team', home_url( '/team/' ) ),
						srf_subnav_heading( 'About SRF' ),
						srf_subnav_item( 'Mission & Values', '/mission-values/' ),
						srf_subnav_item( 'Finances', '/finances/' ),
						srf_subnav_item( 'Documents', '/documents/' ),
						srf_subnav_item( 'Partners', '/partners/' ),
						srf_subnav_item( 'Sponsors', '/sponsors/' ),
						srf_subnav_item( 'Style Guide', '/style-guide/' ),
					)
				);
				srf_nav_item_dropdown(
					'For Families',
					'openThird',
					array(
						srf_subnav_heading( 'Start Here' ),
						srf_subnav_item( 'Connect With Us', 'https://docs.google.com/forms/d/e/1FAIpQLSdQK-BcpONtn15ZVxMcH1qPRzX-zvuUXQR3p4N7P3kF_m58Fw/viewform' ),
						srf_subnav_item( 'Meet Our Warriors', home_url( '/warriors/' ) ),
						srf_subnav_item( 'Join The Registry (Ciitizen)', '/join-the-ciitizen-registry/' ),
						srf_subnav_item( 'Doctors', '/doctors/' ),
						srf_subnav_item( 'Newsletter', '/newsletter/' ),
						srf_subnav_item( 'Could it be SYNGAP1?', 'https://symptom-checker.probablygenetic.com/syngap/?utm_campaign=srf-website' ),
						srf_subnav_item( 'Studies', '/studies/' ),
						srf_subnav_item( 'Clinical Trials', '/clinical-trials/' ),
						srf_subnav_item( 'RARE Bears', '/rare-bears/' ),
						srf_subnav_heading( 'Support' ),
						srf_subnav_item( 'Newly Diagnosed', '/welcome-pack/' ),
						srf_subnav_item( 'Insurance', 'https://www.angelman.org/wp-content/uploads/2022/01/ASF-State-Insurance-Resource-Guide-Jan2022.pdf' ),
						srf_subnav_item( 'Fundraising', '/events/fundraisers/' ),
					)
				);
				srf_nav_item_dropdown(
					'Professionals',
					'openFourth',
					array(
						srf_subnav_heading( 'Research' ),
						srf_subnav_item( 'Roadmap', '#' ),
						srf_subnav_item( 'Request NHS Data', '#' ),
						srf_subnav_heading( 'Grants' ),
						srf_subnav_item( 'Current Grants', '#' ),
						srf_subnav_item( 'How to Apply', '#' ),
						srf_subnav_heading( 'Roundtables' ),
						srf_subnav_item( '2021 Feb en español', '#' ),
						srf_subnav_item( '2020', '#' ),
						srf_subnav_item( '2019', '#' ),
					)
				);
				srf_nav_item_dropdown(
					'Resources',
					'openLast',
					array(
						srf_subnav_item( 'News', home_url( '/news/' ) ),
						srf_subnav_item( 'Webinars', '/resources/webinars/' ),
						srf_subnav_item( 'Movies', '/resources/movies/' ),
						srf_subnav_item( 'Podcast', '#' ),
						srf_subnav_item( 'Press Releases', '#' ),
						srf_subnav_item( 'Shop', home_url( '/shop/' ) ),
					)
				);
				?>
			</ul>
		</nav>
	</div>
</div>

<!-- Mobile menu, show/hide based on mobile menu state. -->
<div class="absolute z-10 top-0 -inset-x-0 p-2 transition transform origin-top-right xl:hidden" x-show="open" x-transition>
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
						echo srf_mobile_nav_item(
							'What is SYNGAP1?',
							'1',
							array(
								srf_subnav_item( 'What is SYNGAP1?', '#', true ),
								srf_subnav_item( 'SYNGAP1 Treatment', '#', true ),
								srf_subnav_item( 'Syngap1 Epilepsy', '#', true ),
								srf_subnav_item( 'Life Expectancy', '#', true ),
								srf_subnav_item( 'SYNGAP1 & Autism', '#', true ),
							)
						);  // phpcs:ignore -- XSS OK
						echo srf_mobile_nav_item(
							'About Us',
							'2',
							array(
								srf_subnav_heading( 'Our Team' ),
								srf_subnav_item( 'Meet Our Team', home_url( '/team/' ), true ),
								srf_subnav_item( 'Meet Our Warriors', home_url( '/warriors/' ), true ),
								srf_subnav_heading( 'About SRF' ),
								srf_subnav_item( 'Mission & Values', '#', true ),
								srf_subnav_item( 'Finances', '#', true ),
								srf_subnav_item( 'Documents', '#', true ),
								srf_subnav_item( 'Partners', '#', true ),
							)
						);  // phpcs:ignore -- XSS OK
						echo srf_mobile_nav_item(
							'Patients & Caregivers',
							'3',
							array(
								srf_subnav_heading( 'Start Here' ),
								srf_subnav_item( 'Connect With Us', '#', true ),
								srf_subnav_item( 'Join The Registry (Ciitizen)', '#', true ),
								srf_subnav_item( 'Doctors', '#', true ),
								srf_subnav_item( 'Newsletter', '#', true ),
								srf_subnav_item( 'Could it be SYNGAP1?', '#', true ),
								srf_subnav_heading( 'Support' ),
								srf_subnav_item( 'Newly Diagnosed', '#', true ),
								srf_subnav_item( 'Insurance', '#', true ),
								srf_subnav_heading( 'Fundraising' ),
								srf_subnav_item( 'Sprint4Syngap', '#', true ),
							)
						);  // phpcs:ignore -- XSS OK
						echo srf_mobile_nav_item(
							'Professionals',
							'4',
							array(
								srf_subnav_heading( 'Research' ),
								srf_subnav_item( 'Roadmap', '#', true ),
								srf_subnav_item( 'Request NHS Data', '#', true ),
								srf_subnav_heading( 'Grants' ),
								srf_subnav_item( 'Current Grants', '#', true ),
								srf_subnav_item( 'How to Apply', '#', true ),
								srf_subnav_heading( 'Roundtables' ),
								srf_subnav_item( '2021 Feb en español', '#', true ),
								srf_subnav_item( '2020', '#', true ),
								srf_subnav_item( '2019', '#', true ),
							)
						);  // phpcs:ignore -- XSS OK
						echo srf_mobile_nav_item(
							'Resources',
							'5',
							array(
								srf_subnav_item( 'News', home_url( '/news/' ), true ),
								srf_subnav_item( 'Webinars', '#', true ),
								srf_subnav_item( 'Meet Our Warriors', '#', true ),
								srf_subnav_item( 'Movies', '#', true ),
								srf_subnav_item( 'Podcast', '#', true ),
								srf_subnav_item( 'Press Releases', '#', true ),
								srf_subnav_item( 'Shop', '#', true ),
							)
						);  // phpcs:ignore -- XSS OK
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
