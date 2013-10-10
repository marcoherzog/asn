<?php
/**
 * The template for displaying content featured in the showcase.php page template
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */

global $feature_class;
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( $feature_class ); ?>>
  <header>
    <h1 class=""><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'twentyeleven' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
  </header>

	<div class="summary">
    <?php //the_excerpt(); ?>
    <?php the_content(); ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'twentyeleven' ) . '</span>', 'after' => '</div>' ) ); ?>
	</div>

  <footer class="na-clearfix">
    <?php edit_post_link( __( 'Edit', 'twentyeleven' ), '<span class="edit-link">', '</span>' ); ?>
  </footer>
</article><!-- #post-<?php the_ID(); ?> -->
