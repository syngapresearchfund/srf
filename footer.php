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

	<!-- subfooter -->
	<?php get_template_part( 'template-parts/content', 'subfooter' ); ?>

	<!-- bottom footer -->
	<div class="pt-4 pb-12 bg-gray-900 text-gray-100 text-sm text-center md:text-left space-y-4 md:space-y-0">
		<div
			class="container mx-auto px-6 lg:px-0 space-y-4 md:space-y-0 flex flex-wrap justify-center md:justify-between">
			<!-- copyright -->
			<div>Copyright &copy; Syngap Research Fund <?php echo esc_html( date( 'Y' ) ); ?> | All Rights Reserved | <a
					href="<?php echo esc_url( home_url( '/privacy-policy/' ) ); ?>" class="underline">Privacy Policy</a>
			</div>
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

	<a href="<?php echo esc_url( home_url( '/donate/' ) ); ?>"
	   class="flex fixed bottom-0 right-4 items-center justify-center px-4 py-1 2xl:py-2 whitespace-nowrap rounded-t-md shadow-sm text-base font-semibold font-sans text-white bg-srf-green-500 hover:bg-srf-green-700">
		Donate<span class="hidden lg:inline">&nbsp;to SRF</span>
	</a>

</footer>
</div><!-- #page -->

<script>
	document.addEventListener('alpine:init', () => {
		Alpine.store('mobileDropdown', {
			tab: 0
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
			}
		}));
	});
</script>

<?php wp_footer(); ?>

</body>
</html>
