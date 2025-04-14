<?php
/**
 * View: Default Template for Events
 *
 * See more documentation about our views templating system.
 *
 * @link http://evnt.is/1aiy
 *
 * @version 5.0.0
 */

namespace SRF;

use Tribe\Events\Views\V2\Template_Bootstrap;

get_header();
?>
	<div class="container mx-auto px-6 lg:px-0 py-16">
		<?php if ( ! is_singular() ) : ?>
			<header class="entry-header max-w-3xl mx-auto text-center">
				<h1 class="entry-title mb-4 text-4xl lg:text-5xl text-gray-600 font-extrabold">Events Calendar</h1>
				<div class="mx-auto w-2/3 h-1 bg-gradient-to-r from-blue-400 to-purple-400 rounded transform translate-y-2"></div>
			</header>
		<?php endif; ?>

		<div class="max-w-6xl mt-6 mx-auto">
			<p class="text-center text-gray-600">
				See something missing? <a href="https://docs.google.com/forms/d/e/1FAIpQLSdWkfV47_HYD_NGjFxzWrU_AU8Hy-rogz4HZkBfrLlu5KyxxQ/viewform?usp=sf_link" class="underline">Fill out this form</a> to add your event.
			</p>
		</div> <!-- .post-grid -->

		<div class="max-w-6xl mx-auto">
			<?php echo tribe( Template_Bootstrap::class )->get_view_html(); ?>
		</div> <!-- .post-grid -->
<?php
get_footer();
