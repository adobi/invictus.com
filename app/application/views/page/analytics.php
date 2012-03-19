<?php echo form_open('', array('id'=>'edit-form', 'class'=>'_form-horizontal', 'data-ajax-form'=>1)) ?>    
    <?php echo panel_close() ?>
        <p class="pull-right">
          <button class="btn btn-primary" rel="tooltip" title="Save analytics"><i class="icon-ok icon-white"></i></button>          
          <a href="<?php echo base_url() ?>page/edit/<?php echo $item->id ?>" class="btn" data-ajax-link="1" rel="tooltip" title="Edit page"><i class="icon-pencil"></i></a>
          <a href="<?php echo base_url() ?>page/seo/<?php echo $item->id ?>" class="btn" data-ajax-link="1" rel="tooltip" title="SEO settings"><i class="icon-search"></i></a>
          <a href="<?php echo base_url() ?>page/delete/<?php echo $item->id ?>" class="btn delete-job" data-location="r" rel="tooltip" title="Delete page"><i class="icon-trash"></i></a>
        </p>

    <div class="right-side-scroll" style="">
      <legend>
        "<?php echo $item->name ?>" analytics settings
      </legend> 
      <?php echo $template['partials']['page_analytics'] ?>
    </div>
    <fieldset class="form-actions right" style="clear: both;display:block">
        <button class="btn btn-primary" rel="tooltip" title="Save analytics"><i class="icon-ok icon-white"></i></button>
    </fieldset>    
<?php echo form_close() ?>    