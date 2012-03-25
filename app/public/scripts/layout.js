!function($) 
{
  "use strict"
  
  var Layout = function(el)
  {
    this.el = el
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