<?php
/**
 * The default template for displaying content
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<header>
			<?php if ( is_sticky() ) : ?>
				<hgroup>
          <h4 class="featured">
            featured
            <?php if(false): ?>
              <?php _e( 'Featured', 'twentyeleven' ); ?>
            <?php endif; ?>
          </h4>
					<h1><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'twentyeleven' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
				</hgroup>
			<?php else : ?>
			  <h1><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'twentyeleven' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
			<?php endif; ?>
		</header>

		<div>
			<?php the_content( __( 'Continue reading <span class="">&rarr;</span>', 'twentyeleven' ) ); ?>
			<?php wp_link_pages( array( 'before' => '<div class=""><span>' . __( 'Pages:', 'twentyeleven' ) . '</span>', 'after' => '</div>' ) ); ?>
		</div>

		<footer class="na-clearfix">
      <?php //if(function_exists('kc_add_social_share')) kc_add_social_share(); ?>
			<?php edit_post_link( __( 'Edit', 'twentyeleven' ), '<span class="edit-link">', '</span>' ); ?>
		</footer>
	</article><!-- #post-<?php the_ID(); ?> -->
