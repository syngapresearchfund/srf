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

use WP_Query;

get_header();
?>

<div class="container mx-auto px-6 lg:px-0 py-16">
	<header class="entry-header max-w-3xl mx-auto mb-16 text-center">
		<h1 class="entry-title mb-4 text-4xl lg:text-5xl text-gray-600 font-extrabold">Donate</h1>
		<div class="mx-auto w-2/3 h-1 bg-gradient-to-r from-blue-400 to-purple-400 rounded transform translate-y-2"></div>
	</header>

	<!-- Begin Give Lively Fundraising Widget -->
	<script>gl=document.createElement('script');gl.src='https://secure.givelively.org/widgets/branded_donation/syngap-research-fund-incorporated.js';document.getElementsByTagName('head')[0].appendChild(gl);</script><div data-widget-src='https://secure.givelively.org/donate/syngap-research-fund-incorporated?ref=sd_widget' id="give-lively-widget" class="gl-branded-donation-widget"></div>
	<!-- End Give Lively Fundraising Widget -->

	<div class="w-full lg:w-2/3 space-y-4 mt-14 mx-auto">
		<h2 class="text-2xl font-semibold text-gray-600 text-center">Other Ways to Donate</h2>
		<p class="text-center lg:w-4/6 mx-auto">Your contribution is tax-deductible as described on your receipt and to the extent allowed by law. SRF is a US 501(c)(3) public charity, FEIN <a class="text-srf-blue-500 hover:underline" href="https://static1.squarespace.com/static/5b4b651b3917eeb14f9188d6/t/5cf83409cf94710001e28cfb/1559770123219/SRF+501c3+Ruling.pdf">83-1200789</a>. In addition to credit card above, you can donate via the following:</p>
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
								<path fill="#bd3d44" d="M0 0h972.8v39.4H0zm0 78.8h972.8v39.4H0zm0 78.7h972.8V197H0zm0 78.8h972.8v39.4H0zm0 78.8h972.8v39.4H0zm0 78.7h972.8v39.4H0zm0 78.8h972.8V512H0z" transform="scale(.9375)"/>
								<path fill="#fff" d="M0 39.4h972.8v39.4H0zm0 78.8h972.8v39.3H0zm0 78.7h972.8v39.4H0zm0 78.8h972.8v39.4H0zm0 78.8h972.8v39.4H0zm0 78.7h972.8v39.4H0z" transform="scale(.9375)"/>
								</g>
								<path fill="#192f5d" d="M0 0h389.1v275.7H0z" transform="scale(.9375)"/>
								<path fill="#fff" d="M32.4 11.8 36 22.7h11.4l-9.2 6.7 3.5 11-9.3-6.8-9.2 6.7 3.5-10.9-9.3-6.7H29zm64.9 0 3.5 10.9h11.5l-9.3 6.7 3.5 11-9.2-6.8-9.3 6.7 3.5-10.9-9.2-6.7h11.4zm64.8 0 3.6 10.9H177l-9.2 6.7 3.5 11-9.3-6.8-9.2 6.7 3.5-10.9-9.3-6.7h11.5zm64.9 0 3.5 10.9H242l-9.3 6.7 3.6 11-9.3-6.8-9.3 6.7 3.6-10.9-9.3-6.7h11.4zm64.8 0 3.6 10.9h11.4l-9.2 6.7 3.5 11-9.3-6.8-9.2 6.7 3.5-10.9-9.2-6.7h11.4zm64.9 0 3.5 10.9h11.5l-9.3 6.7 3.6 11-9.3-6.8-9.3 6.7 3.6-10.9-9.3-6.7h11.5zM64.9 39.4l3.5 10.9h11.5L70.6 57 74 67.9l-9-6.7-9.3 6.7L59 57l-9-6.7h11.4zm64.8 0 3.6 10.9h11.4l-9.3 6.7 3.6 10.9-9.3-6.7-9.3 6.7L124 57l-9.3-6.7h11.5zm64.9 0 3.5 10.9h11.5l-9.3 6.7 3.5 10.9-9.2-6.7-9.3 6.7 3.5-10.9-9.2-6.7H191zm64.8 0 3.6 10.9h11.4l-9.3 6.7 3.6 10.9-9.3-6.7-9.2 6.7 3.5-10.9-9.3-6.7H256zm64.9 0 3.5 10.9h11.5L330 57l3.5 10.9-9.2-6.7-9.3 6.7 3.5-10.9-9.2-6.7h11.4zM32.4 66.9 36 78h11.4l-9.2 6.7 3.5 10.9-9.3-6.8-9.2 6.8 3.5-11-9.3-6.7H29zm64.9 0 3.5 11h11.5l-9.3 6.7 3.5 10.9-9.2-6.8-9.3 6.8 3.5-11-9.2-6.7h11.4zm64.8 0 3.6 11H177l-9.2 6.7 3.5 10.9-9.3-6.8-9.2 6.8 3.5-11-9.3-6.7h11.5zm64.9 0 3.5 11H242l-9.3 6.7 3.6 10.9-9.3-6.8-9.3 6.8 3.6-11-9.3-6.7h11.4zm64.8 0 3.6 11h11.4l-9.2 6.7 3.5 10.9-9.3-6.8-9.2 6.8 3.5-11-9.2-6.7h11.4zm64.9 0 3.5 11h11.5l-9.3 6.7 3.6 10.9-9.3-6.8-9.3 6.8 3.6-11-9.3-6.7h11.5zM64.9 94.5l3.5 10.9h11.5l-9.3 6.7 3.5 11-9.2-6.8-9.3 6.7 3.5-10.9-9.2-6.7h11.4zm64.8 0 3.6 10.9h11.4l-9.3 6.7 3.6 11-9.3-6.8-9.3 6.7 3.6-10.9-9.3-6.7h11.5zm64.9 0 3.5 10.9h11.5l-9.3 6.7 3.5 11-9.2-6.8-9.3 6.7 3.5-10.9-9.2-6.7H191zm64.8 0 3.6 10.9h11.4l-9.2 6.7 3.5 11-9.3-6.8-9.2 6.7 3.5-10.9-9.3-6.7H256zm64.9 0 3.5 10.9h11.5l-9.3 6.7 3.5 11-9.2-6.8-9.3 6.7 3.5-10.9-9.2-6.7h11.4zM32.4 122.1 36 133h11.4l-9.2 6.7 3.5 11-9.3-6.8-9.2 6.7 3.5-10.9-9.3-6.7H29zm64.9 0 3.5 10.9h11.5l-9.3 6.7 3.5 10.9-9.2-6.7-9.3 6.7 3.5-10.9-9.2-6.7h11.4zm64.8 0 3.6 10.9H177l-9.2 6.7 3.5 11-9.3-6.8-9.2 6.7 3.5-10.9-9.3-6.7h11.5zm64.9 0 3.5 10.9H242l-9.3 6.7 3.6 11-9.3-6.8-9.3 6.7 3.6-10.9-9.3-6.7h11.4zm64.8 0 3.6 10.9h11.4l-9.2 6.7 3.5 11-9.3-6.8-9.2 6.7 3.5-10.9-9.2-6.7h11.4zm64.9 0 3.5 10.9h11.5l-9.3 6.7 3.6 11-9.3-6.8-9.3 6.7 3.6-10.9-9.3-6.7h11.5zM64.9 149.7l3.5 10.9h11.5l-9.3 6.7 3.5 10.9-9.2-6.8-9.3 6.8 3.5-11-9.2-6.7h11.4zm64.8 0 3.6 10.9h11.4l-9.3 6.7 3.6 10.9-9.3-6.8-9.3 6.8 3.6-11-9.3-6.7h11.5zm64.9 0 3.5 10.9h11.5l-9.3 6.7 3.5 10.9-9.2-6.8-9.3 6.8 3.5-11-9.2-6.7H191zm64.8 0 3.6 10.9h11.4l-9.2 6.7 3.5 10.9-9.3-6.8-9.2 6.8 3.5-11-9.3-6.7H256zm64.9 0 3.5 10.9h11.5l-9.3 6.7 3.5 10.9-9.2-6.8-9.3 6.8 3.5-11-9.2-6.7h11.4zM32.4 177.2l3.6 11h11.4l-9.2 6.7 3.5 10.8-9.3-6.7-9.2 6.7 3.5-10.9-9.3-6.7H29zm64.9 0 3.5 11h11.5l-9.3 6.7 3.6 10.8-9.3-6.7-9.3 6.7 3.6-10.9-9.3-6.7h11.4zm64.8 0 3.6 11H177l-9.2 6.7 3.5 10.8-9.3-6.7-9.2 6.7 3.5-10.9-9.3-6.7h11.5zm64.9 0 3.5 11H242l-9.3 6.7 3.6 10.8-9.3-6.7-9.3 6.7 3.6-10.9-9.3-6.7h11.4zm64.8 0 3.6 11h11.4l-9.2 6.7 3.5 10.8-9.3-6.7-9.2 6.7 3.5-10.9-9.2-6.7h11.4zm64.9 0 3.5 11h11.5l-9.3 6.7 3.6 10.8-9.3-6.7-9.3 6.7 3.6-10.9-9.3-6.7h11.5zM64.9 204.8l3.5 10.9h11.5l-9.3 6.7 3.5 11-9.2-6.8-9.3 6.7 3.5-10.9-9.2-6.7h11.4zm64.8 0 3.6 10.9h11.4l-9.3 6.7 3.6 11-9.3-6.8-9.3 6.7 3.6-10.9-9.3-6.7h11.5zm64.9 0 3.5 10.9h11.5l-9.3 6.7 3.5 11-9.2-6.8-9.3 6.7 3.5-10.9-9.2-6.7H191zm64.8 0 3.6 10.9h11.4l-9.2 6.7 3.5 11-9.3-6.8-9.2 6.7 3.5-10.9-9.3-6.7H256zm64.9 0 3.5 10.9h11.5l-9.3 6.7 3.5 11-9.2-6.8-9.3 6.7 3.5-10.9-9.2-6.7h11.4zM32.4 232.4l3.6 10.9h11.4l-9.2 6.7 3.5 10.9-9.3-6.7-9.2 6.7 3.5-11-9.3-6.7H29zm64.9 0 3.5 10.9h11.5L103 250l3.6 10.9-9.3-6.7-9.3 6.7 3.6-11-9.3-6.7h11.4zm64.8 0 3.6 10.9H177l-9 6.7 3.5 10.9-9.3-6.7-9.2 6.7 3.5-11-9.3-6.7h11.5zm64.9 0 3.5 10.9H242l-9.3 6.7 3.6 10.9-9.3-6.7-9.3 6.7 3.6-11-9.3-6.7h11.4zm64.8 0 3.6 10.9h11.4l-9.2 6.7 3.5 10.9-9.3-6.7-9.2 6.7 3.5-11-9.2-6.7h11.4zm64.9 0 3.5 10.9h11.5l-9.3 6.7 3.6 10.9-9.3-6.7-9.3 6.7 3.6-11-9.3-6.7h11.5z" transform="scale(.9375)"/>
							</g>
						</svg>
						<span class="block ml-2">United States</span>
					</div>
					<svg xmlns="http://www.w3.org/2000/svg" :class="handleRotate()" class="h-6 w-6 text-srf-purple-500 transform transition-transform duration-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
					</svg>
				</h3>
				<div
				x-ref="tab"
				:style="handleToggle()"
				class="overflow-hidden max-h-0 duration-500 transition-all"
				>
					<div class="p-6 space-y-6 bg-gray-50 border-l-2 border-srf-purple-500">
						<div class="flex justify-between items-center p-4 border rounded-md">
							<h4 class="text-gray-900 font-semibold">Paypal</h4>
							<a class="block px-4 py-3 bg-srf-blue-500 hover:bg-srf-blue-700 text-white rounded-md" href="https://www.paypal.com/us/fundraiser/charity/3573999">Continue</a>
						</div>
						<div class="flex justify-between items-center p-4 border rounded-md">
							<h4 class="text-gray-900 font-semibold">Just Giving</h4>
							<a class="block px-4 py-3 bg-srf-blue-500 hover:bg-srf-blue-700 text-white rounded-md" href="https://justgiving.com/syngapresearchfund">Continue</a>
						</div>
						<div class="p-4 border rounded-md">
							<h4 class="font-semibold">Check Donations</h4>
							<p class="mt-2">Make payable to:</p>
							<p class="font-bold">Syngap Research Fund</p>
							<p class="font-bold">PO Box 25571</p>
							<p class="font-bold">Pasadena, CA 91185</p>
						</div>
						<div class="p-4 border rounded-md">
							<h4 class="font-semibold">Bank Deposits</h4>
							<ul>
								<li>Domestic Wire / ACH Instructions.</li>
								<li>Wire / Credit Funds To:</li>
								<li>First Republic Bank.</li>
								<li>111 Pine Street.</li>
								<li>San Francisco, CA 94111.</li>
								<li class="mt-4">Account number: 80006957411</li>
								<li>ABA / Routing Number: 321081669.</li>
								<li>SWIFT Code: FRBBUS6S</li>
							</ul>
						</div>
						<div class="flex justify-between items-center p-4 border rounded-md">
							<h4 class="text-gray-900 font-semibold">Wires, stock transfers & requests</h4>
							<a class="block px-4 py-3 bg-srf-blue-500 hover:bg-srf-blue-700 text-white rounded-md" href="https://www.syngapresearchfund.org/contact-us">Continue</a>
						</div>
						<div class="p-4 border rounded-md">
							<h4 class="mb-3 text-gray-900 font-semibold">Donor Advised Funds (DAFs)</h4>
							<div>
								<script _dafdirect_settings="831200789_2010_1fabf4e0-5131-4feb-aeec-a42b06864015"></script>
								<script src="https://www.dafdirect.org/ddirect/dafdirect4.js"></script>
							</div>
						</div>
					</div>
				</div>
			</li>
			<li class="bg-white border border-b-0" x-data="accordion(2)">
				<h3
				@click="handleClick()"
				class="flex flex-row justify-between items-center font-semibold text-gray-600 p-4 cursor-pointer"
				>
					<div class="flex items-center">
						<svg xmlns="http://www.w3.org/2000/svg" id="flag-icons-gb" viewBox="0 0 640 480">
							<path fill="#012169" d="M0 0h640v480H0z"/>
							<path fill="#FFF" d="m75 0 244 181L562 0h78v62L400 241l240 178v61h-80L320 301 81 480H0v-60l239-178L0 64V0h75z"/>
							<path fill="#C8102E" d="m424 281 216 159v40L369 281h55zm-184 20 6 35L54 480H0l240-179zM640 0v3L391 191l2-44L590 0h50zM0 0l239 176h-60L0 42V0z"/>
							<path fill="#FFF" d="M241 0v480h160V0H241zM0 160v160h640V160H0z"/>
							<path fill="#C8102E" d="M0 193v96h640v-96H0zM273 0v480h96V0h-96z"/>
						</svg>
						<span class="block ml-2">United Kingdom</span>
					</div>
					<svg xmlns="http://www.w3.org/2000/svg" :class="handleRotate()" class="h-6 w-6 text-srf-purple-500 transform transition-transform duration-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
					</svg>
				</h2>
				<div
				x-ref="tab"
				:style="handleToggle()"
				class="overflow-hidden max-h-0 duration-500 transition-all"
				>
					<div class="p-6 space-y-6 bg-gray-50 border-l-2 border-srf-purple-500">
						<div class="flex justify-between items-center p-4 border rounded-md">
							<h4 class="text-gray-900 font-semibold">Just Giving</h4>
							<a class="block px-4 py-3 bg-srf-blue-500 hover:bg-srf-blue-700 text-white rounded-md" href="https://justgiving.com/syngap-researchfund">Continue</a>
						</div>
						<div class="p-4 border rounded-md">
							<h4 class="font-semibold">Bank Deposits</h4>
							<ul>
								<li>Metro Bank, account in name of:</li>
								<li>‍<strong>Syngap Research Fund, UK</strong></li>
								<li>Account Number: 39953692. Sort Code: 23-05-80.</li>
								<li>IBAN: GB14MYMB23058039953692. SWIFT Code: MYMBGB2L.</li>
							</ul>
						</div>
					</div>
				</div>
			</li>
			<li class="bg-white border rounded-b-md" x-data="accordion(3)">
				<h3
				@click="handleClick()"
				class="flex flex-row justify-between items-center font-semibold text-gray-600 p-4 cursor-pointer"
				>
					<div class="flex items-center">
						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="56" height="42">
							<g fill="none" fill-rule="evenodd">
								<circle cx="16" cy="16" fill="#efb914" fill-rule="nonzero" r="16"/>
								<path d="M21.002 9.855A7.947 7.947 0 0124 15.278l-2.847-.708a5.357 5.357 0 00-3.86-3.667c-2.866-.713-5.76.991-6.465 3.806s1.05 5.675 3.917 6.388a5.373 5.373 0 005.134-1.43l2.847.707a7.974 7.974 0 01-5.2 3.385L16.716 27l-2.596-.645.644-2.575a8.28 8.28 0 01-1.298-.323l-.643 2.575-2.596-.646.81-3.241c-2.378-1.875-3.575-4.996-2.804-8.081s3.297-5.281 6.28-5.823L15.323 5l2.596.645-.644 2.575a8.28 8.28 0 011.298.323l.643-2.575 2.596.646z" fill="#fff"/>
							</g>
						</svg>
						<span class="block ml-2">Cryptocurrency</span>
					</div>
					<svg xmlns="http://www.w3.org/2000/svg" :class="handleRotate()" class="h-6 w-6 text-srf-purple-500 transform transition-transform duration-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
					</svg>
				</h3>
				<div
				x-ref="tab"
				:style="handleToggle()"
				class="overflow-hidden max-h-0 duration-500 transition-all"
				>
					<div class="p-6 space-y-6 bg-gray-50 border-l-2 border-srf-purple-500">
						<div class="flex justify-between items-center p-4 border rounded-md">
							<h4 class="text-gray-900 font-semibold">Donate with Coinbase</h4>
							<a class="block px-4 py-3 bg-srf-blue-500 hover:bg-srf-blue-700 text-white rounded-md" href="https://commerce.coinbase.com/checkout/8e5f5ef9-a979-4efe-a18e-7d026997f03a">Continue</a>
						</div>
						<div class="p-4 border rounded-md">
							<h4 class="mb-3 text-gray-900 font-semibold">Giving Block</h4>
							<script id="tgb-widget-script"> !function(t,e,i,n,o,c,d,s){t.tgbWidgetOptions={id:o,domain:n},(d=e.createElement(i)).src=[n,"widget/script.js"].join(""),d.async=1,(s=e.getElementById(c)).parentNode.insertBefore(d,s)}(window,document,"script","https://tgbwidget.com/","831200789","tgb-widget-script"); </script>
						</div>
					</div>
				</div>
			</li>
		</ul>
	</div>
</div>

<script>
	document.addEventListener('alpine:init', () => {
		Alpine.store('accordion', {
			tab: 0,
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
			},
		}));
	});
</script>
<?php
get_footer();
