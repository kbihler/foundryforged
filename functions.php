<?php
/**
 * Foundry Forged functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 * @package Foundry_Forged
 * @since Foundry_Forged 1.0.0
 */

/** Clean up Wordpress head, dashboard, widgets, and amin areas. Edit as needed. */
require get_template_directory() . '/inc/clean-wp-ff.php';

/** Start up Foundry Forged Theme */
require get_template_directory() . '/inc/startup-ff.php';

/** Set globals */
require get_template_directory() . '/inc/globals-ff.php';

/** Enqueue Scripts */
require get_template_directory() . '/inc/enqueue-ff.php';

/** Set custom theme image sizes */
require get_template_directory() . '/inc/image-sizes-ff.php';

/** Register Widgets */
require get_template_directory() . '/inc/widgets-ff.php';

/** Custom Fonts */
require get_template_directory() . '/inc/fonts-ff.php';

/** Implement the Custom Header feature. */
require get_template_directory() . '/inc/custom-header.php';

/** navigation. */
require get_template_directory() . '/inc/navigation-ff.php';
require get_template_directory() . '/inc/class-foundryforged-mobile-walker.php';
require get_template_directory() . '/inc/class-foundryforged-top-bar-walker.php';

/** Custom template tags for this theme. */
require get_template_directory() . '/inc/template-tags.php';

/** Functions which enhance the theme by hooking into WordPress. */
require get_template_directory() . '/inc/template-functions.php';

/** Customizer additions. */
require get_template_directory() . '/inc/customizer.php';

/** Load svg icon functions */
require get_template_directory() . '/inc/svg-functions.php';

/** Load Jetpack compatibility file. */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/** Load WooCommerce compatibility file. */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}