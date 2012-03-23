!function($) 
{
  
  "use strict"
  
  var Jobs = function(el)
  {
    this.el = $(el)
  }
  
  Jobs.templates = {
    itemAdd: '<li> \
            <input type="text" name="" class="span4"> \
            <a href="#" class="btn add-ui-item" data-type=""><i class="icon-plus-sign" style="margin-right:0"></i></a> \
            <a href="#" class="btn remove-ui-item"  rel="tooltip" title="Delete"><i class="icon-trash"></i></a> \
          </li>',
    itemAddBase: '<li> \
            <input type="text" name="" class="span4"> \
            <a href="#" class="btn add-ui-item" data-type=""><i class="icon-plus-sign" style="margin-right:0"></i></a> \
          </li>',          
    itemEdit: '<li> \
            <input type="text" name="" class="span4"> \
            <a href="#" class="add-ui-item" data-type=""><i class="icon-plus-sign" style="margin-right:0"></i></a> \
            <a href="#" class="remove-ui-item"><i class="icon-pencil"></i></a> \
            <a href="#" class="remove-ui-item"><i class="icon-trash"></i></a> \
          </li>',
          
  }
  
  Jobs.prototype = {
    editJob: function() 
    {
      App.select(this.el)
    },
    addItem: function() 
    {
      var item = $(Jobs.templates.itemAdd)
      
      item.find('input').attr('name', this.el.data('type') + '[]')
      
      this.el.parents('ul:first').append(item)
      
      item.find('input').focus()
    },
    removeItem: function() 
    {
      if (this.el.parents('ul').find('li').length > 1)
        this.el.parents('li:first').remove()
    },
    // deletes a job/job-category
    deleteItem: function() 
    {

    },
    // deletes a job requirement/skill/qualification/offer item
    deleteJobItem: function() 
    {
      var that = this
      $.get(that.el.attr('href'), function() {
        
        var ul = that.el.parents('ul')

        that.el.parents('li').remove()

        if (!ul.find('li').length) {
          var item = $(Jobs.templates.itemAdd)
          
          item.find('input').attr('name', that.el.data('type') + '[]')
          
          ul.append(item)
        }
      })
    },
    
  }
  
  $(function() 
  {
    $('body').delegate('.select-item', 'click', function(e) 
    {
      
      (new Jobs(this)).editJob()
      
      e.preventDefault()
    })
    
    $('body').delegate('.add-ui-item', 'click', function(e) 
    {
      
      (new Jobs(this)).addItem()
      
      e.preventDefault()
    })
    
    $('body').delegate('.remove-ui-item', 'click', function(e) 
    {
      
      (new Jobs(this)).removeItem()
      
      e.preventDefault()
    })
    
    $('body').delegate('.delete-job-item', 'click', function(e) 
    {
      (new Jobs(this).deleteJobItem())
      
      e.preventDefault()
    })
  })
  
  App.Jobs = Jobs;
  
} (jQuery);