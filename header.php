<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Foundry_Forged
 */

?>
<!doctype html>
<html <?php language_attributes(); ?> class="no-svg">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'foundryforged' ); ?></a>

	<?php if (is_front_page()) { ?>
		<figure class="header-img">
			<?php the_header_image_tag(); ?>
		</figure> <!-- header image -->
	<?php } ?>

	<?php if ( get_theme_mod( 'wpt_mobile_menu_layout' ) === 'offcanvas' ) : ?>
		<?php get_template_part( 'template-parts/mobile-off-canvas' ); ?>
	<?php endif; ?>

	<header id="masthead" class="site-header">

		<div class="site-title-bar title-bar" <?php foundryforged_title_bar_responsive_toggle(); ?>>
			<div class="title-bar-left">
				<?php the_custom_logo(); ?>
			</div>
			<div class="title-bar-right">
				<button aria-label="<?php _e( 'Main Menu', 'foundryforged' ); ?>" class="menu-icon" type="button" data-toggle="<?php foundryforged_mobile_menu_id(); ?>"></button>
				<span class="site-mobile-title title-bar-title">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
				</span>
			</div>
		</div>

		<div class="site-navigation top-bar">
			<div class="site-branding top-bar-left">
				<?php the_custom_logo(); ?>
				<div class="site-branding__text">
					<?php if ( is_front_page() && is_home() ) :
						?>
						<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
						<?php
					else :
						?>
						<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
						<?php
					endif;
					$foundryforged_description = get_bloginfo( 'description', 'display' );
					if ( $foundryforged_description || is_customize_preview() ) :
						?>
						<p class="site-description"><?php echo $foundryforged_description; /* WPCS: xss ok. */ ?></p>
					<?php endif; ?>
				</div>
			</div>
			<!-- .site-branding -->

			<nav class="top-bar-right" role="navigation">
				<?php foundryforged_top_bar_r(); ?>

				<?php if ( ! get_theme_mod( 'wpt_mobile_menu_layout' ) || get_theme_mod( 'wpt_mobile_menu_layout' ) === 'topbar' ) : ?>
					<?php get_template_part( 'template-parts/mobile-top-bar' ); ?>
				<?php endif; ?>
			</nav>
	<!-- #site-navigation -->
		</div><!-- .top-bar-->
	</header><!-- #masthead -->
	<div id="content" class="site-content">
