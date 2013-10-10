<?php
/**
 * The template for displaying Category Archive pages.
 */
?>

<?php

if (is_category('Events') || is_category('Events @de') || is_category('Events @az') || is_category('Events @en')):
  
//http://wordpress.org/support/topic/pagination-not-working-for-categories-with-wp-30
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
query_posts($query_string . '&posts_per_page=50&paged=' . $paged . '&orderby=date&order=ASC&post_status=future');
?>

<?php get_header(); ?>

      <div class="na-wrapper">
        <div class="na-wbox content events">
          
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
                        <?php get_template_part( 'content', 'events' ); ?>
                  <?php endwhile; ?>

  <?php na_content_nav( 'nav-below' ); ?>

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

<?php

elseif (is_category('Coworking') || is_category('Coworking @de') || is_category('Coworking @az') || is_category('Coworking @en')): ?>
  
<?php get_header('coworking'); ?>

<?php
//http://wordpress.org/support/topic/pagination-not-working-for-categories-with-wp-30
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
//http://codex.wordpress.org/Function_Reference/query_posts#Example_1
//http://wpml.org/documentation/support/creating-multilingual-wordpress-themes/language-dependent-ids/
$category_id = get_cat_ID('Coworking');
query_posts($query_string . '&posts_per_page=10&cat='.icl_object_id($category_id, 'category', false).'&paged=' . $paged);
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
                      <?php $counter = 0; ?>
                        <?php while ( have_posts() ) : the_post(); ?>
                          <div class="count<?php echo $counter++ ?>">
                              <?php get_template_part( 'content', 'coworking' ); ?>
                          </div>
                        <?php endwhile; ?>                        
                    </section>

  <?php na_content_nav( 'nav-below' ); ?>

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

<?php
else:
  
//http://wordpress.org/support/topic/pagination-not-working-for-categories-with-wp-30
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
query_posts($query_string . '&posts_per_page=5&paged=' . $paged);
?>

<?php get_header(); ?>


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

                <header>
                  <h1 class="page-title"><?php
                    printf( __( '%s', 'twentyeleven' ), '<span>' . single_cat_title( '', false ) . '</span>' );
                  ?></h1>
        
                  <?php
                    $category_description = category_description();
                    if ( ! empty( $category_description ) )
                      echo apply_filters( 'category_archive_meta', '<div class="">' . $category_description . '</div>' );
                  ?>
                </header>

                <?php if ( have_posts() ) : ?>
          
                  <?php //na_content_nav( 'nav-above' ); ?>

                  <?php /* Start the Loop */ ?>
                  <?php $counter = 0;?>
                    <section>
                  <?php while ( have_posts() ) : the_post(); ?>
                      <?php $counter++;?>
                      <?php if ( $counter == 1 && $paged < 2 ): ?>
                        <?php get_template_part( 'content', get_post_format() ); ?>
                      <?php else: ?>
                        <?php get_template_part( 'content', 'excerpt' ); ?>
                      <?php endif; ?>
                  <?php endwhile; ?>
                    </section>
          
                  <?php na_content_nav( 'nav-below' ); ?>
          
                <?php else : ?>
          
                  <article id="post-0" class="">
                    <header>
                      <h1><?php _e( 'Nothing Found', 'twentyeleven' ); ?></h1>
                    </header><!-- .entry-header -->
          
                    <div>
                      <p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'twentyeleven' ); ?></p>
                      <?php get_search_form(); ?>
                    </div><!-- .entry-content -->
                  </article><!-- #post-0 -->
          
                <?php endif; ?>

              </section><!-- #content -->
            </div>
            
            <?php get_sidebar(); ?>

          </div>  
          
        </div>
      </div>


<?php get_footer(); ?>

<?php
endif;
?>
