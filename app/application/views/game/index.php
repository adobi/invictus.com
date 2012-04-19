<div class="well">
  <h3>
    Games
    <p class="pull-right">
      <!-- <a href="<?php echo base_url() ?>/game/generate_analytics" class="btn" rel="tooltip" title="Re-generate analytics for all games"><i class="icon-signal"></i></a> -->
      <a class="btn btn-primary" href="<?= base_url(); ?>game/edit" data-ajax-link="1" data-unselect="1" rel="tooltip" title="Create new game"><i class="icon-plus-sign icon-white"></i></a>
    </p>
  </h3>    
  <?php if ($items): ?>
    <div class="items page-items">
      <hr>
      <div class="subnav" style="margin:20px 0">
        <ul class="nav nav-pills games-filter">
          <li class="active"><a href="#" data-platform="all">All</a></li>
          <?php if ($platforms): ?>
            <?php foreach ($platforms as $item): ?>
              <li><a href="#" data-platform='<?php echo $item->id ?>'><?php echo $item->name ?></a></li>
            <?php endforeach ?>
          <?php endif ?>
        </ul>
      </div>       
      <ul class="thumbnails games-list" id="list-of-all-games" style="margin-left:-10px">
        <?php foreach ($items as $item): ?>
          <li class="span3" data-platforms='<?php echo json_encode($item->platforms) ?>' style="margin-left:10px; margin-bottom:9px;">
            <div class="item thumbnail <?php echo $item->is_active ? 'alert-success' : '' ?>" data-id="<?php echo $item->id ?>" style="padding:0">
              <h4 class="center">
                <a style="margin-top:-5px" href="<?php echo base_url() ?>game/delete/<?php echo $item->id ?>" class="btn delete-item select-item pull-right" data-location="l" data-trigget="reload" rel="tooltip" title="Delete game" data-modal-header="Game <?php echo $item->name ?>"><i class="icon-trash"></i></a>
                <span rel="tooltip" title="<?php echo $item->name ?>">
                  <?php echo strlen($item->name) > 17 ? substr($item->name, 0,16)."..." : $item->name ?> 
                </span>
                <br>
                <span class="upper-gray"><?php echo to_date($item->released) ?></span>
              </h4> 
              <img src="<?php echo $item && $item->logo ? base_url() . 'uploads/original/'.$item->logo : 'http://placehold.it/170x170' ?>" alt="" style="width:128px;">
              <hr style="margin:4px 0 6px;">
              <div class="caption " style="">
                <div class="btn-group">
                  <a href="<?php echo base_url() ?>game/edit/<?php echo $item->id ?>" class="btn select-item" data-ajax-link="1" rel="tooltip" title="Edit game"><i class="icon-pencil"></i></a>
                  <a href="<?php echo base_url() ?>game/platforms/<?php echo $item->id ?>" class="btn select-item" data-ajax-link="1" rel="tooltip" title="Available on"><i class="icon-platform"></i></a>
                  <a href="<?php echo base_url() ?>game/images/<?php echo $item->id ?>" class="btn select-item" data-ajax-link="1" rel="tooltip" title="Images"><i class="icon-picture"></i></a>
                  <a href="<?php echo base_url() ?>game/videos/<?php echo $item->id ?>" class="btn select-item" data-ajax-link="1" rel="tooltip" title="Videos"><i class="icon-facetime-video"></i></a>
                  <a href="<?php echo base_url() ?>game/seo/<?php echo $item->id ?>" class="btn select-item" data-ajax-link="1" rel="tooltip" title="SEO settings"><i class="icon-search"></i></a>

                  <a href="#" class="btn dropdown-toggle" data-toggle="dropdown" _style="border-bottom-right-radius:0px; border-top-right-radius: 0px;"><i class="icon-list"></i></a>
                  <ul class="dropdown-menu" style="left:100px;">
                    <li>
                      <a data-action="<?php echo $item->is_active ? 'inactivate' : 'activate' ?>" href="<?php echo base_url() ?>game/action/<?php echo $item->is_active ? 'inactivate' : 'activate' ?>/<?php echo $item->id ?>" class="_btn action" rel="tooltip" title="<?php echo $item->is_active ? 'Inactivate' : 'Activate' ?>"><i class="icon-lock"></i><?php echo $item->is_active ? 'Inactivate' : 'Activate' ?></a>
                    </li>
                    <li class="divider"></li>
                    <li>
                      <a href="<?php echo base_url() ?>game/publish_to_news/<?php echo $item->id ?>" class="select-item" data-ajax-link><i class="icon-share-alt"></i>In game news</a>
                    </li>
                    <li>
                      <a href="<?php echo base_url() ?>game/publish_to_press/<?php echo $item->id ?>" class="select-item" data-ajax-link><i class="icon-share-alt"></i>Press release</a>
                    </li>
                    <li>
                      <a href="<?php echo base_url() ?>game/publish_to_microsite/<?php echo $item->id ?>" class="select-item" data-ajax-link><i class="icon-share-alt"></i>Microsite</a>
                    </li>
                    <li class="divider"></li>
                    <li>
                      <a href="<?php echo base_url() ?>game/publish_final/<?php echo $item->id ?>" class="select-item" data-ajax-link><i class="icon-exclamation-sign"></i>Verification</a>
                    </li>
                    
                  </ul>
                </div>
              </div>
              </div>
          </li>
        <?php endforeach ?>
      </ul>
    </div>
  <?php endif ?>
  
</div>