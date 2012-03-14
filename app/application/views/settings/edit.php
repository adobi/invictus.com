
<?php if (validation_errors()): ?>
    <div class="alert alert-error">
        <?php echo validation_errors() ?>
    </div>
<?php endif ?>

<?php echo form_open('', array('id'=>'edit-form', 'data-ajax-form'=>1)) ?>    

    <?php echo panel_close() ?>
    <legend>
        <?php if ($item): ?>
            Edit settings
        <?php else: ?>
            New settings
        <?php endif ?>
        <p class="pull-right">
          <button class="btn btn-primary"><i class="icon-ok icon-white"></i>Save</button>
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
        <button class="btn btn-primary"><i class="icon-ok icon-white"></i>Save</button>
    </fieldset>    
<?php echo form_close() ?>
