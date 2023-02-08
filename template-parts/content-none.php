<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @since 2019-05-19 First docBlock
 * @package SRF
 */

namespace SRF;

?>

<div class="container mx-auto px-6 lg:px-0 py-16">
	<header class="entry-header max-w-3xl mx-auto mb-16 text-center">
		<h1 class="entry-title mb-4 text-4xl lg:text-5xl text-gray-600 font-extrabold">
		<?php
			/* translators: %s refers to search query */
			printf( esc_html__( 'Results for: %s' ), '<span>' . get_search_query() . '</span>' );
		?>
		</h1>
		<div class="mx-auto w-2/3 h-1 bg-gradient-to-r from-blue-400 to-purple-400 rounded transform translate-y-2"></div>
	</header>
	<?php
	if ( is_home() && current_user_can( 'publish_posts' ) ) :

		printf(
			'<p">' . wp_kses(
				/* translators: 1: link to WP admin new post page. */
				__( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.' ),
				array(
					'a' => array(
						'href' => array(),
					),
				)
			) . '</p>',
			esc_url( admin_url( 'post-new.php' ) )
		);

	elseif ( is_search() ) :
		?>

		<p"><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords:' ); ?></p>
		<?php
		get_search_form();

	else :
		?>

		<p"><?php esc_html_e( 'It seems we can’t find what you’re looking for. Perhaps searching will help:' ); ?></p>
		<?php
		get_search_form();

	endif;
	?>
</div><!-- .page-content -->
