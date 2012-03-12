!function($) 
{
  
  "use strict"
  
  var Jobs = function(el)
  {
    this.el = $(el)
  }
  
  Jobs.templates = {
    item: '<li> \
            <input type="text" name="" class="span4"> \
            <a href="#" class="add-ui-item" data-type=""><i class="icon-plus-sign" style="margin-right:0"></i></a> \
            <a href="#" class="remove-ui-item"><i class="icon-trash"></i></a> \
          </li>'
  }
  
  Jobs.prototype = {
    editJob: function() 
    {
      App.select(this.el)
    },
    addItem: function() 
    {
      var item = $(Jobs.templates.item)
      
      item.find('input').attr('name', this.el.data('type') + '[]')
      
      this.el.parents('ul:first').append(item)
      
      item.find('input').focus()
    },
    removeItem: function() 
    {
      this.el.parents('li:first').remove();
    }
  }
  
  $(function() 
  {
    $('body').delegate('.edit-job', 'click', function(e) {
      
      (new Jobs(this)).editJob()
      
      e.preventDefault()
    })
    
    $('body').delegate('.add-ui-item', 'click', function(e) {
      
      (new Jobs(this)).addItem()
      
      e.preventDefault()
    })
    
    
    $('body').delegate('.remove-ui-item', 'click', function(e) {
      
      (new Jobs(this)).removeItem()
      
      e.preventDefault()
    })
  })
  
  App.Jobs = Jobs;
  
} (jQuery);