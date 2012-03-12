
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
            New
        <?php endif ?>
        <p class="pull-right">
          <button class="btn btn-primary"><i class="icon-ok icon-white"></i>Save</button>          
          <?php if ($item): ?>
            <a href="<?php echo base_url() ?>job/analytics/<?php echo $item->id ?>" class="btn btn-primary" data-ajax-link="1"><i class="icon-signal icon-white"></i>Analytics</a>
            <a href="<?php echo base_url() ?>job/delete/<?php echo $item->id ?>" class="btn"><i class="icon-trash"></i>Delete</a>
          <?php endif ?>
        </p>
    </legend>  
    <div class="right-side-scroll" style="">
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
                <!-- <input type="text" name = "type" id = "type" class = "span4" value = "<?php echo $_POST && isset($_POST['type']) ? $_POST['type'] : ($item ? $item->type : '') ?>"/> -->
                <select name="type">
                  <option value="1">Full time</option>
                  <option value="2">Part time</option>
                </select>
            </div>
        </fieldset>  
        <fieldset class="control-group">
            <label class="control-label" for="category_id">Category</label>
            <div class="controls">
                <!-- 
                <input type="text" name = "category_id" id = "category_id" class = "span4" value = "<?php echo $_POST && isset($_POST['category_id']) ? $_POST['category_id'] : ($item ? $item->category_id : '') ?>"/>
                 -->
                <?php echo form_dropdown('category_id', $job_category_items, $_POST && isset($_POST['category_id']) ? $_POST['category_id'] : ($item ? $item->category_id : '')) ?>
            </div>
        </fieldset>  
        <fieldset class="control-group">
            <label class="control-label" for="available">Available</label>
            <div class="controls">
                <input type="text" name = "available" id = "available" class = "span2 datepicker" value = "<?php echo $_POST && isset($_POST['available']) ? $_POST['available'] : ($item ? to_date($item->available) : '') ?>"/>
            </div>
        </fieldset> 
        <fieldset class="control-group">
            <label class="control-label" for="description">Description</label>
            <div class="controls">
                <textarea rows="5" name="description" id = "description" class="span4"><?php echo $_POST && isset($_POST['description']) ? $_POST['description'] : ($item ? $item->description : '') ?></textarea>
            </div>
        </fieldset>  
        <fieldset class="control-group">
            <label class="control-label" for="responsabilities">Responsabilities</label>
            <div class="controls">
                <!-- <textarea rows="5" name="responsabilities" id = "responsabilities" class="span4"><?php echo $_POST && isset($_POST['responsabilities']) ? $_POST['responsabilities'] : ($item ? $item->responsabilities : '') ?></textarea> -->
                <ul class="unstyled">
                  <?php if ($item && $item->responsabilities): ?>
                    <?php foreach ($item->responsabilities as $key => $value): ?>
                      <li>
                        <input type="text" name="responsabilities[]" class="span4" value="<?php echo $value->description ?>"> 
                        <a href="#" class="add-ui-item" data-type="responsabilities"><i class="icon-plus-sign"></i></a>
                        <a href="#"><i class="icon-pencil"></i></a>
                        <a href="#"><i class="icon-trash"></i></a>
                        <!-- <a href="#"><i class="icon-trash"></i></a> -->
                      </li>
                    <?php endforeach ?>
                  <?php else: ?>
                      <li>
                        <input type="text" name="responsabilities[]" class="span4"> 
                        <a href="#" class="add-ui-item" data-type="responsabilities"><i class="icon-plus-sign"></i></a>
                        <!-- <a href="#"><i class="icon-trash"></i></a> -->
                      </li>
                  <?php endif ?>
                </ul>
            </div>
        </fieldset>  
        <fieldset class="control-group">
            <label class="control-label" for="qualifications">Qualification</label>
            <div class="controls">
                <!-- <textarea rows="5" name="qualification" id = "qualification" class="span4"><?php echo $_POST && isset($_POST['qualification']) ? $_POST['qualification'] : ($item ? $item->qualification : '') ?></textarea> -->
                <ul class="unstyled">
                  <?php if ($item && $item->qualifications): ?>
                    <?php foreach ($item->qualifications as $key => $value): ?>
                      <li>
                        <input type="text" name="qualifications[]" class="span4" value="<?php echo $value->description ?>"> 
                        <a href="#" class="add-ui-item" data-type="qualifications"><i class="icon-plus-sign"></i></a>
                        <a href="#"><i class="icon-pencil"></i></a>
                        <a href="#"><i class="icon-trash"></i></a>
                        <!-- <a href="#"><i class="icon-trash"></i></a> -->
                      </li>
                    <?php endforeach ?>
                  <?php else: ?>
                      <li>
                        <input type="text" name="qualifications[]" class="span4"> 
                        <a href="#" class="add-ui-item" data-type="qualifications"><i class="icon-plus-sign"></i></a>
                        <!-- <a href="#"><i class="icon-trash"></i></a> -->
                      </li>
                  <?php endif ?>
                </ul>
            </div>
        </fieldset>  
        <fieldset class="control-group">
            <label class="control-label" for="skills">Skills</label>
            <div class="controls">
                <!-- <textarea rows="5" name="skills" id = "skills" class="span4"><?php echo $_POST && isset($_POST['skills']) ? $_POST['skills'] : ($item ? $item->skills : '') ?></textarea> -->
                <ul class="unstyled">
                  <?php if ($item && $item->skills): ?>
                    <?php foreach ($item->skills as $key => $value): ?>
                      <li>
                        <input type="text" name="skills[]" class="span4" value="<?php echo $value->description ?>"> 
                        <a href="#" class="add-ui-item" data-type="skills"><i class="icon-plus-sign"></i></a>
                        <a href="#"><i class="icon-pencil"></i></a>
                        <a href="#"><i class="icon-trash"></i></a>
                        <!-- <a href="#"><i class="icon-trash"></i></a> -->
                      </li>
                    <?php endforeach ?>                    
                  <?php else: ?>
                      <li>
                        <input type="text" name="skills[]" class="span4"> 
                        <a href="#" class="add-ui-item" data-type="skills"><i class="icon-plus-sign"></i></a>
                        <!-- <a href="#"><i class="icon-trash"></i></a> -->
                      </li>
                  <?php endif ?>
                </ul>
               
            </div>
        </fieldset>  
        <fieldset class="control-group">
            <label class="control-label" for="we_offer">We offer</label>
            <div class="controls">
                <!-- <textarea rows="5" name="we_offer" id = "we_offer" class="span4"><?php echo $_POST && isset($_POST['we_offer']) ? $_POST['we_offer'] : ($item ? $item->we_offer : '') ?></textarea> -->
                <ul class="unstyled">
                  <?php if ($item && $item->offers): ?>
                    <?php foreach ($item->offers as $key => $value): ?>
                      <li>
                        <input type="text" name="offers[]" class="span4" value="<?php echo $value->description ?>"> 
                        <a href="#" class="add-ui-item" data-type="offers"><i class="icon-plus-sign"></i></a>
                        <a href="#"><i class="icon-pencil"></i></a>
                        <a href="#"><i class="icon-trash"></i></a>
                        <!-- <a href="#"><i class="icon-trash"></i></a> -->
                      </li>
                    <?php endforeach ?>                     
                  <?php else: ?>
                      <li>
                        <input type="text" name="offers[]" class="span4"> 
                        <a href="#" class="add-ui-item" data-type="offers"><i class="icon-plus-sign"></i></a>
                        <!-- <a href="#"><i class="icon-trash"></i></a> -->
                      </li>
                  <?php endif ?>
                </ul>
               
            </div>
        </fieldset>  
    </div>  
    <fieldset class="form-actions right" style="clear: both;display:block">
        <button class="btn btn-primary"><i class="icon-ok icon-white"></i>Save</button>
    </fieldset>    
<?php echo form_close() ?>
