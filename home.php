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
			if ( 1 === $post_count && 1 === $current_page ) :
				get_template_part( 'content', 'featured' );
			elseif ( 2 === $post_count && 1 === $current_page ) :
				srf_home_loop_welcome();
			elseif ( 8 === $post_count && 1 === $current_page ) :
				srf_cta_create();
			else :
				if ( 1 === $post_count && 1 < $current_page ) :
					echo '<!-- Begin post grid for remaining items --><div id="grid-container" class="post-grid">';
				endif;
				get_template_part( 'content', get_post_type() );
			endif;

			$post_count++;

		endwhile; ?>
		
		</div> <!-- .post-grid -->

	<?php
	else :

		get_template_part( 'content', 'none' );

	endif;
	?>

<?php get_footer(); ?>
