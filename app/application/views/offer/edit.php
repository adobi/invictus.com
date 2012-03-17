
<?php if (validation_errors()): ?>
    <div class="alert alert-error">
        <?php echo validation_errors() ?>
    </div>
<?php endif ?>

<?php echo form_open('', array('id'=>'edit-form', 'data-ajax-form'=>1)) ?>    


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
            <a class="btn" href="<?php echo base_url() ?>offer/analytics/<?php echo $item->id ?>" data-ajax-link="1" rel="tooltip" title="Analytics settings"><i class="icon-signal"></i></a>
            <a href="<?php echo base_url() ?>offer/delete/<?php echo $item->id ?>" class="btn delete-item" data-location="r" rel="tooltip" title="Delete offer"><i class="icon-trash"></i></a>
          <?php endif ?>
        </p>
    </legend>     
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
    <fieldset class="form-actions right">
        <button class="btn btn-primary" type="submit" rel="tooltip" title="Save offer"><i class="icon-ok icon-white"></i></button>
    </fieldset>     
<?php echo form_close() ?>
