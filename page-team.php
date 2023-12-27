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
	<header class="entry-header max-w-3xl mx-auto mb-16 text-center">
		<h1 class="entry-title mb-4 text-4xl lg:text-5xl text-gray-600 font-extrabold">SRF Team</h1>
		<div class="mx-auto w-2/3 h-1 bg-gradient-to-r from-blue-400 to-purple-400 rounded transform translate-y-2"></div>
	</header>

	<section class="board-members text-center mb-14">
		<h2 class="text-2xl lg:text-3xl text-gray-700 font-bold mb-10">Board Members</h2>
		<?php srf_team_grid( 'board-members' ); ?>
	</section>

	<section class="leadership-team text-center mb-14">
		<h2 class="text-2xl lg:text-3xl text-gray-700 font-bold mb-10">Leadership Team</h2>
		<?php srf_team_grid( 'leadership-team' ); ?>
	</section>

	<section class="fondo-team text-center mb-14">
		<h2 class="text-2xl lg:text-3xl text-gray-700 font-bold mb-10">Fondo de Investigación Syngap</h2>
		<?php srf_team_grid( 'fondo-de-investigacion-syngap' ); ?>
	</section>

	<section class="uk-team text-center mb-14">
		<h2 class="text-2xl lg:text-3xl text-gray-700 font-bold mb-10">SRF UK</h2>
		<?php srf_team_grid( 'srf-uk' ); ?>
	</section>

	<section class="eu-team text-center mb-14">
		<h2 class="text-2xl lg:text-3xl text-gray-700 font-bold mb-10">SRF EU</h2>
		<?php srf_team_grid( 'srf-eu' ); ?>
	</section>

	<section class="volunteers text-center mb-14 py-14">
		<h2 class="text-2xl lg:text-3xl text-gray-700 font-bold mb-10">Volunteers</h2>
		<?php srf_team_grid( 'volunteers' ); ?>
	</section>


</div>
<?php
get_footer();
