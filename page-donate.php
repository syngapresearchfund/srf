<?php
/**
 * The template file for Events listing page.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @since 2019-05-19 First docBlock
 * @package SRF
 */

namespace SRF;

get_header();
?>

	<div class="container mx-auto px-6 lg:px-0 py-16">
		<header class="entry-header max-w-3xl mx-auto mb-16 text-center">
			<h1 class="entry-title mb-4 text-4xl lg:text-5xl text-gray-600 font-extrabold">Donate</h1>
			<div
				class="mx-auto w-2/3 h-1 bg-gradient-to-r from-blue-400 to-purple-400 rounded transform translate-y-2"></div>
		</header>

		<!-- Begin Give Lively Fundraising Widget -->
		<!-- <script>gl = document.createElement('script');
			gl.src = 'https://secure.givelively.org/widgets/branded_donation/syngap-research-fund-incorporated.js';
			document.getElementsByTagName('head')[0].appendChild(gl);</script>
		<div data-widget-src='https://secure.givelively.org/donate/syngap-research-fund-incorporated?ref=sd_widget'
			 id="give-lively-widget" class="gl-branded-donation-widget"></div> -->
		<!-- End Give Lively Fundraising Widget -->

		<!-- Begin Classy Fundraising Widget -->
		<div class="flex flex-wrap flex-shrink-0 justify-center">
			<div id="ictUSJFSav7wK0XtQpIxG" classy="664981"></div>
			<img src="<?php echo get_template_directory_uri(); ?>/assets/images/classy-donation-image.png" id="classy-donation-image" class="rounded-lg object-contain" alt="Classy Donation Image">
		</div>
		<!-- End Classy Fundraising Widget -->

		<div class="w-full lg:w-2/3 space-y-4 mt-14 mx-auto">
			<h2 id="other-ways-to-donate" class="text-2xl font-semibold text-gray-600 text-center">Other Ways to
				Donate</h2>
			<p class="text-center lg:w-4/6 mx-auto">Your contribution is tax-deductible as described on your receipt and
				to the extent allowed by law. SRF is a US 501(c)(3) public charity, FEIN <a
					class="text-srf-blue-500 hover:underline"
					href="https://static1.squarespace.com/static/5b4b651b3917eeb14f9188d6/t/5cf83409cf94710001e28cfb/1559770123219/SRF+501c3+Ruling.pdf">83-1200789</a>.
			</p>
			<p class="text-center lg:w-4/6 mx-auto font-bold">Note: All equities will be liquidated and moved to cash
				upon receipt.</p>
			<p class="text-center lg:w-4/6 mx-auto">In addition to credit card above, you can donate via the
				following:</p>
			<ul class="flex flex-col">
				<li class="bg-white border border-b-0 rounded-t-md" x-data="accordion(1)">
					<h3
						@click="handleClick()"
						class="flex flex-row justify-between items-center font-semibold text-gray-600 p-4 cursor-pointer"
					>
						<div class="flex items-center">
							<svg xmlns="http://www.w3.org/2000/svg" id="flag-icons-us" viewBox="0 0 640 480">
								<g fill-rule="evenodd">
									<g stroke-width="1pt">
										<path fill="#bd3d44"
											  d="M0 0h972.8v39.4H0zm0 78.8h972.8v39.4H0zm0 78.7h972.8V197H0zm0 78.8h972.8v39.4H0zm0 78.8h972.8v39.4H0zm0 78.7h972.8v39.4H0z"
											  transform="scale(.9375)" />
										<path fill="#fff"
											  d="M0 39.4h972.8v39.4H0zm0 78.8h972.8v39.3H0zm0 78.7h972.8v39.4H0zm0 78.8h972.8v39.4H0zm0 78.8h972.8v39.4H0zm0 78.7h972.8v39.4H0z"
											  transform="scale(.9375)" />
									</g>
									<path fill="#192f5d" d="M0 0h389.1v275.7H0z" transform="scale(.9375)" />
									<path fill="#fff"
										  d="M32.4 11.8 36 22.7h11.4l-9.2 6.7 3.5 11-9.3-6.8-9.2 6.7 3.5-10.9-9.3-6.7H29zm64.9 0 3.5 10.9h11.5l-9.3 6.7 3.5 11-9.2-6.8-9.3 6.7 3.5-10.9-9.2-6.7h11.4zm64.8 0 3.6 10.9H177l-9.2 6.7 3.5 11-9.3-6.8-9.2 6.7 3.5-10.9-9.3-6.7h11.5zm64.9 0 3.5 10.9H242l-9.3 6.7 3.6 11-9.3-6.8-9.3 6.7 3.6-10.9-9.3-6.7h11.4zm64.8 0 3.6 10.9h11.4l-9.2 6.7 3.5 11-9.3-6.8-9.2 6.7 3.5-10.9-9.2-6.7h11.4zm64.9 0 3.5 10.9h11.5l-9.3 6.7 3.6 11-9.3-6.8-9.3 6.7 3.6-10.9-9.3-6.7h11.5zM64.9 39.4l3.5 10.9h11.5L70.6 57 74 67.9l-9-6.7-9.3 6.7L59 57l-9-6.7h11.4zm64.8 0 3.6 10.9h11.4l-9.3 6.7 3.6 10.9-9.3-6.7-9.3 6.7L124 57l-9.3-6.7h11.5zm64.9 0 3.5 10.9h11.5l-9.3 6.7 3.5 10.9-9.2-6.7-9.3 6.7 3.5-10.9-9.2-6.7H191zm64.8 0 3.6 10.9h11.4l-9.3 6.7 3.6 10.9-9.3-6.7-9.2 6.7 3.5-10.9-9.3-6.7H256zm64.9 0 3.5 10.9h11.5L330 57l3.5 10.9-9.2-6.7-9.3 6.7 3.5-10.9-9.2-6.7h11.4zM32.4 66.9 36 78h11.4l-9.2 6.7 3.5 10.9-9.3-6.8-9.2 6.8 3.5-11-9.3-6.7H29zm64.9 0 3.5 11h11.5l-9.3 6.7 3.5 10.9-9.2-6.8-9.3 6.8 3.5-11-9.2-6.7h11.4zm64.8 0 3.6 11H177l-9.2 6.7 3.5 10.9-9.3-6.8-9.2 6.8 3.5-11-9.3-6.7h11.5zm64.9 0 3.5 11H242l-9.3 6.7 3.6 10.9-9.3-6.8-9.3 6.8 3.6-11-9.3-6.7h11.4zm64.8 0 3.6 11h11.4l-9.2 6.7 3.5 10.9-9.3-6.8-9.2 6.8 3.5-11-9.2-6.7h11.4zm64.9 0 3.5 11h11.5l-9.3 6.7 3.6 10.9-9.3-6.8-9.3 6.8 3.6-11-9.3-6.7h11.5zM64.9 94.5l3.5 10.9h11.5l-9.3 6.7 3.5 11-9.2-6.8-9.3 6.7 3.5-10.9-9.2-6.7h11.4zm64.8 0 3.6 10.9h11.4l-9.3 6.7 3.6 11-9.3-6.8-9.3 6.7 3.6-10.9-9.3-6.7h11.5zm64.9 0 3.5 10.9h11.5l-9.3 6.7 3.5 11-9.2-6.8-9.3 6.7 3.5-10.9-9.2-6.7H191zm64.8 0 3.6 10.9h11.4l-9.2 6.7 3.5 11-9.3-6.8-9.2 6.7 3.5-10.9-9.3-6.7H256zm64.9 0 3.5 10.9h11.5l-9.3 6.7 3.5 11-9.2-6.8-9.3 6.7 3.5-10.9-9.2-6.7h11.4zM32.4 122.1 36 133h11.4l-9.2 6.7 3.5 11-9.3-6.8-9.2 6.7 3.5-10.9-9.3-6.7H29zm64.9 0 3.5 10.9h11.5l-9.3 6.7 3.5 10.9-9.2-6.7-9.3 6.7 3.5-10.9-9.2-6.7h11.4zm64.8 0 3.6 10.9H177l-9.2 6.7 3.5 11-9.3-6.8-9.2 6.7 3.5-10.9-9.3-6.7h11.5zm64.9 0 3.5 10.9H242l-9.3 6.7 3.6 11-9.3-6.8-9.3 6.7 3.6-10.9-9.3-6.7h11.4zm64.8 0 3.6 10.9h11.4l-9.2 6.7 3.5 11-9.3-6.8-9.2 6.7 3.5-10.9-9.2-6.7h11.4zm64.9 0 3.5 10.9h11.5l-9.3 6.7 3.6 11-9.3-6.8-9.3 6.7 3.6-10.9-9.3-6.7h11.5zM64.9 149.7l3.5 10.9h11.5l-9.3 6.7 3.5 10.9-9.2-6.8-9.3 6.8 3.5-11-9.2-6.7h11.4zm64.8 0 3.6 10.9h11.4l-9.3 6.7 3.6 10.9-9.3-6.8-9.3 6.8 3.6-11-9.3-6.7h11.5zm64.9 0 3.5 10.9h11.5l-9.3 6.7 3.5 10.9-9.2-6.8-9.3 6.8 3.5-11-9.2-6.7H191zm64.8 0 3.6 10.9h11.4l-9.2 6.7 3.5 10.9-9.3-6.8-9.2 6.8 3.5-11-9.3-6.7H256zm64.9 0 3.5 10.9h11.5l-9.3 6.7 3.5 10.9-9.2-6.8-9.3 6.8 3.5-11-9.2-6.7h11.4zM32.4 177.2l3.6 11h11.4l-9.2 6.7 3.5 10.8-9.3-6.7-9.2 6.7 3.5-10.9-9.3-6.7H29zm64.9 0 3.5 11h11.5l-9.3 6.7 3.6 10.8-9.3-6.7-9.3 6.7 3.6-10.9-9.3-6.7h11.4zm64.8 0 3.6 11H177l-9.2 6.7 3.5 10.8-9.3-6.7-9.2 6.7 3.5-10.9-9.3-6.7h11.5zm64.9 0 3.5 11H242l-9.3 6.7 3.6 10.8-9.3-6.7-9.3 6.7 3.6-10.9-9.3-6.7h11.4zm64.8 0 3.6 11h11.4l-9.2 6.7 3.5 10.8-9.3-6.7-9.2 6.7 3.5-10.9-9.2-6.7h11.4zm64.9 0 3.5 11h11.5l-9.3 6.7 3.6 10.8-9.3-6.7-9.3 6.7 3.6-10.9-9.3-6.7h11.5zM64.9 204.8l3.5 10.9h11.5l-9.3 6.7 3.5 11-9.2-6.8-9.3 6.7 3.5-10.9-9.2-6.7h11.4zm64.8 0 3.6 10.9h11.4l-9.3 6.7 3.6 11-9.3-6.8-9.3 6.7 3.6-10.9-9.3-6.7h11.5zm64.9 0 3.5 10.9h11.5l-9.3 6.7 3.5 11-9.2-6.8-9.3 6.7 3.5-10.9-9.2-6.7H191zm64.8 0 3.6 10.9h11.4l-9.2 6.7 3.5 11-9.3-6.8-9.2 6.7 3.5-10.9-9.3-6.7H256zm64.9 0 3.5 10.9h11.5l-9.3 6.7 3.5 11-9.2-6.8-9.3 6.7 3.5-10.9-9.2-6.7h11.4zM32.4 232.4l3.6 10.9h11.4l-9.2 6.7 3.5 10.9-9.3-6.7-9.2 6.7 3.5-11-9.3-6.7H29zm64.9 0 3.5 10.9h11.5L103 250l3.6 10.9-9.3-6.7-9.3 6.7 3.6-11-9.3-6.7h11.4zm64.8 0 3.6 10.9H177l-9 6.7 3.5 10.9-9.3-6.7-9.2 6.7 3.5-11-9.3-6.7h11.5zm64.9 0 3.5 10.9H242l-9.3 6.7 3.6 10.9-9.3-6.7-9.3 6.7 3.6-11-9.3-6.7h11.4zm64.8 0 3.6 10.9h11.4l-9.2 6.7 3.5 10.9-9.3-6.7-9.2 6.7 3.5-11-9.2-6.7h11.4zm64.9 0 3.5 10.9h11.5l-9.3 6.7 3.6 10.9-9.3-6.7-9.3 6.7 3.6-11-9.3-6.7h11.5z"
										  transform="scale(.9375)" />
								</g>
							</svg>
							<span class="block ml-2">United States</span>
						</div>
						<svg xmlns="http://www.w3.org/2000/svg" :class="handleRotate()"
							 class="h-6 w-6 text-srf-purple-500 transform transition-transform duration-500" fill="none"
							 viewBox="0 0 24 24" stroke="currentColor">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
						</svg>
					</h3>
					<div
						x-ref="tab"
						:style="handleToggle()"
						class="overflow-hidden max-h-0 duration-500 transition-all"
					>
						<div class="p-6 space-y-6 bg-gray-50 border-l-2 border-srf-purple-500">
							<div class="p-4 border rounded-md">
								<h4 class="font-semibold">Check Donations</h4>
								<p class="mt-2">Make payable to:</p>
								<p class="font-bold">Syngap Research Fund Incorporated</p>
								<p class="mt-2">Send to:</p>
								<p class="font-bold">SRF Donations</p>
								<p class="font-bold">PO BOX 515734</p>
								<p class="font-bold">LOS ANGELES CA 90051-5150</p>
							</div>
							<div class="p-4 border rounded-md">
								<h4 class="font-semibold">Bank Deposits</h4>
								<p>Please email <a
										href="mailto:info@curesyngap1.org?subject=Donations – Bank Deposit Wiring Instructions">info@curesyngap1.org</a>
									to get our wiring instructions.</p>
							</div>
							<div class="flex justify-between items-center p-4 border rounded-md">
								<h4 class="text-gray-900 font-semibold">Transfers of Stocks and Bonds</h4>
								<a class="block px-4 py-3 bg-srf-blue-500 hover:bg-srf-blue-700 text-white rounded-md"
								   href="<?php echo esc_url( home_url( '/gifts-of-stocks-and-bonds/' ) ); ?>">Continue</a>
							</div>
							<div class="flex justify-between items-center p-4 border rounded-md">
								<h4 class="mb-3 text-gray-900 font-semibold">Wires, Donor Advised Funds (DAFs), other requests</h4>
								<a class="block px-4 py-3 bg-srf-blue-500 hover:bg-srf-blue-700 text-white rounded-md"
								   href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">Continue</a>
							</div>
							<div class="flex justify-between items-center p-4 border rounded-md">
								<h4 class="text-gray-900 font-semibold">Paypal</h4>
								<a class="block px-4 py-3 bg-srf-blue-500 hover:bg-srf-blue-700 text-white rounded-md"
								   href="https://www.paypal.com/us/fundraiser/charity/3573999">Continue</a>
							</div>
							<div class="flex justify-between items-center p-4 border rounded-md">
								<h4 class="text-gray-900 font-semibold">Just Giving</h4>
								<a class="block px-4 py-3 bg-srf-blue-500 hover:bg-srf-blue-700 text-white rounded-md"
								   href="https://justgiving.com/syngapresearchfund">Continue</a>
							</div>
						</div>
					</div>
				</li>
				<li class="bg-white border border-b-0" x-data="accordion(2)">
					<div
						@click="handleClick()"
						class="flex flex-row justify-between items-center font-semibold text-gray-600 p-4 cursor-pointer"
					>
						<div class="flex items-center">
							<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 270 180">
								<style>.st1 {
                                        fill: #fc0
                                    }</style>
								<g id="layer1" transform="translate(0 -872.36)">
									<path id="rect2991" d="M0 872.4h270v180H0z" style="fill:#039" />
									<path id="path3769"
										  d="m135 892.4 2.2 6.9h7.3l-5.9 4.3 2.2 6.9-5.9-4.3-5.9 4.3 2.2-6.9-5.9-4.3h7.3l2.4-6.9z"
										  class="st1" />
									<path id="path3793"
										  d="m187 982.4 2.2 6.9h7.3l-5.9 4.3 2.2 6.9-5.9-4.3-5.9 4.3 2.2-6.9-5.9-4.3h7.3l2.4-6.9z"
										  class="st1" />
									<path id="path3795"
										  d="m135 1012.4 2.2 6.9h7.3l-5.9 4.3 2.2 6.9-5.9-4.3-5.9 4.3 2.2-6.9-5.9-4.3h7.3l2.4-6.9z"
										  class="st1" />
									<path id="path3797"
										  d="m195 952.4 2.2 6.9h7.3l-5.9 4.3 2.2 6.9-5.9-4.3-5.9 4.3 2.2-6.9-5.9-4.3h7.3l2.4-6.9z"
										  class="st1" />
									<path id="path3799"
										  d="m75 952.4 2.2 6.9h7.3l-5.9 4.3 2.2 6.9-5.9-4.3-5.9 4.3 2.2-6.9-5.9-4.3h7.3l2.4-6.9z"
										  class="st1" />
									<path id="path3801"
										  d="m165 900.4 2.2 6.9h7.3l-5.9 4.3 2.2 6.9-5.9-4.3-5.9 4.3 2.2-6.9-5.9-4.3h7.3l2.4-6.9z"
										  class="st1" />
									<path id="path3803"
										  d="m105 900.4 2.2 6.9h7.3l-5.9 4.3 2.2 6.9-5.9-4.3-5.9 4.3 2.2-6.9-5.9-4.3h7.3l2.4-6.9z"
										  class="st1" />
									<path id="path3805"
										  d="m105 1004.4 2.2 6.9h7.3l-5.9 4.3 2.2 6.9-5.9-4.3-5.9 4.3 2.2-6.9-5.9-4.3h7.3l2.4-6.9z"
										  class="st1" />
									<path id="path3807"
										  d="m165 1004.4 2.2 6.9h7.3l-5.9 4.3 2.2 6.9-5.9-4.3-5.9 4.3 2.2-6.9-5.9-4.3h7.3l2.4-6.9z"
										  class="st1" />
									<path id="path3809"
										  d="m187 922.4 2.2 6.9h7.3l-5.9 4.3 2.2 6.9-5.9-4.3-5.9 4.3 2.2-6.9-5.9-4.3h7.3l2.4-6.9z"
										  class="st1" />
									<path id="path3811"
										  d="m83 922.4 2.2 6.9h7.3l-5.9 4.3 2.2 6.9-5.9-4.3-5.9 4.3 2.2-6.9-5.9-4.3h7.3l2.4-6.9z"
										  class="st1" />
									<path id="path3813"
										  d="m83 982.4 2.2 6.9h7.3l-5.9 4.3 2.2 6.9-5.9-4.3-5.9 4.3 2.2-6.9-5.9-4.3h7.3l2.4-6.9z"
										  class="st1" />
								</g>
							</svg>
							<span class="block ml-2">European Union</span>
						</div>
						<svg xmlns="http://www.w3.org/2000/svg" :class="handleRotate()"
							 class="h-6 w-6 text-srf-purple-500 transform transition-transform duration-500" fill="none"
							 viewBox="0 0 24 24" stroke="currentColor">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
						</svg>
					</div>
					<div
						x-ref="tab"
						:style="handleToggle()"
						class="overflow-hidden max-h-0 duration-500 transition-all"
					>
						<div class="p-6 space-y-6 bg-gray-50 border-l-2 border-srf-purple-500">
							<div class="flex justify-between items-center p-4 border rounded-md">
								<h4 class="text-gray-900 font-semibold">Paypal</h4>
								<a class="block px-4 py-3 bg-srf-blue-500 hover:bg-srf-blue-700 text-white rounded-md"
								   href="https://www.paypal.com/paypalme/SYNGAPEUROPE?country.x=NL&locale.x=nl_NL">Continue</a>
							</div>
							<div class="p-4 border rounded-md">
								<h4 class="font-semibold">Bank Account</h4>
								<ul>
									<li>ABN AMRO Bank</li>
									<li><strong>Stichting SynGAP Research Fund Europe</strong></li>
									<li>Account Number: NL23 ABNA 0114 7506 61.</li>
									<li>BIC/SWIFT: ABNANL2A</li>
								</ul>
							</div>
						</div>
					</div>
				</li>
				<li class="bg-white border border-b-0" x-data="accordion(3)">
					<div
						@click="handleClick()"
						class="flex flex-row justify-between items-center font-semibold text-gray-600 p-4 cursor-pointer"
					>
						<div class="flex items-center">
							<svg xmlns="http://www.w3.org/2000/svg" id="flag-icons-gb" viewBox="0 0 640 480">
								<path fill="#012169" d="M0 0h640v480H0z" />
								<path fill="#FFF"
									  d="m75 0 244 181L562 0h78v62L400 241l240 178v61h-80L320 301 81 480H0v-60l239-178L0 64V0h75z" />
								<path fill="#C8102E"
									  d="m424 281 216 159v40L369 281h55zm-184 20 6 35L54 480H0l240-179zM640 0v3L391 191l2-44L590 0h50zM0 0l239 176h-60L0 42V0z" />
								<path fill="#FFF" d="M241 0v480h160V0H241zM0 160v160h640V160H0z" />
								<path fill="#C8102E" d="M0 193v96h640v-96H0zM273 0v480h96V0h-96z" />
							</svg>
							<span class="block ml-2">United Kingdom</span>
						</div>
						<svg xmlns="http://www.w3.org/2000/svg" :class="handleRotate()"
							 class="h-6 w-6 text-srf-purple-500 transform transition-transform duration-500" fill="none"
							 viewBox="0 0 24 24" stroke="currentColor">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
						</svg>
					</div>
					<div
						x-ref="tab"
						:style="handleToggle()"
						class="overflow-hidden max-h-0 duration-500 transition-all"
					>
						<div class="p-6 space-y-6 bg-gray-50 border-l-2 border-srf-purple-500">
							<div class="flex justify-between items-center p-4 border rounded-md">
								<h4 class="text-gray-900 font-semibold">Just Giving</h4>
								<a class="block px-4 py-3 bg-srf-blue-500 hover:bg-srf-blue-700 text-white rounded-md"
								   href="https://justgiving.com/syngap-researchfund">Continue</a>
							</div>
							<div class="p-4 border rounded-md">
								<h4 class="font-semibold">Bank Account</h4>
								<ul>
									<li>SYNGAP RESEARCH FUND UK</li>
									<li>Account Type: Business</li>
									<li>Account Number: 39953692</li>
									<li>Sort Code: 23-05-80</li>
									<li class="mt-3 italic">For payments from outside the UK</li>
									<li>BIC/SWIFT: MYMBGB2L</li>
									<li>IBAN: GB14MYMB 230580 39953692</li>
								</ul>
							</div>
						</div>
					</div>
				</li>
			</ul>
		</div>
		<div class="max-w-xl mt-16 mx-auto text-center">
			<h3 class="mb-8 text-l lg:text-xl font-semibold text-gray-600">Use this QR code or Syngap.Fund/Give<br>to
				link to this page.</h3>
			<img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/Donate-QR-Code.png' ) ); ?>"
				 alt="Donate to SRF">
		</div>
	</div>

	<script>
		document.addEventListener('alpine:init', () => {
			Alpine.store('accordion', {
				tab: 0
			});

			Alpine.data('accordion', (xid) => ({
				xid: null,
				init() {
					this.xid = xid;
				},
				handleClick() {
					this.$store.accordion.tab = this.$store.accordion.tab === this.xid ? 0 : this.xid;
				},
				handleRotate() {
					return this.$store.accordion.tab === this.xid ? 'rotate-180' : '';
				},
				handleToggle() {
					return this.$store.accordion.tab === this.xid
						? `max-height: ${this.$refs.tab.scrollHeight}px`
						: '';
				}
			}));
		});
	</script>
	<?php
get_footer();
