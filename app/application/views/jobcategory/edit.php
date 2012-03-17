
<?php if (validation_errors()): ?>
    <div class="alert alert-error">
        <?php echo validation_errors() ?>
    </div>
<?php endif ?>

<?php echo form_open_multipart('', array('id'=>'edit-form', 'class'=>'_form-horizontal')) ?>    

    <?php echo panel_close() ?>
    
    <legend>
        <?php if ($item): ?>
            Edit <?php echo $item->name ?>
        <?php else: ?>
            New job category
        <?php endif ?>
        <p class="pull-right">
          <button class="btn btn-primary" rel="tooltip" title="Save category"><i class="icon-ok icon-white"></i></button>
          <?php if ($item): ?>
            <a href="<?php echo base_url() ?>jobcategory/delete/<?php echo $item->id ?>" class="btn delete-job" data-location="r" rel="tooltip" title="Delete category"><i class="icon-trash"></i></a>
          <?php endif ?>
        </p>
    </legend>   
    <div class="span10 right-side-scroll">
 
        <fieldset class="control-group">
            <label class="control-label" for="name">Name</label>
            <div class="controls">
                <input type="text" name = "name" id = "name" class = "span4" value = "<?php echo $_POST && isset($_POST['name']) ? $_POST['name'] : ($item ? $item->name : '') ?>"/>
            </div>
        </fieldset>  
        <fieldset class="control-group">
            <label class="control-label" for="icon">Icon</label>
            <div class="controls">
                <?php if ($item && $item->icon): ?>
                    <img src="<?php echo base_url() ?>uploads/original/<?php echo $item->icon ?>" alt="">
                    <a href="<?php echo base_url() ?>jobcategory/delete_image/<?php echo $item->id ?>" class="delete-image pull-right" style="margin-right:20px;" rel="tooltip" title="Delete icon"><i class="icon-trash"></i></a>
                <?php else: ?>
                    <input type="file" name = "icon" id = "icon" class = "span4"/>
                <?php endif ?>
            </div>
        </fieldset>      
    </div>
    <fieldset class="form-actions right">
        <button class="btn btn-primary" rel="tooltip" title="Save category"><i class="icon-ok icon-white"></i></button>
    </fieldset>    
<?php echo form_close() ?>
