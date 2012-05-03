  <h1 style="margin-bottom:20px;" class="all-games-title">All games by Invictus</h1>
  <div class="subnav" style="margin-bottom:40px;">
    <div class=" hidden-desktop navbar" style="float:right; width:100%;">
        <span style="font-size:12px; font-weight:bold;position:relative; top:10px; left:5px; color:#999">FILTERS</span>
      <a class="btn btn-navbar" data-toggle="collapse" data-target=".games-filter">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>
    </div>
    <ul class="nav nav-pills games-filter _visible-desktop">
      <li class="active"><a href="#" data-platform="all">All</a></li>
      <?php if ($platforms): ?>
        <?php foreach ($platforms as $item): ?>
          <li><a href="javascript:void(0)" data-platform='<?php echo $item->id ?>'><?php echo $item->name ?></a></li>
        <?php endforeach ?>
      <?php endif ?>
    </ul>
  </div>  
  
  <div class="row" data-reversable>
    <div class="span8 all-games-wrapper">
      <?php if ($games): ?>
        <ul class="thumbnails all-games games-list">
          <?php foreach ($games as $i=>$item): ?>
            <li class="span2 <?php echo $item->id === $game->id ? 'selected-game' : '' ?> " data-platforms='<?php echo json_encode($item->platforms) ?>'>
              <div class="thumbnail game">
                <a href="<?php echo base_url() ?>games/<?php echo $item->url ?>/short" rel="tooltip" title="<?php echo $item->name ?>" style="display:inline-block">
                  <img alt="" data-src="<?php echo base_url() ?>uploads/original/<?php echo $item->logo ?>">
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
           <img src="<?php echo base_url() ?>uploads/original/<?php echo $game->splash_image ?>" alt="">
        </div>
        <h3 style="margin-top:20px;"><?php echo $game->name ?></h3>
        <p><?php echo $game->short_description ?></p>
        <div class="options" style="text-align:right">
          <p>
          <?php if ($game->video): ?>
            <a rel="in-modal" href = "#" data-href="<?php echo base_url() ?>games/<?php echo $game->url ?>/video/on_all_games" class="btn btn-primary"><strong>Watch video</strong> <i style="margin-top:2px;" class="icon-facetime-video icon-white"></i></a>
          <?php else: ?>
            &nbsp;
          <?php endif; ?>
          </p>
          <p>
            <a <?php //echo event_tracking($game->analytics['all_games']) ?> href="<?php echo base_url() ?>games/<?php echo $game->url ?>" class="btn  btn-orange view-game-details"><strong>View details</strong><i style="margin-top:1px;" class="icon-chevron-right icon-white"></i></a>
          </p>
        </div>
        <hr>
        <div class="game-available-in">
          <h4>Stores</h4>
          <ul class="thumbnails">
            <?php if ($game->platforms): ?>
              <?php foreach ($game->platforms as $item): ?>
                <li class="span2">
                  <a class="thumbnail" href="<?php echo $item->url ?>" target = "_blank" rel="tooltip" title="<?php echo $item->name ?>" style="display:inline-block;  width:100px;">
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
