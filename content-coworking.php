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
    <?php if ( has_post_thumbnail() ): ?>
      <?php $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large'); ?>
      <div class="teaserimage" style='background-image: url("<?php echo $large_image_url[0]; ?>");'></div>
    <?php else : ?>
      <div class="teaserimage"></div>
    <?php endif; ?>
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

		<footer class="na-clearfix">
			<?php edit_post_link( __( 'Edit', 'twentyeleven' ), '<span class="edit-link">', '</span>' ); ?>
		</footer>
	</article><!-- #post-<?php the_ID(); ?> -->
