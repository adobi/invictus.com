<?php require_once 'h.php'; ?>
  <div class="row">
    <div class="span8">
      <h1 style="margin-bottom:20px;">Contact us</h1>
      <hr>
      <!-- 
      <ul class="nav nav-list jobs-list">
        <li class="nav-header">Send us email</li>
        <li><a href="#">info[at]invictus.com</a></li>
        <li><a href="#">support[at]invictus.com</a></li>
        <li><a href="#">hr[at]invictus.com</a></li>
      </ul>
       -->
      <form action="" method="post" class="form-horizontal job-application-form">
        <fieldset>
          <div class="control-group">
            <label for="subject" class="control-label">Select</label>
            <div class="controls">
              <div class="btn-group" data-toggle="buttons-radio">
                <a class="btn btn-primary">General informations</a>
                <a class="btn btn-primary">Support</a>
                <a class="btn btn-primary">Marketing</a>
                <a class="btn btn-primary">Press</a>
              </div> 
            </div>
          </div>
          <div class="control-group">
            <label for="subject" class="control-label">Subject</label>
            <div class="controls">
              <input type="text" id="subject" class="input-xlarge">
            </div>
          </div>
          <div class="control-group">
            <label for="email" class="control-label">Email</label>
            <div class="controls">
              <input type="text" id="email" class="input-xlarge">
            </div>
          </div>
          <div class="control-group">
            <label for="message" class="control-label">Message</label>
            <div class="controls">
              <textarea rows="3" id="message" class="input-xxlarge"></textarea>
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
      <h3 style="margin-bottom:15px;">Invictus-Games Ltd. Hungary</h3>
      <p>9 Kartacs Str., Debrecen 4032 Hungary;</p>
      <p>Phone/Fax: 36-52/485-034;</p>
      <hr>
      <h3 style="margin-bottom:15px;">Invictus-Games Ltd. USA</h3>
      <p>9 Kartacs Str., Debrecen 4032 Hungary;</p>
      <p>Phone/Fax: 36-52/485-034;</p>
    </div>
  </div>

<?php require_once 'f.php'; ?>