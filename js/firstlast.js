  var $j = jQuery.noConflict();
  $j(document).ready(function(){
    $j("li:first-child").addClass("first");
    $j("li:last-child").addClass("last");
    $j("ul li:first").addClass("first");
    $j("ul li:last").addClass("last");
    $j("section .hentry:first").addClass("first");
    $j("section .hentry:last").addClass("last");
  });
