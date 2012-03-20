<?php echo form_open('', array('id'=>'edit-form', 'class'=>'_form-horizontal', 'data-ajax-form'=>1)) ?>    
    <?php echo panel_close() ?>
        <p class="pull-right">
          <button class="btn btn-primary" rel="tooltip" title="Save analytics"><i class="icon-ok icon-white"></i></button>          
          <a href="<?php echo base_url() ?>game/edit/<?php echo $item->id ?>" class="btn" data-ajax-link="1" rel="tooltip" title="Edit game"><i class="icon-pencil"></i></a>
          <a href="<?php echo base_url() ?>game/seo/<?php echo $item->id ?>" class="btn" data-ajax-link="1" rel="tooltip" title="SEO settings"><i class="icon-search"></i></a>
          <a href="<?php echo base_url() ?>game/delete/<?php echo $item->id ?>" class="btn delete-item" data-location="r" rel="tooltip" title="Delete game" data-modal-header="Game <?php echo $item->name ?>"><i class="icon-trash"></i></a>
        </p>

    <div class="right-side-scroll" style="">
      <legend>
        "<?php echo $item->name ?>" analytics settings
      </legend> 
      <?php echo $template['partials']['game_analytics'] ?>
    </div>
    <fieldset class="form-actions right" style="clear: both;display:block">
        <button class="btn btn-primary" rel="tooltip" title="Save analytics"><i class="icon-ok icon-white"></i></button>
    </fieldset>    
<?php echo form_close() ?>    