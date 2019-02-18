<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Foundry_Forged
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<?php foundryforged_post_thumbnail(); ?>
	<div class="main-grid">
		<?php if ( is_active_sidebar( 'sidebar-1' ) ) { ?>
			<main id="main" class="main-content">
		<?php } else { ?>
			<main id="main" class="main-content-full-width">
		<?php } ?>
		<?php if ( ! is_active_sidebar( 'left-1' ) ) : ?>
			<div class="post-content__wrap">
				<div class="post-content__body">
		<?php endif; ?>
	
			<div class="entry-content">
				<?php
				the_content();

				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'foundryforged' ),
					'after'  => '</div>',
				) );
				?>
			</div><!-- .entry-content -->

			<?php if ( get_edit_post_link() ) : ?>
				<footer class="entry-footer">
					<?php
					edit_post_link(
						sprintf(
							wp_kses(
								/* translators: %s: Name of current post. Only visible to screen readers */
								__( 'Edit <span class="screen-reader-text">%s</span>', 'foundryforged' ),
								array(
									'span' => array(
										'class' => array(),
									),
								)
							),
							get_the_title()
						),
						'<span class="edit-link">',
						'</span>'
					);
					?>
				</footer><!-- .entry-footer -->
			<?php endif; ?>
			<?php if ( ! is_active_sidebar( 'left-1' ) ) : ?>
					</div><!-- end post-content__body -->
				</div><!-- end post-content__wrapper -->
			<?php endif; ?>
			</main>
		<?php get_sidebar('left'); ?>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->