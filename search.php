<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @since 2019-05-19 First docBlock
 * @package SRF
 */

namespace SRF;

get_header();
?>


		<?php if ( have_posts() ) : ?>
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

		<div id="grid-container" class="post-grid">
			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_type() );

			endwhile;
			?>
		</div> <!-- .post-grid -->

			<?php

	else :

		get_template_part( 'template-parts/content', 'none' );

	endif;

	get_footer();
