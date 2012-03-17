!function($) 
{
  
  "use strict"
  
  var Nav = function(el, container)
  {
    this.el = $(el)
    this.href = this.el.attr('href')
    
    this.container = container || $('.sidebar-navigation-wrapper-right .well')
    this.type = this.el.data('type')
    
    //console.log(App.CurrentHref)
  }
  
  Nav.reloadContetPanel = function() 
  {
    App.Tooltip('hide')
    //console.log('reload content')
    //$('.left-side-nav .active').trigger('click')  
    $('.content-wrapper').load($('.left-side-nav .active a').attr('href'), function() {
      Nav.initContentPanel()
    });
  }
  
  Nav.CloseRightPanel = function() 
  {
    (new Nav()).closeRightPanel()
  }
  
  Nav.reloadRightPanel = function() 
  {
    $('[rel=tooltip]').tooltip('hide')
    
    //console.log(App.CurrentHref)
      
    $('.sidebar-navigation-wrapper-right .well').load(App.CurrentHref, Nav.initRightPanel)
  }
  
  Nav.initRightPanel = function() 
  {
    //App.TriggerDatepicker()
    App.Datepicker()
    App.PrettifyUpload()
    App.Tooltip('hide')      
    App.Tooltip() 
    App.AutoHeight()  
    $('.sidebar-navigation-wrapper-right .controls:first').children(':first').focus()
  }
  
  Nav.initContentPanel = function() 
  {
    App.Tooltip('hide')
    
    if ($(".contact-type-items" ).length) App.Contacts.sortable()     
  }
  
  Nav.prototype = {
    loadIntoRightPanel: function() 
    {
      $('[rel=tooltip]').tooltip('hide');      
      var that = this
      
      $.ajax({
        url: that.href, 
        type: that.type || 'GET',
        success: function(response) {
          that.container.html(response)
          Nav.initRightPanel()
        }
      })
    },
    
    closeRightPanel: function() 
    {
      this.container.empty();
    },
    
    submitForm: function() 
    {
      var form = this.el,
          button = form.find('button')

      button.attr('disabled', true)
      
      $.post(form.attr('action'), form.serialize(), function(resp) {
        
        Nav.reloadContetPanel();

        Nav.reloadRightPanel();
        
        App.Message = resp;
        
        button.attr('disabled', false)
      })
    },
    

  }
  
  $(function() 
  {
    $('body').on('reload.content', Nav.reloadContetPanel)
    
    $('body').delegate('.left-side-nav a', 'click', function(e) {
      
      //window.loaction.href = $(this).attr('href')
      
      //(new Nav(this, $('.content-wrapper'))).loadIntoPanel();
      
      //e.preventDefault()
    })
        
    $('body').delegate('[data-ajax-link]', 'click', function(e) {
      
      (new Nav(this)).loadIntoRightPanel();
      
      App.CurrentHref = $(this).attr('href')
      
      e.preventDefault()
    })
    
    $('body').delegate('[data-close-right]', 'click', function(e) {
      
      (new Nav(this)).closeRightPanel();
      
      e.preventDefault()
    })    

    $('body').delegate('[data-ajax-form]', 'submit', function(e) {
      (new Nav(this)).submitForm()
      
      //$('.left-side-nav .active').trigger('click')
      
      e.preventDefault()
    })
    
    App.Nav = Nav
  })
  
} (jQuery);