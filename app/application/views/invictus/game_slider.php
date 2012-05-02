   
      <div id="simple-carousel-details-images" class="carousel slide carousel-images" style="width:770px, height:510px">
          <?php if (!$game->images_is_empty): ?>
            <!-- Carousel items -->
            <div class="carousel-inner">
                <div class="item active">
                    <img src="<?php echo base_url() ?>uploads/original/<?php echo $game->hero_image ?>" alt="">
                    <?php if ($game->video): ?>
                      <div class="carousel-caption" style="text-align:center">
                          <div class="options">
                            <p class="hidden-phone">
                              <a rel="in-modal" href = "#" data-href="<?php echo base_url() ?>games/<?php echo $game->url ?>/video/on_product_page" class="btn btn-primary"><strong>Watch video</strong> <i style="margin-top:2px;" class="icon-facetime-video icon-white"></i></a>
                            </p>
                          </div>
                      </div>        
                    <?php endif ?>
                </div>               
                <?php if ($game->images): ?>
                  <?php foreach ($game->images as $i => $item): ?>
                    <div class="item " data-platforms='<?php echo json_encode(array($item->platform_id)) ?>'>
                      <?php if ($item->hd_path): ?>
                        <a <?php echo event_tracking($item, 'hd') ?> href="<?php echo base_url() ?>/uploads/original/<?php echo $item->hd_path ?>" target="_blank">
                          <img data-src="<?php echo base_url() ?>uploads/original/<?php echo $item->path ?>" alt="">
                        </a>
                      <?php else: ?>
                        <img data-src="<?php echo base_url() ?>uploads/original/<?php echo $item->path ?>" alt="">
                      <?php endif ?>
                    </div>  
                  <?php endforeach ?>

                <?php endif ?>
            </div>
            <!-- Carousel nav -->
            <a class="carousel-control left hidden-phone" href="#simple-carousel-details-images" data-slide="prev">&lsaquo;</a>
            <a class="carousel-control right hidden-phone" href="#simple-carousel-details-images" data-slide="next">&rsaquo;</a>
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
            <a class="carousel-control left hidden-phone" href="#simple-carousel-details-videos" data-slide="prev">&lsaquo;</a>
            <a class="carousel-control right hidden-phone" href="#simple-carousel-details-videos" data-slide="next">&rsaquo;</a>
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
                            <li data-platforms='<?php echo json_encode(array($item->platform_id)) ?>' data-item-id="<?php echo $item->id ?>">
                              <a <?php echo event_tracking($item) ?> href="#" class="thumbnail " data-type="images">
                                <img src="<?php echo create_thumb($item->path, 128) ?>" alt="" style="width:128px">
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
          <?php if ($game->platforms): ?>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Filter by platform <b class="caret"></b></a>
              <ul class="dropdown-menu games-filter">
                <li><a href="#" data-platform="all">All</a></li>
                <?php foreach ($game->platforms as $p): ?>
                  <li><a href="#" data-platform="<?php echo $p->platform_id ?>"><?php echo $p->name ?></a></li>
                <?php endforeach ?>
              </ul>
            </li>          
          <?php endif ?>

          <?php if (!$game->videos_is_empty ||  !$game->images_is_empty): ?>
            <li class="active"><a data-toggle="tab" href="#<?php echo $game->images_is_empty ? 'videos' : 'images' ?>" data-carousel=".carousel-images">Images</a></li>
          <?php endif ?>
          
          <?php if (!$game->videos_is_empty): ?>
            <li class=""><a data-toggle="tab" href="#videos" data-carousel=".carousel-videos">Videos</a></li>
          <?php endif ?>
        </ul> <!-- /nav -->
    </div>      
           
    <div class="hide">
      <div id="hidden-simple-carousel-details-images" class="">
          <?php if (!$game->images_is_empty): ?>
            <!-- Carousel items -->
            <div class="carousel-inner">
                <div class="item active">
                    <img src="<?php echo base_url() ?>uploads/original/<?php echo $game->hero_image ?>" alt="">
                    <?php if ($game->video): ?>
                      <div class="carousel-caption" style="text-align:center">
                          <div class="options">
                            <p class="hidden-phone">
                              <a rel="in-modal" href = "#" data-href="<?php echo base_url() ?>games/<?php echo $game->url ?>/video/on_product_page" class="btn btn-primary"><strong>Watch video</strong> <i style="margin-top:2px;" class="icon-facetime-video icon-white"></i></a>
                            </p>
                          </div>
                      </div>        
                    <?php endif ?>
                </div>               
                <?php if ($game->images): ?>
                  <?php foreach ($game->images as $i => $item): ?>
                    <div class="item" data-platforms='<?php echo json_encode(array($item->platform_id)) ?>' data-item-id="<?php echo $item->id ?>">
                      <?php if ($item->hd_path): ?>
                        <a <?php echo event_tracking($item, 'hd') ?> href="<?php echo base_url() ?>/uploads/original/<?php echo $item->hd_path ?>" target="_blank">
                          <img data-src="<?php echo base_url() ?>uploads/original/<?php echo $item->path ?>" alt="">
                        </a>
                      <?php else: ?>
                        <img data-src="<?php echo base_url() ?>uploads/original/<?php echo $item->path ?>" alt="">
                      <?php endif ?>
                    </div>  
                  <?php endforeach ?>

                <?php endif ?>
            </div>
            <!-- Carousel nav -->
            <a class="carousel-control left hidden-phone" href="#simple-carousel-details-images" data-slide="prev">&lsaquo;</a>
            <a class="carousel-control right hidden-phone" href="#simple-carousel-details-images" data-slide="next">&rsaquo;</a>
          <?php else: ?>
            <div class="carousel-inner">
              <div class="item active">
                  <img src="<?php echo base_url() ?>uploads/original/<?php echo $game->hero_image ?>" alt="">
              </div>  
            </div>
          <?php endif ?>
      </div>        
      <?php if (!$game->images_is_empty): ?>
        <div id="hidden-es-carousel-images">
          <div  class="es-carousel-wrapper span7" style="margin-left:0">
              <div class="es-carousel">
                  <ul>
                    <li>
                      <a  href="#" class="thumbnail selected-carousel-item" data-type="images">
                        <img src="<?php echo base_url() ?>uploads/original/<?php echo $game->hero_image ?>" alt="">
                      </a>
                    </li>
                    <?php if ($game->images): ?>
                      <?php foreach ($game->images as $i => $item): ?>
                        <li data-platforms='<?php echo json_encode(array($item->platform_id)) ?>' data-item-id="<?php echo $item->id ?>">
                          <a <?php echo event_tracking($item) ?> href="#" class="thumbnail " data-type="images">
                            <img src="<?php echo create_thumb($item->path, 128) ?>" alt="" style="width:128px">
                          </a>
                        </li>                      
                      <?php endforeach ?>
                    <?php endif ?>                      
                  </ul>
              </div>
          </div>             
        </div> <!-- /#images -->
      <?php endif ?>
    </div> <!-- /.hide -->       
