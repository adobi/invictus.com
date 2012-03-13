<div class="well">
  <h1>
    Platforms
    <p class="pull-right">
      <a class="btn btn-primary" href="<?= base_url(); ?>platform/edit" data-ajax-link="1" data-unselect="1"><i class="icon-plus-sign icon-white"></i>New</a>
    </p>
  </h1>    
  <?php if ($items): ?>
    <div class="items platform-items">
      <hr>
      <?php foreach ($items as $item): ?>
        <div class="item">
            <h4>
              <img src="<?php echo $item->image ? base_url() . 'uploads/original/' . $item->image : 'http://placehold.it/128x48' ?>" alt=""> 
              <?php echo $item->name ?>
              
              <p class="pull-right" style="margin-top:5px;">
                <a href="<?php echo base_url() ?>platform/edit/<?php echo $item->id ?>" class="select-item" data-ajax-link="1" rel="tooltip" title="Edit platform"><i class="icon-pencil"></i></a>
                <a href="<?php echo base_url() ?>platform/delete/<?php echo $item->id ?>" class="delete-item" data-location="l" rel="tooltip" title="Delete platform"><i class="icon-trash"></i></a>
              </p>
            </h4>        
        </div>
      <?php endforeach ?>
    </div>
  <?php endif ?>
</div>