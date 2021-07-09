<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @since 2019-05-19 First docBlock
 * @package SRF
 */

namespace SRF;

?>

	</main><!-- #content -->

	<?php get_template_part( 'content', 'subfooter' ); ?>

	<footer class="wpcom-go-footer site-footer">
		<nav class="footer-navigation">
			<ul class="wpcom-go-footer__nav">
				<li>Test link</li>
				<li>Test link</li>
				<li>Test link</li>
			</ul>
			<p class="wpcom-go-footer__credits">an <a class="wpcom-go-footer__automattic" href="https://automattic.com/">Automattic</a> mambo</p>
		</nav>
	</footer>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
