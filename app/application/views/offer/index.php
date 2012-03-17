<div class="well">
  <h3>
    Current offer
    <p class="pull-right">
      <a class="btn btn-primary" href="<?= base_url(); ?>offer/edit" data-ajax-link="1" data-unselect="1" rel="tooltip" title="Create new offer"><i class="icon-plus-sign icon-white"></i></a>
    </p>
  </h3>    
  <?php if ($items_current): ?>
    <div class="items offer-items">
      <hr>
      <?php foreach ($items_current as $item): ?>
        <div class="item">
            <h4>
              <?php echo to_date($item->from_date) ?> - <?php echo to_date($item->to_date) ?>
              <a href="<?php echo base_url() ?>offer/emails/<?php echo $item->id ?>" class="select-item" data-ajax-link="1" rel="tooltip" title="Subscribers">
                <!--<i class="icon-user"></i>  -->
                <span class="badge badge-info"><?php echo $item->email_count ? $item->email_count : 0 ?></span>
              </a>              
              <p class="pull-right" style="margin-top:5px;">
                <a href="<?php echo base_url() ?>offer/edit/<?php echo $item->id ?>" class="select-item" data-ajax-link="1" rel="tooltip" title="Edit offer"><i class="icon-pencil"></i></a>
                <a href="<?php echo base_url() ?>offer/delete/<?php echo $item->id ?>" class="delete-item" data-location="l" rel="tooltip" title="Delete offer"><i class="icon-trash"></i></a>
              </p>
            </h4> 
            <p>
              <?php echo nl2br($item->description) ?>
            </p>       
        </div>
      <?php endforeach ?>
    </div>
  <?php endif ?>
</div>
<?php if ($items_old): ?>
  <div class="well">
    <h1>
      Previous offers
    </h1>    
    <div class="items offer-items">
      <hr>
      <?php foreach ($items_old as $item): ?>
        <div class="item">
            <h4>
              <?php echo to_date($item->from_date) ?> - <?php echo to_date($item->to_date) ?>
              <a href="<?php echo base_url() ?>offer/emails/<?php echo $item->id ?>" class="select-item" data-ajax-link="1" rel="tooltip" title="Candidates for the job">
                <!--<i class="icon-user"></i>  -->
                <span class="badge badge-info"><?php echo $item->email_count ? $item->email_count : 0 ?></span>
              </a>    
              <p class="pull-right" style="margin-top:5px;">
                <!-- <a href="<?php echo base_url() ?>offer/edit/<?php echo $item->id ?>" class="select-item" data-ajax-link="1" rel="tooltip" title="Edit offer"><i class="icon-pencil"></i></a> -->
                <a href="<?php echo base_url() ?>offer/delete/<?php echo $item->id ?>" class="delete-item" data-location="l" rel="tooltip" title="Delete offer"><i class="icon-trash"></i></a>
              </p>
            </h4>        
            <p>
              <?php echo nl2br($item->description) ?>
            </p>       
        </div>
      <?php endforeach ?>
    </div>
  </div>
<?php endif ?>
