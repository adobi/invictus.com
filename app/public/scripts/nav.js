!function($) 
{
  
  "use strict"
  
  var Nav = function(el)
  {
    this.el = $(el)
    this.href = this.el.attr('href')
    this.container = $('.sidebar-navigation-wrapper-right .well')
  }
  
  Nav.prototype = {
    loadRightSide: function() 
    {
      this.container.load(this.href, function() {
        App.Datepicker()
        $('input[type=file]').prettifyUpload();
      })
    },
    
    closeRightSide: function() 
    {
      this.container.empty();
    },
    
    submitForm: function() 
    {
      var form = this.el
      $.post(form.attr('action'), form.serialize(), function(resp) {
        
        form.find('legend').after(resp);
      })
    }
  }
  
  $(function() 
  {
    $('body').delegate('[data-ajax-link]', 'click', function(e) {
      
      (new Nav(this)).loadRightSide();
      
      e.preventDefault()
    })
    
    $('body').delegate('[data-close-right]', 'click', function(e) {
      
      (new Nav(this)).closeRightSide();
      
      e.preventDefault()
    })    
    
    $('body').delegate('[data-ajax-form]', 'submit', function(e) {
      
      (new Nav(this)).submitForm()
      
      e.preventDefault()
    })
  })
  
} (jQuery);