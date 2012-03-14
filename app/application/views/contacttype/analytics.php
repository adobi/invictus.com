<?php echo form_open('', array('id'=>'edit-form', 'class'=>'_form-horizontal', 'data-ajax-form'=>1)) ?>    
    <?php echo panel_close() ?>
        <p class="pull-right">
          <button class="btn btn-primary"><i class="icon-ok icon-white"></i>Save</button>          
          <a href="<?php echo base_url() ?>contacttype/edit/<?php echo $item->id ?>" class="btn btn-primary" data-ajax-link="1" rel="tooltip" title="Edit email"><i class="icon-pencil icon-white"></i></a>
          <a href="<?php echo base_url() ?>contacttype/delete/<?php echo $item->id ?>" class="btn delete-job" data-location="r" rel="tooltip" title="Delete eamil"><i class="icon-trash"></i></a>
        </p>

    <div class="right-side-scroll" style="">
      <legend>
        Send button analytics settings
      </legend> 
      <?php echo $template['partials']['send_email_analytics'] ?>
    </div>
    <fieldset class="form-actions right" style="clear: both;display:block">
        <button class="btn btn-primary"><i class="icon-ok icon-white"></i>Save</button>
    </fieldset>    
<?php echo form_close() ?>    