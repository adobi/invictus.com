<?php echo form_open('', array('id'=>'edit-form', 'class'=>'_form-horizontal', 'data-ajax-form'=>1)) ?>    
    <?php echo panel_close() ?>
        <p class="pull-right">
          <button class="btn btn-primary" rel="tooltip" title="Save job analytics"><i class="icon-ok icon-white"></i></button>          
          <a href = "<?php echo base_url() ?>job/edit/<?php echo $item->id ?>" data-ajax-link="1" class="btn" rel="tooltip" title="Edit job"><i class="icon-pencil"></i></a>          
          <a href="<?php echo base_url() ?>job/show/<?php echo $item->id ?>" class="btn " data-ajax-link="1" rel="tooltip" title="View job"><i class="icon-eye-open"></i></a>
          <a href="<?php echo base_url() ?>job/delete/<?php echo $item->id ?>" class="btn delete-item select-item" data-location="r" rel="tooltip" title="Delete job" data-modal-header="Job <?php echo $item->name ?>"><i class="icon-trash"></i></a>
          <?php if ($item): ?>
            <!-- 
            <a href="<?php echo base_url() ?>job/analytics/<?php echo $item->id ?>" class="btn btn-primary" data-ajax-link="1"><i class="icon-signal icon-white"></i>Analytics</a>
             -->
          <?php endif ?>
        </p>

    <div class="right-side-scroll" style="">
      <legend>
          Job link analytics settings
      </legend> 
        
      <?php echo $template['partials']['job_analytics'] ?>
  
      <legend>
        Apply button analytics settings
      </legend> 
      <?php echo $template['partials']['apply_analytics'] ?>
    </div>
    <fieldset class="form-actions right" style="clear: both;display:block">
        <button class="btn btn-primary" rel="tooltip" title="Save job analytics"><i class="icon-ok icon-white"></i></button>
    </fieldset>    
<?php echo form_close() ?>    