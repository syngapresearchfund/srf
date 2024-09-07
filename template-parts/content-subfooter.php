<?php
/**
 * Template part for subfooter block
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @since 2019-05-19 First docBlock
 * @package SRF
 */

namespace SRF;

?>

<div class="container mx-auto px-6 lg:px-0 py-24">
	<!-- top footer -->
	<div class="lg:flex justify-between gap-x-14 space-y-12 lg:space-y-0">
		<img class="w-auto mx-auto h-9 sm:h-14"
			 src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/srf-logo-white.svg" alt="">
		<div class="flex-1 text-center lg:text-left">
			<!-- newsletter -->
			<div id="mc_embed_shell">
				<div id="mc_embed_signup">
					<div class="flex flex-col flex-1 justify-center">
						<h4 class="mb-4 font-bold text-2xl 2xl:text-3xl text-center lg:text-left">Sign up for our
							newsletter!</h4>
						<p class="mb-3 text-center lg:text-left">Keep up-to-date with helpful resources, inspiring
							stories, and the latest SRF news.</p>
						<form
							action="https://syngapresearchfund.us4.list-manage.com/subscribe/post?u=5b5957867c282184c537770df&amp;id=001d463f12&amp;f_id=007fc5e9f0"
							method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form"
							class="flex validate" target="_blank">
							<div id="mc_embed_signup_scroll" class="w-full">
								<input type="email" name="EMAIL" placeholder="email@example.com" id="mce-EMAIL"
									   class="required email w-full p-3 rounded-l outline-none border-2 border-r-0 border-srf-purple-700 focus:border-srf-purple-800 placeholder-srf-purple-400 text-purple-900"
									   required="" value="">
								<div aria-hidden="true" style="position: absolute; left: -5000px;">
									<input type="text" name="b_5b5957867c282184c537770df_001d463f12" tabindex="-1"
										   value="">
								</div>
							</div>
							<button name="subscribe" id="mc-embedded-subscribe"
									class="p-3 bg-srf-purple-700 hover:bg-srf-purple-800 text-white rounded-r">Submit
							</button>
						</form>
						<div id="mce-responses" class="clear">
							<div class="response" id="mce-error-response" style="display: none;"></div>
							<div class="response" id="mce-success-response" style="display: none;"></div>
						</div>
					</div>
					<script type="text/javascript"
							src="//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js"></script>
					<script type="text/javascript">
						(function($) {
							window.fnames = new Array();
							window.ftypes = new Array();
							fnames[0] = 'EMAIL';
							ftypes[0] = 'email';
							fnames[1] = 'MMERGE1';
							ftypes[1] = 'text';
							fnames[2] = 'MMERGE2';
							ftypes[2] = 'text';
							fnames[3] = 'MMERGE3';
							ftypes[3] = 'address';
							fnames[4] = 'MMERGE4';
							ftypes[4] = 'address';
							fnames[5] = 'MMERGE5';
							ftypes[5] = 'text';
							fnames[6] = 'MMERGE6';
							ftypes[6] = 'text';
							fnames[7] = 'MMERGE7';
							ftypes[7] = 'text';
							fnames[8] = 'MMERGE8';
							ftypes[8] = 'text';
							fnames[9] = 'MMERGE9';
							ftypes[9] = 'text';
						}(jQuery));
						var $mcj = jQuery.noConflict(true);
					</script>
				</div>
			</div>
		</div>
		<div class="flex-1 text-center lg:text-right">
			<p class="text-lg m-3">The Syngap Research Fund is a 501(c)(3) public charity (EIN <a
					class="hover:underline text-srf-purple-100"
					href="<?php echo esc_url( get_theme_file_uri( 'assets/files/SRF-501c3-Ruling.pdf' ) ); ?>">83-1200789</a>)
				headquartered in California.</p>
			<!-- links -->
			<ul class="flex flex-wrap space-x-3 justify-center xl:justify-end place-items-center">
				<li class="w-24 lg:w-14"><a href="<?php echo esc_url( home_url( '/syngap10-podcast/' ) ); ?>"><img
							src="<?php echo esc_url( get_theme_file_uri( 'assets/images/tdc-badge-podcast.png' ) ); ?>"
							alt="The Best RARE Podcasts"></a></li>
				<li class="w-24 lg:w-14"><a href="https://globalgenes.org/" target="_blank"
											rel="noopener noreferrer"><img
							src="<?php echo esc_url( get_theme_file_uri( 'assets/images/global-advocacy-alliance-founding-member-badge.png' ) ); ?>"
							alt="Global Advocacy Alliance Founding Member"></a></li>
				<li class="w-20 lg:w-12"><a href="https://www.guidestar.org/profile/83-1200789" target="_blank"
											rel="noopener noreferrer"><img
							src="<?php echo esc_url( get_theme_file_uri( 'assets/images/seal-of-transparency-2024.png' ) ); ?>"
							alt="Guidestar Platinum Symbol of Transparency 2024"></a></li>
				<li class="w-24 lg:w-14"><a href="<?php echo esc_url( home_url( '/gnp/' ) ); ?>"><img
							src="<?php echo esc_url( get_theme_file_uri( 'assets/images/2024-top-rated-awards-badge.png' ) ); ?>"
							alt="2022 Top Rated Awards"></a></li>
				<li class="w-24 lg:w-14"><a
						href="<?php echo esc_url( home_url( '/combined-federal-campaign/' ) ); ?>"><img
							src="<?php echo esc_url( get_theme_file_uri( 'assets/images/CFC-logo.png' ) ); ?>"
							alt="Combined Federal Campaign"></a></li>
			</ul>
		</div>
	</div>
</div>
