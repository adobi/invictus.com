
<?php if (validation_errors()): ?>
    <div class="alert alert-error">
        <?php echo validation_errors() ?>
    </div>
<?php endif ?>

<?php echo form_open('', array('id'=>'edit-form', '_data-ajax-form'=>1)) ?>    

    <?php echo panel_close('publish_to_press/'.($item ? $item->id : '')) ?>
    
    <legend>
      <strong>8. </strong>
        <?php if ($item): ?>
          "<?php echo $item->name ?>" microsite
        <?php endif ?>
        <p class="pull-right">
          <a href="<?php echo base_url() ?>game/publish_to_microsites/<?php echo $item->id ?>" data-ajax-link class="btn"><i class="icon-refresh"></i></a>          
          <!-- <button class="btn btn-primary" rel="tooltip" title="Save game"><i class="icon-ok icon-white"></i></button> -->
          <?php if ($item): ?>
            <a href="<?php echo base_url() ?>game/delete/<?php echo $item->id ?>" class="btn delete-item" data-location="r" rel="tooltip" title="Delete game" data-modal-header="Game <?php echo $item->name ?>"><i class="icon-trash"></i></a>
          <?php endif ?>
        </p>
    </legend> 
    <div class="right-side-scroll">
    
    </div>
    <fieldset class="form-actions right">
        <!-- <button class="btn btn-primary" rel="tooltip" title="Save game"><i class="icon-ok icon-white"></i></button>  -->
        <a class="btn" data-ajax-link="1" href="<?php echo base_url() ?>game/publish_final/<?php echo $item->id ?>"><strong>9.</strong> Final verification &rarr;</a>
    </fieldset> 
  <?php echo form_close() ?>    