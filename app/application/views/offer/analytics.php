<?php echo form_open('', array('id'=>'edit-form', 'class'=>'_form-horizontal', 'data-ajax-form'=>1)) ?>    
    <?php echo panel_close() ?>
        <p class="pull-right">
          <button class="btn btn-primary" rel="tooltip" title="Save offer analytics"><i class="icon-ok icon-white"></i></button>          
          <a href="<?php echo base_url() ?>offer/edit/<?php echo $item->id ?>" class="btn" data-ajax-link="1"><i class="icon-pencil"></i></a>
          <?php if ($item): ?>
            <!-- 
            <a href="<?php echo base_url() ?>job/analytics/<?php echo $item->id ?>" class="btn btn-primary" data-ajax-link="1"><i class="icon-signal icon-white"></i>Analytics</a>
             -->
          <?php endif ?>
        </p>

    <div class="right-side-scroll" style="">
      <legend>
          Subscribe button analytics settings
      </legend> 
        
      <?php echo $template['partials']['subscribe_analytics'] ?>
    </div>
    <fieldset class="form-actions right" style="clear: both;display:block">
        <button class="btn btn-primary" rel="tooltip" title="Save offer analytics"><i class="icon-ok icon-white"></i></button>
    </fieldset>    
<?php echo form_close() ?>    