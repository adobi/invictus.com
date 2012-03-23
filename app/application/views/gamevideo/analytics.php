<?php echo form_open('', array('id'=>'edit-form', 'class'=>'_form-horizontal', 'data-ajax-form'=>1)) ?>    
    <?php echo panel_close('videos/'.($game ? $game->id : '')) ?>
  <legend>
    Analytics settings
    <p class="pull-right">
      <button class="btn btn-primary" rel="tooltip" title="Save analytics"><i class="icon-ok icon-white"></i></button>
      <?php if ($item): ?>
        <a href="<?php echo base_url() ?>video/delete/<?php echo $item->id ?>" class="btn delete-item" data-location="r" rel="tooltip" title="Delete video" data-modal-header="Video <?php echo $item->description ?>"><i class="icon-trash"></i></a>
      <?php endif ?>
    </p> 
  </legend>

    <div class="right-side-scroll" style="">

      <?php echo $template['partials']['video_analytics'] ?>
    </div>
    <fieldset class="form-actions right" style="clear: both;display:block">
        <button class="btn btn-primary" rel="tooltip" title="Save analytics"><i class="icon-ok icon-white"></i></button>
    </fieldset>    
<?php echo form_close() ?>    