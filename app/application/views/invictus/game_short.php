<?php if ($game): ?>
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
            <a  <?php echo $item->url ? event_tracking($item->analytics['all_games']) : '' ?> class="thumbnail" href="<?php echo $item->url ? $item->url : '#' ?>" target = "_blank" rel="tooltip" title="<?php echo $item->name ?>" style="display:inline-block; width:100px;">
              <img alt="" src="<?php echo base_url() ?>uploads/original/<?php echo $item->image ?>">
            </a>
          </li>           
        <?php endforeach ?>
      <?php else: ?>
        <li><h6>No platform</h6></li>
      <?php endif ?>
    </ul>
  </div>  
<?php endif ?>