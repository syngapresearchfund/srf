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

	<div class="w-full lg:w-1/2 space-y-4 mt-10 mx-auto">
		<h2 class="text-xl font-semibold text-gray-600 text-center">Other Ways to Donate</h2>
		<p class="text-center">Your contribution is tax-deductible as described on your receipt and to the extent allowed by law. SRF is a US 501(c)(3) public charity, FEIN 83-1200789. In addition to credit card above, you can donate via the following:</p>
		<ul class="flex flex-col">
			<li class="bg-white border border-b-0" x-data="accordion(1)">
				<h3
				@click="handleClick()"
				class="flex flex-row justify-between items-center font-semibold p-3 cursor-pointer"
					>
					<span>Unites States</span>
					<svg xmlns="http://www.w3.org/2000/svg" :class="handleRotate()" class="h-6 w-6 text-srf-purple-500 transform transition-transform duration-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
					</svg>
				</h3>
				<div
				x-ref="tab"
				:style="handleToggle()"
				class="border-l-2 border-srf-purple-500 overflow-hidden max-h-0 duration-500 transition-all"
				>
					<p class="p-3 text-gray-900">Donor Advised Funds (DAFs)</p>
					<script type = "text/javascript">_dafdirect_settings="831200789_2010_1fabf4e0-5131-4feb-aeec-a42b06864015"</script>
					<script type = "text/javascript" src = "https://www.dafdirect.org/ddirect/dafdirect4.js"></script>
				</div>
			</li>
			<li class="bg-white border border-b-0" x-data="accordion(2)">
				<h3
				@click="handleClick()"
				class="flex flex-row justify-between items-center font-semibold p-3 cursor-pointer"
				>
					<span>United Kingdom</span>
					<svg xmlns="http://www.w3.org/2000/svg" :class="handleRotate()" class="h-6 w-6 text-srf-purple-500 transform transition-transform duration-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
					</svg>
				</h2>
				<div
				class="border-l-2 border-srf-purple-500 overflow-hidden max-h-0 duration-500 transition-all"
				x-ref="tab"
				:style="handleToggle()"
					>
						<p class="p-3 text-gray-900">
						Once shipped, you’ll get a confirmation email that includes a tracking number and additional information regarding tracking your order.
					</p>
				</div>
			</li>
			<li class="bg-white border" x-data="accordion(3)">
				<h3
				@click="handleClick()"
				class="flex flex-row justify-between items-center font-semibold p-3 cursor-pointer"
				>
					<span>Crypto</span>
					<svg xmlns="http://www.w3.org/2000/svg" :class="handleRotate()" class="h-6 w-6 text-srf-purple-500 transform transition-transform duration-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
					</svg>
				</h3>
				<div
				class="border-l-2 border-srf-purple-500 overflow-hidden max-h-0 duration-500 transition-all"
				x-ref="tab"
				:style="handleToggle()"
				>
					<script id="tgb-widget-script"> !function(t,e,i,n,o,c,d,s){t.tgbWidgetOptions={id:o,domain:n},(d=e.createElement(i)).src=[n,"widget/script.js"].join(""),d.async=1,(s=e.getElementById(c)).parentNode.insertBefore(d,s)}(window,document,"script","https://tgbwidget.com/","831200789","tgb-widget-script"); </script>
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
