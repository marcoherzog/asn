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
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo("template_url"); ?>/css/home.css" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo("template_url"); ?>/css/_blog.css" />
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

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script src="<?php bloginfo("template_url"); ?>/js/firstlast.js"></script>

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


</head>

<body <?php body_class(); ?>>
  <div id="console"></div>

  <div id="stage">
  <div><?php //scroller-element >> first element after stage will be be scrolled ?>
    <header>
      <?php
        // Check to see if the header image has been removed
        $header_image = get_header_image();
        if ( ! empty( $header_image ) ) :
      ?>
      <div class="na-wrapper" style="background-image: url('<?php header_image(); ?>')" id="slideshow-stage">
      <?php else: // end check for removed header image ?>
      <div class="na-wrapper" id="slideshow-stage">
      <?php endif; // end check for removed header image ?>
      
        <div class="na-wbox">

          <hgroup class="header-bg">
            <h1 id="site-title"><span><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></span></h1>
            <h2 id="site-description"><?php bloginfo( 'description' ); ?></h2>
            <a id="site-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?> - Startseite" rel="home"></a>
            <div id="flags_language_selector" class="flags_language_selector"><?php language_selector_flags(); ?></div >
          </hgroup>
                       
        <div class="navi-wrapper">
          <nav role="navigation" class="site">
            <h3 class="assistive-text"><?php _e( 'Main menu', 'twentyeleven' ); ?></h3>
            <?php /*  Allow screen readers / text browsers to skip the navigation menu and get right to the good stuff. */ ?>
            <div class="skip-link"><a class="assistive-text" href="#content" title="<?php esc_attr_e( 'Skip to primary content', 'twentyeleven' ); ?>"><?php _e( 'Skip to primary content', 'twentyeleven' ); ?></a></div>
            <div class="skip-link"><a class="assistive-text" href="#secondary" title="<?php esc_attr_e( 'Skip to secondary content', 'twentyeleven' ); ?>"><?php _e( 'Skip to secondary content', 'twentyeleven' ); ?></a></div>
            <?php /* Our navigation menu.  If one isn't filled out, wp_nav_menu falls back to wp_page_menu. The menu assiged to the primary position is the one used. If none is assigned, the menu with the lowest ID is used. */ ?>
            <?php wp_nav_menu( array( 
              'theme_location' => 'primary',
              'container_class' => 'primary'
            ) ); ?>
            <?php wp_nav_menu( array( 
              'theme_location' => '2nd-primary',
              'container_class' => 'secondprimary'
            ) ); ?>
          </nav>

          <aside>
            <div class="newsletter-signup header-bg">
              <?php if ( ! dynamic_sidebar( 'sidebar-99' ) ) : ?>
              <?php endif; // end sidebar widget area ?>
            </div>
            <div class="get-connected header-bg">
              <hgroup>
                <h2><?php _e( 'Get Connected', 'twentyeleven' ); ?></h2>
                <h3><?php _e( "You are a student, graduate or young professional? Sign up here with the name and e-mail address and get access to all the benefits of our network.", 'twentyeleven' ); ?></h3>
              </hgroup>
            </div>
          </aside>          
        </div>
       
<?php if(FALSE): ?>          
          <div class="topmenu">
            <nav role="navigation" class="top">
              <h3 class="assistive-text"><?php _e( 'Top menu', 'twentyeleven' ); ?></h3>
              <?php wp_nav_menu( array( 'theme_location' => 'top' ) ); ?>
            </nav>
            <div class="sitesearch">
              <?php get_search_form(); ?>
            </div>
          </div>
<?php endif; ?>          
        </div>
      </div>
    </header>
    <div id="main">
