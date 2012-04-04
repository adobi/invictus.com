
<?php if (validation_errors()): ?>
    <div class="alert alert-error">
        <?php echo validation_errors() ?>
    </div>
<?php endif ?>

<?php echo form_open_multipart('', array('id'=>'edit-form', '_data-ajax-form'=>1)) ?>    


    <?php echo panel_close() ?>
    
    <legend>
        <?php if ($item): ?>
            Edit offer
        <?php else: ?>
            New offer
        <?php endif ?>
        <p class="pull-right">
          <button class="btn btn-primary" rel="tooltip" title="Save offer"><i class="icon-ok icon-white"></i></button>
          <?php if ($item): ?>
            <!-- <a class="btn" href="<?php echo base_url() ?>offer/analytics/<?php echo $item->id ?>" data-ajax-link="1" rel="tooltip" title="Analytics settings"><i class="icon-signal"></i></a> -->
            <a href="<?php echo base_url() ?>offer/delete/<?php echo $item->id ?>" class="btn delete-item" data-location="r" rel="tooltip" title="Delete offer"><i class="icon-trash"></i></a>
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
        <label class="control-label" for="description">Description</label>
        <div class="controls">
            <textarea rows="5" name="description" id = "description" class="span5"><?php echo $_POST && isset($_POST['description']) ? $_POST['description'] : ($item ? $item->description : '') ?></textarea>
        </div>
      </fieldset>  
      <fieldset class="control-group">
        <label class="control-label" for="from_date">From date</label>
        <div class="controls">
          <div class="input-append">
            <input type="text" name = "from_date" id = "from_date" class = "span2 datepicker" value = "<?php echo $_POST && isset($_POST['from_date']) ? $_POST['from_date'] : ($item ? to_date($item->from_date) : '') ?>"/>
            <a class="btn add-on trigger-datepicker"><i class="icon-calendar"></i></a>
          </div>
        </div>
      </fieldset>        
      <fieldset class="control-group">
        <label class="control-label" for="to_date">To date</label>
        <div class="controls">
          <div class="input-append">
            <input type="text" name = "to_date" id = "to_date" class = "span2 datepicker" value = "<?php echo $_POST && isset($_POST['to_date']) ? $_POST['to_date'] : ($item ? to_date($item->to_date) : '') ?>"/>
            <a class="btn add-on trigger-datepicker"><i class="icon-calendar"></i></a>
          </div>        
        </div>
      </fieldset>  
      <fieldset class="control-group">
          <label class="control-label" for="icon">Image</label>
          <div class="controls">
              <?php if ($item && $item->image): ?>
                  <img src="<?php echo base_url() ?>uploads/original/<?php echo $item->image ?>" alt="">
                  <a href="<?php echo base_url() ?>offer/delete_image/<?php echo $item->id ?>" class="btn delete-item pull-right" style="margin-right:20px;" rel="tooltip" title="Delete image" data-modal-header="<?php echo $item->name ?> image" data-trigger="reload"  data-location="b"><i class="icon-trash"></i></a>
              <?php else: ?>
                  <input type="file" name = "image" id = "image" class = "span4" rel="tooltip" title="Width: 360"/>
              <?php endif ?>
          </div>
      </fieldset>           
    </div>
    <fieldset class="form-actions right">
        <button class="btn btn-primary" type="submit" rel="tooltip" title="Save offer"><i class="icon-ok icon-white"></i></button>
    </fieldset>     
<?php echo form_close() ?>
