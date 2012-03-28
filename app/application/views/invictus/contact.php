  <div class="row">
    <div class="span8">
      <h1 style="margin-bottom:20px;">Contact us</h1>
      <hr>

      <?php echo form_open(base_url().'pages/send', array('class'=>'form-horizontal contact-message-form')) ?>
        <fieldset>
          <?php if ($emails): ?>
            <div class="control-group">
              <label for="subject" class="control-label">To</label>
              <div class="controls">
                <div class="btn-group emails" data-toggle="buttons-radio">
                  <?php foreach ($emails as $item): ?>
                    <a class="btn btn-primary" data-email="<?php echo $item->id ?>"><?php echo $item->name ?></a>
                  <?php endforeach ?>
                </div> 
              </div>
            </div>
          <?php endif ?>
          <div class="control-group">
            <label for="subject" class="control-label">Subject</label>
            <div class="controls">
              <input type="text" name="subject" id="subject" class="input-xlarge">
            </div>
          </div>
          <div class="control-group">
            <label for="email" class="control-label">Email address</label>
            <div class="controls">
              <input type="text" name="email" id="email" class="input-xlarge">
            </div>
          </div>
          <div class="control-group">
            <label for="message" class="control-label">Message</label>
            <div class="controls">
              <textarea rows="4" name="message" id="message" class="span6"></textarea>
            </div>
          </div>
          <div class="form-actions">
            <input type="hidden" name="email_id" value="">
            <button class="btn btn-primary  btn-large" type="submit">Send message</button>
            <a href="<?php echo base_url() ?>" class="btn">Cancel</a>
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
