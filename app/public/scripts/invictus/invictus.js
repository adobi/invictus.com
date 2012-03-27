!function($) {

  $.subnav = function() 
  {
      
      var $win = $(window)
        , $nav = $('.subnav')
        , navTop = $('.subnav').length && $('.subnav').offset().top - 40
        , isFixed = 0
  
      processScroll()
  
      $win.on('scroll', processScroll)
  
      function processScroll() {
        var i, scrollTop = $win.scrollTop()
        if (scrollTop >= navTop && !isFixed) {
          isFixed = 1
          $nav.addClass('subnav-fixed')
        } else if (scrollTop <= navTop && isFixed) {
          isFixed = 0
          $nav.removeClass('subnav-fixed')
        }
      }   
  }
  App.Tooltip = function(option) 
  {
    $('[rel=tooltip]').tooltip(option||null);
  };
  
  $(function() {
    
    App.Tooltip();
    
    $.subnav();
    
    $('.emails').button()
    
		$(".game img").fadeIn(500);
    $('#simple-carousel').carousel();
    
    $('#simple-carousel-details').carousel('pause');
    
    $('#multi-carousel-images, #multi-carousel-videos').carousel('pause')
    
    $('body').delegate('a[href=#]', 'click', function() {
      return false;
    });
    
    $('#image-carousel').elastislide({
        imageW  : 110,
        border: 1,
        minItems	: 5
    });      
    
    /*
    $('#video-carousel').show().elastislide({
        imageW  : 110,
        border: 1,
        minItems	: 5
    });      
    */
    $('a[data-toggle="tab"]').on('shown', function (e) {
      
      var active = $(e.target); // activated tab

      $(active.attr('href')).find('.es-carousel-wrapper').elastislide({
          imageW  : 110,
          border: 1,
          minItems	: 5
      });      
    });
    
    var isBig = 0;
    $('.bigger-font').on('click', function() {
      var normal = '13px', big = '16px', self = $(this);
      
      $('#container p').css('font-size', (isBig ? normal : big));
      
      if (!isBig) self.find('span').removeClass('icon-zoom-in').addClass('icon-zoom-out')
      else self.find('span').removeClass('icon-zoom-out').addClass('icon-zoom-in')
      
      isBig = 1-isBig;
      return false;
    });
    
    //$(".scrollable").scrollable();    
    
    $('body').delegate('#apply-for-the-job', 'click', function() {
      
      $('#job-application-form').toggle();
      
      return false;
    });
  });
  
} (jQuery)