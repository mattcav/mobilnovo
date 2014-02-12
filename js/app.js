$(document).foundation();
//add ready class
// $('body').imagesLoaded()
//   .always( function( instance ) {
//     $('html').addClass('ready');
//   });
$('html').addClass('ready');
// doc ready
$(document).ready(function() {
  jQuery.extend(verge);
});

// init verge
  var win = $(window);
  var allMods = $(".coming");

  win.scroll(function(event) {
    allMods.each(function(i, el) {   
      var el = $(el);   
      //if (el.visible(true)) {
      if($.inViewport(el, 200)) {  
        el.addClass("come-in");
        } 
    });
  });