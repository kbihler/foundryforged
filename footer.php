<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Foundry_Forged
 */

?>

	</div><!-- #content -->

	<div class="footer-widgets">
		<?php get_sidebar('footer'); ?>
	</div>

	<footer id="colophon" class="site-footer">
		<div class="site-info">
		<?php
			wp_nav_menu( array(
				'theme_location' => 'menu-3',
			) );
			?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
