<?php
/**
 * The template for displaying the Podcasts taxonomy term archive.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @since 2024-03-21 First docBlock
 * @package SRF
 */

namespace SRF;

$container_classes = srf_container_classes();
$term = get_queried_object();
$term_slug = $term->slug;
$current_term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );

// Get term meta if it exists
$podcast_image = get_field('podcast_image', $term);
$podcast_description = get_field('podcast_description', $term);
$platform_intro_text = get_field('platform_intro_text', $term);
$rating_message = get_field('rating_message', $term);
$rating_link = get_field('rating_link', $term);

get_header();
?>

<div class="<?php echo esc_attr( $container_classes ); ?> text-center">
	<header class="entry-header max-w-3xl mx-auto mb-10">
		<h1 class="entry-title mb-4 text-4xl lg:text-5xl text-gray-600 font-extrabold"><?php echo esc_html( $current_term->name ); ?></h1>
		<div class="mx-auto w-2/3 h-1 bg-gradient-to-r from-blue-400 to-purple-400 rounded transform translate-y-2"></div>
	</header>

	<?php if (!empty($podcast_image)) : ?>
	<div class="prose lg:prose-xl mx-auto mb-10">
		<img src="<?php echo esc_url($podcast_image); ?>" alt="<?php echo esc_attr($current_term->name); ?>" />
		<?php if (!empty($podcast_description)) : ?>
			<?php echo wp_kses_post($podcast_description); ?>
		<?php endif; ?>
	</div>
	<?php endif; ?>

	<div class="max-w-6xl mx-auto mb-10 space-y-5 text-center">
		<p class="prose lg:prose-xl mx-auto"><?php echo esc_html($platform_intro_text ?: __('Listen below or find us on your podcast player of choice!', 'srf')); ?></p>

					<?php
	// Platform mappings for badge images and display names
	$platform_mappings = array(
		'apple' => array(
			'name' => 'Apple Podcasts',
			'badge' => 'assets/images/Podcast-Apple-Badge.png'
		),
		'spotify' => array(
			'name' => 'Spotify',
			'badge' => 'assets/images/Podcast-Spotify-Badge.png'
		),
		'amazon' => array(
			'name' => 'Amazon Music',
			'badge' => 'assets/images/Podcast-Amazon-Badge.png'
		),
		'google' => array(
			'name' => 'Google Podcasts',
			'badge' => 'assets/images/Podcast-Google-Badge.png'
		),
		'youtube' => array(
			'name' => 'YouTube',
			'badge' => 'assets/images/Podcast-YouTube-Badge.png'
		),
		'hpn' => array(
			'name' => 'Health Podcast Network',
			'badge' => 'assets/images/Podcast-HPN-Badge.png'
		),
		'iheart' => array(
			'name' => 'iHeart Radio',
			'badge' => 'assets/images/Podcast-iHeart-Badge.png'
		)
	);

	// Build platforms array from ACF fields
	$platforms = array();
	for ($i = 1; $i <= 5; $i++) {
		$platform_key = get_field("platform_{$i}", $term);
		$link = get_field("platform_{$i}_link", $term);

		if (!empty($platform_key) && !empty($link) && isset($platform_mappings[$platform_key])) {
			$platforms[] = array(
				'name' => $platform_mappings[$platform_key]['name'],
				'link' => $link,
				'badge_image' => get_theme_file_uri($platform_mappings[$platform_key]['badge'])
			);
		}
	}

	if (!empty($platforms)) : ?>
		<ul class="flex flex-wrap lg:flex-nowrap justify-center mx-auto space-x-2">
			<?php foreach ($platforms as $platform) : ?>
				<li class="w-1/3 mt-4 lg:mt-0">
					<a href="<?php echo esc_url($platform['link']); ?>">
						<img src="<?php echo esc_url($platform['badge_image']); ?>" alt="<?php echo esc_attr($platform['name']); ?>" />
					</a>
				</li>
			<?php endforeach; ?>
		</ul>
	<?php endif; ?>

		<?php if (!empty($rating_message)) : ?>
		<div class="prose mx-auto">
			<?php echo wp_kses_post($rating_message); ?>
		</div>
		<?php endif; ?>

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
		<p class="text-2xl text-center italic"><?php printf(esc_html__('No %s episodes have been uploaded yet. Stay tuned!', 'srf'), esc_html($current_term->name)); ?></p>
	<?php endif; ?>
</div>

<?php
get_footer();
