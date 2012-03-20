
<?php if (validation_errors()): ?>
    <div class="alert alert-error">
        <?php echo validation_errors() ?>
    </div>
<?php endif ?>

<?php echo form_open_multipart('', array('id'=>'edit-form', '_data-ajax-form'=>1)) ?>    

    <?php echo panel_close() ?>
    
    <legend>
        <?php if ($item): ?>
          "<?php echo $item->name ?>" videos
        <?php endif ?>
        <p class="pull-right">
          <button class="btn btn-primary" rel="tooltip" title="Save game"><i class="icon-ok icon-white"></i></button>
          <?php if ($item): ?>
            <a href="<?php echo base_url() ?>page/seo/<?php echo $item->id ?>" class="btn" data-ajax-link="1" rel="tooltip" title="SEO settings"><i class="icon-search"></i></a>
            <a href="<?php echo base_url() ?>page/analytics/<?php echo $item->id ?>" class="btn " data-ajax-link="1" rel="tooltip" title="Analytics settings"><i class="icon-signal"></i></a>
            <a href="<?php echo base_url() ?>page/delete/<?php echo $item->id ?>" class="btn delete-item" data-location="r" rel="tooltip" title="Delete page" data-modal-header="Page <?php echo $item->name ?>"><i class="icon-trash"></i></a>
          <?php endif ?>
        </p>        
    </legend> 
    <div class="right-side-scroll">
    
    </div>
    <fieldset class="form-actions right">
        <button class="btn btn-primary" rel="tooltip" title="Save game"><i class="icon-ok icon-white"></i></button> <a class="btn" data-ajax-link="1" href="<?php echo base_url() ?>game/videos/<?php echo $item->id ?>">Add some videos</a>
    </fieldset>      
<?php echo form_close() ?>    