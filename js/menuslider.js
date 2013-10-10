  var $j = jQuery.noConflict();
  $j(document).ready(function(){
    $j("nav.site .menu > li").hover(
      function() {
        if (!$j(this).hasClass("current-menu-item") && !$j(this).hasClass("current-menu-parent")) {
          $j(this).find("ul.sub-menu").slideToggle("slow");
        }
      }
    );
    $j("nav.top .menu > li").hover(
      function() {
        if (!$j(this).hasClass("current-menu-item") && !$j(this).hasClass("current-menu-parent")) {
          $j(this).find("ul.sub-menu").fadeToggle("slow");
        }
      }
    );

  });
