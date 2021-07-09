<?php
/**
 * Home template.
 *
 * @since 2019-05-19 First docBlock
 * @package SRF
 */

namespace SRF;

get_header();
?>

	<?php
	if ( have_posts() ) :
		$post_count   = 1;
		$current_page = absint( get_query_var( 'paged' ) ?: 1 );

		if ( is_home() && ! is_front_page() ) :
			?>
			<header>
				<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
			</header>
			<?php
		endif;

		/* Start the Loop */
		while ( have_posts() ) :
			the_post();

				/*
				* Include the Post-Type-specific template for the content.
				* If you want to override this in a child theme, then include a file
				* called content-___.php (where ___ is the Post Type name) and that will be used instead.
				*/
				get_template_part( 'template-parts/content', get_post_type() );

		endwhile; ?>
		
		</div> <!-- .post-grid -->

	<?php
	else :

		get_template_part( 'template-parts/content', 'none' );

	endif;
	?>

<?php get_footer(); ?>
