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

get_header();
?>

	<div class="container mx-auto px-6 lg:px-0 py-16">
		<header class="entry-header max-w-3xl mx-auto mb-16 text-center">
			<h1 class="entry-title mb-4 text-4xl lg:text-5xl text-gray-600 font-extrabold">SRF Team</h1>
			<div
				class="mx-auto w-2/3 h-1 bg-gradient-to-r from-blue-400 to-purple-400 rounded transform translate-y-2"></div>
		</header>

		<section class="board-members text-center mb-14">
			<h2 class="text-2xl lg:text-3xl text-gray-700 font-bold mb-10">State Ambassadors</h2>
			<?php srf_team_grid( 'state-ambassadors' ); ?>
		</section>

		<section class="board-members text-center mb-14">
			<h2 class="text-2xl lg:text-3xl text-gray-700 font-bold mb-10">State Advocates</h2>
			<?php srf_team_grid( 'state-advocates' ); ?>
		</section>

		<section class="board-members text-center mb-14">
			<h2 class="text-2xl lg:text-3xl text-gray-700 font-bold mb-10">Board of Trustees</h2>
			<?php srf_team_grid( 'board-members', 'View all trustees' ); ?>
		</section>

		<section class="leadership-team text-center mb-14">
			<h2 class="text-2xl lg:text-3xl text-gray-700 font-bold mb-10">Leadership Team</h2>
			<?php srf_team_grid( 'leadership-team', 'View full leadership team' ); ?>
		</section>

		<section class="fondo-team text-center mb-14">
			<h2 class="text-2xl lg:text-3xl text-gray-700 font-bold mb-10">Fondo de Investigación Syngap</h2>
			<?php srf_team_grid( 'fondo-de-investigacion-syngap', 'View full Fondo de Investigación Syngap team' ); ?>
		</section>

		<section class="uk-team text-center mb-14">
			<h2 class="text-2xl lg:text-3xl text-gray-700 font-bold mb-10">SRF UK</h2>
			<?php srf_team_grid( 'srf-uk', 'View full SRF UK team' ); ?>
		</section>

		<section class="eu-team text-center mb-14">
			<h2 class="text-2xl lg:text-3xl text-gray-700 font-bold mb-10">SRF EU</h2>
			<?php srf_team_grid( 'srf-eu', 'View full SRF EU team' ); ?>
		</section>

		<section class="volunteers text-center mb-14 py-14">
			<h2 class="text-2xl lg:text-3xl text-gray-700 font-bold mb-10">Volunteers</h2>
			<?php srf_team_grid( 'volunteers' ); ?>
		</section>

		<section class="volunteers text-center mb-14 py-14">
			<h2 class="text-2xl lg:text-3xl text-gray-700 font-bold mb-10">Diversity, Equity, and Inclusion Board</h2>
			<?php srf_team_grid( 'dei', 'View all DEI board members' ); ?>
		</section>

	</div>
	<?php
get_footer();
