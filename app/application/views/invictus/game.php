  <div class="row">

    <div class="span8 game-logo">
    <?php require_once 'game_slider.php'; ?>
    <?php //require_once 'game_slider_fotorama.php'; ?>
      <?php if (!$game->crosspromo_is_empty): ?>
        
        <div class="span8 crosspromo" _style="margin-top:20px; margin-right:10px; width:760px;">
          <h3>Other games</h3>
          <hr>
          <ul class="thumbnails" style="margin-left:10px;">
            <?php if ($game->crosspromo): ?>
              <?php foreach ($game->crosspromo as $item): ?>
                <?php if ($item): ?>
                  <li class="span2"><a <?php echo event_tracking($item) ?> href="<?php echo base_url() ?>games/<?php echo $item->url ?>" class="thumbnail"><img alt="" src="<?php echo base_url() ?>uploads/original/<?php echo $item->logo ?>"></a></li>
                <?php endif ?>
              <?php endforeach ?>
            <?php endif ?>
          </ul>
        </div>
      <?php endif ?>

      <div id = "fb-comments-desktop" class="fb-comments" data-href="<?php echo base_url() ?>games/<?php echo $game->url ?>" data-num-posts="2" data-width="770"></div>
      <!-- <div class="fb-comments" data-href="http://facebook.com/<?php echo $game->facebook_page ?>" data-num-posts="2" data-width="620"></div> -->
    </div>
    <div class="span4 details-pane game-details" style="margin-left:10px;">
      <h3 class="game-name-and-icon">
        <?php echo $game->name ?>
        <img src="<?php echo base_url() ?>uploads/original/<?php echo $game->logo ?>" alt="" class="pull-right" style="width:64px;">
      </h3>
      <hr>
      <p>
        <?php echo nl2br($game->long_description) ?>
      </p>
      <div class="game-available-in">
        <hr>
        <h3 style="margin-top:10px;">Stores</h3>
        <ul class="thumbnails ">
          <?php if ($game->platforms): ?>
            <?php foreach ($game->platforms as $item): ?>
              <li class="span2">
                <a <?php echo $item->url ? event_tracking($item->analytics['product_page']) : '' ?> class="thumbnail" href="<?php echo $item->url ? $item->url : '#' ?>" target = "_blank" rel="tooltip" title="<?php echo $item->name ?>" style="display:inline-block;width:105px">
                  <img alt="" src="<?php echo base_url() ?>uploads/original/<?php echo $item->image ?>">
                </a>
              </li>           
            <?php endforeach ?>
          <?php else: ?>
            <li><h6>No platform</h6></li>
          <?php endif ?>
        </ul>
      </div>
      
      <hr>
      
      <?php if ($game->facebook_page): ?>
        <h3 style="margin-bottom:20px;"><?php echo $game->name ?> in social media</h3>
      <?php endif ?>
      
      <div class="fb-like" data-send="false" data-layout="button_count" data-width="60" data-show-faces="false"></div>
      <!-- <a href="https://twitter.com/share" class="twitter-share-button" data-via="adobi">Tweet</a> -->
      <?php if ($game->twitter_page): ?>
        <a href="https://twitter.com/<?php echo $game->twitter_page ?>" class="twitter-follow-button" data-show-count="false">Follow @<?php echo $game->twitter_page ?></a>
      <?php else: ?>
        <a href="https://twitter.com/share" class="twitter-share-button" data-via="invictusgames">Tweet</a>
      <?php endif; ?>
      <g:plusone size="medium"></g:plusone>
      <p>&nbsp;</p> 
      <?php if ($game->facebook_page): ?>
        <div class="facebook-widget" data-type="like-box" data-page="<?php echo $game->facebook_page ?>"></div>
      <?php endif ?>
      <div id = "fb-comments-mobile" class="fb-comments" data-href="<?php echo base_url() ?>games/<?php echo $game->url ?>" data-num-posts="2" data-width="620" _style="display:none"></div>
    </div>
  </div>
