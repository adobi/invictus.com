<?php require_once 'h.php'; ?>
  <div class="row">
    <div class="span8">
          <h1 style="color:#666">Apply for <em  style="color:#333">Software Engineer - Front-End</em></h1>
          <hr>
      <form action="" method="post" class="form-horizontal job-application-form">
        <fieldset>
          <div class="control-group">
            <label for="firstname" class="control-label">Firstname</label>
            <div class="controls">
              <input type="text" id="firstname" class="input-xlarge">
            </div>
          </div>
          <div class="control-group">
            <label for="lastname" class="control-label">Lastname</label>
            <div class="controls">
              <input type="text" id="lastname" class="input-xlarge">
            </div>
          </div>
          <div class="control-group">
            <label for="email" class="control-label">Email</label>
            <div class="controls">
              <input type="text" id="email" class="input-xlarge">
            </div>
          </div>
          <div class="control-group">
            <label for="phone" class="control-label">Phone</label>
            <div class="controls">
              <input type="text" id="phone" class="input-xlarge">
            </div>
          </div>
          <div class="control-group">
            <label for="cv" class="control-label">CV</label>
            <div class="controls">
              <input type="file" id="cv" class="input-xlarge">
            </div>
          </div>  
          <div class="form-actions">
            <button class="btn btn-primary  btn-large" type="submit">Send application</button>
            <button class="btn" type="reset">Cancel</button>
          </div>                                                
        </fieldset>
      </form>
    </div>
    <div class="span4 details-pane" style="height:auto; margin-top:55px;">
      <ul class="nav nav-list jobs-list">
        <li class="nav-header">Current positions</li>
        <hr style="margin:2px auto 8px auto;">
        <?php foreach (range(0,5) as $key => $value): ?>
          <li>
            <a href="#" style="font-size:1.2em"><i class="icon-user" style="margin-right:5px; margin-top:0px;"></i>Position <?php echo $key+1 ?></a>
          </li>
        <?php endforeach ?>
      </ul>
    </div>
  </div>

<?php require_once 'f.php'; ?>