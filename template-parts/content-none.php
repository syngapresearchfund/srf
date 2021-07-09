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

<div class="search-header-wrapper">
	<header class="search-header">
		<h1 class="search-title no-widows">
			<?php
			/* translators: %s: search query. */
			printf( esc_html__( 'Results for: %s' ), '<span>' . get_search_query() . '</span>' );
			?>
		</h1>
	</header><!-- .page-header -->
</div>

<div class="page-content no-results not-found">
	<?php
	if ( is_home() && current_user_can( 'publish_posts' ) ) :

		printf(
			'<p class="no-widows">' . wp_kses(
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

		<p class="no-widows"><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords:' ); ?></p>
		<?php
		get_search_form();

	else :
		?>

		<p class="no-widows"><?php esc_html_e( 'It seems we can’t find what you’re looking for. Perhaps searching will help:' ); ?></p>
		<?php
		get_search_form();

	endif;
	?>
</div><!-- .page-content -->
