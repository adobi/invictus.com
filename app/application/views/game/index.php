<div class="well">
  <h3>
    Games
    <p class="pull-right">
      <a class="btn btn-primary" href="<?= base_url(); ?>game/edit" data-ajax-link="1" data-unselect="1" rel="tooltip" title="Create new game"><i class="icon-plus-sign icon-white"></i></a>
    </p>
  </h3>    
  <?php if ($items): ?>
    <div class="items page-items">
      <hr>
      <div class="subnav" style="margin:20px 0">
        <ul class="nav nav-pills">
          <li><a href="#">All</a></li>
          <li><a href="#">MAC</a></li>
          <li><a href="#">iOS</a></li>
          <li><a href="#">Android</a></li>
          <li><a href="#">PC</a></li>
          <li><a href="#">Web</a></li>
        </ul>
      </div>       
      <ul class="thumbnails">
        <?php foreach ($items as $item): ?>
          <li class="span4">
            <div class="item thumbnail <?php echo $item->is_active ? 'alert-success' : '' ?>" data-id="<?php echo $item->id ?>">
              <h4 class="center">
                <?php echo $item->name ?> <span class="upper-gray"><?php echo to_date($item->released) ?></span>
                  <a data-action="<?php echo $item->is_active ? 'inactivate' : 'activate' ?>" href="<?php echo base_url() ?>game/action/<?php echo $item->is_active ? 'inactivate' : 'activate' ?>/<?php echo $item->id ?>" class="btn action" rel="tooltip" title="<?php echo $item->is_active ? 'Inactivate' : 'Activate' ?> game"><i class="icon-lock"></i></a>
              </h4> 
              <img src="<?php echo $item && $item->logo ? base_url() . 'uploads/original/'.$item->logo : 'http://placehold.it/170x170' ?>" alt="">
              <hr style="margin:4px 0 6px;">
              <div class="caption center" style="padding-left:0; padding-right:0">
                <a href="<?php echo base_url() ?>game/edit/<?php echo $item->id ?>" class="btn select-item" data-ajax-link="1" rel="tooltip" title="Edit game"><i class="icon-pencil"></i></a>
                <a href="<?php echo base_url() ?>game/platforms/<?php echo $item->id ?>" class="btn" data-ajax-link="1" rel="tooltip" title="Available on"><i class="icon-platform"></i></a>
                <a href="<?php echo base_url() ?>game/images/<?php echo $item->id ?>" class="btn select-item" data-ajax-link="1" rel="tooltip" title="Images"><i class="icon-picture"></i></a>
                <a href="<?php echo base_url() ?>game/videos/<?php echo $item->id ?>" class="btn select-item" data-ajax-link="1" rel="tooltip" title="Videos"><i class="icon-facetime-video"></i></a>
                <a href="<?php echo base_url() ?>game/analytics/<?php echo $item->id ?>" class="btn select-item" data-ajax-link="1" rel="tooltip" title="Analytics settings"><i class="icon-signal"></i></a>
                <a href="<?php echo base_url() ?>game/seo/<?php echo $item->id ?>" class="btn select-item" data-ajax-link="1" rel="tooltip" title="SEO settings"><i class="icon-search"></i></a>
                <a href="<?php echo base_url() ?>game/delete/<?php echo $item->id ?>" class="btn delete-item select-item" data-location="l" rel="tooltip" title="Delete game" data-modal-header="Game <?php echo $item->name ?>"><i class="icon-trash"></i></a>
              </div>
              </div>
          </li>
        <?php endforeach ?>
      </ul>
    </div>
  <?php endif ?>
  
</div>