
$(document).imagesLoaded( function(){
  $(document).foundation();
  $('html').addClass('ready');
});

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

