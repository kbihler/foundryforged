<?php
/**
 * Sample implementation of the Custom Header feature
 *
 * You can add an optional custom header image to header.php like so ...
 *
	<?php the_header_image_tag(); ?>
 *
 * @link https://developer.wordpress.org/themes/functionality/custom-headers/
 *
 * @package Foundry_Forged
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses foundryforged_header_style()
 */
function foundryforged_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'foundryforged_custom_header_args', array(
		'default-image'          => '',
		'default-text-color'     => '000000',
		'width'                  => 2000,
		'height'                 => 850,
		'flex-height'            => true,
		'wp-head-callback'       => 'foundryforged_header_style',
	) ) );
}
add_action( 'after_setup_theme', 'foundryforged_custom_header_setup' );