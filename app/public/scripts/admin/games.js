!function($) 
{
  "use strict"
  
  function Games(el)
  {
    this.el = $(el)
  }
  
  Games.prototype = {
    set: function(type) 
    {
      var that = this,
          href = that.el.attr('href')
      $.get(href, function(response) {
        
        if (response) {
          var item = that.el.parents('.item'),
              title = that.el.attr('title')
              
          if (that.el.data('reset')) {
            that.el.parents('.items:first').find('.alert-success').removeClass('alert-success')
          }    
          switch (type) {
            case 'activate':
              that.el.attr('href', href.replace('activate', 'inactivate'))
              that.el.attr('data-original-title', 'Inactivate')
              that.el.data('action', 'inactivate')
              item.addClass('alert-success')
              break;
            case 'inactivate':
              that.el.attr('href', href.replace('inactivate', 'activate'))
              that.el.attr('data-original-title', 'Activate')
              that.el.data('action', 'activate')
              item.removeClass('alert-success')
              break;
          }
          
          if (that.el.data('trigger') === 'reload') {
            if (that.el.data('location') === 'l') App.Nav.reloadContetPanel()
            
            if (that.el.data('location') === 'r') App.Nav.reloadRightPanel()
          }
        }
      })
    },
  }

  Games.sortable = function() 
  {
    $("#list-of-all-games" ).sortable({
        placeholder: "alert",
        stop: function(event, ui) {
            var data = {},
                name = $('.csrf-form').find('[type=hidden]').attr('name'),
                value = $('.csrf-form').find('[type=hidden]').attr('value'); 
                           
            data['order'] = $( "#list-of-all-games" ).sortable('toArray');
            data[name] = value;
            
            $.post(App.URL+"game/update_order", data, function() {});
        }
    });
		$( ".contact-type-items" ).disableSelection(); 
  }

  Games.setVideo = function(elem) 
  {
    var that = elem,
        type = that.attr('data-action'),
        href = that.attr('href')
    $.get(href, function(response) {
      
      if (response==1) {
        
        var item = that.parents('.item'),
            title = that.attr('title')
            
        if (that.data('reset')) {
          console.log(that.parents('.items:first').find('[data-type="'+that.data('type')+'"]'))
          that.parents('.items:first').find('[data-type="'+that.data('type')+'"]').removeClass('active')
          that.parents('.items:first').find('[data-type="'+that.data('type')+'"]').attr('data-action', (type==='activate' ? 'inactivate' : 'activate'))
        }    
        
        switch (type) {
          case 'activate':
            that.attr('href', href.replace('activate', 'inactivate'))
            that.attr('data-original-title', 'Inactivate')
            that.attr('data-action', 'inactivate')
            //item.addClass('alert-success')
            that.addClass('active')
            break;
          case 'inactivate':
            that.attr('href', href.replace('inactivate', 'activate'))
            that.attr('data-original-title', 'Activate')
            that.attr('data-action', 'activate')
            //item.removeClass('alert-success')
            that.removeClass('active')
            break;
        }
        //console.log('after: ', that.el)
        if (that.data('trigger') === 'reload') {
          if (that.data('location') === 'l') App.Nav.reloadContetPanel()
          
          if (that.data('location') === 'r') App.Nav.reloadRightPanel()
        }
      }
    })
  }
    
  Games.loadFromHash = function ()
  {
    //console.log(window.location.hash.slice(1))
    var hash =  window.location.hash.slice(1)

    if (hash.length) {
      $('#load-into-right').remove()
      $('body').append(
        $('<a />', 
          {
            id: 'load-into-right', 
            'class': 'hide', 
            href: App.URL + 'game/' +hash,
            'data-ajax-link': 1
          }
        )
      )
      console.log(App.URL + 'game/' +hash)
      $('#load-into-right').trigger('click')
    }
  }  
  
  Games.shortenWithBitly = function(el) 
  {
    var url = $('#bitly-input-url').val(),
        api_login = "invictusgames",
        //api_key = "R_d46703b23cbd9840555311a8b08175f8";
        api_key = "R_c279e7aa82400801e49fe4b2cf455020"

    if ($.trim(url).length) {
      $.getJSON(
          "http://api.bitly.com/v3/shorten?longUrl="+encodeURIComponent(url)+"&login="+api_login+"&apiKey="+api_key+"&callback=?", 
          function(resp) {
              $('#url').val(resp.data.url)
          }
      )        
    }    
  }
  
  Games.previewVideo = function(el) 
  {
    var code = el.val()
    
    if ($.trim(code)) {
      $.get(App.URL + 'game/preview_video/' + code, function(resp) {
        $('#video-preview').html(resp)
      })
    }
  }
  
  Games.loadPlatforms = function() 
  {
    var container = $('.game-platforms'),
        game = container.data('id')
        
    container.load(App.URL + 'game/platforms_for/' + game);
  };
  
  Games.Filter = function (el) 
  {
    var filter = el.data('platform'),
        items = $('.games-list').children()
    
    el.parents('ul').find('.active').removeClass('active')
    el.parents('li:first').addClass('active')    
    
    //console.log('filter ', filter)
        
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
  
  Games.addImageToPlatform = function(el) 
  {
    App.CurrentPlatform = el.parents('.items:first').data('platform-id')
    $.get(App.URL + 'game/add_image/'+el.parents('.item:first').data('image-id')+'/to_platform/'+el.data('platform-id'), function() {
      App.Nav.reloadRightPanel()
    })
  };
  
  Games.addAllImageToPlatform = function(el) 
  {
    $.get(App.URL + 'game/add_game_images/'+el.data('game-id')+'/to_platform/'+el.data('platform-id'), function() {
      App.Nav.reloadRightPanel()
    })
  };  

  Games.copyImageToPlatform = function(el) 
  {
    App.CurrentPlatform = el.parents('.items:first').data('platform-id')
    $.get(App.URL + 'game/copy_image/'+el.parents('.item:first').data('image-id')+'/to_platform/'+el.data('platform-id'), function() {
      App.Nav.reloadRightPanel()
    })
  };

  Games.copyAllImagesToPlatform = function(el) 
  {
    $.get(App.URL + 'game/copy_all_images/'+el.data('game-id')+'/to_platform/'+el.data('platform-id'), function() {
      App.Nav.reloadRightPanel()
    })
  };
  
  
  Games.togglePlatformImages = function(el) 
  {
    el.parent().nextAll('.items:first').toggle(100, function() {
      App.PreloadImages()
    })
  }
  
  $(function() {
    
    Games.sortable()
    
    $('body').on('click', '.toggle-platform-images', function(e) {
      //console.log('bofre: ', this);
      Games.togglePlatformImages($(this))
      
      e.preventDefault()
    }) 
    
    
    $('body').on('click', '.copy-all-to-platform', function(e) {
      //console.log('bofre: ', this);
      Games.copyAllImagesToPlatform($(this))
      
      e.preventDefault()
    }) 
    
    $('body').on('click', '.copy-to-platform', function(e) {
      //console.log('bofre: ', this);
      Games.copyImageToPlatform($(this))
      
      e.preventDefault()
    })    
    
    $('body').on('click', '.add-all-images-to-platform', function(e) {
      //console.log('bofre: ', this);
      Games.addAllImageToPlatform($(this))
      
      e.preventDefault()
    })
    
    $('body').on('click', '.add-to-platform', function(e) {
      //console.log('bofre: ', this);
      Games.addImageToPlatform($(this))
      
      e.preventDefault()
    })
    
    $('body').on('click', '.video-action', function(e) {
      //console.log('bofre: ', this);
      Games.setVideo($(this))
      
      e.preventDefault()
    })
    
    $('body').on('click', '.action', function(e) {
      
      (new Games(this)).set($(this).data('action'))
      
      e.preventDefault()
    })
    
    $('body').on('click', '#shorten-with-bitly', function(e) {
      
      Games.shortenWithBitly($(this));
      
      e.preventDefault()
    })

    $('body').on('click', '#preview-video', function(e) {
      
      Games.previewVideo($('#code'));
      
      e.preventDefault()
    })
    
    $('body').on('click', '.games-filter a', function(e) {
      
      Games.Filter($(this));
      
      e.preventDefault()
    })
    
    if (window.location.hash.length) {
      Games.loadFromHash()
    }
    
    
    
    App.Games = Games
  })
  //if (App.Production) 
    $(window).hashchange( function(){
      Games.loadFromHash()
    })    
  
  
} (jQuery);