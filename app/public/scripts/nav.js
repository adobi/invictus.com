!function($) 
{
  
  "use strict"
  
  var Nav = function(el, container)
  {
    this.el = $(el)
    this.href = this.el.attr('href')
    this.container = container || $('.sidebar-navigation-wrapper-right .well')
  }
  
  Nav.prototype = {
    loadIntoPanel: function() 
    {
      //App.Jobs.unselect();
      
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
        
        //form.find('legend').after(resp);
        form.find('legend').next().find('.alert-error').remove();
        form.find('legend').next().prepend(resp);
      })
    }
  }
  
  $(function() 
  {
    $('body').delegate('.left-side-nav a', 'click', function(e) {
      
      (new Nav(this, $('.content-wrapper'))).loadIntoPanel();
      
      e.preventDefault()
    })
        
    $('body').delegate('[data-ajax-link]', 'click', function(e) {
      
      (new Nav(this)).loadIntoPanel();
      
      e.preventDefault()
    })
    
    $('body').delegate('[data-close-right]', 'click', function(e) {
      
      (new Nav(this)).closeRightSide();
      
      e.preventDefault()
    })    

    $('body').delegate('[data-ajax-form]', 'submit', function(e) {
      (new Nav(this)).submitForm()
      
      $('.left-side-nav .active').trigger('click')
      
      e.preventDefault()
    })
    
  })
  
} (jQuery);