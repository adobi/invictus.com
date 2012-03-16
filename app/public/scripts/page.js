!function($) {
  
  App.Datepicker = function() {
    $('.datepicker').datepicker({
      dateFormat: 'yy-mm-dd',
      changeYear: true,
      changeMonth: true,
      showMonthAfterYear:true,
      yearRange: '2010:+5'
    });    
  };
  
  // imput append button click
  App.TriggerDatepicker = function() 
  {
    $('body').on('click', '.trigger-datepicker', function() {
       $(this).prev().datepicker('show')
    })
  };
  
  App.showNotification = function(message) 
  {
      var self = $('#loading-global');
      
      self.html(message).show();

      setTimeout(function() {
          self.hide();
          self.html('Working...');

      }, 4000)
      
  };  
  
  App.select = function(el) 
  {
    App.unselect()
    el.parents('.item').addClass('selected')
  };
  
  App.unselect = function() 
  {
    $('.items').find('.selected').removeClass('selected') 
    
  };
  
  App.disableFormButton = function() 
  {
    $('body').delegate('form', 'submit', function() {
      $(this).find('button').attr('disabled', true)
    })
  }
  
  App.enhanceAnalytics = function() 
  {
    $('body').delegate('.add-custom-action', 'click', function() {
        var self = $(this),
            select = self.prevAll('select'),
            name = select.attr('name'),
            p = self.next(),
            input = p.find('input');
            
        p.show()
        self.hide()
        select.hide()
        select.removeAttr('name')
        input.attr('name', name)

        return false;
    })
    
    $('body').delegate('.cance-custom-action', 'click', function() {
        var self = $(this),
            input = self.parent().find('input'),
            name = input.attr('name'),
            p = self.parent(),
            select = p.prevAll('select')
        
        p.hide()
        
        input.removeAttr('name')
        
        select.attr('name', name).show()
        
        select.next().show()
        
        return false
    })        	  	    
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
  
  App.Dialog = function() 
  {
      $('body').delegate('a[rel*=dialog]', 'click', function() {
          
          $('.dialog').remove();
          
          var self = $(this);
          
          
          var elem = $('<div />', {'class': 'dialog', id: 'dialog_'+(new Date()).getTime(), title: self.attr('title')}).html('<p style = "width: 300px;text-align:center"><img src = "'+App.URL+'images/pie.gif" /></p>');
  
          elem.dialog({
              modal: false,
              width: 'auto',
              minWidth: 500,
              position:[Math.floor((window.innerWidth / 2)-150),  70],
              open: function(event, ui) {

                  elem.html($('<img />', {src:self.attr('href')}));
                  elem.dialog('option', 'position', [Math.floor(((window.innerWidth  - elem.width()) / 2)), window.pageYOffset]);
                  $('.ui-dialog').css('top',  window.pageYOffset + 70);
              }
          });
          
          return false;
      });	
      
      $('body').delegate('.close-dialog', 'click', function() {
          
          $('.ui-dialog-titlebar-close').trigger('click');
          
          return false;
      });     
  };
  
  App.enhanceChosen = function() 
  {
    $(".chosen").chosen({
        no_results_text: "No results matched", 
    }); 
    
    $('.chosen-select-all').bind('click', function(e) {
        e.preventDefault();
        
        var select = $(this).parents('div:first').find('.chosen');
        
        select.find('option').attr('selected', true);
        
        select.trigger("liszt:updated");
    });       
    $('.chosen-cancel-all').bind('click', function(e) {
        e.preventDefault();
        
        var select = $(this).parents('div:first').find('.chosen');
        
        select.find('option').removeAttr('selected');
        
        select.trigger("liszt:updated");
    });      
  };
  
  App.Tooltip = function(option) 
  {
    $('[rel=tooltip]').tooltip(option||null);
  };
  
  App.PrettifyUpload = function() 
  {
    $('input[type=file]').prettifyUpload(); 
  };
  
  // removes inline image from platforms/job categories
  App.DeleteImage = function() 
  {
    $('body').delegate('.delete-image', 'click', function(e) 
    {
      $.get($(this).attr('href'), function() {
        App.Nav.reloadContetPanel();

        App.Nav.reloadRightPanel();
      })
            
      e.preventDefault()
    })    
  };
  
  // removes an item from the content panel
  App.DeleteItem = function() 
  {
    
    $('body').delegate('.delete-item', 'click', function(e) 
    {
      
      var that = $(this)
      $.get(that.attr('href'), function() {
        
        if (that.data('location') === 'r') App.Nav.CloseRightPanel()
        
        App.Nav.reloadContetPanel()
      })
            
      e.preventDefault()
    })    
  };
  
  App.SwitchItem = function() 
  {
    $('body').delegate('.switch-item', 'click', function(e) 
    {
      
      var that = $(this)
      $.get(that.attr('href'), function() {
        
        App.Nav.reloadRightPanel()
      })
            
      e.preventDefault()
    })    
  }
  
  App.AutoHeight = function () 
  {
    //$('.right-side-scroll').css('height', $('body').height()-300)
    $('.right-side-scroll').css('height', $('.sidebar-navigation-wrapper-right .well').height() - 160)
  }
  
	$(function() 
	{
    
    App.AutoHeight()
	  
	  App.SwitchItem();
	  
	  App.DeleteItem()
	  
	  App.DeleteImage()
	  
    App.Tooltip()
    App.Datepicker()
    
    App.TriggerDatepicker();
    
    $('body').delegate('[data-unselect]', 'click', App.unselect)   
    
    App.disableFormButton()

    App.enhanceAnalytics()
	  
    App.Loader()  
    
    App.Dialog()
    
    App.enhanceChosen()
    //$('#fileupload').fileupload();
    
    /*
    $( "#image-sortable" ).sortable({
        //placeholder: "ui-state-highlight",
        stop: function(event, ui) {
            //console.log(event, ui);
            //console.log($('#sortable').sortable('toArray'));
            var name = $('.sortable-wrapper').find('[type=hidden]').attr('name'),
                value = $('.sortable-wrapper').find('[type=hidden]').attr('value');
            
            var data = {};
            data['order'] = $('#image-sortable').sortable('toArray');
            data[name] = value;
            
            $.post(App.URL+"image/update_order", data, function() {});
        }
    });
		$( "#image-sortable" ).disableSelection();          

    $( "#store-sortable" ).sortable({
        //placeholder: "ui-state-highlight",
        stop: function(event, ui) {
            //console.log(event, ui);
            //console.log($('#sortable').sortable('toArray'));
            var name = $('.sortable-wrapper').find('[type=hidden]').attr('name'),
                value = $('.sortable-wrapper').find('[type=hidden]').attr('value');
            
            var data = {};
            data['order'] = $('#store-sortable').sortable('toArray');
            data[name] = value;
            //console
            $.post(App.URL+"store/update_order", data, function() {});
        }
    });
	  $( "#store-sortable" ).disableSelection();    
    */
    $('i.w').parents('li').hover(
			function() { $(this).find('i.w').css('opacity', 1); }, 
			function() { $(this).find('i.w').css('opacity', 0.25); }
		)

    $("a[rel=popover]")
      .popover()
      .click(function(e) {
          e.preventDefault()
      });
    
		prettyPrint() 
		
		//$('.sidebar-navigation-wrapper-right .well').lionbars(); 
  });
	
} (jQuery);