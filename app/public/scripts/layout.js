!function($) 
{
  "use strict"
  
  var Layout = function(el)
  {
    this.el = el
  }
  
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
        
        if (!$.trim(dropTo.html()).length) {
          //dropTo.html(clone.html())
          Layout.Copy(clone, dropTo)
        } else {
        
          Layout.WarningModal.find('#old-item').html(dropTo.find('h6').html())
          Layout.WarningModal.find('#new-item').html(clone.find('h6').html())
        
          Layout.WarningModal.modal()
          
          Layout.DropToElement = dropTo
          Layout.DraggedElement = clone
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
    $.post(App.URL+'game/layout/'+game, data, function() {
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
    sortable: function() 
    {
      var that = this
      that.el.sortable({
          placeholder: "dnd-li-active",
          stop: function(event, ui) {
              /*var data = {},
                  name = $('.csrf-form').find('[type=hidden]').attr('name'),
                  value = $('.csrf-form').find('[type=hidden]').attr('value'); 
                             
              data['order'] = that.el.sortable('toArray');
              data[name] = value;
              */
              
              //console.log(that.el.data('section'))
              Layout.UpdateOrder(that.el.data('section'), that.el.sortable('toArray'))
              
              //console.log('SORTABLE: ', data['order'])
              //$.post(App.URL+"contacttype/update_order", data, function() {});
          }
      });
      this.el.disableSelection();       
    }  
  }
  
  $(function() 
  {
    (new Layout($('.accordion-group .thumbnails'))).sortable()
    
    $("body").on('click', '.layout-remove', function(e) {
      
      var self = $(this)
      
      Layout.Remove(self.parents('.item:first').data('id'), self.parents('ul:first').data('section'), function() {
        self.parents('li:first').empty()
      })
      
      e.preventDefault()
    })
    
    $('body').on('click', '#overwrite-yes', function(e) {
      
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