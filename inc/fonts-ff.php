<?php
/**
 * Register custom fonts.
 * @package Foundry_Forged
 * @since Foundry_Forged 1.0.0
 */
function foundryforged_fonts_url() {
	$fonts_url = '';

	/*
	 * Translators: If there are characters in your language that are not
	 * supported by Anton, Roboto Condensed, and Roboto, translate this to 'off'. Do not translate
	 * into your own language.
	 * https://fonts.googleapis.com/css?family=Anton|Roboto+Condensed:400,700|Roboto:300,400
	 */
	$anton = _x( 'on', 'Anton font: on or off', 'foundryforged' );
	$roboto_condensed = _x( 'on', 'Roboto Condensed font: on or off', 'foundryforged' );
	$roboto = _x( 'on', 'Roboto font: on or off', 'foundryforged' );

	$font_families = array();

	if ( 'off' !== $anton ) {

		$font_families[] = 'Anton';
	}

	if ( 'off' !== $roboto_condensed ) {

		$font_families[] = 'Roboto+Condensed:400,700';
	}

	if ( 'off' !== $roboto ) {

		$font_families[] = 'Roboto:300,400';
	}

	if ( in_array( 'on', array($anton, $roboto_condensed, $roboto)) ) {

		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);

		$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	}

	return esc_url_raw( $fonts_url );
}

/**
 * Add preconnect for Google Fonts.
 *
 * @since Foundry Forged 1.0
 *
 * @param array  $urls           URLs to print for resource hints.
 * @param string $relation_type  The relation type the URLs are printed.
 * @return array $urls           URLs to print for resource hints.
 */
function foundryforged_resource_hints( $urls, $relation_type ) {
	if ( wp_style_is( 'foundryforged-fonts', 'queue' ) && 'preconnect' === $relation_type ) {
		$urls[] = array(
			'href' => 'https://fonts.gstatic.com',
			'crossorigin',
		);
	}

	return $urls;
}
add_filter( 'wp_resource_hints', 'foundryforged_resource_hints', 10, 2 );
