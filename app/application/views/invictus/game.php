  <div class="row">
    <div class="span8 game-logo">
      <div id="simple-carousel-details-images" class="carousel slide carousel-images">
          <?php if (!$game->images_is_empty): ?>
            <!-- Carousel items -->
            <div class="carousel-inner">
                <div class="item active">
                    <img src="<?php echo base_url() ?>uploads/original/<?php echo $game->hero_image ?>" alt="">
                </div>               
                <?php if ($game->images): ?>
                  <?php foreach ($game->images as $i => $item): ?>
                    <div class="item ">
                      <a _rel="in-modal" <?php echo event_tracking($item) ?> href="javascript:void();" _data-href="<?php echo base_url() ?>uploads/original/<?php echo $item->path ?>">
                        <img src="<?php echo base_url() ?>uploads/original/<?php echo $item->path ?>" alt="">
                      </a>
                      <?php if ($item->hd_path): ?>
                        <div class="carousel-caption" style="color:#fff">
                          Get the HD version of the image <a <?php echo event_tracking($item, 'hd') ?> href="<?php echo base_url() ?>/pages/download/<?php echo $item->id ?>" class="btn _btn-primary btn-large" id="download-image" target="_blank"><i class="icon-download _icon-white" style="margin-right:3px;"></i>Download</a>
                        </div>                       
                      <?php endif ?>
                    </div>  
                  <?php endforeach ?>

                <?php endif ?>
            </div>
            <!-- Carousel nav -->
            <a class="carousel-control left" href="#simple-carousel-details-images" data-slide="prev">&lsaquo;</a>
            <a class="carousel-control right" href="#simple-carousel-details-images" data-slide="next">&rsaquo;</a>
          <?php else: ?>
            <div class="carousel-inner">
              <div class="item active">
                  <img src="<?php echo base_url() ?>uploads/original/<?php echo $game->hero_image ?>" alt="">
              </div>  
            </div>
          <?php endif ?>
      </div>
      <?php if (!$game->videos_is_empty): ?>
        <div id="simple-carousel-details-videos" class="carousel slide carousel-videos hide">
            <!-- Carousel items -->
            <div class="carousel-inner">
                <?php if ($game->videos): ?>
                  <?php foreach ($game->videos as $i => $item): ?>
                    <div class="item <?php echo $i===0 ? 'active' : '' ?>">
                      <a <?php echo event_tracking($item) ?> href="#">
                        <?php echo youtube_video_image($item->code, 770, 510) ?>
                      </a>
                    </div>  
                  <?php endforeach ?>

                <?php endif ?>
            </div>                
            <!-- Carousel nav -->
            <a class="carousel-control left" href="#simple-carousel-details-videos" data-slide="prev">&lsaquo;</a>
            <a class="carousel-control right" href="#simple-carousel-details-videos" data-slide="next">&rsaquo;</a>
        </div>      
      <?php endif ?>      

      <div class="tabbable tabs-below" style="margin:15px 0;">
        <div class="tab-content">
          <?php if (!$game->images_is_empty): ?>
            <div id="images" class="tab-pane active game-tab-pane span8" style="margin-left:0px;">
              <div id="image-carousel" class="es-carousel-wrapper span7" style="margin-left:0">
                  <div class="es-carousel">
                      <ul>
                        <li>
                          <a  href="#" class="thumbnail selected-carousel-item" data-type="images">
                            <img src="<?php echo base_url() ?>uploads/original/<?php echo $game->hero_image ?>" alt="">
                          </a>
                        </li>
                        <?php if ($game->images): ?>
                          <?php foreach ($game->images as $i => $item): ?>
                            <li>
                              <a <?php echo event_tracking($item) ?> href="#" class="thumbnail " data-type="images">
                                <img src="<?php echo base_url() ?>uploads/original/<?php echo $item->path ?>" alt="" style="width:128px">
                              </a>
                            </li>                      
                          <?php endforeach ?>
                        <?php endif ?>                      
                      </ul>
                  </div>
              </div>             
            </div> <!-- /#images -->
          <?php endif ?>
          <?php if (!$game->videos_is_empty): ?>
            <div id="videos" class="tab-pane <?php echo $game->images_is_empty ? 'active' : '' ?> game-tab-pane span8" style="margin-left:0px;">
              <div id="video-carousel" class="es-carousel-wrapper span7" style="margin-left:0">
                  <div class="es-carousel">
                      <ul>
                        <?php if ($game->videos): ?>
                          <?php foreach ($game->videos as $i => $item): ?>
                            <li>
                              <a <?php echo event_tracking($item) ?> href="#" class="thumbnail <?php echo $i === 0 ? 'selected-carousel-item' : '' ?>" data-type="videos" data-code="<?php echo $item->code ?>">
                                <?php echo youtube_video_image($item->code, 128, 70) ?>
                              </a>
                            </li>                      
                          <?php endforeach ?>
                        <?php endif ?>                      
                      </ul>
                  </div>
              </div>             
            </div> <!-- /#videos -->
          <?php endif ?>
        </div> <!-- /tab-content -->
        <ul class="nav nav-tabs game-tabs">
          <?php if (!$game->videos_is_empty ||  !$game->images_is_empty): ?>
            <li class="active"><a data-toggle="tab" href="#<?php echo $game->images_is_empty ? 'videos' : 'images' ?>">Images</a></li>
          <?php endif ?>
          
          <?php if (!$game->videos_is_empty): ?>
            <li class=""><a data-toggle="tab" href="#videos">Videos</a></li>
          <?php endif ?>
        </ul> <!-- /nav -->
      </div> <!-- /game-logo -->
           
      <?php if (!$game->crosspromo_is_empty): ?>
        
        <div class="span8 crosspromo">
          <h3>Other games</h3>
          <hr>
          <ul class="thumbnails">
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

      <div id = "fb-comments-desktop" class="fb-comments" data-href="<?php echo base_url() ?>games/<?php echo $game->url ?>" data-num-posts="2" data-width="620"></div>
      <!-- <div class="fb-comments" data-href="http://facebook.com/<?php echo $game->facebook_page ?>" data-num-posts="2" data-width="620"></div> -->
    </div>
    <div class="span4 details-pane game-details">
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
                <a <?php echo event_tracking($item->analytics['product_page']) ?> class="thumbnail" href="<?php echo $item->url ?>" target = "_blank" rel="tooltip" title="<?php echo $item->name ?>" style="display:inline-block">
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
      
      <h3 style="margin-bottom:20px;"><?php echo $game->name ?> on Facebook</h3>
      <div class="fb-like" data-send="false" data-layout="button_count" data-width="60" data-show-faces="false"></div>
      <!-- <a href="https://twitter.com/share" class="twitter-share-button" data-via="adobi">Tweet</a> -->
      <a href="https://twitter.com/<?php echo $game->twitter_page ?>" class="twitter-follow-button" data-show-count="false">Follow @<?php echo $game->twitter_page ?></a>
      <g:plusone size="medium"></g:plusone>
      <p>&nbsp;</p> 
      <div class="facebook-widget" data-type="like-box" data-page="<?php echo $game->facebook_page ?>"></div>
      <div id = "fb-comments-mobile" class="fb-comments" data-href="<?php echo base_url() ?>games/<?php echo $game->url ?>" data-num-posts="2" data-width="620" _style="display:none"></div>
    </div>
  </div>
