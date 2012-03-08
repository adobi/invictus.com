
<?php if (validation_errors()): ?>
    <div class="alert alert-error">
        <?php echo validation_errors() ?>
    </div>
<?php endif ?>

<?php echo form_open('', array('id'=>'edit-form', 'class'=>'_form-horizontal')) ?>    

    <legend>
        <?php if ($item): ?>
            Edit
        <?php else: ?>
            New
        <?php endif ?>
        <p class="pull-right"><a href="#" class="btn" data-close-right="1"><i class="icon-remove"></i>Close</a></p>
    </legend>  
    <div class="span10" style="margin-left:0px;max-height:600px;overflow-y:scroll; margin-bottom:20px;">
        
        <fieldset class="control-group">
            <label class="control-label" for="type">Type</label>
            <div class="controls">
                <!-- <input type="text" name = "type" id = "type" class = "span4" value = "<?php echo $_POST && isset($_POST['type']) ? $_POST['type'] : ($item ? $item->type : '') ?>"/> -->
                <select name="type">
                  <option value="1">Fulltime</option>
                  <option vlaue="2">Part time</option>
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
                <input type="text" name = "available" id = "available" class = "span4 datepicker" value = "<?php echo $_POST && isset($_POST['available']) ? $_POST['available'] : ($item ? $item->available : '') ?>"/>
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
                <textarea rows="5" name="responsabilities" id = "responsabilities" class="span4"><?php echo $_POST && isset($_POST['responsabilities']) ? $_POST['responsabilities'] : ($item ? $item->responsabilities : '') ?></textarea>
            </div>
        </fieldset>  
        <fieldset class="control-group">
            <label class="control-label" for="qualification">Qualification</label>
            <div class="controls">
                <textarea rows="5" name="qualification" id = "qualification" class="span4"><?php echo $_POST && isset($_POST['qualification']) ? $_POST['qualification'] : ($item ? $item->qualification : '') ?></textarea>
            </div>
        </fieldset>  
        <fieldset class="control-group">
            <label class="control-label" for="skills">Skills</label>
            <div class="controls">
                <textarea rows="5" name="skills" id = "skills" class="span4"><?php echo $_POST && isset($_POST['skills']) ? $_POST['skills'] : ($item ? $item->skills : '') ?></textarea>
            </div>
        </fieldset>  
        <fieldset class="control-group">
            <label class="control-label" for="we_offer">We offer</label>
            <div class="controls">
                <textarea rows="5" name="we_offer" id = "we_offer" class="span4"><?php echo $_POST && isset($_POST['we_offer']) ? $_POST['we_offer'] : ($item ? $item->we_offer : '') ?></textarea>
            </div>
        </fieldset>  
    </div>  
    <fieldset class="form-actions right" style="clear: both;display:block">
        <button class="btn btn-primary"><i class="icon-ok icon-white"></i>Save</button>
    </fieldset>    
<?php echo form_close() ?>
