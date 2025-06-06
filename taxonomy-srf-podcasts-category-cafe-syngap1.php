<?php
/**
 * The main template file
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

$container_classes = srf_container_classes();
$current_term      = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
get_header();
?>

<div class="<?php echo esc_attr( $container_classes ); ?> text-center">
	<header class="entry-header max-w-3xl mx-auto mb-10">
		<h1 class="entry-title mb-4 text-4xl lg:text-5xl text-gray-600 font-extrabold"><?php echo esc_html( $current_term->name ); ?></h1>
		<div class="mx-auto w-2/3 h-1 bg-gradient-to-r from-blue-400 to-purple-400 rounded transform translate-y-2"></div>
	</header>

	<div class="prose lg:prose-xl mx-auto mb-10">
		<img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/Cafe-SYNGAP1.png' ) ); ?>" alt="Café Syngap1" />
		<p class="text-2xl xl:text-3xl">Su anfitriona, <a class="underline" href="<?php echo esc_url( home_url( '/team/fondo-de-investigacion-syngap/merlina-davila/' ) ); ?>">Merlina Dávila</a>, le da la bienvenida a Café <em>SYNGAP1</em>, donde cada episodio inspira a nuestra comunidad a seguir adelante.</p>
		<p>Bienvenidos al nuevo podcast de SRF en Español: Café <em>SYNGAP1</em> pretender ser un espacio para encontrar apoyo, consejos y esperanza en una comunidad de Padres, Hermanos, Investigadores, Científicos, Terapeutas y todos aquellos involucrados en esta patología.
La esperanza de nuestra presentadora Merlina Davila es que a partir de compartir nuestras historias, conocimientos, experiencias, retos, éxitos y avances, seamos mas unidos como comunidad y que cada episodio nos inspire a seguir adelante.</p>
	</div>

	<div class="max-w-6xl mx-auto mb-10 space-y-5 text-center">
		<p class="prose lg:prose-xl mx-auto">Escuchen aquí o encuéntrenos en su servicio de podcasts favorito!</p>
		<ul class="flex flex-wrap lg:flex-nowrap justify-center mx-auto space-x-2">
			<li class="w-1/3 mt-4 lg:mt-0"><a href="https://podcasts.apple.com/us/podcast/caf%C3%A9-syngap1/id1705809525" ><img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/Podcast-Apple-Badge.png' ) ); ?>" alt="Apple Podcasts" /></a></li>
			<li class="w-1/3 mt-4 lg:mt-0"><a href="https://music.amazon.com/account/manage?0=%2F6e65b878-4506-4882-b6cd-1ea873c0ba7e%2Fcaf%C3%A9-syngap1&1=6e65b878-4506-4882-b6cd-1ea873c0ba7e%2Fcaf%C3%A9-syngap1&subView=podcasts&successUrl=L3BvZGNhc3RzLzZlNjViODc4LTQ1MDYtNDg4Mi1iNmNkLTFlYTg3M2MwYmE3ZS9jYWbDqS1zeW5nYXAx&cancelUrl=L3BvZGNhc3RzLzZlNjViODc4LTQ1MDYtNDg4Mi1iNmNkLTFlYTg3M2MwYmE3ZS9jYWbDqS1zeW5nYXAx&customerId=A3TXRQKXWX2JLM&deviceType=A16ZV8BU3SN1N3&deviceId=13019090689468329&musicTerritory=US&locale=en_US&currencyOfPreference=undefined" ><img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/Podcast-Amazon-Badge.png' ) ); ?>" alt="Amazon Music" /></a></li>
			<li class="w-1/3 mt-4 lg:mt-0"><a href="https://open.spotify.com/show/1isoMbkJLD5IMsNnBNqZu1" ><img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/Podcast-Spotify-Badge.png' ) ); ?>" alt="Spotify" /></a></li>
			<li class="w-1/3 mt-4 lg:mt-0"><a href="https://www.youtube.com/playlist?list=PLjpr3a14_ls2YLD7B5fHFQRq9AQbXqzgr" ><img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/Podcast-YouTube-Badge.png' ) ); ?>" alt="YouTube" /></a></li>
			<li class="w-1/3 mt-4 lg:mt-0"><a href="https://healthpodcastnetwork.com/show/cafe-syngap1/" ><img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/Podcast-HPN-Badge.png' ) ); ?>" alt="Health Podcast Network" /></a></li>
		</ul>
		<p class="prose mx-auto"><strong>Y POR FAVOR</strong> — denos 5 estrellas en todas partes — si importa!<br>Vaya <a href="https://www.syngap1.org/rating" class="underline">SYNGAP1.org/Rating</a> para ver porque importa!</p>
		<div class="mx-auto w-2/3 h-px bg-gradient-to-r from-blue-400 to-purple-400 rounded transform translate-y-2"></div>
	</div>

	<?php if ( have_posts() ) : ?>
		<div class="max-w-6xl mx-auto grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-2">
			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/*
				* Include the Post-Type-specific template for the content.
				* If you want to override this in a child theme, then include a file
				* called content-___.php (where ___ is the Post Type name) and that will be used instead.
				*/
				get_template_part( 'template-parts/content', 'grid-items' );

			endwhile;
			?>
		</div>
		<div class="max-w-6xl mx-auto mt-14 pt-10 text-center border-t-2 border-gray-200">
			<?php
				the_posts_navigation( array( 'prev_text' => 'Next Page', 'next_text' => 'Previous Page' ) );
			?>
		</div>
	<?php else : ?>
		<p class="text-2xl text-center italic">No <?php echo esc_html( $current_term->name ); ?> episodes have been uploaded yet. Stay tuned!</p>
	<?php endif; ?>
</div>

<?php
get_footer();
