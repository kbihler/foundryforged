<?php
/**
 * Register Menus
 *
 * @link http://codex.wordpress.org/Function_Reference/register_nav_menus#Examples
 * @package foundryforged
 * @since foundryforged 1.0.0
 */

register_nav_menus(
	array(
		'top-bar-r'  => esc_html__( 'Right Top Bar', 'foundryforged' ),
		'mobile-nav' => esc_html__( 'Mobile', 'foundryforged' ),
	)
);


/**
 * Desktop navigation - right top bar
 *
 * @link http://codex.wordpress.org/Function_Reference/wp_nav_menu
 */
if ( ! function_exists( 'foundryforged_top_bar_r' ) ) {
	function foundryforged_top_bar_r() {
		wp_nav_menu(
			array(
				'container'      => false,
				'menu_class'     => 'dropdown menu',
				'items_wrap'     => '<ul id="%1$s" class="%2$s desktop-menu" data-dropdown-menu>%3$s</ul>',
				'theme_location' => 'top-bar-r',
				'depth'          => 3,
				'fallback_cb'    => false,
				'walker'         => new foundryforged_Top_Bar_Walker(),
			)
		);
	}
}


/**
 * Mobile navigation - topbar (default) or offcanvas
 */
if ( ! function_exists( 'foundryforged_mobile_nav' ) ) {
	function foundryforged_mobile_nav() {
		wp_nav_menu(
			array(
				'container'      => false,                         // Remove nav container
				'menu'           => __( 'mobile-nav', 'foundryforged' ),
				'menu_class'     => 'vertical menu',
				'theme_location' => 'mobile-nav',
				'items_wrap'     => '<ul id="%1$s" class="%2$s" data-accordion-menu data-submenu-toggle="true">%3$s</ul>',
				'fallback_cb'    => false,
				'walker'         => new foundryforged_Mobile_Walker(),
			)
		);
	}
}


/**
 * Add support for buttons in the top-bar menu:
 * 1) In WordPress admin, go to Apperance -> Menus.
 * 2) Click 'Screen Options' from the top panel and enable 'CSS CLasses' and 'Link Relationship (XFN)'
 * 3) On your menu item, type 'has-form' in the CSS-classes field. Type 'button' in the XFN field
 * 4) Save Menu. Your menu item will now appear as a button in your top-menu
*/
if ( ! function_exists( 'foundryforged_add_menuclass' ) ) {
	function foundryforged_add_menuclass( $ulclass ) {
		$find    = array( '/<a rel="button"/', '/<a title=".*?" rel="button"/' );
		$replace = array( '<a rel="button" class="button"', '<a rel="button" class="button"' );

		return preg_replace( $find, $replace, $ulclass, 1 );
	}
	add_filter( 'wp_nav_menu', 'foundryforged_add_menuclass' );
}

if ( ! function_exists( 'wpt_register_theme_customizer' ) ) :
	function wpt_register_theme_customizer( $wp_customize ) {

		// Create custom panels
		$wp_customize->add_panel(
			'mobile_menu_settings', array(
				'priority'       => 1000,
				'theme_supports' => '',
				'title'          => __( 'Mobile Menu Settings', 'foundryforged' ),
				'description'    => __( 'Controls the mobile menu', 'foundryforged' ),
			)
		);

		// Create custom field for mobile navigation layout
		$wp_customize->add_section(
			'mobile_menu_layout', array(
				'title'    => __( 'Mobile navigation layout', 'foundryforged' ),
				'panel'    => 'mobile_menu_settings',
				'priority' => 1000,
			)
		);

		// Set default navigation layout
		$wp_customize->add_setting(
			'wpt_mobile_menu_layout',
			array(
				'default' => __( 'topbar', 'foundryforged' ),
			)
		);

		// Add options for navigation layout
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'mobile_menu_layout',
				array(
					'type'     => 'radio',
					'section'  => 'mobile_menu_layout',
					'settings' => 'wpt_mobile_menu_layout',
					'choices'  => array(
						'topbar'    => 'Topbar',
						'offcanvas' => 'Offcanvas',
					),
				)
			)
		);

	}

	add_action( 'customize_register', 'wpt_register_theme_customizer' );

	// Add class to body to help w/ CSS
	add_filter( 'body_class', 'mobile_nav_class' );
	function mobile_nav_class( $classes ) {
		if ( ! get_theme_mod( 'wpt_mobile_menu_layout' ) || get_theme_mod( 'wpt_mobile_menu_layout' ) === 'topbar' ) :
			$classes[] = 'topbar';
		elseif ( get_theme_mod( 'wpt_mobile_menu_layout' ) === 'offcanvas' ) :
			$classes[] = 'offcanvas';
		endif;
		return $classes;
	}
endif;
