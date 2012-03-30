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
  
  Contacts.markAsRead = function() 
  {
    $('body').on('click', '.mark-as-read', function(e) {
      
      var self = $(this)
      
      $.get(self.attr('href'), function(resp) {
        
        if (resp !== '0') {
          self.parents('.item:first').find('.unread').removeClass('unread').addClass('read');
          
          var badge = $('.contact-type-items .selected').find('.badge')
          badge.html(parseInt(badge.html())-1)
          self.remove()
        }
      })
      
      e.preventDefault()
    })
  };
  
  Contacts.prototype = {

  }
  
  $(function() 
  {
    Contacts.sortable()
    Contacts.markAsRead()
  })
  
  App.Contacts = Contacts
  
} (jQuery);