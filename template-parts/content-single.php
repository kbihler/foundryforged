<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Foundry_Forged
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php foundryforged_category_list(); ?>
		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		if ( is_active_sidebar( 'sidebar-1' ) ) :
			?>
			<div class="entry-meta">
				<?php
				foundryforged_posted_on();
				foundryforged_posted_by();
				?>
			</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->
 
	<?php foundryforged_post_thumbnail('foundryforged-full-bleed'); ?>

  <?php if ( is_active_sidebar( 'sidebar-1' ) ) { ?>
				<main id="main" class="main-content">
			<?php } else { ?>
				<main id="main" class="main-content-full-width">
			<?php } ?>

  <?php if ( ! is_active_sidebar( 'sidebar-1' ) ) : ?>
        <div class="post-content__wrap">
            <div class="entry-meta">
              <?php
              foundryforged_posted_on();
              foundryforged_posted_by();
              ?>
            </div><!-- .entry-meta -->
          <div class="post-content__body">
  <?php endif; ?>

  <div class="entry-content">
      <?php
      the_content( sprintf(
        wp_kses(
          /* translators: %s: Name of current post. Only visible to screen readers */
          __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'foundryforged' ),
          array(
            'span' => array(
              'class' => array(),
            ),
          )
        ),
        get_the_title()
      ) );

      wp_link_pages( array(
        'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'foundryforged' ),
        'after'  => '</div>',
      ) );
      ?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php foundryforged_entry_footer(); ?>
	</footer><!-- .entry-footer -->

  <?php if ( ! is_active_sidebar( 'sidebar-1' ) ) : ?>
      </div><!-- end post-content__body -->
    </div><!-- end post-content__wrapper -->
  <?php endif; ?>

  <?php 			
  // If comments are open or we have at least one comment, load up the comment template.
        if ( comments_open() || get_comments_number() ) :
          comments_template();
        endif;

        foundryforged_post_navigation();
  ?>
</main>
  <?php get_sidebar(); ?>

</article><!-- #post-<?php the_ID(); ?> -->
