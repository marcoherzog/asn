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
    config["fadetime"] = 1500;
  
  
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
    $("#slideshow-stage").append($("<div id='slider1' class='slideshow'>"));
    $("#slideshow-stage").append($("<div id='slider2' class='slideshow'>"));
  
    // set z-index for all divs inside slideshow stage to be above slideshow-divs
    $("#slideshow-stage > div").css({'z-index' : '2000'});
  
    // set css for slideshow-divs
    var cssObj = {
      'height' : $("#slideshow-stage").css("height"),
      'width' : '100%',
      'position' : 'absolute',
      'top' : 0,
      'left' : 0,
      'z-index' : '1000',
      'background-position' : 'center',
      'background-size' : 'cover'
    }
    $(".slideshow").css(cssObj).hide();
  
    //fading in background image after loaded src: http://stackoverflow.com/a/977151
    (function( $ ) {
      $.fn.smartBackgroundImage = function(url){
        var t = this;
        //create an img so the browser will download the image:
        $('<img />')
        .attr('src', url)
        .load(function(){ //attach onload to set background-image
          t.each(function(){ 
            $(this).hide();
            $(this).css('backgroundImage', 'url('+url+')' );
            $(this).fadeIn(config["fadetime"]);
          });
        });
        return this;
      }
    })( jQuery );
      
    //loop
    function loop() {
      //$("#console").append(j + "-" + count + "-" + i + " - ");
      if (j%2 == 0) {
        $("#slider1").smartBackgroundImage(getAtFromJson(i, headers, "url"));
        $("#slider1").css({'z-index' : '1002'});
        $("#slider2").css({'z-index' : '1001'});
      } else {
        $("#slider2").smartBackgroundImage(getAtFromJson(i, headers, "url"));
        $("#slider2").css({'z-index' : '1002'});
        $("#slider1").css({'z-index' : '1001'});
      };
      if (i == count-1) {i = 0} else {i++};
      j++;
      setTimeout(loop,config["delay"]);
    }
    
    // START
    loop();

  });
// ]]>