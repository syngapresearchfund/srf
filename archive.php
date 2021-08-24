<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @since 2019-05-19 First docBlock
 * @package SRF
 */

namespace SRF;

get_header();

	if ( have_posts() ) : ?>

		<div class="archive-header-wrapper">
			<header class="archive-header">
				<?php
				the_archive_title( '<h1 class="archive-title no-widows">', '</h1>' );
				the_archive_description( '<div class="archive-description"><h2 class="no-widows">', '</h2></div>' );
				?>
			</header><!-- .page-header -->
		</div>

		<div id="grid-container" class="post-grid">
			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/*
				* Include the Post-Type-specific template for the content.
				* If you want to override this in a child theme, then include a file
				* called content-___.php (where ___ is the Post Type name) and that will be used instead.
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
