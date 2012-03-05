!function($) {


    $(window).load(function(){
  		
  		// Fade in images so there isn't a color "pop" document load and then on window load
  		$(".game img").fadeIn(500);
  		/*
  		// clone image
  		$('.game img').each(function(){
  			var el = $(this);
  			el.css({"position":"absolute"}).wrap("<div class='img_wrapper' style='display: inline-block'>").clone().addClass('img_grayscale').css({"position":"absolute","z-index":"998","opacity":"0"}).insertBefore(el).queue(function(){
  				var el = $(this);
  				el.parent().css({"width":this.width,"height":this.height});
  				el.dequeue();
  			});
  			this.src = grayscale(this.src);
  		});
  		
  		// Fade image 
  		$('.game img').mouseover(function(){
  			$(this).parent().find('img:first').stop().animate({opacity:1}, 100);
  		})
  		$('.img_grayscale').mouseout(function(){
  			$(this).stop().animate({opacity:0}, 100);
  		});
  		
  		$('.selected-game .img_grayscale').css('opacity', 1)		
  	});
  	
  	// Grayscale w canvas method
  	function grayscale(src){
  		var canvas = document.createElement('canvas');
  		var ctx = canvas.getContext('2d');
  		var imgObj = new Image();
  		imgObj.src = src;
  		canvas.width = imgObj.width;
  		canvas.height = imgObj.height; 
  		ctx.drawImage(imgObj, 0, 0); 
  		var imgPixels = ctx.getImageData(0, 0, canvas.width, canvas.height);
  		for(var y = 0; y < imgPixels.height; y++){
  			for(var x = 0; x < imgPixels.width; x++){
  				var i = (y * 4) * imgPixels.width + x * 4;
  				var avg = (imgPixels.data[i] + imgPixels.data[i + 1] + imgPixels.data[i + 2]) / 3;
  				imgPixels.data[i] = avg; 
  				imgPixels.data[i + 1] = avg; 
  				imgPixels.data[i + 2] = avg;
  			}
  		}
  		ctx.putImageData(imgPixels, 0, 0, 0, 0, imgPixels.width, imgPixels.height);
  		return canvas.toDataURL();  
  	}
    */
    
    $(function() {
      
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
    });
    
} (jQuery);