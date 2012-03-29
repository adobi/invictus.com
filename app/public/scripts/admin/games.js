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
          switch (type) {
            case 'activate':
              that.el.attr('href', href.replace('activate', 'inactivate'))
              that.el.attr('data-original-title', 'Inactivate game')
              that.el.data('action', 'inactivate')
              item.addClass('alert-success')
              break;
            case 'inactivate':
              that.el.attr('href', href.replace('inactivate', 'activate'))
              that.el.attr('data-original-title', 'Activate game')
              that.el.data('action', 'activate')
              item.removeClass('alert-success')
              break;
          }
        }
      })
    },
  }
    
  Games.loadFromHash = function ()
  {
    //console.log(window.location.hash.slice(1))
    
    if (window.location.hash.slice(1).length) {
      
      $('body').append(
        $('<a />', 
          {
            id: 'load-into-right', 
            'class': 'hide', 
            href: App.URL + 'game/' + window.location.hash.slice(1),
            'data-ajax-link': 1
          }
        )
      )
      $('#load-into-right').trigger('click')
    }
  }  
  
  Games.shortenWithBitly = function(el) 
  {
    var url = $('#bitly-input-url').val(),
        api_login = "adobi",
        api_key = "R_d46703b23cbd9840555311a8b08175f8";

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
        items = $('.games-list').find('li')
    
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
  
  $(function() {
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
  if (App.Production) 
    $(window).hashchange( function(){
      Games.loadFromHash()
    })    
  
  
} (jQuery);