<?php get_header('image-page'); ?>

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
          <div class="na-column">
            <div class="na-col2">
              <div id="content" class="na-cbox image-page" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<nav class="na-nav">
					<h3 class="assistive-text"><?php _e( 'Image navigation', 'twentyeleven' ); ?></h3>

              <p>
                <?php
                  $metadata = wp_get_attachment_metadata();
                  //printf( __( '<span class="meta-prep meta-prep-entry-date">Published </span> <span class="entry-date"><abbr class="published" title="%1$s">%2$s</abbr></span> at <a href="%3$s" title="Link to full-size image">%4$s &times; %5$s</a> in <a href="%6$s" title="Return to %7$s" rel="gallery">%8$s</a>', 'twentyeleven' ),
                  printf( __( '<a href="%6$s" title="Return to %7$s" rel="gallery">&lt;&lt;&nbsp;Zurück zum Artikel</a>', 'twentyeleven' ),
                    esc_attr( get_the_time() ),
                    get_the_date(),
                    esc_url( wp_get_attachment_url() ),
                    $metadata['width'],
                    $metadata['height'],
                    esc_url( get_permalink( $post->post_parent ) ),
                    esc_attr( strip_tags( get_the_title( $post->post_parent ) ) ),
                    get_the_title( $post->post_parent )
                  );
                ?>
                <?php //edit_post_link( __( 'Edit', 'twentyeleven' ), '<span class="edit-link">', '</span>' ); ?>
              </p>

					<span class="nav-previous"><?php previous_image_link( false, __( '&larr; Previous' , 'twentyeleven' ) ); ?></span>
					<span class="nav-next"><?php next_image_link( false, __( 'Next &rarr;' , 'twentyeleven' ) ); ?></span>
				</nav><!-- #nav-single -->

					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <?php //if(function_exists('kc_add_social_share')) kc_add_social_share(); ?>
						<header>
							<h1 class="page-title assistive-text"><?php the_title(); ?></h1>

						</header>

						<div class="entry-content">

							<div class="entry-attachment">
								<div class="attachment">
<?php
	/**
	 * Grab the IDs of all the image attachments in a gallery so we can get the URL of the next adjacent image in a gallery,
	 * or the first image (if we're looking at the last image in a gallery), or, in a gallery of one, just the link to that image file
	 */
	$attachments = array_values( get_children( array( 'post_parent' => $post->post_parent, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => 'ASC', 'orderby' => 'menu_order ID' ) ) );
	foreach ( $attachments as $k => $attachment ) {
		if ( $attachment->ID == $post->ID )
			break;
	}
	$k++;
	// If there is more than 1 attachment in a gallery
	if ( count( $attachments ) > 1 ) {
		if ( isset( $attachments[ $k ] ) )
			// get the URL of the next image attachment
			$next_attachment_url = get_attachment_link( $attachments[ $k ]->ID );
		else
			// or get the URL of the first image attachment
			$next_attachment_url = get_attachment_link( $attachments[ 0 ]->ID );
	} else {
		// or, if there's only 1 image, get the URL of the image
		$next_attachment_url = wp_get_attachment_url();
	}
?>
									<a target="_blank" href="<?php echo esc_url( $next_attachment_url ); ?>" title="<?php the_title_attribute(); ?>" rel="attachment"><?php
									$attachment_size = apply_filters( 'twentyeleven_attachment_size', 848 );
									echo wp_get_attachment_image( $post->ID, array( $attachment_size, 1024 ) ); // filterable image width with 1024px limit for image height.
									?></a>

									<?php if ( ! empty( $post->post_excerpt ) ) : ?>
									<div class="entry-caption">
										<?php the_excerpt(); ?>
									</div>
									<?php endif; ?>
								</div><!-- .attachment -->

							</div><!-- .entry-attachment -->

							<div class="entry-description">
								<?php the_content(); ?>
								<?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'twentyeleven' ) . '</span>', 'after' => '</div>' ) ); ?>
							</div><!-- .entry-description -->

						</div><!-- .entry-content -->

					</article><!-- #post-<?php the_ID(); ?> -->

					<?php comments_template(); ?>

				<?php endwhile; // end of the loop. ?>

              </div><!-- #content -->
            </div>
            
            <?php //get_sidebar(); ?>

          </div>  
          
        </div>
      </div>

<?php get_footer(); ?>