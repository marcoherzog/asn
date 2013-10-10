<?php
?><!DOCTYPE html>
<!--[if IE 6]>
<html id="ie6" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 7]>
<html id="ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html id="ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?> class="no-js">
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'twentyeleven' ), max( $paged, $page ) );

	?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="shortcut icon" type="image/x-icon" href="<?php bloginfo("template_url"); ?>/images/favicon.png">
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<!--[if lte IE 7]>
<link href="<?php echo get_template_directory_uri(); ?>/css/_iefix.css" rel="stylesheet" type="text/css" />
<![endif]-->

<!--[if gte IE 9]>
  <style type="text/css">
    * {
       filter: none !important;
    }
  </style>
<![endif]-->

<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<?php
	/* We add some JavaScript to pages with the comment form
	 * to support sites with threaded comments (when in use).
	 */
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	/* Always have wp_head() just before the closing </head>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to add elements to <head> such
	 * as styles, scripts, and meta tags.
	 */
	wp_head();
?>

<?php //http://code.google.com/apis/libraries/devguide.html#jquery ?>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript" src="<?php bloginfo("template_url"); ?>/js/jquery.scrollTo-1.4.2-min.js"></script>
<script type="text/javascript">
  var $j = jQuery.noConflict();
  $j(document).ready(function(){
    $j('div#stage').scrollTo('#content nav');
  });
</script>

<?php // START HEADER FADER ?>
<script type="text/javascript">// <![CDATA[
  <?php // transform php-object to javascript-object src: http://halgatewood.com/wordpress-get-or-query-all-header-images/
  $headers = get_uploaded_header_images();
  $js_array = json_encode($headers);
  echo "var headers = ". $js_array . ";\n";
  ?>
// ]]></script>
<script src="<?php bloginfo("template_url"); ?>/js/na-headerbg-fader.js"></script>
<?php // END HEADER FADER ?>

<?php if(false): //only for iOS webkit see below !!!Modernizr updated manually ?>
<?php //scrolling on iOS >> http://cubiq.org/iscroll-4 ?>
<script type="application/javascript" src="<?php bloginfo("template_url"); ?>/js/iscroll/src/iscroll-lite.js"></script>
<script type="application/javascript" src="<?php bloginfo("template_url"); ?>/js/na-init-iscroll.js"></script>
<?php endif; ?>

<script type="application/javascript">
  // http://stackoverflow.com/a/6593104/874048
  // Mobile Webkit
  Modernizr.addTest('mobile', function(){
  return RegExp(" Mobile/").test(navigator.userAgent);
  });
  
  Modernizr.load([
  {
    test: Modernizr.mobile,
    yep: ['<?php bloginfo("template_url"); ?>/js/iscroll/src/iscroll-lite.js','<?php bloginfo("template_url"); ?>/js/na-init-iscroll.js']
  }]);  
</script>
<script type="text/javascript" src="<?php bloginfo("template_url"); ?>/js/firstlast.js"></script>

</head>

<body <?php body_class(); ?>>
  
  <div id="stage">
  <div><?php //scroller-element >> first element after stage will be be scrolled ?>
    <header>
      <div class="na-wrapper">
        <div class="na-wbox">

          <hgroup>
            <h1 id="site-title"><span><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></span></h1>
            <h2 id="site-description"><?php bloginfo( 'description' ); ?></h2>
            <a id="site-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?> - Startseite" rel="home"></a>
          </hgroup>
      
<?php if(false): ?>
          <div class="social-bookmarks">
            <div>
              <div id="fb-root"></div>
              <script>(function(d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) return;
                js = d.createElement(s); js.id = id;
                js.src = "//connect.facebook.net/de_DE/all.js#xfbml=1&appId=177045079075304";
                fjs.parentNode.insertBefore(js, fjs);
              }(document, 'script', 'facebook-jssdk'));</script>
              <div class="fb-like" data-href="http://www.julia-und-marco.de" data-send="false" data-layout="button_count" data-width="120" data-show-faces="false" data-font="lucida grande"></div>
            </div>
          </div>   
<?php endif; ?>
             
          <nav role="navigation" class="site">
            <h3 class="assistive-text"><?php _e( 'Main menu', 'twentyeleven' ); ?></h3>
            <?php /*  Allow screen readers / text browsers to skip the navigation menu and get right to the good stuff. */ ?>
            <div class="skip-link"><a class="assistive-text" href="#content" title="<?php esc_attr_e( 'Skip to primary content', 'twentyeleven' ); ?>"><?php _e( 'Skip to primary content', 'twentyeleven' ); ?></a></div>
            <div class="skip-link"><a class="assistive-text" href="#secondary" title="<?php esc_attr_e( 'Skip to secondary content', 'twentyeleven' ); ?>"><?php _e( 'Skip to secondary content', 'twentyeleven' ); ?></a></div>
            <?php /* Our navigation menu.  If one isn't filled out, wp_nav_menu falls back to wp_page_menu. The menu assiged to the primary position is the one used. If none is assigned, the menu with the lowest ID is used. */ ?>
            <?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
          </nav>
          
          <div class="topmenu">
            <nav role="navigation" class="top">
              <h3 class="assistive-text"><?php _e( 'Top menu', 'twentyeleven' ); ?></h3>
              <?php wp_nav_menu( array( 'theme_location' => 'top' ) ); ?>
            </nav>
            <div class="sitesearch">
              <?php get_search_form(); ?>
            </div>
          </div>
          
<?php if(false): ?>
          <nav role="navigation" class="top">
            <h3 class="assistive-text"><?php _e( 'Top menu', 'twentyeleven' ); ?></h3>
            <?php wp_nav_menu( array( 'theme_location' => 'top' ) ); ?>
          </nav>
<?php endif; ?>
          
        </div>
      </div>
    </header>
    <div id="main">
  
  

<?php if(false): ?>
<div id="page" class="hfeed">
  
	<header id="branding" role="banner">

			<?php
				// Check to see if the header image has been removed
				$header_image = get_header_image();
				if ( ! empty( $header_image ) ) :
			?>
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
				<?php
					// The header image
					// Check if this is a post or page, if it has a thumbnail, and if it's a big one
					if ( is_singular() &&
							has_post_thumbnail( $post->ID ) &&
							( /* $src, $width, $height */ $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), array( HEADER_IMAGE_WIDTH, HEADER_IMAGE_WIDTH ) ) ) &&
							$image[1] >= HEADER_IMAGE_WIDTH ) :
						// Houston, we have a new header image!
						echo get_the_post_thumbnail( $post->ID, 'post-thumbnail' );
					else : ?>
					<img src="<?php header_image(); ?>" width="<?php echo HEADER_IMAGE_WIDTH; ?>" height="<?php echo HEADER_IMAGE_HEIGHT; ?>" alt="" />
				<?php endif; // end check for featured image or standard header ?>
			</a>
			<?php endif; // end check for removed header image ?>

			<?php
				// Has the text been hidden?
				if ( 'blank' == get_header_textcolor() ) :
			?>
				<div class="only-search<?php if ( ! empty( $header_image ) ) : ?> with-image<?php endif; ?>">
				<?php get_search_form(); ?>
				</div>
			<?php
				else :
			?>
				<?php get_search_form(); ?>
			<?php endif; ?>

	</header><!-- #branding -->


	<div id="main">
<?php endif; ?>