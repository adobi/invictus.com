
<?php if (validation_errors()): ?>
    <div class="alert alert-error">
        <?php echo validation_errors() ?>
    </div>
<?php endif ?>

<?php echo form_open_multipart('', array('id'=>'edit-form', 'class'=>'_form-horizontal')) ?>    

    <legend>
        <?php if ($item): ?>
            Edit <?php echo $item->name ?>
        <?php else: ?>
            New
        <?php endif ?>
        <p class="pull-right"><a href="#" class="btn" data-close-right="1"><i class="icon-remove"></i>Close</a></p>
    </legend>    
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
                    <a href="<?php echo base_url() ?>jobcategory/delete_image/<?php echo $item->id ?>" class="pull-right" data-ajax-link="1"><i class="icon-trash"></i></a>
                <?php else: ?>
                    <input type="file" name = "icon" id = "icon" class = "span4"/>
                <?php endif ?>
            </div>
        </fieldset>      
    <fieldset class="form-actions right">
        <button class="btn btn-primary"><i class="icon-ok icon-white"></i>Save</button>
    </fieldset>    
<?php echo form_close() ?>
