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
    
  function loadFromHash()
  {
    $('body').append(
      $('<a />', 
        {
          id: 'load-into-right', 
          'class': 'hidden', 
          href: App.URL + 'game/' + window.location.hash.slice(1),
          'data-ajax-link': 1
        }
      )
    )
    $('#load-into-right').trigger('click')
  }  
  
  $(function() {
    $('body').on('click', '.action', function(e) {
      
      (new Games(this)).set($(this).data('action'))
      
      e.preventDefault()
    })

    if (window.location.hash.length) {
      loadFromHash()
    }
    
    App.Games = Games
  })
  $(window).hashchange( function(){
    loadFromHash()
  })    
  
  
} (jQuery);