
<?php if (validation_errors()): ?>
    <div class="alert alert-error">
        <?php echo validation_errors() ?>
    </div>
<?php endif ?>

<?php echo form_open('', array('id'=>'edit-form', 'data-ajax-form'=>1)) ?>    

    <?php echo panel_close() ?>
    <legend>
        <?php if ($item): ?>
            Edit contact
        <?php else: ?>
            New contact
        <?php endif ?>
        <p class="pull-right">
          <button class="btn btn-primary" rel="tooltip" title="Save contact"><i class="icon-ok icon-white"></i></button>
          <?php if ($item): ?>
            <a href="<?php echo base_url() ?>contact/delete/<?php echo $item->id ?>" class="btn delete-item" data-location="r" rel="tooltip" title="Delete contact"><i class="icon-trash"></i></a>
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
            <label class="control-label" for="address">Address</label>
            <div class="controls">
                <input type="text" name = "address" id = "address" class = "span4" value = "<?php echo $_POST && isset($_POST['address']) ? $_POST['address'] : ($item ? $item->address : '') ?>"/>
            </div>
        </fieldset>  
        <fieldset class="control-group">
            <label class="control-label" for="phone">Phone</label>
            <div class="controls">
                <input type="text" name = "phone" id = "phone" class = "span4" value = "<?php echo $_POST && isset($_POST['phone']) ? $_POST['phone'] : ($item ? $item->phone : '') ?>"/>
            </div>
        </fieldset>  
        <fieldset class="control-group">
            <label class="control-label" for="fax">Fax</label>
            <div class="controls">
                <input type="text" name = "fax" id = "fax" class = "span4" value = "<?php echo $_POST && isset($_POST['fax']) ? $_POST['fax'] : ($item ? $item->fax : '') ?>"/>
            </div>
        </fieldset>  
        <fieldset class="control-group">
            <label class="control-label" for="email">Email</label>
            <div class="controls">
                <input type="text" name = "email" id = "email" class = "span4" value = "<?php echo $_POST && isset($_POST['email']) ? $_POST['email'] : ($item ? $item->email : '') ?>"/>
            </div>
        </fieldset>      
    </div>
    <fieldset class="form-actions right">
        <button class="btn btn-primary" rel="tooltip" title="Save contact"><i class="icon-ok icon-white"></i></button>
    </fieldset>    
<?php echo form_close() ?>
