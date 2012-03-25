!function($) 
{
  "use strict"
  
  var Layout = function(el)
  {
    this.el = el
  }
  
  Layout.DragAndDropGames  = function() 
  {
    $( ".all-games li" ).draggable({
      appendTo: "body",
      helper: "clone"
    })
    
    $('.accordion-group .thumbnails').droppable({
      activeClass: "dnd-li-active",
      //hoverClass: "ui-state-hover",
      accept: ":not(.ui-sortable-helper)",
      drop: function( event, ui ) {
        //$( this ).find( ".placeholder" ).remove();
        //$( "<li></li>" ).text( ui.draggable.text() ).appendTo( this );
        
        var clone = ui.draggable.clone()
        clone.find('.caption').show()
        $(this).append(clone);
      }
    })     
  }
  
  Layout.prototype = 
  {
    sortable: function() 
    {
      var that = this
      that.el.sortable({
          placeholder: "alert item-placeholder",
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
   
  })
  
  App.Layout = Layout
  
} (jQuery);