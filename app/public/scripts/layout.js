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
        console.log(ui)
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
    
    dest.html(src.html())
  }
    
  Layout.prototype = 
  {
    sortable: function() 
    {
      var that = this
      that.el.sortable({
          placeholder: "dnd-li-active",
          stop: function(event, ui) {
              var data = {},
                  name = $('.csrf-form').find('[type=hidden]').attr('name'),
                  value = $('.csrf-form').find('[type=hidden]').attr('value'); 
                             
              data['order'] = that.el.sortable('toArray');
              data[name] = value;
              
              //$.post(App.URL+"contacttype/update_order", data, function() {});
          }
      });
      this.el.disableSelection();       
    }  
  }
  
  $(function() 
  {
    (new Layout($('.accordion-group .thumbnails'))).sortable()
    
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