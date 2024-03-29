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

<footer class="bg-srf-purple-500 text-white border-t-4 border-srf-purple-light">

	<!-- subfooter -->
	<?php get_template_part( 'template-parts/content', 'subfooter' ); ?>

	<!-- bottom footer -->
	<div class="pt-4 pb-12 bg-gray-900 text-gray-100 text-sm text-center md:text-left">
		<div
			class="container mx-auto px-6 lg:px-0 space-y-4 md:space-y-0 flex flex-wrap justify-center md:justify-between">
			<!-- flags (credit: https://github.com/HatScripts/circle-flags) -->
			<div class="flex space-x-5">
				<a href="<?php echo esc_url( home_url( '/team/board-members/' ) ); ?>"
				   class="block transition duration-500 ease-in-out filter grayscale hover:grayscale-0">
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 512 512">
						<mask id="a">
							<circle cx="256" cy="256" r="256" fill="#fff" />
						</mask>
						<g mask="url(#a)">
							<path fill="#eee"
								  d="M256 0h256v64l-32 32 32 32v64l-32 32 32 32v64l-32 32 32 32v64l-256 32L0 448v-64l32-32-32-32v-64z" />
							<path fill="#d80027"
								  d="M224 64h288v64H224Zm0 128h288v64H256ZM0 320h512v64H0Zm0 128h512v64H0Z" />
							<path fill="#0052b4" d="M0 0h256v256H0Z" />
							<path fill="#eee"
								  d="m187 243 57-41h-70l57 41-22-67zm-81 0 57-41H93l57 41-22-67zm-81 0 57-41H12l57 41-22-67zm162-81 57-41h-70l57 41-22-67zm-81 0 57-41H93l57 41-22-67zm-81 0 57-41H12l57 41-22-67Zm162-82 57-41h-70l57 41-22-67Zm-81 0 57-41H93l57 41-22-67zm-81 0 57-41H12l57 41-22-67Z" />
						</g>
					</svg>
				</a>
				<a href="<?php echo esc_url( home_url( '/team/srf-uk/' ) ); ?>"
				   class="block transition duration-500 ease-in-out filter grayscale hover:grayscale-0">
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 512 512">
						<mask id="a">
							<circle cx="256" cy="256" r="256" fill="#fff" />
						</mask>
						<g mask="url(#a)">
							<path fill="#eee"
								  d="m0 0 8 22-8 23v23l32 54-32 54v32l32 48-32 48v32l32 54-32 54v68l22-8 23 8h23l54-32 54 32h32l48-32 48 32h32l54-32 54 32h68l-8-22 8-23v-23l-32-54 32-54v-32l-32-48 32-48v-32l-32-54 32-54V0l-22 8-23-8h-23l-54 32-54-32h-32l-48 32-48-32h-32l-54 32L68 0H0z" />
							<path fill="#0052b4"
								  d="M336 0v108L444 0Zm176 68L404 176h108zM0 176h108L0 68ZM68 0l108 108V0Zm108 512V404L68 512ZM0 444l108-108H0Zm512-108H404l108 108Zm-68 176L336 404v108z" />
							<path fill="#d80027"
								  d="M0 0v45l131 131h45L0 0zm208 0v208H0v96h208v208h96V304h208v-96H304V0h-96zm259 0L336 131v45L512 0h-45zM176 336 0 512h45l131-131v-45zm160 0 176 176v-45L381 336h-45z" />
						</g>
					</svg>
				</a>
				<a href="<?php echo esc_url( home_url( '/team/srf-eu/' ) ); ?>"
				   class="block transition duration-500 ease-in-out filter grayscale hover:grayscale-0">
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 512 512">
						<mask id="a">
							<circle cx="256" cy="256" r="256" fill="#fff" />
						</mask>
						<g mask="url(#a)">
							<path fill="#0052b4" d="M0 0h512v512H0z" />
							<path fill="#ffda44"
								  d="m256 100.2 8.3 25.5H291l-21.7 15.7 8.3 25.6-21.7-15.8-21.7 15.8 8.3-25.6-21.7-15.7h26.8zm-110.2 45.6 24 12.2 18.9-19-4.2 26.5 23.9 12.2-26.5 4.2-4.2 26.5-12.2-24-26.5 4.3 19-19zM100.2 256l25.5-8.3V221l15.7 21.7 25.6-8.3-15.8 21.7 15.8 21.7-25.6-8.3-15.7 21.7v-26.8zm45.6 110.2 12.2-24-19-18.9 26.5 4.2 12.2-23.9 4.2 26.5 26.5 4.2-24 12.2 4.3 26.5-19-19zM256 411.8l-8.3-25.5H221l21.7-15.7-8.3-25.6 21.7 15.8 21.7-15.8-8.3 25.6 21.7 15.7h-26.8zm110.2-45.6-24-12.2-18.9 19 4.2-26.5-23.9-12.2 26.5-4.2 4.2-26.5 12.2 24 26.5-4.3-19 19zM411.8 256l-25.5 8.3V291l-15.7-21.7-25.6 8.3 15.8-21.7-15.8-21.7 25.6 8.3 15.7-21.7v26.8zm-45.6-110.2-12.2 24 19 18.9-26.5-4.2-12.2 23.9-4.2-26.5-26.5-4.2 24-12.2-4.3-26.5 19 19z" />
						</g>
					</svg>
				</a>
				<a href="<?php echo esc_url( home_url( '/team/fondo-de-investigacion-syngap/' ) ); ?>"
				   class="block transition duration-500 ease-in-out filter grayscale hover:grayscale-0">
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 512 512">
						<mask id="a">
							<circle cx="256" cy="256" r="256" fill="#fff" />
						</mask>
						<g mask="url(#a)">
							<path fill="#d80027" d="m0 384 255.8-29.7L512 384v128H0z" />
							<path fill="#0052b4" d="m0 256 259.5-31L512 256v128H0z" />
							<path fill="#ffda44" d="M0 0h512v256H0z" />
						</g>
					</svg>
				</a>
			</div>
			<!-- copyright -->
			<div class="text-center">
				<p>Copyright &copy; Syngap Research Fund <?php echo esc_html( date( 'Y' ) ); ?> | All Rights
					Reserved</p>
				<p><a href="<?php echo esc_url( home_url( '/privacy-policy/' ) ); ?>" class="underline">Privacy
						Policy</a> | <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="underline">Contact
						Us</a></p>
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
		<p class="container mx-auto mt-6 px-6 lg:px-0 text-center text-sm">Medical Disclaimer: <span class="italic">Information on this site is not, nor is it intended to be, medical advice. Please
						consult your physician with any questions or concerns you may have regarding your health.</span>
		</p>
	</div>

	<a href="<?php echo esc_url( home_url( '/donate/' ) ); ?>"
	   class="flex fixed bottom-0 right-4 items-center justify-center px-4 py-1 2xl:py-2 whitespace-nowrap rounded-t-md shadow-sm text-base font-semibold font-sans bg-white hover:bg-srf-purple-500 border-2 border-b-0 border-srf-purple-500 text-srf-purple-500 hover:text-white">
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
