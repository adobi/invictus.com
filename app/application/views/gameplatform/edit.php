  
  <?php echo panel_close('platforms/'.($game ? $game->id : '')) ?>

  <?php echo form_open('', array('id'=>'edit-form', 'data-ajax-form'=>1, 'class'=>'_form-horizontal', 'data-trigger'=>'back')) ?>
      <legend>
        Set up Platform for <?php echo $game->name ?>
        <p class="pull-right">
          <button class="btn btn-primary" rel="tooltip" title="Save platform"><i class="icon-ok icon-white"></i></button>
          <?php if ($item): ?>
            <a href="<?php echo base_url() ?>game/delete/<?php echo $item->id ?>" class="btn delete-item" data-location="r" rel="tooltip" title="Delete platform" data-modal-header="platform from <?php echo $game->name ?>"><i class="icon-trash"></i></a>
          <?php endif ?>
        </p>         
      </legend>
      <fieldset class="control-group">
          <label class="control-label" for="url">Platform</label>
          <div class="controls">
              <?php echo form_dropdown('platform_id', $platforms, $item ? $item->platform_id : '', 'class="span4"') ?>
          </div>
      </fieldset>       
      <fieldset class="control-group">
          <label class="control-label" for="url">Original url</label>
          <div class="controls">
              <input type="text" name="long_url" id = "bitly-input-url" class = "span4" value = "<?php echo $item ? $item->long_url : '' ?>"/> <a id="shorten-with-bitly" href="javascript:void(0)" rel="tooltip" title="Shorten with bit.ly"><i class="icon-retweet"></i></a>
          </div>
      </fieldset>       
      <fieldset class="control-group">
          <label class="control-label" for="url">Shorten url <span class="label label-important">Do not edit</span></label>
          <div class="controls">
              <input type="text" name = "url" id = "url" class = "span4" value = "<?php echo $item ? $item->url : '' ?>" style="margin-top:5px;" />
          </div>
      </fieldset>       

      <fieldset class="form-actions right">
          <button class="btn btn-primary" rel="tooltip" title="Save platform"><i class="icon-ok icon-white"></i></button>
      </fieldset>      
    <?php echo form_close() ?>    
    