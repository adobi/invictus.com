!function($) 
{
  "use strict"  
  
  var Crosspromo = function(el) 
  {
    this.el = el
  }
  
  Crosspromo.WarningModal = $('#overwrite-warning')
  
  Crosspromo.BaseGameId = 0
  
  Crosspromo.UpdateOrder = function(order) 
  {
      var data = {},
          name = $('.csrf-form').find('[type=hidden]').attr('name'),
          value = $('.csrf-form').find('[type=hidden]').attr('value')
      
      data[name] = value
      data['order'] = order
      
      $.post(App.URL+'crosspromo/update_order/', data, function() {});  
  }  

  Crosspromo.DragAndDropGames  = function() 
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
            Crosspromo.Copy(clone, dropTo)
          } else {
          
            Crosspromo.WarningModal.find('#old-item').html(dropTo.attr('data-original-title'))
            Crosspromo.WarningModal.find('#new-item').html(clone.attr('data-original-title'))
          
            Crosspromo.WarningModal.modal()
            
            Crosspromo.DropToElement = dropTo
            Crosspromo.DraggedElement = clone
          }
        } else {
        
        $('#already-in-use-error').modal().find('#item-to-use').html(clone.attr('data-original-title'))
        
        //App.showNotification('<p>'+clone.attr('data-original-title')+' is already in the list, select something else!</p>')
        }
          
      }
    })     
  }
  
  Crosspromo.Copy = function (src, dest) 
  {
    //console.log(src, dest)
    dest.data('old-id', dest.attr('id'))
    dest.html(src.html())
    dest.attr('id', dest.find('.item').data('id'))
    dest.find('.caption').show()
    dest.attr('rel', src.attr('rel')).attr('data-original-title', src.attr('data-original-title'))
    Crosspromo.Add(dest, src)
  }
  
  Crosspromo.Add = function(el, src)
  {
    var item = el.data('old-id'),
        promoGame = src.find('.item').data('id')
        
    if (item && promoGame) {

      Crosspromo.Save(el, item, promoGame)
    }
  }
  
  Crosspromo.Remove = function(id, callback)
  {
    $.get(App.URL+'crosspromo/delete/'+id, function() {
      
      App.Tooltip('hide')
      
      callback && callback()
      Crosspromo.TriggerLoadAllGames()
    })
  }
  
  Crosspromo.Save = function(el, item, game) 
  { 
    var name = $('.csrf-form').find('[type=hidden]').attr('name'),
        value = $('.csrf-form').find('[type=hidden]').attr('value'),
        data = {}
        
    data[name] = value;
    data['promo_game_id'] = game
    $.post(App.URL+'crosspromo/edit/'+item, data, function(resp) {
      
      App.Tooltip('hide')
      
      el.attr('id', resp)
      
      Crosspromo.UpdateOrder(el.parents('.thumbnails:first').sortable('toArray'))
      Crosspromo.TriggerLoadAllGames()
    })
    
  }
    
  Crosspromo.prototype = 
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

  Crosspromo.LoadAllGames = function() 
  {
    $('#crosspromo-all-games').load(App.URL+"crosspromo/load_all_games", function() {
      $('#crosspromo-all-games').find('[data-id='+Crosspromo.Selected+']').addClass('selected')
    })
  }
  
  Crosspromo.TriggerLoadAllGames = function() {
    $('body').trigger('crosspromo-laod-games')
  }
  
  Crosspromo.LoadForGame = function(id) 
  {
    Crosspromo.BaseGameId = id
    
    $('.all-games').find('li.hide').removeClass('hide')
    $('.all-games').find('[data-id='+id+']').parents('li').addClass('hide')
    App.Tooltip('hide')
    $('#crosspromo-games .accordion-inner').load(App.URL+'crosspromo/for_game/'+id, function() {
      
      (new Crosspromo($('.accordion-group  .accordion-inner .thumbnails'))).sortable(Crosspromo.UpdateOrder)
      
      Crosspromo.DragAndDropGames()
      
      App.Tooltip()
    })
  };
  
  Crosspromo.Empty = function (targetId)
  {
    if (targetId) {
      $.get(App.URL+"crosspromo/empty_promo_game/"+targetId, function(resp) {
      
      })
    }
  }
  
  $(function() {
    
    $('body').on('crosspromo-laod-games', Crosspromo.LoadAllGames);
    
    Crosspromo.TriggerLoadAllGames()
    
    $('body').on('change', '#crosspromo_base_game', function(e) {
      Crosspromo.LoadForGame($(this).val())
      $('#crosspromo-games>.thumbnails').hide()
      e.preventDefault()
    })
      
    $('body').on('click', '.crosspromo-selected-game', function(e) {
      
      //Crosspromo.LoadForGame($(this).val())
      
      var self = $(this);
      
      self.parents('ul:first').find('.selected').removeClass('selected')
      self.parents('.item:first').addClass('selected')
      
      Crosspromo.Selected = $(this).data('id')
      
      Crosspromo.LoadForGame($(this).data('id'))
      
      e.preventDefault()
    })
    
    $('body').off('click', '.layout-remove');
    $("body").on('click', '.layout-remove', function(e) {
      
      var self = $(this)
      
      Crosspromo.Remove(self.parents('li:first').attr('id'), function() {
        var li = self.parents('li:first')
        
        li.removeAttr('data-original-title').removeAttr('rel').empty()
      })
      
      e.preventDefault()
    })
    
    $('body').off('click', '#overwrite-yes');
    $('body').on('click', '#overwrite-yes', function(e) {
      //console.log(Crosspromo.DropToElement)
      Crosspromo.Empty(Crosspromo.DropToElement.attr('id'))
      
      Crosspromo.Copy(Crosspromo.DraggedElement, Crosspromo.DropToElement)
      
      $('#overwrite-warning').modal('hide')
      
      e.preventDefault()
    });
    
    Crosspromo.WarningModal.on('hide', function () {
      Crosspromo.DropToElement = null
      Crosspromo.DraggedElement = null
    })
  })
  App.Crosspromo = Crosspromo

  
} (jQuery);