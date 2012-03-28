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
  
  App.Loader = function() 
  {
    $('#loading-global')
       .ajaxStart(function() {
            
    		$(this).show();
       })
       .ajaxStop(function() {
    		var self = $(this);
            //self.html('Done!');
            self.html(App.Message)
            
            var interval = (App.Message === undefined || App.Message === 'Working...' ? 100 : 6000 )
            //console.log(interval)
            setTimeout(function() {
                self.html('Working...');
                App.Message = "Working...";
                self.hide();
            }, interval)
        });
    
  };  
  
  App.disableFormButton = function() 
  {
    $('body').delegate('form', 'submit', function() {
      $(this).find('button').attr('disabled', true)
    })
  }

  App.AjaxForm = function(form) 
  {
      var button = form.find('button')
      
      button.attr('disabled', true)
      $.post(form.attr('action'), form.serialize(), function(resp) {
        resp = $.parseJSON(resp);
        
        console.log(resp)
        
        App.Message = resp.message;

        button.attr('disabled', false)
        
        if (resp.success) {
          
          form.find('input[type=text], textarea').val('')
          form.find('.btn-group a').removeClass('active')
        }
      })     
  };
  
  App.Subscribe = function()
  {
    $('#subscribe-form').on('submit', function(e) {
      App.AjaxForm($(this))
      e.preventDefault()     
    })
  }  

  App.SelectContact = function() 
  {
    $('body').on('click', '.btn-group.emails a', function() {
      
      $('input[name=email_id]').val($(this).data('email'))
    })
  };
  
  App.SendContactMail = function() 
  {
    $('.contact-message-form').on('submit', function(e) {
      App.AjaxForm($(this))
      e.preventDefault()     
    })
    
  };

  App.Carousel = function() 
  {
    $('#simple-carousel').on('slid', function() {
      var current = $(this).find('.active')
      
      $('.teaser').show()

      $('.teaser[data-item='+current.data('item')+']').hide()
    })
  };
  
  App.LoadGame = function() 
  {
    $('body').on('click', '.all-games a', function(e) {
      
      $('.all-games').find('.selected-game').removeClass('selected-game')
      
      $(this).parents('li:first').addClass('selected-game')
      
      $('#game-shortcut').load($(this).attr('href'), function() {
        App.Tooltip()
      })
      
      e.preventDefault();
    })
  };
  
  $(function() {
    
    App.LoadGame()
    
    App.Carousel()
    
    App.SelectContact()
    
    App.SendContactMail()
    
    App.Tooltip()
    
    App.Loader()
    
    App.disableFormButton()
    
    App.Subscribe()
    
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