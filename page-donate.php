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
	<header class="entry-header relative">
		<h1 class="entry-title relative text-4xl lg:text-5xl text-gray-600 text-center font-extrabold mb-14">Donate</h1>
	</header><!-- .entry-header -->

	<!-- Begin Give Lively Fundraising Widget -->
	<script>gl=document.createElement('script');gl.src='https://secure.givelively.org/widgets/branded_donation/syngap-research-fund-incorporated.js';document.getElementsByTagName('head')[0].appendChild(gl);</script><div data-widget-src='https://secure.givelively.org/donate/syngap-research-fund-incorporated?ref=sd_widget' id="give-lively-widget" class="gl-branded-donation-widget"></div>
	<!-- End Give Lively Fundraising Widget -->

	<div class="flex justify-center items-start my-2">
		<div class="w-full sm:w-10/12 md:w-1/2 my-1">
			<h2 class="text-xl font-semibold text-vnet-blue mb-2">Other Ways to Donate</h2>
			<p>Your contribution is tax-deductible as described on your receipt and to the extent allowed by law. SRF is a US 501(c)(3) public charity, FEIN 83-1200789. In addition to credit card above, you can donate via the following:</p>
			<ul class="flex flex-col">
				<li class="bg-white border border-b-0" x-data="accordion(1)">
					<h2
					@click="handleClick()"
					class="flex flex-row justify-between items-center font-semibold p-3 cursor-pointer"
					>
					<span>Unites States</span>
					<svg
						:class="handleRotate()"
						class="fill-current text-purple-700 h-6 w-6 transform transition-transform duration-500"
						viewBox="0 0 20 20"
					>
						<path d="M13.962,8.885l-3.736,3.739c-0.086,0.086-0.201,0.13-0.314,0.13S9.686,12.71,9.6,12.624l-3.562-3.56C5.863,8.892,5.863,8.611,6.036,8.438c0.175-0.173,0.454-0.173,0.626,0l3.25,3.247l3.426-3.424c0.173-0.172,0.451-0.172,0.624,0C14.137,8.434,14.137,8.712,13.962,8.885 M18.406,10c0,4.644-3.763,8.406-8.406,8.406S1.594,14.644,1.594,10S5.356,1.594,10,1.594S18.406,5.356,18.406,10 M17.521,10c0-4.148-3.373-7.521-7.521-7.521c-4.148,0-7.521,3.374-7.521,7.521c0,4.147,3.374,7.521,7.521,7.521C14.148,17.521,17.521,14.147,17.521,10"></path>
					</svg>
					</h2>
					<div
					x-ref="tab"
					:style="handleToggle()"
					class="border-l-2 border-purple-600 overflow-hidden max-h-0 duration-500 transition-all"
					>
					<p class="p-3 text-gray-900">
						Shipping time is set by our delivery partners, according to the delivery method chosen by you. Additional details can be found in the order confirmation
					</p>
					</div>
				</li>
				<li class="bg-white border border-b-0" x-data="accordion(2)">
					<h2
					@click="handleClick()"
					class="flex flex-row justify-between items-center font-semibold p-3 cursor-pointer"
					>
					<span>United Kingdom</span>
					<svg
						:class="handleRotate()"
						class="fill-current text-purple-700 h-6 w-6 transform transition-transform duration-500"
						viewBox="0 0 20 20"
					>
						<path d="M13.962,8.885l-3.736,3.739c-0.086,0.086-0.201,0.13-0.314,0.13S9.686,12.71,9.6,12.624l-3.562-3.56C5.863,8.892,5.863,8.611,6.036,8.438c0.175-0.173,0.454-0.173,0.626,0l3.25,3.247l3.426-3.424c0.173-0.172,0.451-0.172,0.624,0C14.137,8.434,14.137,8.712,13.962,8.885 M18.406,10c0,4.644-3.763,8.406-8.406,8.406S1.594,14.644,1.594,10S5.356,1.594,10,1.594S18.406,5.356,18.406,10 M17.521,10c0-4.148-3.373-7.521-7.521-7.521c-4.148,0-7.521,3.374-7.521,7.521c0,4.147,3.374,7.521,7.521,7.521C14.148,17.521,17.521,14.147,17.521,10"></path>
					</svg>
					</h2>
					<div
					class="border-l-2 border-purple-600 overflow-hidden max-h-0 duration-500 transition-all"
					x-ref="tab"
					:style="handleToggle()"
					>
					<p class="p-3 text-gray-900">
						Once shipped, you’ll get a confirmation email that includes a tracking number and additional information regarding tracking your order.
					</p>
					</div>
				</li>
				<li class="bg-white border" x-data="accordion(3)">
					<h2
					@click="handleClick()"
					class="flex flex-row justify-between items-center font-semibold p-3 cursor-pointer"
					>
					<span>Crypto</span>
					<svg
						:class="handleRotate()"
						class="fill-current text-purple-700 h-6 w-6 transform transition-transform duration-500"
						viewBox="0 0 20 20"
					>
						<path d="M13.962,8.885l-3.736,3.739c-0.086,0.086-0.201,0.13-0.314,0.13S9.686,12.71,9.6,12.624l-3.562-3.56C5.863,8.892,5.863,8.611,6.036,8.438c0.175-0.173,0.454-0.173,0.626,0l3.25,3.247l3.426-3.424c0.173-0.172,0.451-0.172,0.624,0C14.137,8.434,14.137,8.712,13.962,8.885 M18.406,10c0,4.644-3.763,8.406-8.406,8.406S1.594,14.644,1.594,10S5.356,1.594,10,1.594S18.406,5.356,18.406,10 M17.521,10c0-4.148-3.373-7.521-7.521-7.521c-4.148,0-7.521,3.374-7.521,7.521c0,4.147,3.374,7.521,7.521,7.521C14.148,17.521,17.521,14.147,17.521,10"></path>
					</svg>
					</h2>
					<div
					class="border-l-2 border-purple-600 overflow-hidden max-h-0 duration-500 transition-all"
					x-ref="tab"
					:style="handleToggle()"
					>
					<p class="p-3 text-gray-900">
						We allow the return of all items within 30 days of your original order’s date. If you’re interested in returning your items, send us an email with your order number and we’ll ship a return label.
					</p>
					</div>
				</li>
			</ul>
		</div>
	</div>

	</div>
	<script>
		document.addEventListener( 'alpine:init', () => {
			Alpine.store( 'accordion', {
				tab: 0
			} );

			Alpine.data('accordion', ( idx ) => ({
				init() {
					this.idx = idx;
				},
				idx: -1,
				handleClick() {
					this.$store.accordion.tab = this.$store.accordion.tab === this.idx ? 0 : this.idx;
				},
				handleRotate() {
					return this.$store.accordion.tab === this.idx ? 'rotate-180' : '';
				},
				handleToggle() {
					return this.$store.accordion.tab === this.idx ? `max-height: ${ this.$refs.tab.scrollHeight }px` : '';
				}
			} ) );
		} );
	</script>
<?php
get_footer();
