
!function($,sr){
 
  // debouncing function from John Hann
  // http://unscriptable.com/index.php/2009/03/20/debouncing-javascript-methods/
  var debounce = function (func, threshold, execAsap) {
      var timeout;
 
      return function debounced () {
          var obj = this, args = arguments;
          function delayed () {
              if (!execAsap)
                  func.apply(obj, args);
              timeout = null; 
          };
 
          if (timeout)
              clearTimeout(timeout);
          else if (execAsap)
              func.apply(obj, args);
 
          timeout = setTimeout(delayed, threshold || 100); 
      };
  }
	// smartresize 
	jQuery.fn[sr] = function(fn){  return fn ? this.bind('resize', debounce(fn)) : this.trigger(sr); };
 
} (jQuery,'smartresize');

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
            
            self
              .css('left', ($(window).width() - self.width()) / 2)
            
            var interval = (App.Message === undefined || App.Message === 'Working...' ? 100 : 6000 )
            //console.log(interval)
            setTimeout(function() {
                self.html('Working...');
                App.Message = "Working...";
                self.hide();
            }, interval)
        });
    
  };  
  
  App.showNotification = function(message) 
  {
      var self = $('#loading-global');
      self
        .css('left', ($(window).width() - self.width()) / 2)
      
      self.html(message).show();

      setTimeout(function() {
          self.hide();
          self.html('Working...');

      }, 4000)
      
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
        
        //console.log(resp)
        
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
    App.hiddenTeaser = $('.teaser.hide').remove()
    
    $('#simple-carousel').on('slid', function() {
      var currentHero = $(this).find('.active')
      
      //$('.teaser').show()

      //$('.teaser[data-item='+current.data('item')+']').hide()
      
      
      
      //$('.teaser.hide').removeClass('hide')
      
      //$('.teaser[data-item='+current.data('item')+']').addClass('hide')
      
      $('.teasers').prepend(App.hiddenTeaser.removeClass('hide'))
      
      $('.teaser[data-item='+currentHero.data('item')+']').addClass('hide')
      App.hiddenTeaser = $('.teaser.hide').remove()
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
  
  App.Filter = function (el, items) 
  {
    var filter = el.data('platform')
    
    el.parents('ul').find('.active').removeClass('active')
    el.parents('li:first').addClass('active')    
    
    //console.log('filter ', filter)
    
    if (!$('#simple-carousel-details-videos').is(':visible')) {

      if (filter === 'all') {
        
        items.show()
      } else {
        
        $.each(items, function (i, v) {
          
          var platforms = $(v).data('platforms')
  
          //console.log('platforms ', platforms)
          //console.log('in-array ', $.inArray(filter.toString(), platforms))
          
          !platforms || $.inArray(filter.toString(), platforms) === -1 ? $(v).hide() : $(v).show()
          
        })
      }
    }
    el.parents('li.dropdown.open').removeClass('open')
  }  
  
  App.HandleSmallCarousel = function() 
  {
    $('#images a.thumbnail, #videos a.thumbnail').on('click', function(e) {
      var self = $(this),
          type = self.data('type'),
          carousel = $('#simple-carousel-details-'+type)
          
      self.parents('ul:first').find('.selected-carousel-item').removeClass('selected-carousel-item')
      self.addClass('selected-carousel-item')
          
      carousel.carousel(self.parents('li:first').index())
      carousel.carousel('pause')
      setTimeout(function() {
        if (type==="videos" && self.data('code')) {
          $.get(App.URL+'pages/video/'+self.data('code'), function(resp) {
            carousel.find('.active').html(resp)
            //carousel.carousel('pause')
          })
        }
      }, 500)
      
      e.preventDefault()
    })
  };
  
  App.ReverseContentColumns = function () 
  {
    var w = $(window),
        c = $('[data-reversable]');
    
    //$('.debug').append(w.width() + ', ')
        
    if (!App.Reversed && w.width() < 1023) {
      
      c.children().each(function(i,child){c.prepend(child)})
      
      //if (!$('.top-nav').find('.dropdown').length) {
      //  $('.top-nav').append($('.more-games').html())
        //$('.top-nav').find('.all-games-dropdown-menu').hide()
      //  $('.more-games').hide()
      //}
      
      App.Reversed = true
    } else {
      if (App.Reversed) {
        c.children().each(function(i,child){c.prepend(child)})
        App.Reversed = false
        
        //if ($('.top-nav').find('.dropdown').length) {
        //  $('.top-nav').find('.dropdown').remove()
        //  $('.more-games').show()
        //}
        
        var jobList = $('.jobs-list-wrapper')
        jobList.length && jobList.is(':hidden') && jobList.show()
        
      }
    }
  }

  App.LoadFacebookSdk = function() 
  {
    if ($('#facebook-jssdk').length) $('#facebook-jssdk').remove();
    
    
    ;(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId="+$('body').data('app-id');
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));    
    
  }
  
  App.xhr
  App.LoadSocialWidgets = function() 
  {
    var elem = $('.facebook-widget'),
        type = elem.data('type'),
        size = 300,
        page = elem.data('page'),
        win = $(window)
        width = win.width()
    
    if (width <= 480) size = width - 50
    else if (width <= 768) size = width - 50
    else if (width <= 1023) size = width - 50
    else if (width < 1200) size = 280
    else size = 360

    $('.debug').html('widget size: ' + size + ' window width: ' + width)
    
    App.xhr && App.xhr.abort()
    if (type) {
      App.xhr = $.ajax({
          type: "GET",
          url: App.URL+'pages/widget/'+type+'/'+size+'/'+page,
          success: function(resp){
           elem.html(resp)
            App.LoadFacebookSdk()
            window.FB && window.FB.init({ status: true, cookie: true, xfbml: true });
          }
      });
      
    }
  }
  
  App.ToggleFacebookCommnet = function() 
  {
    if ($(window).width() <= 1023) {
      $('#fb-comments-desktop').hide()
      $('#fb-comments-mobile').show()
    } else {
      $('#fb-comments-desktop').show()
      $('#fb-comments-mobile').hide()
    }
  }
  
  App.ImageInModal = function() 
  {
    /*
    $('body').on('click', '[rel="in-modal"]', function(e) {
      var modal = $('#image-in-modal'),
          self = $(this)
      console.log(modal)  
      modal.css({
          'margin-top': -(modal.outerHeight() / 2),
          'margin-left': -(modal.outerWidth() / 2)
      });  
      modal.find('img').attr('src', self.data('href'))
      $('#download-image').attr('href', self.data('href'))
      modal.modal()
      e.preventDefault()
    })
    */
  }
  
  App.VideoInModal = function() 
  {
    $('body').on('click', '[rel="in-modal"]', function(e) {
      var modal = $('#video-in-modal'),
          modalBody = modal.find('.modal-body'),
          modalTitle = modal.find('.modal-title'),
          self = $(this),
          detailsButton = self
                            .parents('.options:first')
                            .find('.view-game-details')
                            .clone()
                            .addClass('btn-large')
      
      $('#simple-carousel').carousel('pause')
      modal.find('.modal-footer').find('.btn-large').remove()
      modal.find('.modal-footer').append(detailsButton)
      detailsButton = modal.find('.modal-footer').find('.btn-large')
      detailsButton.attr('data-ga-label', detailsButton.attr('data-ga-label') + ' - Popup')
          
      modal.modal()
      modalBody.html('<h1 style="text-align:center">Loading...</h1>')
      $.getJSON(self.data('href'), function(response) {
        
        modalBody.html(response.embed_code)
        modalTitle.html(response.title)
        
        modal.css({
            'margin-top': -(modal.outerHeight() / 2),
            'margin-left': -(modal.outerWidth() / 2)
        });  
        //$('#view-details-from-video').attr('href', self.attr('href').replace('video', ''))
      })
      
      e.preventDefault()
    })    

    $('#video-in-modal').on('hidden', function () {
      $(this).find('.modal-body').empty()
      $('#simple-carousel').carousel('cycle')
    })
  }
  
  App.PreloadImages = function() 
  {
    var items = $('.teasers [data-src]')
    
    $.each(items, function(i, v) {
      
      $(v).attr('src', $(v).data('src'))
      
    })
    //console.log('images loaded')
  }
  
  $(function() 
  {
    
    App.PreloadImages()
    
    App.VideoInModal()
    
    //App.ImageInModal();
    
    //$("[rel=colorbox]").colorbox({slideshow:true});
      
    $(window).smartresize(function() {
      App.ReverseContentColumns()
      App.LoadSocialWidgets()
      App.ToggleFacebookCommnet()
    })
    
    App.LoadSocialWidgets()
    App.ReverseContentColumns()
    App.LoadFacebookSdk()
    App.ToggleFacebookCommnet()
    
    $('[data-pretty-file], input[type=file]').prettifyUpload({'text': 'Select a file'});
    $('.show').show()
    $('.dont-show').hide()
    
    $('a[data-toggle="tab"]').on('shown', function (e) {
      
      var active = $(e.target); // activated tab
      
      $('.carousel-images, .carousel-videos').toggle()
      
      $(active.attr('href')).find('.es-carousel li').show()
      
      $(active.attr('href')).find('.es-carousel-wrapper').elastislide({
          imageW  : 110,
          border: 1,
          minItems	: 5,
          onClick: function(e) { $.trackevent().track($(e).find('a'));}
      });      
    });    
    
    App.HandleSmallCarousel()
    
    $('body').on('click', '.games-filter a', function(e) {
      
      App.Filter($(this), $('.games-list li, .es-carousel li'));
      
      e.preventDefault()
    })    
    
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
		
		$('#simple-carousel').carousel('pause');
    
    $('#simple-carousel-details-images').carousel('pause')
    $('#simple-carousel-details-videos').carousel('pause')
    
    /*$('#images-fotorama, #videos-fotorama').fotorama({
      click: false,
      onClick: function(data) {
        //console.log($(data.img));
        
      },
      onShowImg: function(data) {
        //console.log(data)
      }
    })*/
    
    $('.carousel').on('slid', function(e) {
      //console.log($(this).find('.active'))
      var elem = $(this).find('.item.active')
      //console.log(elem.index())
      
      $.trackevent().track(elem.find('a'))
      
      $('.tab-pane.active .selected-carousel-item').removeClass('selected-carousel-item')
      $('.tab-pane.active').find('li:eq('+elem.index()+')').find('a').addClass('selected-carousel-item')
      
    }).on('slide', function(e) {
    })
    
    $('body').delegate('a[href=#]', 'click', function() {
      return false;
    });
    
    if($('#image-carousel').length) {
      $('#image-carousel').elastislide({
          imageW  : 110,
          border: 1,
          minItems	: 5,
          onClick: function(e) { $.trackevent().track($(e).find('a'));}
      });      
    } else {
      if($('#video-carousel').length)
        $('#video-carousel').elastislide({
            imageW  : 110,
            border: 1,
            minItems	: 5,
            onClick: function(e) { $.trackevent().track($(e).find('a'));}
        });      
    }  
    
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
  
} (jQuery);

