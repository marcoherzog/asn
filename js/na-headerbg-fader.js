/**
 * @author Marco Herzog
 */
// <![CDATA[
  jQuery(document).ready(function($) {
    
    // variables/objects
    var count = 0; // count headers
    for (k in headers) if (headers.hasOwnProperty(k)) count++;
    var i = 0; // variable for headers iteration
    var j = 0; // counter for slideshowdivs switch
      
    config = new Object();
    config["delay"] = 8000;
    config["fadetime"] = 800;
  
    // get value by key out of object
    function getAtFromJson(pos, object, keyname) {
        var counter = 0;
        var result = null;
        $.each(object, function(key,value){ 
            if(counter == pos) {
                result = value[keyname];
                return false;
            };
            counter++;
        });
        return result;
    }
  
    // add slider-divs inside slideshow-stage
    $("#slideshow-stage").append($("<div id='header-slider1' class='header-slideshow'>"));
    $("#slideshow-stage").append($("<div id='header-slider2' class='header-slideshow'>"));
  
    // set z-index for all divs inside slideshow stage to be above slideshow-divs
    //$("#slideshow-stage").css({backgroundImage:'none'});
    $("#slideshow-stage > *").css({'z-index' : '1004'});
    //$("#slideshow-stage > *").css({'position' : 'relative'});
    $("#slideshow-stage > *").each (function () {
      if($(this).css('position').length > 0) {
        $(this).css({'position' : 'relative'})
      };
    });
  
    // set css for slideshow-divs
    var cssObj = {
      'height' : $("#slideshow-stage").css("height"),
      'width' : '100%',
      'position' : 'absolute',
      'top' : 0,
      'left' : 0,
      'z-index' : '1001',
      'background-position' : 'center',
      'background-size' : 'cover'
    }
    $(".header-slideshow").css(cssObj).hide();
  
    //fading in background image after loaded src: http://stackoverflow.com/a/977151
      $.fn.smartBackgroundImage = function(url){
        var t = this;
        //create an img so the browser will download the image:
        $('<img />')
        .attr('src', url)
        .load(function(){ //attach onload to set background-image
          t.each(function(){ 
            $(this).hide(0,function(){
              $(this).css({'z-index' : '1003'});
              $(this).css('backgroundImage', 'url('+url+')' );
              $(this).fadeIn(config["fadetime"],function(){
                $(this).css({'z-index' : '1002'});
                $(this).siblings(".header-slideshow").css({'z-index' : '1001'});
                setTimeout(loop,config["delay"]);
              });
            });
          });
        });
      }
      
    //loop
    function loop() {
      //$("#console").append(j + "-" + count + "-" + i + " - ");
      if (j%2 == 0) {
        $("#header-slider1").smartBackgroundImage(getAtFromJson(i, headers, "url"));
      } else {
        $("#header-slider2").smartBackgroundImage(getAtFromJson(i, headers, "url"));
      };
      if (i == count-1) {i = 0} else {i++};
      j++;
    }
    
    // START
    setTimeout(loop,config["delay"]);
    
    // resize header-slideshow divs
    $("#slideshow-stage").resize(function() {
      var height = $("#slideshow-stage").css("height");
      $('.header-slideshow').css('height',height);
    });
  });
// ]]>