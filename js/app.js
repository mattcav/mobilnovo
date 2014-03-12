$(document).foundation();
//add ready class
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



// enquire.register("screen and (min-width:45em)", function() {
//     if(document.getElementById("container")){
//       var $container = $('#container'),
//           $filters = $('#filters'),
//           $colWidth = $('.obj').width();
      
//       $container.isotope({
//         itemSelector: ".masonry",
//         masonry: {
//           columnWidth: $colWidth
//         }
//       }); 

//       $filters.on( 'click', 'button', function( event ) {
//         var filterValue = $(this).attr('data-filter-value');
//         $container.isotope({ 
//           filter: filterValue,
//           resizable: false, // disable normal resizing
//           itemSelector: ".masonry",
//           masonry: {
//             columnWidth: $colWidth
//           }
//         });
//       });
//     } 
// });


    var $container = $('#container'),
        $select = $('div#filters select'),
        $colWidth = $('.obj').width();
        filters = {};
      console.log($colWidth);
      $container.imagesLoaded( function(){
          $container.isotope({
              masonry: {
                columnWidth: '.obj'
              },
              itemSelector: '.masonry'
            });
       });       

      $select.change(function() {
        var $this = $(this);

        var $optionSet = $this;
        var group = $optionSet.attr('data-filter-group');
        filters[group] = $this.find('option:selected').attr('data-filter-value');

          var isoFilters = [];
          for (var prop in filters) {
              isoFilters.push(filters[prop])
          }
          var selector = isoFilters.join('');

          $container.isotope({
              masonry: {
                  columnWidth: '.obj'
                },
              filter: selector
          });
          return false;
      });
    

$('.open-clearing').on('click', function(e) {
    e.preventDefault();
    $('[data-clearing] li img').eq($(this).data('thumb-index')).trigger('click');
  });

