<?php
/**
 * Template Name: HOME
 * Description: 
 */

get_header('home'); ?>

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

                <?php while ( have_posts() ) : the_post(); ?>
        
                  <?php get_template_part( 'content', 'page' ); ?>
        
                  <?php comments_template( '', true ); ?>
        
                <?php endwhile; // end of the loop. ?>

              </section><!-- #content -->
            </div>
            
            <?php get_sidebar(); ?>

          </div>  
          
        </div>
      </div>

<?php get_footer(); ?>