  <h1>We are <?php echo !$jobs ? 'not' : '' ?> hiring!</h1>
  <div class="row" data-reversable>
    <div class="span8 job-details">
      <hr>
      <?php if ($job): ?>
        <div class="job-info">
          <h2><?php echo $job->name ?> <span class="upper-gray"><?php echo to_date($job->available) ?></span></h2>
          <h6 style="margin-bottom:30px;"><?php echo $job->type === '1' ? 'Full time' : 'Part time' ?> — <?php echo $job->location ?></h6>  
          <strong>About this Job</strong><br> 
          <p><?php echo nl2br($job->description) ?></p>
          <br>&nbsp;<strong>Responsibilities</strong><br>
          <ul>
            <?php foreach ($job->responsabilities as $key => $value): ?>
              <li><?php echo $value->description ?></li>
            <?php endforeach ?>
          </ul>
          <strong>Qualifications</strong><br>
          <ul>
            <?php foreach ($job->qualifications as $key => $value): ?>
              <li><?php echo $value->description ?></li>
            <?php endforeach ?>
          </ul>
          <strong>Desired Skills</strong><br>
          <ul>
            <?php foreach ($job->skills as $key => $value): ?>
              <li><?php echo $value->description ?></li>
            <?php endforeach ?>
          </ul>    
          <strong>What we offer</strong><br>
          <ul>
            <?php foreach ($job->offers as $key => $value): ?>
              <li><?php echo $value->description ?></li>
            <?php endforeach ?>
          </ul>         
          
          <p style="margin-top:30px;">
          <a href="#" class="btn btn-primary btn-large" id="apply-for-the-job" <?php echo event_tracking($job, 'apply') ?>>Apply for this job &rarr;</a>
          </p>
        </div>      
        <div id="job-application-form" <?php echo $error ? 'show' : ' class="dont-show"' ?>>
          <hr>
          <?php echo form_open_multipart('', array('class'=>'form-horizontal job-application-form')) ?>
            <fieldset>
              <legend>Apply for <?php echo $job->name ?></legend>
              <?php if ($error): ?>
                  <div class="alert alert-error">
                      <?php echo $error ?>
                  </div>
              <?php endif ?>          
              <div class="control-group">
                <label for="firstname" class="control-label">First name</label>
                <div class="controls">
                  <input type="text" name = "firstname" id="firstname" class="input-xlarge" value = "<?php echo $_POST && isset($_POST['firstname']) ? $_POST['firstname'] : '' ?>">
                </div>
              </div>
              <div class="control-group">
                <label for="lastname" class="control-label">Last name</label>
                <div class="controls">
                  <input type="text" name="lastname" id="lastname" class="input-xlarge" value = "<?php echo $_POST && isset($_POST['lastname']) ? $_POST['lastname'] : '' ?>">
                </div>
              </div>
              <div class="control-group">
                <label for="email" class="control-label">Email</label>
                <div class="controls">
                  <input type="text" name="email" id="email" class="input-xlarge" value = "<?php echo $_POST && isset($_POST['email']) ? $_POST['email'] : '' ?>">
                </div>
              </div>
              <div class="control-group">
                <label for="phone" class="control-label">Phone</label>
                <div class="controls">
                  <input type="text" name="phone" id="phone" class="input-xlarge" value = "<?php echo $_POST && isset($_POST['phone']) ? $_POST['phone'] : '' ?>">
                </div>
              </div>
              <div class="control-group">
                <label for="cv" class="control-label">CV</label>
                <div class="controls">
                  <input type="file" name="cv" id="cv" class="input-xlarge">
                </div>
              </div>  
              <?php if ($job->is_graphic_designer) :?>
                <div class="control-group">
                  <label for="cv" class="control-label">Portfolio </label>
                  <div class="controls">
                    <input type="file" name="portfolio" id="portfolio" class="input-xlarge" rel="tooltip" title="Max 3 MB">
                    
                  </div>
                </div>               
              <?php endif; ?>
              <div class="form-actions">
                <input type="hidden" name="job_id" value="<?php echo $job->id ?>">
                <button class="btn btn-primary  btn-large" type="submit" <?php echo event_tracking($job, 'job') ?>>Send application</button>
                <button class="btn" type="reset" onclick="$('#job-application-form').hide();">Cancel</button>
              </div>                                                
            </fieldset>
          </form>
        </div> <!-- /#job-application-form -->
      <?php endif ?>
    </div>
    <div class="span4 details-pane" style="height:auto; margin-top:20px;">
      <h3>
        <span class="visible-desktop">Current positions</span>
        <a class="btn btn-large hidden-desktop" href="javascript:void(0)"  onclick = "$('.jobs-list-wrapper').toggle()">Current positions</a>
      </h3>
      <div class="jobs-list-wrapper visible-desktop">
        <hr style="margin:2px auto 8px auto;">
  
        <ul class="nav nav-list jobs-list">
          <?php if ($jobs): ?>
            <?php foreach ($jobs as $item): ?>
              <li class="nav-header"><?php echo $item['category']->name ?></li>
              <?php foreach ($item['jobs'] as $job): ?>
                <li><a href="<?php echo base_url() ?>pages/jobs/<?php echo $job->url ?>" style="font-size:1.2em">
                  <img src="<?php echo base_url() ?>uploads/original/<?php echo $item['category']->icon ?>" style="width:16px;margin-right:5px; margin-top:0px;"></i>
                  <?php echo $job->name ?>
                </a></li>
              <?php endforeach ?>
            <?php endforeach ?>
          <?php else: ?>
            <li class="nav-header">No open position</li>
          <?php endif ?>
        </ul>
      </div>
    </div>
  </div>
