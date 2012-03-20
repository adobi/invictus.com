
<?php if (validation_errors()): ?>
    <div class="alert alert-error">
        <?php echo validation_errors() ?>
    </div>
<?php endif ?>

<?php echo form_open_multipart('', array('id'=>'edit-form', '_data-ajax-form'=>1)) ?>    

    <?php echo panel_close() ?>
    
    <legend>
        <?php if ($item): ?>
            Edit "<?php echo $item->name ?>"
        <?php else: ?>
            New game
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
        <fieldset class="control-group">
            <label class="control-label" for="name">Name</label>
            <div class="controls">
                <input type="text" name = "name" id = "name" class = "span4" value = "<?php echo $_POST && isset($_POST['name']) ? $_POST['name'] : ($item ? $item->name : '') ?>"/>
            </div>
        </fieldset>  
        <fieldset class="control-group">
            <label class="control-label" for="released">Released</label>
            <div class="controls">
              <div class="input-append">
                <input type="text" name = "released" id = "released" class = "span2 datepicker" value = "<?php echo $_POST && isset($_POST['released']) ? $_POST['released'] : ($item ? to_date($item->released) : '') ?>"/>
                <a class="btn add-on trigger-datepicker"><i class="icon-calendar"></i></a>
              </div>
            </div>
        </fieldset>        
        <fieldset class="control-group">
            <label class="control-label" for="logo">Logo</label>
            <div class="controls">
                <?php if ($item && $item->logo): ?>
                    <img src="<?php echo base_url() ?>uploads/original/<?php echo $item->logo ?>" alt="">
                    <a href="<?php echo base_url() ?>game/delete_image/<?php echo $item->id ?>/logo" class="delete-image pull-right" style="margin-right:20px;" rel="tooltip" title="Delete logo"><i class="icon-trash"></i></a>
                <?php else: ?>
                  <input rel="tooltip" title="170x170" data-text="170x170" type="file" name = "logo" id = "logo" class = "span4" value = "<?php echo $_POST && isset($_POST['logo']) ? $_POST['logo'] : ($item ? $item->logo : '') ?>"/>
                <?php endif; ?>
            </div>
        </fieldset>  
        <fieldset class="control-group">
            <label class="control-label" for="hero_image">Hero image</label>
            <div class="controls">
                <?php if ($item && $item->hero_image): ?>
                    <img class="span4" src="<?php echo base_url() ?>uploads/original/<?php echo $item->hero_image ?>" alt="">
                    <a href="<?php echo base_url() ?>game/delete_image/<?php echo $item->id ?>/hero_image" class="delete-image pull-right" style="margin-right:20px;" rel="tooltip" title="Delete hero image"><i class="icon-trash"></i></a>
                <?php else: ?>              
                  <input rel="tooltip" title="770x510"  data-text="770x510" type="file" name = "hero_image" id = "hero_image" class = "span4" value = "<?php echo $_POST && isset($_POST['hero_image']) ? $_POST['hero_image'] : ($item ? $item->hero_image : '') ?>"/>
                <?php endif; ?>
            </div>
        </fieldset>  
        <fieldset class="control-group">
            <label class="control-label" for="teaser_image">Teaser image</label>
            <div class="controls">
                <?php if ($item && $item->teaser_image): ?>
                    <img class="span4" src="<?php echo base_url() ?>uploads/original/<?php echo $item->teaser_image ?>" alt="">
                    <a href="<?php echo base_url() ?>game/delete_image/<?php echo $item->id ?>/teaser_image" class="delete-image pull-right" style="margin-right:20px;" rel="tooltip" title="Delete teaser image"><i class="icon-trash"></i></a>
                <?php else: ?>               
                  <input rel="tooltip" title="370x165"  data-text="370x165" type="file" name = "teaser_image" id = "teaser_image" class = "span4" value = "<?php echo $_POST && isset($_POST['teaser_image']) ? $_POST['teaser_image'] : ($item ? $item->teaser_image : '') ?>"/>
                <?php endif; ?>
            </div>
        </fieldset>  
        <fieldset class="control-group">
            <label class="control-label" for="short_description">Short description</label>
            <div class="controls">
                <textarea rows="2"name = "short_description" id = "short_description" class = "span4"><?php echo $_POST && isset($_POST['short_description']) ? $_POST['short_description'] : ($item ? $item->short_description : '') ?></textarea>
            </div>
        </fieldset>  
        <fieldset class="control-group">
            <label class="control-label" for="long_description">Long description</label>
            <div class="controls">
                <textarea rows="5" name="long_description" id = "long_description" class="span4"><?php echo $_POST && isset($_POST['long_description']) ? $_POST['long_description'] : ($item ? $item->long_description : '') ?></textarea>
            </div>
        </fieldset> 
        <fieldset class="control-group">
            <label class="control-label" for="facebook_app_id">Facebook app id</label>
            <div class="controls">
                <input type="text" name = "facebook_app_id" id = "facebook_app_id" class = "span4" value = "<?php echo $_POST && isset($_POST['facebook_app_id']) ? $_POST['facebook_app_id'] : ($item ? $item->facebook_app_id : '') ?>"/>
            </div>
        </fieldset> 
        <fieldset class="control-group">
            <label class="control-label" for="facebook_page">Facebook page</label>
            <div class="controls">
                <input type="text" name = "facebook_page" id = "facebook_page" class = "span4" value = "<?php echo $_POST && isset($_POST['facebook_page']) ? $_POST['facebook_page'] : ($item ? $item->facebook_page : 'http://facebook.com/') ?>"/>
            </div>
        </fieldset>                          
        <fieldset class="control-group">
            <label class="control-label" for="twitter_page">Twitter page</label>
            <div class="controls">
                <input type="text" name = "twitter_page" id = "twitter_page" class = "span4" value = "<?php echo $_POST && isset($_POST['twitter_page']) ? $_POST['twitter_page'] : ($item ? $item->twitter_page : 'http://twitter.com/') ?>"/>
            </div>
        </fieldset> 
        <!-- 
        <fieldset class="control-group">
            <label class="checkbox" for="is_active">
              Is active
              <input type="checkbox" name = "is_active" id = "is_active" <?php echo $item && $item->is_active ? 'checked="checked"' : '' ?>/>
            </label>
        </fieldset>  
         -->
    </div>
    <fieldset class="form-actions right">
        <button class="btn btn-primary" rel="tooltip" title="Save game"><i class="icon-ok icon-white"></i></button>
    </fieldset>    
<?php echo form_close() ?>
