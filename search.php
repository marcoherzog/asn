<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */

//http://wordpress.org/support/topic/pagination-not-working-for-categories-with-wp-30
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
query_posts($query_string . '&posts_per_page=10&paged=' . $paged);

?>
<?php get_header('search'); ?>

      <div class="na-wrapper">
        <div class="na-wbox content">
          
          <div class="na-column23">
            <div class="na-col2">
              <div id="content" class="na-cbox search-page" role="main">

			<?php if ( have_posts() ) : ?>

				<header>
				  <div>
            <?php get_search_form(); ?>
				  </div>
					<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'twentyeleven' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
				</header>

				<?php //na_content_nav( 'nav-above' ); ?>

				<?php /* Start the Loop */ ?>
          <section>
				<?php while ( have_posts() ) : the_post(); ?>
          <?php
            /* Include the Post-Format-specific template for the content.
             * If you want to overload this in a child theme then include a file
             * called content-___.php (where ___ is the Post Format name) and that will be used instead.
             */
            get_template_part( 'content', get_post_format() );
          ?>
				<?php endwhile; ?>
          </section>


				<?php na_content_nav( 'nav-below' ); ?>

			<?php else : ?>

				<article id="post-0" class="">
					<header>
						<h1><?php _e( 'Nothing Found', 'twentyeleven' ); ?></h1>
					</header>

					<div>
						<p><?php _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'twentyeleven' ); ?></p>
						<?php get_search_form(); ?>
					</div>
				</article><!-- #post-0 -->

			<?php endif; ?>

              </div><!-- #content -->
            </div>
            
            <?php get_sidebar(); ?>

          </div>  
          
        </div>
      </div>

<?php get_footer(); ?>