<?php
/**
 * Template Name: Sidebar Template (right/left)
 * Description: A Page Template that adds a sidebar to pages
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */

get_header(); ?>

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
          <div class="na-column123">
            
            <div class="na-col1">
              <div class="na-cbox">

                <div id="secondary" class="widget-area" role="complementary">
                  <?php if ( ! dynamic_sidebar( 'sidebar-2' ) ) : ?>
        
                    <?php
                    the_widget( 'Twenty_Eleven_Ephemera_Widget', '', array( 'before_title' => '<h3 class="widget-title">', 'after_title' => '</h3>' ) );
                    ?>
        
                  <?php endif; // end sidebar widget area ?>
                </div><!-- #secondary .widget-area -->

                <span>&nbsp;</span>
                
              </div>
            </div>
            
            <div class="na-col2">
              <div id="content" class="na-cbox" role="main">

                <?php while ( have_posts() ) : the_post(); ?>
        
                  <?php get_template_part( 'content', 'page' ); ?>
        
                  <?php comments_template( '', true ); ?>
        
                <?php endwhile; // end of the loop. ?>

              </div><!-- #content -->
            </div>
            
            <?php get_sidebar(); ?>

          </div>  
          
        </div>
      </div>

<?php get_footer(); ?>