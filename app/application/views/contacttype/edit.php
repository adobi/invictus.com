
<?php if (validation_errors()): ?>
    <div class="alert alert-error">
        <?php echo validation_errors() ?>
    </div>
<?php endif ?>

<?php echo form_open('', array('id'=>'edit-form', 'data-ajax-form'=>1)) ?>    

    <?php echo panel_close() ?>
    <legend>
        <?php if ($item): ?>
            Edit <?php echo $item->name ?>
        <?php else: ?>
            New email address
        <?php endif ?>
        <p class="pull-right">
          <button class="btn btn-primary"><i class="icon-ok icon-white"></i>Save</button>
          <?php if ($item): ?>
            <a class="btn btn-primary" href="<?php echo base_url() ?>contacttype/analytics/<?php echo $item->id ?>" data-ajax-link="1" rel="tooltip" title="Analytics settings"><i class="icon-signal icon-white"></i></a>
            <a href="<?php echo base_url() ?>contacttype/delete/<?php echo $item->id ?>" class="btn delete-item" data-location="r" rel="tooltip" title="Delete email"><i class="icon-trash"></i></a>
          <?php endif ?>
        </p>        
    </legend>   
        <fieldset class="control-group">
            <label class="control-label" for="name">Name</label>
            <div class="controls">
                <input type="text" name = "name" id = "name" class = "span4" value = "<?php echo $_POST && isset($_POST['name']) ? $_POST['name'] : ($item ? $item->name : '') ?>"/>
            </div>
        </fieldset>    
        <fieldset class="control-group">
            <label class="control-label" for="email">Email</label>
            <div class="controls">
                <input type="text" name = "email" id = "email" class = "span4" value = "<?php echo $_POST && isset($_POST['email']) ? $_POST['email'] : ($item ? $item->email : '') ?>"/>
            </div>
        </fieldset>  
     
    <fieldset class="form-actions right">
        <button class="btn btn-primary"><i class="icon-ok icon-white"></i>Save</button>
    </fieldset>    
<?php echo form_close() ?>
