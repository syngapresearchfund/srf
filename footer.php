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

	<footer class="py-24 bg-gradient-to-b from-gray-100 to-gray-300 text-gray-600">
		<div class="container mx-auto px-6 lg:px-0">
			<!-- top footer -->
			<div class="lg:flex justify-between space-y-12 lg:space-y-0">
				<!-- newsletter -->
				<div class="flex flex-col justify-center">
					<h4 class="mb-4 font-bold text-2xl lg:text-5xl text-transparent bg-clip-text bg-gradient-to-r from-teal-400 to-purple-500">Get the latest updates!</h4>
					<form action="" method="POST" class="flex">
						<input type="email" name="email" placeholder="super@secret.com" class="w-full p-3 rounded-l outline-none border-2 border-r-0 border-gray-400 focus:border-purple-400 placeholder-gray-300">
						<button class="p-3 bg-purple-400 text-purple-100 rounded-r">Submit</button>
					</form>
				</div>
				<!-- links -->
				<div class="text-center lg:text-right md:flex md:justify-center md:space-x-8 space-y-8 md:space-y-0">
					<div class="space-y-2">
						<p class="mb-3 font-bold text-gray-400 uppercase tracking-widest">Families</p>
						<a href="" class="block hover:text-gray-900 hover:underline">About</a>
						<a href="" class="block hover:text-gray-900 hover:underline">Blog</a>
						<a href="" class="block hover:text-gray-900 hover:underline">Careers</a>
						<a href="" class="block hover:text-gray-900 hover:underline">Events</a>
					</div>
					<div class="space-y-2">
						<p class="mb-3 font-bold text-gray-400 uppercase tracking-widest">Professionals</p>
						<a href="" class="block hover:text-gray-900 hover:underline">About</a>
						<a href="" class="block hover:text-gray-900 hover:underline">Blog</a>
						<a href="" class="block hover:text-gray-900 hover:underline">Careers</a>
						<a href="" class="block hover:text-gray-900 hover:underline">Events</a>
					</div>
					<div class="space-y-2">
						<p class="mb-3 font-bold text-gray-400 uppercase tracking-widest">Organization</p>
						<a href="" class="block hover:text-gray-900 hover:underline">About</a>
						<a href="" class="block hover:text-gray-900 hover:underline">Blog</a>
						<a href="" class="block hover:text-gray-900 hover:underline">Careers</a>
						<a href="" class="block hover:text-gray-900 hover:underline">Events</a>
					</div>
				</div>
			</div>

			<!-- bottom footer -->
			<div class="pt-4 mt-16 md:flex justify-between border-t border-gray-200 text-sm text-center md:text-left space-y-4 md:space-y-0">
				<!-- copyright -->
				<div>Copyright &copy; 2021</div>
				<!-- links -->
				<div class="space-x-4">
					<a href="#">Twitter</a>
					<a href="#">Instagram</a>
					<a href="#">Facebook</a>
					<a href="#">LinkedIn</a>
					<a href="#">YouTube</a>
				</div>
			</div>
		</div>
	</footer>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
