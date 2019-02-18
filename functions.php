<?php
/**
 * Foundry Forged functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Foundry_Forged
 * @since Foundry_Forged 1.0.0
 */

/** Clean up Wordpress head, dashboard, widgets, and amin areas. Edit as needed. */
require get_template_directory() . '/inc/clean-wp.php';

/** Start up Foundry Forged Theme */
require get_template_directory() . '/inc/startup-ff.php';

/** Set globals */
require get_template_directory() . '/inc/globals-ff.php';

/** Set custom theme image sizes */
require get_template_directory() . '/inc/image-sizes-ff.php';

/** Register Widgets */
require get_template_directory() . '/inc/widgets-ff.php';

/** Custom Fonts */
require get_template_directory() . '/inc/fonts-ff.php';



// Check to see if rev-manifest exists for CSS and JS static asset revisioning
//https://github.com/sindresorhus/gulp-rev/blob/master/integration.md

if ( ! function_exists( 'foundryforged_asset_path' ) ) :
	function foundryforged_asset_path( $filename ) {
		$filename_split = explode( '.', $filename );
		$dir            = end( $filename_split );
		$manifest_path  = dirname( dirname( __FILE__ ) ) . '/dist/assets/' . $dir . '/rev-manifest.json';

		if ( file_exists( $manifest_path ) ) {
			$manifest = json_decode( file_get_contents( $manifest_path ), true );
		} else {
			$manifest = array();
		}

		if ( array_key_exists( $filename, $manifest ) ) {
			return $manifest[ $filename ];
		}
		return $filename;
	}
endif;


/**
 * Enqueue scripts and styles.
 */
function foundryforged_scripts() {
	// enqueue google fonts. if changed adjust sass > variables-site > _typography.scss
  wp_enqueue_style('foundryforged-fonts', foundryforged_fonts_url());
	
	wp_enqueue_style( 'foundryforged-style', get_stylesheet_uri() );

	/*
	* below enqueues are commented out in lieu of bundle.js when using webpack for production builds. If webpack is not desiered reverse commented out enqueues.
	*/

	// wp_enqueue_script( 'foundryforged-navigation', get_template_directory_uri() . '/js/navigation.js', array('jquery'), '20151215', true );

	// wp_enqueue_script( 'foundryforged-functions', get_template_directory_uri() . '/js/functions.js', array('jquery'), '20151215', true );

	// wp_enqueue_script( 'foundryforged-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	// wp_enqueue_script( 'bundle', get_stylesheet_directory_uri() . '/dist/bundle.js', array('jquery'), 1, false );

	/*
	* End Webpack comments
	*/

	// new foundation set up 

		// Enqueue the main Stylesheet.
		wp_enqueue_style( 'main-stylesheet', get_stylesheet_directory_uri() . '/dist/assets/css/' . foundryforged_asset_path( 'app.css' ), array(), '2.10.4', 'all' );

		// Deregister the jquery version bundled with WordPress.
		wp_deregister_script( 'jquery' );

		// CDN hosted jQuery placed in the header, as some plugins require that jQuery is loaded in the header.
		wp_enqueue_script( 'jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js', array(), '3.2.1', false );

		// Deregister the jquery-migrate version bundled with WordPress.
		wp_deregister_script( 'jquery-migrate' );

		// CDN hosted jQuery migrate for compatibility with jQuery 3.x
		wp_register_script( 'jquery-migrate', '//code.jquery.com/jquery-migrate-3.0.1.min.js', array('jquery'), '3.0.1', false );

		// Enqueue jQuery migrate. Uncomment the line below to enable.
		// wp_enqueue_script( 'jquery-migrate' );

		// Enqueue Foundation scripts
		wp_enqueue_script( 'foundation', get_stylesheet_directory_uri() . '/dist/assets/js/' . foundryforged_asset_path( 'app.js' ), array( 'jquery' ), '2.10.4', true );

		// Enqueue FontAwesome from CDN. Uncomment the line below if you need FontAwesome.
		//wp_enqueue_script( 'fontawesome', 'https://use.fontawesome.com/5016a31c8c.js', array(), '4.7.0', true );

		// end that stuff
	
	wp_localize_script( 'foundryforged-navigation', 'foundryforgedScreenReaderText', array(
		'expand' => __( 'Expand child menu', 'foundryforged'),
		'collapse' => __( 'Collapse child menu', 'foundryforged'),
	));


	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'foundryforged_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Extra features.
 */
// require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}

/**
 * Load svg icon functions
 */
require get_template_directory() . '/inc/svg-functions.php';


