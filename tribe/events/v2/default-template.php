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
	<div class="container mx-auto px-6 lg:px-0 py-16 text-center">
		<?php if ( ! is_singular() ) : ?>
			<header class="entry-header max-w-3xl mx-auto">
				<h1 class="entry-title mb-4 text-4xl lg:text-5xl text-gray-600 font-extrabold">Calendar</h1>
				<div class="mx-auto w-2/3 h-1 bg-gradient-to-r from-blue-400 to-purple-400 rounded transform translate-y-2"></div>
			</header>
		<?php endif; ?>

		<div class="max-w-6xl mx-auto">
			<?php echo tribe( Template_Bootstrap::class )->get_view_html(); ?>
		</div> <!-- .post-grid -->
<?php
get_footer();
