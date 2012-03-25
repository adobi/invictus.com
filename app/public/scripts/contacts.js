!function($) 
{
  
  "use strict"
  
  var Contacts = function(el, container)
  {
    this.el = $(el)
  }
  
  Contacts.sortable = function() 
  {
    $(".contact-type-items" ).sortable({
        placeholder: "alert",
        stop: function(event, ui) {
            var data = {},
                name = $('.csrf-form').find('[type=hidden]').attr('name'),
                value = $('.csrf-form').find('[type=hidden]').attr('value'); 
                           
            data['order'] = $( ".contact-type-items" ).sortable('toArray');
            data[name] = value;
            
            $.post(App.URL+"contacttype/update_order", data, function() {});
        }
    });
		$( ".contact-type-items" ).disableSelection(); 
  }
  
  Contacts.prototype = {

  }
  
  $(function() 
  {
    Contacts.sortable()
    
  })
  
  App.Contacts = Contacts
  
} (jQuery);