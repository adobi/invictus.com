<div class="well">
  <h1>
    Current offer
    <p class="pull-right">
      <a class="btn btn-primary" href="<?= base_url(); ?>offer/edit" data-ajax-link="1" data-unselect="1"><i class="icon-plus-sign icon-white"></i>New</a>
    </p>
  </h1>    
  <?php if ($items): ?>
    <div class="items offer-items">
      <hr>
      <?php foreach ($items as $item): ?>
        <div class="item">
            <h4>
              <?php echo to_date($item->from_date) ?> - <?php echo to_date($item->to_date) ?>
              <p class="pull-right" style="margin-top:5px;">
                <a href="<?php echo base_url() ?>offer/edit/<?php echo $item->id ?>" class="select-item" data-ajax-link="1" rel="tooltip" title="Edit platform"><i class="icon-pencil"></i></a>
                <a href="<?php echo base_url() ?>offer/delete/<?php echo $item->id ?>" class="delete-item" data-location="l" rel="tooltip" title="Delete platform"><i class="icon-trash"></i></a>
              </p>
            </h4> 
            <p>
              <?php echo $item->description ?>
            </p>       
        </div>
      <?php endforeach ?>
    </div>
  <?php endif ?>
</div>

<div class="well">
  <h1>
    Previous offers
  </h1>    
  <?php if ($items): ?>
    <div class="items offer-items">
      <hr>
      <?php foreach ($items as $item): ?>
        <div class="item">
            <h4>
              <?php echo to_date($item->from_date) ?> - <?php echo to_date($item->to_date) ?>
              <p class="pull-right" style="margin-top:5px;">
                <a href="<?php echo base_url() ?>offer/edit/<?php echo $item->id ?>" class="select-item" data-ajax-link="1" rel="tooltip" title="Edit platform"><i class="icon-pencil"></i></a>
                <a href="<?php echo base_url() ?>offer/delete/<?php echo $item->id ?>" class="delete-item" data-location="l" rel="tooltip" title="Delete platform"><i class="icon-trash"></i></a>
              </p>
            </h4>        
        </div>
      <?php endforeach ?>
    </div>
  <?php endif ?>
</div>