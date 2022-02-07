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
			<div class="lg:flex justify-between space-y-12 lg:space-y-0">
				<!-- newsletter -->
				<div class="flex flex-col justify-center">
					<!-- <h4 class="mb-4 font-bold text-2xl lg:text-5xl text-transparent bg-clip-text bg-gradient-to-r from-teal-400 to-purple-500">Get the latest updates!</h4> -->
					<h4 class="mb-4 font-bold text-2xl lg:text-5xl">Get the latest updates!</h4>
					<form action="" method="POST" class="flex">
						<input type="email" name="email" placeholder="super@secret.com" class="w-full p-3 rounded-l outline-none border-2 border-r-0 border-srf-purple-700 focus:border-srf-purple-800 placeholder-srf-purple-400 text-purple-900">
						<button class="p-3 bg-srf-purple-700 hover:bg-srf-purple-800 text-white rounded-r">Submit</button>
					</form>
				</div>
				<!-- links -->
				<div class="text-center lg:text-right md:flex md:justify-center md:space-x-8 space-y-8 md:space-y-0">
					<div class="space-y-2">
						<h4 class="mb-3 font-bold uppercase tracking-widest">Families</h4>
						<a href="" class="block hover:text-purple-200 hover:underline">About</a>
						<a href="" class="block hover:text-purple-200 hover:underline">Blog</a>
						<a href="" class="block hover:text-purple-200 hover:underline">Careers</a>
						<a href="" class="block hover:text-purple-200 hover:underline">Events</a>
					</div>
					<div class="space-y-2">
						<h4 class="mb-3 font-bold uppercase tracking-widest">Professionals</h4>
						<a href="" class="block hover:text-purple-200 hover:underline">About</a>
						<a href="" class="block hover:text-purple-200 hover:underline">Blog</a>
						<a href="" class="block hover:text-purple-200 hover:underline">Careers</a>
						<a href="" class="block hover:text-purple-200 hover:underline">Events</a>
					</div>
					<div class="space-y-2">
						<h4 class="mb-3 font-bold uppercase tracking-widest">Organization</h4>
						<a href="" class="block hover:text-purple-200 hover:underline">About</a>
						<a href="" class="block hover:text-purple-200 hover:underline">Blog</a>
						<a href="" class="block hover:text-purple-200 hover:underline">Careers</a>
						<a href="" class="block hover:text-purple-200 hover:underline">Events</a>
					</div>
				</div>
			</div>
		</div>
		<!-- bottom footer -->
		<div class="py-4 bg-gray-900 text-gray-100 text-sm text-center md:text-left space-y-4 md:space-y-0">
			<div class="container mx-auto px-6 lg:px-0 md:flex justify-between">
				<!-- copyright -->
				<div>Copyright &copy; Syngap Research Fund <?php echo esc_html( get_the_date( 'Y' ) ); ?></div>
				<!-- links -->
				<div class="flex space-x-5">
					<?php
					esc_html( srf_social_icon( 'twitter', '#' ) );
					esc_html( srf_social_icon( 'facebook', '#' ) );
					esc_html( srf_social_icon( 'instagram', '#' ) );
					esc_html( srf_social_icon( 'linkedin', '#' ) );
					esc_html( srf_social_icon( 'youtube', '#' ) );
					esc_html( srf_social_icon( 'tiktok', '#' ) );
					esc_html( srf_social_icon( 'amazon', '#' ) );
					?>
				</div>
			</div>
		</div>
	</footer>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
