<?php
/**
 * The sidebar containing the left widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Foundry_Forged
 */

if ( ! is_active_sidebar( 'left-1' )) {
	return;
}
?>

<aside id="left-widget-area" class="widget-area left-widgets" role="complementary">
	<?php dynamic_sidebar( 'left-1' ); ?>
</aside><!-- #secondary -->