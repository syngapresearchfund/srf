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

	<?php if ( have_posts() ) : ?>
		<div class="<?php echo esc_attr( $container_classes ); ?> text-center">
			<header class="entry-header max-w-3xl mx-auto mb-10">
				<h1 class="entry-title mb-4 text-4xl lg:text-5xl text-gray-600 font-extrabold"><?php echo esc_html( $current_term->name ); ?></h1>
				<div class="mx-auto w-2/3 h-1 bg-gradient-to-r from-blue-400 to-purple-400 rounded transform translate-y-2"></div>
			</header>
			
			<div class="prose lg:prose-xl mx-auto mb-10">
				<img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/SYNGAP1-Stories.png' ) ); ?>" alt="Syngap1 Stories" />
				<p class="text-2xl xl:text-4xl">Stories shared by families about their lives raising Syngapians,</p>
				<p class="text-2xl xl:text-4xl">hosted by <a class="underline" href="<?php echo esc_url( home_url( '/team/volunteers/ashley-frye-mba/' ) ); ?>">Ashley Frye</a>.</p>
			</div>

			<div class="max-w-6xl mx-auto mb-10 space-y-5 text-center">
				<p class="prose lg:prose-xl mx-auto">Listen below or find us on your podcast player of choice!</p>
				<ul class="flex flex-wrap lg:flex-nowrap justify-center mx-auto space-x-2">
					<li class="w-1/3 mt-4 lg:mt-0"><a href="https://podcasts.apple.com/us/podcast/syngap-stories/id1667705687" ><img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/Podcast-Apple-Badge.png' ) ); ?>" alt="Apple Podcasts" /></a></li>
					<li class="w-1/3 mt-4 lg:mt-0"><a href="https://podcasts.google.com/feed/aHR0cHM6Ly9hbmNob3IuZm0vcy9kOWExMThiYy9wb2RjYXN0L3Jzcw" ><img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/Podcast-Google-Badge.png' ) ); ?>" alt="Google Podcasts" /></a></li>
					<li class="w-1/3 mt-4 lg:mt-0"><a href="https://music.amazon.com/podcasts/20b4c971-9d2f-4934-8adf-2875bdcabedf" ><img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/Podcast-Amazon-Badge.png' ) ); ?>" alt="Amazon Music" /></a></li>
					<li class="w-1/3 mt-4 lg:mt-0"><a href="https://open.spotify.com/show/4UijtRfgW2Tbcbrz3Yv9J9" ><img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/Podcast-Spotify-Badge.png' ) ); ?>" alt="Spotify" /></a></li>
					<li class="w-1/3 mt-4 lg:mt-0"><a href="https://www.iheart.com/podcast/269-syngap-stories-107883257/" ><img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/Podcast-iHeart-Badge.png' ) ); ?>" alt="iHeart Radio" /></a></li>
					<li class="w-1/3 mt-4 lg:mt-0"><a href="https://healthpodcastnetwork.com/show/syngap1-stories/" ><img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/Podcast-HPN-Badge.png' ) ); ?>" alt="Health Podcast Network" /></a></li>
				</ul>
				<div class="mx-auto w-2/3 h-px bg-gradient-to-r from-blue-400 to-purple-400 rounded transform translate-y-2"></div>
			</div>

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
		</div>
		<?php
	else :

		get_template_part( 'template-parts/content', 'none' );

	endif;
	?>

<?php
get_footer();
