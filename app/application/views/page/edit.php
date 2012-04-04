
<?php if (validation_errors()): ?>
    <div class="alert alert-error">
        <?php echo validation_errors() ?>
    </div>
<?php endif ?>

<?php echo form_open('', array('id'=>'edit-form', 'data-ajax-form'=>1)) ?>    

    <?php echo panel_close() ?>
    
    <legend>
        <?php if ($item): ?>
          Edit "<?php echo $item->name ?>"
        <?php else: ?>
            New page
        <?php endif ?>
        <p class="pull-right">
          <button class="btn btn-primary" rel="tooltip" title="Save page"><i class="icon-ok icon-white"></i></button>
          <?php if ($item): ?>
            <a href="<?php echo base_url() ?>page/seo/<?php echo $item->id ?>" class="btn" data-ajax-link="1" rel="tooltip" title="SEO settings"><i class="icon-search"></i></a>
            <!-- <a href="<?php echo base_url() ?>page/analytics/<?php echo $item->id ?>" class="btn " data-ajax-link="1" rel="tooltip" title="Analytics settings"><i class="icon-signal"></i></a> -->
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
          <label class="control-label" for="title">Title</label>
          <div class="controls">
              <input type="text" name = "title" id = "title" class = "span4" value = "<?php echo $_POST && isset($_POST['title']) ? $_POST['title'] : ($item ? $item->title : '') ?>"/>
          </div>
      </fieldset>  
      <!-- 
      <fieldset class="control-group">
          <label class="control-label" for="url">Url</label>
          <div class="controls">
              <input type="text" name = "url" id = "url" class = "span4" value = "<?php echo $_POST && isset($_POST['url']) ? $_POST['url'] : ($item ? $item->url : '') ?>"/>
          </div>
      </fieldset>  
       -->
      <fieldset class="control-group">
          <label class="control-label" for="description">Description</label>
          <div class="controls">
              <textarea rows="5" name="description" id = "description" class="span4"><?php echo $_POST && isset($_POST['description']) ? $_POST['description'] : ($item ? $item->description : '') ?></textarea>
          </div>
      </fieldset>  
    </div>
    <fieldset class="form-actions right">
        <button class="btn btn-primary"><i class="icon-ok icon-white" rel="tooltip" title="Sava page"></i></button>
    </fieldset>    
<?php echo form_close() ?>
