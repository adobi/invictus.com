
<?php if (validation_errors()): ?>
    <div class="alert alert-error">
        <?php echo validation_errors() ?>
    </div>
<?php endif ?>

<?php echo form_open('', array('id'=>'edit-form', 'class'=>'_form-horizontal', 'data-ajax-form'=>1)) ?>    
    <?php echo panel_close() ?>
    <legend>
        <?php if ($item): ?>
            Edit <?php echo $item->name ?>
        <?php else: ?>
            New job
        <?php endif ?>
        <p class="pull-right">
          <button class="btn btn-primary" type="submit" rel="tooltip" title="Save job"><i class="icon-ok icon-white"></i></button>          
          <?php if ($item): ?>
            <a href="<?php echo base_url() ?>job/show/<?php echo $item->id ?>" class="btn " data-ajax-link="1" rel="tooltip" title="View job"><i class="icon-eye-open"></i></a>
            <a href="<?php echo base_url() ?>job/analytics/<?php echo $item->id ?>" class="btn " data-ajax-link="1" rel="tooltip" title="Analytics settings"><i class="icon-signal"></i></a>
            <a href="<?php echo base_url() ?>job/delete/<?php echo $item->id ?>" class="btn delete-item select-item" data-location="r" rel="tooltip" title="Delete job" data-modal-header="Job <?php echo $item->name ?>"><i class="icon-trash"></i></a>
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
            <label class="control-label" for="location">Location</label>
            <div class="controls">
                <input type="text" name = "location" id = "location" class = "span4" value = "<?php echo $_POST && isset($_POST['location']) ? $_POST['location'] : ($item ? $item->location : '') ?>"/>
            </div>
        </fieldset>               
        <fieldset class="control-group">
            <label class="control-label" for="type">Type</label>
            <div class="controls">
                <select name="type">
                  <option value="1">Full time</option>
                  <option value="2">Part time</option>
                </select>
            </div>
        </fieldset>  
        <fieldset class="control-group">
            <label class="control-label" for="category_id">Category</label>
            <div class="controls">
                <?php echo form_dropdown('category_id', $job_category_items, $_POST && isset($_POST['category_id']) ? $_POST['category_id'] : ($item ? $item->category_id : '')) ?>
            </div>
        </fieldset>  
        <fieldset class="control-group">
            <label class="control-label" for="available">Available</label>
            <div class="controls">
                <div class="input-append">
                  <input type="text" name = "available" id = "available" class = "span2 datepicker" value = "<?php echo $_POST && isset($_POST['available']) ? $_POST['available'] : ($item ? to_date($item->available) : '') ?>"/>
                  <a class="btn add-on trigger-datepicker"><i class="icon-calendar"></i></a>
                </div>              
            </div>
        </fieldset> 
        <fieldset class="control-group">
            <label class="control-label" for="description">Description</label>
            <div class="controls">
                <textarea rows="5" name="description" id = "description" class="span5"><?php echo $_POST && isset($_POST['description']) ? $_POST['description'] : ($item ? $item->description : '') ?></textarea>
            </div>
        </fieldset>  
        <fieldset class="control-group">
            <label class="control-label" for="responsabilities">Responsabilities</label>
            <div class="controls">
                <ul class="unstyled">
                  <?php if ($item && $item->responsabilities): ?>
                    <?php foreach ($item->responsabilities as $key => $value): ?>
                      <li>
                        <input type="text" name="responsabilities[]" class="span4" value="<?php echo $value->description ?>"> 
                        <a href="#" class="add-ui-item" data-type="responsabilities" rel="tooltip" title="Add another one"><i class="icon-plus-sign"></i></a>
                        <!--  <a href="<?php echo base_url() ?>jobresponsability/edit/<?php echo $value->id ?>" data-ajax-link="1" data-type="post"><i class="icon-pencil"></i></a> -->
                        <a href="<?php echo base_url() ?>jobresponsability/delete/<?php echo $value->id ?>" class="delete-job-item" data-type="responsabilities" rel="tooltip" title="Delete"><i class="icon-trash"></i></a>
                        <!-- <a href="#"><i class="icon-trash"></i></a> -->
                      </li>
                    <?php endforeach ?>
                  <?php else: ?>
                      <li>
                        <input type="text" name="responsabilities[]" class="span4"> 
                        <a href="#" class="add-ui-item" data-type="responsabilities" rel="tooltip" title="Add another one"><i class="icon-plus-sign"></i></a>
                        <!-- <a href="#"><i class="icon-trash"></i></a> -->
                      </li>
                  <?php endif ?>
                </ul>
            </div>
        </fieldset>  
        <fieldset class="control-group">
            <label class="control-label" for="qualifications">Qualification</label>
            <div class="controls">
                <ul class="unstyled">
                  <?php if ($item && $item->qualifications): ?>
                    <?php foreach ($item->qualifications as $key => $value): ?>
                      <li>
                        <input type="text" name="qualifications[]" class="span4" value="<?php echo $value->description ?>"> 
                        <a href="#" class="add-ui-item" data-type="qualifications" rel="tooltip" title="Add another one"><i class="icon-plus-sign"></i></a>
                        <!-- <a href="#"><i class="icon-pencil"></i></a> -->
                        <a href="<?php echo base_url() ?>jobqualification/delete/<?php echo $value->id ?>" class="delete-job-item" data-type="qualifications" rel="tooltip" title="Delete"><i class="icon-trash"></i></a>
                        <!-- <a href="#"><i class="icon-trash"></i></a> -->
                      </li>
                    <?php endforeach ?>
                  <?php else: ?>
                      <li>
                        <input type="text" name="qualifications[]" class="span4"> 
                        <a href="#" class="add-ui-item" data-type="qualifications" rel="tooltip" title="Add another one"><i class="icon-plus-sign"></i></a>
                        <!-- <a href="#"><i class="icon-trash"></i></a> -->
                      </li>
                  <?php endif ?>
                </ul>
            </div>
        </fieldset>  
        <fieldset class="control-group">
            <label class="control-label" for="skills">Skills</label>
            <div class="controls">
                <ul class="unstyled">
                  <?php if ($item && $item->skills): ?>
                    <?php foreach ($item->skills as $key => $value): ?>
                      <li>
                        <input type="text" name="skills[]" class="span4" value="<?php echo $value->description ?>"> 
                        <a href="#" class="add-ui-item" data-type="skills" rel="tooltip" title="Add another one"><i class="icon-plus-sign"></i></a>
                        <!-- <a href="#"><i class="icon-pencil"></i></a> -->
                        <a href="<?php echo base_url() ?>jobskill/delete/<?php echo $value->id ?>" class="delete-job-item" data-type="skills" rel="tooltip" title="Delete"><i class="icon-trash"></i></a>
                        <!-- <a href="#"><i class="icon-trash"></i></a> -->
                      </li>
                    <?php endforeach ?>                    
                  <?php else: ?>
                      <li>
                        <input type="text" name="skills[]" class="span4"> 
                        <a href="#" class="add-ui-item" data-type="skills" rel="tooltip" title="Add another one"><i class="icon-plus-sign"></i></a>
                        <!-- <a href="#"><i class="icon-trash"></i></a> -->
                      </li>
                  <?php endif ?>
                </ul>
               
            </div>
        </fieldset>  
        <fieldset class="control-group">
            <label class="control-label" for="we_offer">We offer</label>
            <div class="controls">
                <ul class="unstyled">
                  <?php if ($item && $item->offers): ?>
                    <?php foreach ($item->offers as $key => $value): ?>
                      <li>
                        <input type="text" name="offers[]" class="span4" value="<?php echo $value->description ?>"> 
                        <a href="#" class="add-ui-item" data-type="offers" rel="tooltip" title="Add another one"><i class="icon-plus-sign"></i></a>
                        <!-- <a href="<?php echo base_url() ?>joboffer/edit/<?php echo $value->id ?>/job/<?php echo $item->id ?>"><i class="icon-pencil"></i></a> -->
                        <a href="<?php echo base_url() ?>joboffer/delete/<?php echo $value->id ?>" class="delete-job-item" data-type="offers" rel="tooltip" title="Delete"><i class="icon-trash"></i></a>
                        <!-- <a href="#"><i class="icon-trash"></i></a> -->
                      </li>
                    <?php endforeach ?>                     
                  <?php else: ?>
                      <li>
                        <input type="text" name="offers[]" class="span4"> 
                        <a href="#" class="add-ui-item" data-type="offers" rel="tooltip" title="Add another one"><i class="icon-plus-sign"></i></a>
                        <!-- <a href="#"><i class="icon-trash"></i></a> -->
                      </li>
                  <?php endif ?>
                </ul>
               
            </div>
        </fieldset>  
    </div>  
    <fieldset class="form-actions right" style="clear: both;display:block">
        <button class="btn btn-primary" type="submit" rel="tooltip" title="Save job"><i class="icon-ok icon-white"></i></button>
    </fieldset>    
<?php echo form_close() ?>
