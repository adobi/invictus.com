  <div class="row">
    <div class="span8">
      <h1 style="margin-bottom:20px;">Contact us</h1>
      <hr>

      <form action="" method="post" class="form-horizontal job-application-form">
        <fieldset>
          <?php if ($emails): ?>
            <div class="control-group">
              <label for="subject" class="control-label">Select</label>
              <div class="controls">
                <div class="btn-group emails" data-toggle="buttons-radio">
                  <?php foreach ($emails as $item): ?>
                    <a class="btn btn-primary"><?php echo $item->name ?></a>
                  <?php endforeach ?>
                </div> 
              </div>
            </div>
          <?php endif ?>
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
              <textarea rows="3" id="message" class="span6"></textarea>
            </div>
          </div>
          <div class="form-actions">
            <button class="btn btn-primary  btn-large" type="submit">Send message</button>
            <button class="btn" type="reset">Cancel</button>
          </div>                                                
        </fieldset>
      </form>           
    </div>
    <?php if ($contacts): ?>
      <div class="span4 details-pane" style="height:auto; margin-top:55px;">
        <?php foreach ($contacts as $index=>$item): ?>
          <h3 style="margin-bottom:10px;"><?php echo $item->name ?></h3>
          <h6 style="margin-bottom:5px;"><?php echo $item->location ?></h6>
          <p><strong>Address</strong>: <?php echo $item->address ?></p>
          <?php if ($item->phone): ?>
            <p><strong>Phone</strong>: <?php echo $item->phone ?></p>
          <?php endif ?>
          <?php if ($item->fax): ?>
            <p><strong>Fax</strong>: <?php echo $item->fax ?></p>
          <?php endif ?>
          <?php if ($index !== count($contacts)-1): ?>
            <hr>
          <?php endif ?>
        <?php endforeach ?>
      </div>
    <?php endif ?>
  </div>
