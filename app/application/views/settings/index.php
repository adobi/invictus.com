<div class="well">
  <h3>
    Global settings
    <?php if (!$items): ?>
      <p class="pull-right">
        <a class="btn btn-primary" href="<?= base_url(); ?>settings/edit" data-ajax-link="1" data-unselect="1" rel="tooltip" title="Create new settings"><i class="icon-plus-sign icon-white"></i></a>
      </p>
    <?php endif ?>
  </h3>    
  <?php if ($items): ?>
    <div class="items contact-items">
      <hr>
      <?php foreach ($items as $item): ?>
        <div class="item">
            <h4>
              &nbsp;
              <p class="pull-right" style="margin-top:5px;">
                <a class="btn" href="<?php echo base_url() ?>settings/edit/<?php echo $item->id ?>" class="select-item" data-ajax-link="1" rel="tooltip" title="Edit settings"><i class="icon-pencil"></i></a>
              </p>
            </h4> 
            <h6>
              <span>Facebook app id</span> <?php echo $item->facebook_app_id ?>
            </h6>
            <h6>
              <span>Facebook page name</span> <?php echo $item->facebook_page ?>
            </h6>
            <h6>
              <span>Twitter id</span> <?php echo $item->twitter_id ?>
            </h6>
            <h6>
              <span>Google analytics id</span> <?php echo $item->google_analytics ?>
            </h6>
        </div>
      <?php endforeach ?>
    </div>
  <?php endif ?>
</div>
