<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
?>

    </div>
    <footer id="fusszeile" name="fusszeile">
      <div class="na-wrapper">
        <div class="na-wbox">

            <?php 
              $page = get_page_by_title( 'Footer' );
              $page_id = $page->ID;
              $lang_id = lang_page_id($page_id);
              $lang_page = get_page( $lang_id ); 
              $content = $lang_page->post_content; 
              echo $content;
            ?> 

          <?php
            /* A sidebar in the footer? Yep. You can can customize
             * your footer with three columns of widgets.
             */
            if ( true || ! is_404() )
              get_sidebar( 'footer' );
          ?>
          
        </div>
      </div>
    </footer>
  </div>
  </div><!-- stage -->


<?php if(false): ?>
<?php //scrolling on iOS >> http://cubiq.org/iscroll-4 ?>
<script type="text/javascript">
var myScroll = new iScroll('stage');
</script>
<?php endif; ?>

<?php wp_footer(); ?>

</body>
</html>