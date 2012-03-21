
<?php if (validation_errors()): ?>
    <div class="alert alert-error">
        <?php echo validation_errors() ?>
    </div>
<?php endif ?>

<?php echo form_open_multipart('', array('id'=>'edit-form', '_data-ajax-form'=>1)) ?>    
    <?php echo panel_close('edit/'.($item ? $item->id : '')) ?>
    
    
    <legend>
      <strong>2. </strong>
        <?php if ($item): ?>
          "<?php echo $item->name ?>" available on
        <?php endif ?>
        <p class="pull-right">
          <button class="btn btn-primary" rel="tooltip" title="Save game"><i class="icon-ok icon-white"></i></button>
          <?php if ($item): ?>
            <a href="<?php echo base_url() ?>game/delete/<?php echo $item->id ?>" class="btn delete-item" data-location="r" rel="tooltip" title="Delete game" data-modal-header="Game <?php echo $item->name ?>"><i class="icon-trash"></i></a>
          <?php endif ?>
        </p> 
    </legend> 
    <div class="right-side-scroll">
    
    </div>
    <fieldset class="form-actions right">
        <button class="btn btn-primary" rel="tooltip" title="Save game"><i class="icon-ok icon-white"></i></button>
        <a class="btn" data-ajax-link="1" href="<?php echo base_url() ?>game/images/<?php echo $item->id ?>"><strong>3.</strong> Set up images</a>
    </fieldset>      
<?php echo form_close() ?>    