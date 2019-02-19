<?php
/**
 * Foundry Forged start up functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Foundry_Forged
 * @since Foundry_Forged 1.0.0
 */

if ( ! function_exists( 'foundryforged_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function foundryforged_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Foundry Forged, use a find and replace
		 * to change 'foundryforged' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'foundryforged', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );
		add_image_size( 'foundryforged-full-bleed', 2000, 1200, true );
		add_image_size( 'foundryforged-imdex-img', 1600, 1000, true );


		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'foundryforged' ),
			'menu-2' => esc_html__( 'Footer', 'foundryforged' ),
			'social' => esc_html__( 'Social', 'foundryforged' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'foundryforged_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );

		/* editor style */
		add_editor_style( array('inc/editor-styles.css', foundryforged_fonts_url()));
	}
endif;
add_action( 'after_setup_theme', 'foundryforged_setup' );

/**
 * A fallback when no navigation is selected by default.
 */

if ( ! function_exists( 'foundryforged_menu_fallback' ) ) :
	function foundryforged_menu_fallback() {
		echo '<div class="alert-box secondary">';
		/* translators: %1$s: link to menus, %2$s: link to customize. */
		printf(
			__( 'Please assign a menu to the primary menu location under %1$s or %2$s the design.', 'foundryforged' ),
			/* translators: %s: menu url */
			sprintf(
				__( '<a href="%s">Menus</a>', 'foundryforged' ),
				get_admin_url( get_current_blog_id(), 'nav-menus.php' )
			),
			/* translators: %s: customize url */
			sprintf(
				__( '<a href="%s">Customize</a>', 'foundryforged' ),
				get_admin_url( get_current_blog_id(), 'customize.php' )
			)
		);
		echo '</div>';
	}
endif;

// Add Foundation 'is-active' class for the current menu item.
if ( ! function_exists( 'foundryforged_active_nav_class' ) ) :
	function foundryforged_active_nav_class( $classes, $item ) {
		if ( $item->current == 1 || $item->current_item_ancestor == true ) {
			$classes[] = 'is-active';
		}
		return $classes;
	}
	add_filter( 'nav_menu_css_class', 'foundryforged_active_nav_class', 10, 2 );
endif;

/**
 * Use the is-active class of ZURB Foundation on wp_list_pages output.
 * From required+ Foundation http://themes.required.ch.
 */
if ( ! function_exists( 'foundryforged_active_list_pages_class' ) ) :
	function foundryforged_active_list_pages_class( $input ) {

		$pattern = '/current_page_item/';
		$replace = 'current_page_item is-active';

		$output = preg_replace( $pattern, $replace, $input );

		return $output;
	}
	add_filter( 'wp_list_pages', 'foundryforged_active_list_pages_class', 10, 2 );
endif;

/**
 * Get mobile menu ID
 */

if ( ! function_exists( 'foundryforged_mobile_menu_id' ) ) :
	function foundryforged_mobile_menu_id() {
		if ( get_theme_mod( 'wpt_mobile_menu_layout' ) === 'offcanvas' ) {
			echo 'off-canvas-menu';
		} else {
			echo 'mobile-menu';
		}
	}
endif;

/**
 * Get title bar responsive toggle attribute
 */

if ( ! function_exists( 'foundryforged_title_bar_responsive_toggle' ) ) :
	function foundryforged_title_bar_responsive_toggle() {
		if ( ! get_theme_mod( 'wpt_mobile_menu_layout' ) || get_theme_mod( 'wpt_mobile_menu_layout' ) === 'topbar' ) {
			echo 'data-responsive-toggle="mobile-menu"';
		}
	}
endif;
