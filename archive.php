<?php

/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Foundry_Forged
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();
?>

	<?php if (have_posts()) : ?>
	<div id="primary" class="main-container">
		<div class="main-grid">
		<?php if ( is_active_sidebar( 'sidebar-1' ) ) { ?>
      <main id="main" class="main-content">
    <?php } else { ?>
      <main id="main" class="main-content-full-width">
    <?php } ?>

		<header class="page-header">
			<?php
				the_archive_title('<h1 class="page-title">', '</h1>');
				the_archive_description('<div class="archive-description">', '</div>');
			?>
		</header><!-- .page-header -->
	<?php endif; ?>

		<?php if (have_posts()) : ?>
			<?php
			/* Start the Loop */
		while (have_posts()) :
			the_post();

				/*
		 * Include the Post-Type-specific template for the content.
		 * If you want to override this in a child theme, then include a file
		 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
		 */
		get_template_part('template-parts/content', get_post_type());

		endwhile;

		// the_posts_navigation();
		the_posts_pagination( array(
			'prev_text' => __('Newer', 'foundryforged'),
			'next_text' => __('Older', 'foundryforged'),
			'before_page_number' => '<span class="screen-reader-text">' . __('Page ', 'foundryforged') . '</span>'
		));

		else :

			get_template_part('template-parts/content', 'none');

		endif;
		?>

		</main><!-- #main -->
	</div>
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
