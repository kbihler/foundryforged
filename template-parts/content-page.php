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

	<!-- test fondation -->
	<!-- This demo uses flex grid but you can use float grid too -->

<div class="row">
  <div class="columns">
    <h2>Accordion</h2>
    <p>Accordions lets you organize and navigate multiple documents in a single container. Highly useful for switching between items in the container specially when you have a large amount of content.</p>
  </div>
</div>

<div class="row">
  <div class="columns">
    <ul class="accordion" data-accordion>
  <li class="accordion-item is-active" data-accordion-item>
    <a href="#" class="accordion-title">Accordion 1</a>
    <div class="accordion-content" data-tab-content >
      <p>Panel 1. Lorem ipsum dolor</p>
      <a href="#">Nowhere to Go</a>
    </div>
  </li>
  <li class="accordion-item" data-accordion-item>
    <a href="#" class="accordion-title">Accordion 2</a>
    <div class="accordion-content" data-tab-content>
      <textarea></textarea>
      <button class="button">I do nothing!</button>
    </div>
  </li>
  <li class="accordion-item" data-accordion-item>
    <a href="#" class="accordion-title">Accordion 3</a>
    <div class="accordion-content" data-tab-content>
      Type your name!
      <input type="text"></input>
    </div>
  </li>
</ul>
  </div>
</div>
<!-- end -->


	<?php foundryforged_post_thumbnail(); ?>

	<section class="post-content">

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
	</section>
	<?php get_sidebar('left'); ?>
</article><!-- #post-<?php the_ID(); ?> -->
