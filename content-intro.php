<?php
/**
 * The template for displaying page content in the showcase.php page template
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'intro' ); ?>>
<?php if(false): ?>
	<header>
		<h1><?php the_title(); ?></h1>
	</header>
<?php endif; ?>

	<div>
		<?php the_content(); ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'twentyeleven' ) . '</span>', 'after' => '</div>' ) ); ?>
	</div>

  <footer class="na-clearfix">
    <?php edit_post_link( __( 'Edit', 'twentyeleven' ), '<span class="edit-link">', '</span>' ); ?>
  </footer>
</article><!-- #post-<?php the_ID(); ?> -->
