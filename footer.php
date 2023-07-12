<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @since 2019-05-19 First docBlock
 * @package SRF
 */

namespace SRF;

?>

	</main><!-- #content -->

	<!-- <footer class="bg-gradient-to-b from-gray-100 to-gray-300 text-purple-100"> -->
	<!-- <footer class="bg-gradient-to-b from-purple-500 to-purple-900 text-purple-100"> -->
	<footer class="bg-srf-purple-500 text-white border-t-4 border-srf-purple-light">
		<div class="container mx-auto px-6 lg:px-0 py-24">
			<!-- top footer -->
			<div class="lg:flex justify-between gap-x-28 space-y-12 lg:space-y-0">
				<!-- newsletter -->
				<div class="flex flex-col flex-1 justify-center">
					<!-- <h4 class="mb-4 font-bold text-2xl lg:text-5xl text-transparent bg-clip-text bg-gradient-to-r from-teal-400 to-purple-500">Get the latest updates!</h4> -->
					<h4 class="mb-4 font-bold text-2xl lg:text-4xl text-center lg:text-left">Sign up for our newsletter!</h4>
					<p class="mb-3 text-center lg:text-left">Keep up-to-date with helpful resources, inspiring stories, and the latest SRF news.</p>
					<form action="" method="POST" class="flex">
						<input type="email" name="email" placeholder="email@example.com" class="w-full xl:w-2/3 p-3 rounded-l outline-none border-2 border-r-0 border-srf-purple-700 focus:border-srf-purple-800 placeholder-srf-purple-400 text-purple-900">
						<button class="p-3 bg-srf-purple-700 hover:bg-srf-purple-800 text-white rounded-r">Submit</button>
					</form>
				</div>
				<!-- links -->
				<div class="flex-1 text-center lg:text-right">
					<p class="text-lg m-3">The Syngap Research fund is a 501(c)(3) public charity (EIN <a class="hover:underline text-srf-purple-100" href="<?php echo esc_url( get_theme_file_uri( 'assets/files/SRF-501c3-Ruling.pdf' ) ); ?>">83-1200789</a>) headquartered in California.</p>
					<ul class="flex space-x-2 justify-center xl:justify-end place-items-center">
						<li class="w-32"><a href="<?php echo esc_url( home_url( '/syngap10-podcast/' ) ); ?>"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/tdc-badge-podcast.png' ) ); ?>" alt="The Best RARE Podcasts"></a></li>
						<li class="w-32"><a href="https://globalgenes.org/" target="_blank" rel="noopener noreferrer"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/global-advocacy-alliance-founding-member-badge.png' ) ); ?>" alt="Global Advocacy Alliance Founding Member"></a></li>
						<li class="w-24"><a href="https://www.guidestar.org/profile/83-1200789" target="_blank" rel="noopener noreferrer"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/seal-of-transparency-2022.png' ) ); ?>" alt="Guidestar Platinum Symbol of Transparency 2020"></a></li>
						<li class="w-32"><a href="<?php echo esc_url( home_url( '/gnp/' ) ); ?>"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/2022-top-rated-awards-badge.png' ) ); ?>" alt="2022 Top Rated Awards"></a></li>
					</ul>
				</div>
			</div>
		</div>
		<!-- bottom footer -->
		<div class="pt-4 pb-12 bg-gray-900 text-gray-100 text-sm text-center md:text-left space-y-4 md:space-y-0">
			<div class="container mx-auto px-6 lg:px-0 space-y-4 md:space-y-0 flex flex-wrap justify-center md:justify-between">
				<!-- copyright -->
				<div>Copyright &copy; Syngap Research Fund <?php echo esc_html( date( 'Y' ) ); ?></div>
				<!-- links -->
				<div class="flex space-x-5">
					<?php
					esc_html( srf_social_icon( 'twitter', 'https://twitter.com/intent/user?screen_name=curesyngap1' ) );
					esc_html( srf_social_icon( 'facebook', 'https://facebook.com/curesyngap1' ) );
					esc_html( srf_social_icon( 'instagram', 'https://instagram.com/curesyngap1' ) );
					esc_html( srf_social_icon( 'linkedin', 'https://www.linkedin.com/company/curesyngap1' ) );
					esc_html( srf_social_icon( 'youtube', 'https://www.youtube.com/channel/UCtnPWPpqouMA_1UGOyu4W6A?sub_confirmation=1' ) );
					esc_html( srf_social_icon( 'tiktok', 'https://www.tiktok.com/@curesyngap1' ) );
					?>
				</div>
			</div>
		</div>

		<a href="<?php echo esc_url( home_url( '/donate/' ) ); ?>" class="flex fixed bottom-0 right-4 items-center justify-center px-4 py-1 2xl:py-2 whitespace-nowrap rounded-t-md shadow-sm text-base font-semibold font-sans text-white bg-srf-green-500 hover:bg-srf-green-700">
			Donate<span class="hidden lg:inline">&nbsp;to SRF</span>
		</a>

	</footer>
</div><!-- #page -->

<script>
	document.addEventListener('alpine:init', () => {
		Alpine.store('mobileDropdown', {
			tab: 0,
		});

		Alpine.data('mobileDropdown', (xid) => ({
			xid: null,
			init() {
				this.xid = xid;
			},
			handleClick() {
				this.$store.mobileDropdown.tab = this.$store.mobileDropdown.tab === this.xid ? 0 : this.xid;
			},
			handleRotate() {
				return this.$store.mobileDropdown.tab === this.xid ? 'rotate-180' : '';
			},
			handleToggle() {
				return this.$store.mobileDropdown.tab === this.xid
					? `max-height: ${this.$refs.tab.scrollHeight}px`
					: '';
			},
		}));
	});
</script>

<?php wp_footer(); ?>

</body>
</html>
