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
				<a href="<?php echo esc_url( home_url() ); ?>">
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
			<nav class="hidden xl:block font-sans">
				<ul class="flex space-x-9">
					<li class="relative py-2 cursor-pointer" @click="openFirst = ! openFirst" @click.outside="openFirst = false">
						<div class="text-gray-600 group rounded-md inline-flex items-center text-base font-medium hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
							<span>What is SYNGAP1?</span>
							<!--
							Heroicon name: solid/chevron-down

							Item active: "text-gray-600", Item inactive: "text-gray-400"
							-->
							<svg class="text-gray-600 ml-1 h-5 w-5 group-hover:text-gray-900" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
								<path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
							</svg>
						</div>

						<!--
							'Solutions' flyout menu, show/hide based on flyout menu state.

							Entering: "transition ease-out duration-200"
							From: "opacity-0 translate-y-1"
							To: "opacity-100 translate-y-0"
							Leaving: "transition ease-in duration-150"
							From: "opacity-100 translate-y-0"
							To: "opacity-0 translate-y-1"
						-->
						<div class="absolute z-10 -ml-4 transform transition duration-150 ease-in-out px-2 w-screen max-w-xs sm:px-0 lg:ml-0 lg:left-1/2 lg:-translate-x-1/2" :class="openFirst ? 'opacity-100 h-auto translate-y-0' : 'opacity-0 h-0 overflow-hidden -translate-y-2'">
							<ul class="relative rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 overflow-hidden bg-white sm:p-4">
								<li class="p-3 rounded-lg hover:bg-gray-50"><a href="#" class="text-base font-medium text-gray-900">Analytics</a></li>
								<li class="p-3 rounded-lg hover:bg-gray-50"><a href="#" class="text-base font-medium text-gray-900">Engagement</a></li>
								<li class="p-3 rounded-lg hover:bg-gray-50"><a href="#" class="text-base font-medium text-gray-900">Security</a></li>
								<li class="p-3 rounded-lg hover:bg-gray-50"><a href="#" class="text-base font-medium text-gray-900">Integrations</a></li>
								<li class="p-3 rounded-lg hover:bg-gray-50"><a href="#" class="text-base font-medium text-gray-900">Automations</a></li>
							</ul>
						</div>
					</li>
					<li class="relative py-2 cursor-pointer" @click="openSecond = ! openSecond" @click.outside="openSecond = false">
						<div class="text-gray-600 group rounded-md inline-flex items-center text-base font-medium hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
							<span>About Us</span>
							<svg class="text-gray-600 ml-1 h-5 w-5 group-hover:text-gray-900" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
								<path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
							</svg>
						</div>
						<div class="absolute z-10 -ml-4 transform transition duration-150 ease-in-out px-2 w-screen max-w-xs sm:px-0 lg:ml-0 lg:left-1/2 lg:-translate-x-1/2" :class="openSecond ? 'opacity-100 h-auto translate-y-0' : 'opacity-0 h-0 overflow-hidden -translate-y-2'">
							<ul class="relative rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 overflow-hidden bg-white sm:p-4">
								<li class="p-3 rounded-lg hover:bg-gray-50"><a href="#" class="text-base font-medium text-gray-900">Analytics</a></li>
								<li class="p-3 rounded-lg hover:bg-gray-50"><a href="#" class="text-base font-medium text-gray-900">Engagement</a></li>
								<li class="p-3 rounded-lg hover:bg-gray-50"><a href="#" class="text-base font-medium text-gray-900">Security</a></li>
								<li class="p-3 rounded-lg hover:bg-gray-50"><a href="#" class="text-base font-medium text-gray-900">Integrations</a></li>
								<li class="p-3 rounded-lg hover:bg-gray-50"><a href="#" class="text-base font-medium text-gray-900">Automations</a></li>
							</ul>
						</div>
					</li>
					<li class="relative py-2 cursor-pointer" @click="openThird = ! openThird" @click.outside="openThird = false">
						<div class="text-gray-600 group rounded-md inline-flex items-center text-base font-medium hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
							<span>Patients & Caregivers</span>
							<svg class="text-gray-600 ml-1 h-5 w-5 group-hover:text-gray-900" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
								<path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
							</svg>
						</div>
						<div class="absolute z-10 -ml-4 transform transition duration-150 ease-in-out px-2 w-screen max-w-xs sm:px-0 lg:ml-0 lg:left-1/2 lg:-translate-x-1/2" :class="openThird ? 'opacity-100 h-auto translate-y-0' : 'opacity-0 h-0 overflow-hidden -translate-y-2'">
							<ul class="relative rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 overflow-hidden bg-white sm:p-4">
								<li class="p-3 rounded-lg hover:bg-gray-50"><a href="#" class="text-base font-medium text-gray-900">Analytics</a></li>
								<li class="p-3 rounded-lg hover:bg-gray-50"><a href="#" class="text-base font-medium text-gray-900">Engagement</a></li>
								<li class="p-3 rounded-lg hover:bg-gray-50"><a href="#" class="text-base font-medium text-gray-900">Security</a></li>
								<li class="p-3 rounded-lg hover:bg-gray-50"><a href="#" class="text-base font-medium text-gray-900">Integrations</a></li>
								<li class="p-3 rounded-lg hover:bg-gray-50"><a href="#" class="text-base font-medium text-gray-900">Automations</a></li>
							</ul>
						</div>
					</li>
					<li class="relative py-2 cursor-pointer" @click="openFourth = ! openFourth" @click.outside="openFourth = false">
						<div class="text-gray-600 group rounded-md inline-flex items-center text-base font-medium hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
							<span>Professionals</span>
							<svg class="text-gray-600 ml-1 h-5 w-5 group-hover:text-gray-900" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
								<path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
							</svg>
						</div>
						<div class="absolute z-10 left-1/2 transform transition duration-150 ease-in-out -translate-x-1/2 px-2 w-screen max-w-xs sm:px-0" :class="openFourth ? 'opacity-100 h-auto translate-y-0' : 'opacity-0 h-0 overflow-hidden -translate-y-2'">
							<ul class="relative rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 overflow-hidden bg-white sm:p-4">
								<li class="p-3 rounded-lg hover:bg-gray-50"><a href="#" class="text-base font-medium text-gray-900">Analytics</a></li>
								<li class="p-3 rounded-lg hover:bg-gray-50"><a href="#" class="text-base font-medium text-gray-900">Engagement</a></li>
								<li class="p-3 rounded-lg hover:bg-gray-50"><a href="#" class="text-base font-medium text-gray-900">Security</a></li>
								<li class="p-3 rounded-lg hover:bg-gray-50"><a href="#" class="text-base font-medium text-gray-900">Integrations</a></li>
								<li class="p-3 rounded-lg hover:bg-gray-50"><a href="#" class="text-base font-medium text-gray-900">Automations</a></li>
							</ul>
						</div>
					</li>
					<li class="relative py-2 cursor-pointer" @click="openLast = ! openLast" @click.outside="openLast = false">
						<div class="text-gray-600 group rounded-md inline-flex items-center text-base font-medium hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
							<span>Resources</span>
							<svg class="text-gray-600 ml-1 h-5 w-5 group-hover:text-gray-900" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
								<path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
							</svg>
						</div>
						<div class="absolute z-10 left-1/2 transform transition duration-150 ease-in-out -translate-x-1/2 px-2 w-screen max-w-xs sm:px-0" :class="openLast ? 'opacity-100 h-auto translate-y-0' : 'opacity-0 h-0 overflow-hidden -translate-y-2'">
							<ul class="relative rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 overflow-hidden bg-white sm:p-4">
								<h4 class="p-3 font-semibold text-srf-blue-500">Meet Our Team</h4>
								<li class="p-3 rounded-lg hover:bg-gray-50"><a href="#" class="text-base font-medium text-gray-900">Board of Directors</a></li>
								<li class="p-3 rounded-lg hover:bg-gray-50"><a href="#" class="text-base font-medium text-gray-900">Volunteers</a></li>
								<li class="p-3 rounded-lg hover:bg-gray-50"><a href="#" class="text-base font-medium text-gray-900">Scientific Advisory Board</a></li>
								<h4 class="p-3 mt-3 font-semibold text-srf-blue-500">About SRF</h4>
								<li class="p-3 rounded-lg hover:bg-gray-50"><a href="#" class="text-base font-medium text-gray-900">Integrations</a></li>
								<li class="p-3 rounded-lg hover:bg-gray-50"><a href="#" class="text-base font-medium text-gray-900">Automations</a></li>
							</ul>
						</div>
					</li>
				</ul>
			</nav>
			<a href="#" class="hidden xl:flex items-center justify-center px-4 py-2 whitespace-nowrap border border-transparent rounded-md shadow-sm text-base font-semibold font-sans text-white bg-srf-blue-500 hover:bg-srf-blue-700">
				Donate
			</a>
		</div>
	</div>

	<!--
	Mobile menu, show/hide based on mobile menu state.

	Entering: "duration-200 ease-out"
		From: "opacity-0 scale-95"
		To: "opacity-100 scale-100"
	Leaving: "duration-100 ease-in"
		From: "opacity-100 scale-100"
		To: "opacity-0 scale-95"
	-->
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
					<nav class="grid gap-y-8">
					<a href="#" class="p-3 text-base font-medium text-gray-900 rounded-lg hover:bg-gray-50">Analytics</a>
					<a href="#" class="p-3 text-base font-medium text-gray-900 rounded-lg hover:bg-gray-50">Engagement</a>
					<a href="#" class="p-3 text-base font-medium text-gray-900 rounded-lg hover:bg-gray-50">Security</a>
					<a href="#" class="p-3 text-base font-medium text-gray-900 rounded-lg hover:bg-gray-50">Integrations</a>
					<a href="#" class="p-3 text-base font-medium text-gray-900 rounded-lg hover:bg-gray-50">Automations</a>
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
