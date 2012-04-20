!function($) 
{
  "use strict"
  
  var Layout = function(el)
  {
    this.el = el
  }
  
  Layout.SaveUrl = "game/layout/"
  
  Layout.WarningModal = $('#overwrite-warning')
  
  Layout.DragAndDropGames  = function() 
  {
    
    $( ".all-games li" ).draggable({
      appendTo: ".dnd-helper",
      helper: "clone",
      start: function (event, ui) {
        
        ui.helper.find('.caption').show()
      }
    })
    
    $('.accordion-group .thumbnails li').droppable({
      //activeClass: "",
      hoverClass: "dnd-li-active",
      accept: ":not(.ui-sortable-helper)",
      drop: function( event, ui ) {

        var clone = ui.draggable.clone(),
            dropTo = $(this)
        
        clone.find('.caption').show()
        
        if (!dropTo.parents('.thumbnails').find("li>.item[data-id="+clone.find('.item').data('id')+"]").length) {
          
          if (!$.trim(dropTo.html()).length) {
            //dropTo.html(clone.html())
            
            Layout.Copy(clone, dropTo)
          } else {
          
            Layout.WarningModal.find('#old-item').html(dropTo.attr('data-original-title'))
            Layout.WarningModal.find('#new-item').html(clone.attr('data-original-title'))
          
            Layout.WarningModal.modal()
            
            Layout.DropToElement = dropTo
            Layout.DraggedElement = clone
          }
        } else {
          
          $('#already-in-use-error').modal().find('#item-to-use').html(clone.attr('data-original-title'))
          
          //App.showNotification('<p>'+clone.attr('data-original-title')+' is already in the list, select something else!</p>')
        }
      }
    })     
  }
  
  Layout.Copy = function (src, dest) 
  {
    // TODO save to the database
    //console.log(dest.parents('ul:first').data('column'));
    
    dest.html(src.html())
    dest.attr('id', dest.find('.item').data('id'))
    //Layout.Add(dest.find('.item').data('id'), dest.parents('ul:first').data('section'))
    dest.find('.caption').show()
    dest.attr('rel', src.attr('rel')).attr('data-original-title', src.attr('data-original-title'))   
    
    Layout.Add(dest)
  }
  
  //Layout.Add = function(game, section) 
  Layout.Add = function(el)
  {
    var game = el.find('.item').data('id'),
        section = el.parents('ul:first').data('section')
        
    //console.log('SAVE: ', 'game', game, 'section', section)
    
    if (game && section) {
      var data = {}
      data[section] = 1

      //console.log(el.parents('.thumbnails:first').sortable('toArray'))

      Layout.UpdateOrder(section, el.parents('.thumbnails:first').sortable('toArray'))
      
      Layout.Save(game, data)    
    }
  }
  
  Layout.Remove = function(game, section, callback)
  {
    //console.log('REMOVE: ', 'game', game, 'section', section)
    if (game && section) {
      var data = {}
      data[section] = null
      
      Layout.Save(game, data, callback) 
    }
  }
  
  Layout.Save = function(game, data, callback) 
  { 
    var name = $('.csrf-form').find('[type=hidden]').attr('name'),
        value = $('.csrf-form').find('[type=hidden]').attr('value')
    
    data[name] = value;
    $.post(App.URL+Layout.SaveUrl+game, data, function() {
      App.Tooltip('hide')
      if (callback) callback()
    })
    
  }
  
  Layout.UpdateOrder = function(section, order) 
  {
      var data = {},
          name = $('.csrf-form').find('[type=hidden]').attr('name'),
          value = $('.csrf-form').find('[type=hidden]').attr('value')
      
      data[name] = value
      data['order'] = order
      if (section && order)
        $.post(App.URL+'game/update_layout_order/'+section.replace('is', 'order'), data, function() {});  
  }
    
  Layout.prototype = 
  {
    sortable: function(callback) 
    {
      var that = this
      that.el.sortable({
          placeholder: "dnd-li-active",
          stop: function(event, ui) {
              
              callback($(ui.item).parents('ul:first').data('section'), $(ui.item).parents('ul:first').sortable('toArray'))
          }
      });
      this.el.disableSelection();       
    }  
  }
  
  $(function() 
  {
    (new Layout($('.accordion-group .thumbnails'))).sortable(Layout.UpdateOrder)
    
    $("body").on('click', '.layout-remove', function(e) {
      
      var self = $(this)
      
      Layout.Remove(self.parents('.item:first').data('id'), self.parents('ul:first').data('section'), function() {
        self.parents('li:first').empty()
      })
      
      e.preventDefault()
    })
    
    $('body').off('click', '#overwrite-yes');
    $('body').on('click', '#overwrite-yes', function(e) {
      //console.log('drop to', Layout.DropToElement)
      Layout.Remove(Layout.DropToElement.attr('id'), Layout.DropToElement.parents('ul:first').data('section'), function() {
        //Layout.DropToElement.empty()
      })      
      
      Layout.Copy(Layout.DraggedElement, Layout.DropToElement)
      
      $('#overwrite-warning').modal('hide')
      
      e.preventDefault()
    });
    
    Layout.WarningModal.on('hide', function () {
      Layout.DropToElement = null
      Layout.DraggedElement = null
    })
  })
  
  App.Layout = Layout
  
} (jQuery);