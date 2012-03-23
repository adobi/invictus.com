<?php echo form_open('', array('id'=>'edit-form', 'class'=>'_form-horizontal', 'data-ajax-form'=>1)) ?>    
    <?php echo panel_close('images/'.($game ? $game->id : '')) ?>
  <legend>
    Analytics settings
    <p class="pull-right">
      <button class="btn btn-primary" rel="tooltip" title="Save analytics"><i class="icon-ok icon-white"></i></button>
      <?php if ($item): ?>
        <a href="<?php echo base_url() ?>image/delete/<?php echo $item->id ?>" class="btn delete-item" data-location="r" rel="tooltip" title="Delete image" data-modal-header="Image <?php echo $item->path ?>"><i class="icon-trash"></i></a>
      <?php endif ?>
    </p> 
  </legend>

    <div class="right-side-scroll" style="">

      <?php echo $template['partials']['image_analytics'] ?>
    </div>
    <fieldset class="form-actions right" style="clear: both;display:block">
        <button class="btn btn-primary" rel="tooltip" title="Save analytics"><i class="icon-ok icon-white"></i></button>
    </fieldset>    
<?php echo form_close() ?>    