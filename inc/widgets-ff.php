<?php
/**
 * Foundry Forged functions and definitions
 * Register widget area.
 * @package Foundry_Forged
 * @since Foundry_Forged 1.0.0
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function foundryforged_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'foundryforged' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'foundryforged' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widgets', 'foundryforged' ),
		'id'            => 'footer-1',
		'description'   => esc_html__( 'Add widgets here.', 'foundryforged' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Left Widgets', 'foundryforged' ),
		'id'            => 'left-1',
		'description'   => esc_html__( 'Add widgets here.', 'foundryforged' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

}
add_action( 'widgets_init', 'foundryforged_widgets_init' );
