<?php
/**
 * The template for displaying content in the single.php template
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header>
		<h1><?php the_title(); ?></h1>
    <div class="date"><?php echo get_the_date('j. M. Y'); ?></div>
    <?php 
      // Plugin: Twitter Facebook Social Share
      if(function_exists('kc_add_social_share')) kc_add_social_share(); 
     ?>
	</header>

	<div>
		<?php the_content(); ?>
	</div>

  <footer class="na-clearfix">
		<?php edit_post_link( __( 'Edit', 'twentyeleven' ), '<span class="edit-link">', '</span>' ); ?>
	</footer>
</article><!-- #post-<?php the_ID(); ?> -->
