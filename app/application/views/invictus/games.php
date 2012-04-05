  <h1 style="margin-bottom:20px;" class="all-games-title">All games by Invictus</h1>

  <div class="subnav" style="margin-bottom:40px;">
    <ul class="nav nav-pills games-filter">
      <li class="active"><a href="#" data-platform="all">All</a></li>
      <?php if ($platforms): ?>
        <?php foreach ($platforms as $item): ?>
          <li><a href="#" data-platform='<?php echo $item->id ?>'><?php echo $item->name ?></a></li>
        <?php endforeach ?>
      <?php endif ?>
    </ul>
  </div>  
  
  <div class="row">
    <div class="span8 all-games-wrapper">
      <?php if ($games): ?>
        <ul class="thumbnails all-games games-list">
          <?php foreach ($games as $i=>$item): ?>
            <li class="span2 <?php echo $i === 0 ? 'selected-game' : '' ?> " data-platforms='<?php echo json_encode($item->platforms) ?>'>
              <div class="thumbnail game">
                <a href="<?php echo base_url() ?>games/<?php echo $item->url ?>/short" rel="tooltip" title="<?php echo $item->name ?>" style="display:inline-block">
                  <img alt="" src="<?php echo base_url() ?>uploads/original/<?php echo $item->logo ?>" style="width:160px">
                </a>
              </div>
            </li>
          <?php endforeach ?>
        </ul>
      <?php endif ?>
    </div>
    <?php if ($game): ?>
      <div class="span4 details-pane" id="game-shortcut" style="height:auto;">
        <div class="details-pane-logo-big">
           <img src="<?php echo base_url() ?>uploads/original/<?php echo $game->teaser_image ?>" alt="">
        </div>
        <h3 style="margin-top:20px;"><?php echo $game->name ?></h3>
        <p><?php echo $game->short_description ?></p>
        <p style="text-align:right">
          <a href="<?php echo base_url() ?>games/<?php echo $game->url ?>" class="btn">View detailes <i class="icon-arrow-right"></i></a>
        </p>
        <hr>
        <div class="game-available-in">
          <h4>Stores</h4>
          <ul class="thumbnails">
            <?php if ($game->platforms): ?>
              <?php foreach ($game->platforms as $item): ?>
                <li class="span2">
                  <a class="thumbnail" href="<?php echo $item->url ?>" target = "_blank" rel="tooltip" title="<?php echo $item->name ?>" style="display:inline-block">
                    <img alt="" src="<?php echo base_url() ?>uploads/original/<?php echo $item->image ?>">
                  </a>
                </li>           
              <?php endforeach ?>
            <?php else: ?>
              <li><h6>No platform</h6></li>
            <?php endif ?>
          </ul>
        </div>
      </div>
    <?php endif ?>

  </div>
