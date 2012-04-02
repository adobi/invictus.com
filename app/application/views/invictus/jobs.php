  <div class="row">
    <div class="span8 job-details">
      <h1>We are <?php echo !$jobs ? 'not' : '' ?> hiring!</h1>
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
          <a href="#" class="btn btn-primary btn-large" id="apply-for-the-job">Apply for this job &rarr;</a>
          </p>
        </div>      
        <div id="job-application-form" style="display:none;">
          <hr>
          <form action="" method="post" class="form-horizontal job-application-form">
            <fieldset>
              <legend>Apply for <?php echo $job->name ?></legend>
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
                <input type="hidden" name="job_id" value="<?php echo $job->id ?>">
                <button class="btn btn-primary  btn-large" type="submit">Send application</button>
                <button class="btn" type="reset" onclick="$('#job-application-form').hide();">Cancel</button>
              </div>                                                
            </fieldset>
          </form>
        </div> <!-- /#job-application-form -->
      <?php endif ?>
    </div>
    <div class="span4 details-pane" style="height:auto; margin-top:55px;">
      <h3>Current positions</h3>
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
