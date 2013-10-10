<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 */

get_header('home'); 
?>

<?php
//http://wordpress.org/support/topic/pagination-not-working-for-categories-with-wp-30
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
//http://codex.wordpress.org/Function_Reference/query_posts#Example_1
//http://wpml.org/documentation/support/creating-multilingual-wordpress-themes/language-dependent-ids/
$category_id = get_cat_ID('News');
query_posts($query_string . '&posts_per_page=4&cat='.icl_object_id($category_id, 'category', false).'&paged=' . $paged);
?>

      <div class="na-wrapper">
        <div class="na-wbox content">

          <div class="partner-logos">

            <?php 
              $page = get_page_by_title( 'Partner-Logos' );
              $page_id = $page->ID;
              $lang_id = lang_page_id($page_id);
              $lang_page = get_page( $lang_id ); 
              $content = $lang_page->post_content; 
              if ( get_post_status ( $page_id ) == 'publish' ) echo $content;
            ?> 
          </div>
          <div class="na-column23">
            <div class="na-col2">
              <section id="content" class="na-cbox" role="main">

<?php if ( have_posts() ) : ?>

  <?php //na_content_nav( 'nav-above' ); ?>

                  <?php /* Start the Loop */ ?>
                    <section>
                  <?php while ( have_posts() ) : the_post(); ?>
                        <?php get_template_part( 'content', 'home' ); ?>
                  <?php endwhile; ?>
                    </section>

                  <?php get_pagination ('4'); ?>
  <?php //na_content_nav( 'nav-below' ); ?>

<?php else : ?>

  <article id="post-0" class="post no-results not-found">
    <header>
      <h1><?php _e( 'Nothing Found', 'twentyeleven' ); ?></h1>
    </header>

    <div>
      <p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'twentyeleven' ); ?></p>
      <?php get_search_form(); ?>
    </div>
  </article><!-- #post-0 -->

<?php endif; ?>

              </section><!-- #content -->
            </div>
            
            <?php get_sidebar(); ?>

          </div>  
          
        </div>
      </div>

<?php get_footer(); ?>