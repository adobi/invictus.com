
<?php if (validation_errors()): ?>
    <div class="alert alert-error">
        <?php echo validation_errors() ?>
    </div>
<?php endif ?>

<?php echo form_open('', array('id'=>'edit-form', 'class'=>'_form-horizontal', 'data-ajax-form'=>1, 'data-trigger'=>'back')) ?>    
    <?php echo panel_close('videos/'.($game ? $game->id : '')) ?>
    <legend>
      <?php if ($item): ?>
          Edit video
      <?php else: ?>
          New video
      <?php endif ?>
      for <?php echo $game->name ?>
      <p class="pull-right">
        <button class="btn btn-primary" rel="tooltip" title="Save video"><i class="icon-ok icon-white"></i></button>
        <?php if ($item): ?>
          <a href="<?php echo base_url() ?>game/delete/<?php echo $item->id ?>" class="btn delete-item" data-location="r" rel="tooltip" title="Delete video" data-modal-header="<?php echo $item->description ?> video"><i class="icon-trash"></i></a>
        <?php endif ?>
      </p>        
    </legend>    
    <div class="right-side-scroll">
      <fieldset class="control-group">
          <label class="control-label" for="description">Description</label>
          <div class="controls">
              <input type="text" name = "description" id = "description" class = "span4" value = "<?php echo $_POST && isset($_POST['description']) ? $_POST['description'] : ($item ? $item->description : '') ?>"/>
          </div>
      </fieldset>  
      <fieldset class="control-group">
          <label class="control-label" for="code">Code</label>
          <div class="controls">
              <input type="text" name = "code" id = "code" class = "span4" value = "<?php echo $_POST && isset($_POST['code']) ? $_POST['code'] : ($item ? $item->code : '') ?>"/>
              <a href="javascript:void(0)" id = "preview-video" rel="tooltip" title="Preview video"><i class="icon-retweet"></i></a>
              <p><code>http://www.youtube.com/watch?v=<strong style="color:#000;">VA770wpLX-Q</strong></code></p>
              <div class="item" style="height: 350px;">
                <legend>Preview</legend>
                <div id="video-preview">
                  <?php if ($item && $item->code): ?>
                    <?php echo embed_youtube($item->code) ?>
                  <?php endif ?>
                </div>
              </div>
          </div>
      </fieldset>  
    </div>
    <fieldset class="form-actions right">
        <button class="btn btn-primary" rel="tooltip" title="Save video"><i class="icon-ok icon-white"></i></button>
    </fieldset>    
<?php echo form_close() ?>
