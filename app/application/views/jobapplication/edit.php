
<p><a href="<?php echo base_url() ?><?php echo $this->uri->segment(1) ?>" class="btn btn-primary"><i class="icon-arrow-left"></i>Go back</a></p>

<?php if (validation_errors()): ?>
    <div class="alert alert-error">
        <?php echo validation_errors() ?>
    </div>
<?php endif ?>

<?php echo form_open('', array('id'=>'edit-form', 'class'=>'form-horizontal')) ?>    

    <legend>
        <?php if ($item): ?>
            Edit
        <?php else: ?>
            New
        <?php endif ?>
    </legend>    
        <fieldset class="control-group">
            <label class="control-label" for="job_id">Job_id</label>
            <div class="controls">
                <input type="text" name = "job_id" id = "job_id" class = "input-xxlarge" value = "<?php echo $_POST && isset($_POST['job_id']) ? $_POST['job_id'] : ($item ? $item->job_id : '') ?>"/>
            </div>
        </fieldset>  
        <fieldset class="control-group">
            <label class="control-label" for="name">Name</label>
            <div class="controls">
                <input type="text" name = "name" id = "name" class = "input-xxlarge" value = "<?php echo $_POST && isset($_POST['name']) ? $_POST['name'] : ($item ? $item->name : '') ?>"/>
            </div>
        </fieldset>  
        <fieldset class="control-group">
            <label class="control-label" for="email">Email</label>
            <div class="controls">
                <input type="text" name = "email" id = "email" class = "input-xxlarge" value = "<?php echo $_POST && isset($_POST['email']) ? $_POST['email'] : ($item ? $item->email : '') ?>"/>
            </div>
        </fieldset>  
        <fieldset class="control-group">
            <label class="control-label" for="cv">Cv</label>
            <div class="controls">
                <input type="text" name = "cv" id = "cv" class = "input-xxlarge" value = "<?php echo $_POST && isset($_POST['cv']) ? $_POST['cv'] : ($item ? $item->cv : '') ?>"/>
            </div>
        </fieldset>  
        <fieldset class="control-group">
            <label class="control-label" for="phone">Phone</label>
            <div class="controls">
                <input type="text" name = "phone" id = "phone" class = "input-xxlarge" value = "<?php echo $_POST && isset($_POST['phone']) ? $_POST['phone'] : ($item ? $item->phone : '') ?>"/>
            </div>
        </fieldset>  
        <fieldset class="control-group">
            <label class="control-label" for="portfolio">Portfolio</label>
            <div class="controls">
                <input type="text" name = "portfolio" id = "portfolio" class = "input-xxlarge" value = "<?php echo $_POST && isset($_POST['portfolio']) ? $_POST['portfolio'] : ($item ? $item->portfolio : '') ?>"/>
            </div>
        </fieldset>      
    <fieldset class="form-actions">
        <button class="btn btn-primary"><i class="icon-ok"></i>Save</button> &nbsp; <a class="btn" href="<?php echo base_url() ?>/<?php echo $this->uri->segment(1) ?>">Cancel</a>
    </fieldset>    
<?php echo form_close() ?>
