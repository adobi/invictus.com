
<?php if (validation_errors()): ?>
    <div class="alert alert-error">
        <?php echo validation_errors() ?>
    </div>
<?php endif ?>

<?php echo form_open_multipart('', array('id'=>'edit-form', '_data-ajax-form'=>1)) ?>    

    <?php echo panel_close() ?>
    <legend>
        <?php if ($item): ?>
            Edit settings
        <?php else: ?>
            New settings
        <?php endif ?>
        <p class="pull-right">
          <button class="btn btn-primary" rel="tooltip" title="Save settings"><i class="icon-ok icon-white"></i></button>
        </p>        
    </legend>    
    <!-- 
    <fieldset class="control-group">
        <label class="control-label" for="logo">Logo</label>
        <div class="controls">
            <input type="text" name = "logo" id = "logo" class = "span4" value = "<?php echo $_POST && isset($_POST['logo']) ? $_POST['logo'] : ($item ? $item->logo : '') ?>"/>
        </div>
    </fieldset>  
     -->
    <fieldset class="control-group">
        <label class="control-label" for="logo">Company logo</label>
        <div class="controls">
            <?php if ($item && $item->logo): ?>
                <img src="<?php echo base_url() ?>uploads/original/<?php echo $item->logo ?>" alt="">
                <a href="<?php echo base_url() ?>settings/delete_image/<?php echo $item->id ?>" class="delete-image pull-right" style="margin-right:20px;" rel="tooltip" title="Delete logo"><i class="icon-trash"></i></a>
            <?php else: ?>
              <input rel="tooltip" title="170x170" data-text="170x170" type="file" name = "logo" id = "logo" class = "span4" value = "<?php echo $_POST && isset($_POST['logo']) ? $_POST['logo'] : ($item ? $item->logo : '') ?>"/>
            <?php endif; ?>
        </div>
    </fieldset>     
    <fieldset class="control-group">
        <label class="control-label" for="facebook_app_id">Facebook app id</label>
        <div class="controls">
            <input type="text" name = "facebook_app_id" id = "facebook_app_id" class = "span4" value = "<?php echo $_POST && isset($_POST['facebook_app_id']) ? $_POST['facebook_app_id'] : ($item ? $item->facebook_app_id : '') ?>"/>
        </div>
    </fieldset>  
     
    <fieldset class="control-group">
        <label class="control-label" for="facebook_page">Facebook page name</label>
        <div class="controls">
            <input type="text" name = "facebook_page" id = "facebook_page" class = "span4" value = "<?php echo $_POST && isset($_POST['facebook_page']) ? $_POST['facebook_page'] : ($item ? $item->facebook_page : '') ?>"/>
        </div>
    </fieldset>  
    <fieldset class="control-group">
        <label class="control-label" for="twitter_id">Twitter id</label>
        <div class="controls">
            <input type="text" name = "twitter_id" id = "twitter_id" class = "span4" value = "<?php echo $_POST && isset($_POST['twitter_id']) ? $_POST['twitter_id'] : ($item ? $item->twitter_id : '') ?>"/>
        </div>
    </fieldset>  
    <fieldset class="control-group">
        <label class="control-label" for="google_analytics">Google analytics id</label>
        <div class="controls">
            <input type="text" name = "google_analytics" id = "google_analytics" class = "span4" value = "<?php echo $_POST && isset($_POST['google_analytics']) ? $_POST['google_analytics'] : ($item ? $item->google_analytics : '') ?>"/>
        </div>
    </fieldset>      
    <fieldset class="form-actions right">
        <button class="btn btn-primary" rel="tooltip" title="Save settings"><i class="icon-ok icon-white"></i></button>
    </fieldset>    
<?php echo form_close() ?>
