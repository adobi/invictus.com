<?php echo form_open('', array('id'=>'edit-form', 'class'=>'_form-horizontal', 'data-ajax-form'=>1)) ?>    
    <?php echo panel_close() ?>
        <p class="pull-right">
          <button class="btn btn-primary" rel="tooltip" title="Save analytics"><i class="icon-ok icon-white"></i></button>          
          <a href="<?php echo base_url() ?>contacttype/edit/<?php echo $item->id ?>" class="btn" data-ajax-link="1" rel="tooltip" title="Edit email"><i class="icon-pencil"></i></a>
          <a href="<?php echo base_url() ?>contacttype/delete/<?php echo $item->id ?>" class="btn delete-item" data-location="r" rel="tooltip" title="Delete email" data-modal-header="Email <?php echo $item->name ?>"><i class="icon-trash"></i></a>
        </p>

    <div class="right-side-scroll" style="">
      <legend>
        Send button analytics settings
      </legend> 
      <?php echo $template['partials']['send_email_analytics'] ?>
    </div>
    <fieldset class="form-actions right" style="clear: both;display:block">
        <button class="btn btn-primary" rel="tooltip" title="Save analytics"><i class="icon-ok icon-white"></i></button>
    </fieldset>    
<?php echo form_close() ?>    