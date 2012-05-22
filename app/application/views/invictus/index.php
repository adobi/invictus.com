      <!-- Main hero unit for a primary marketing message or call to action -->
      <div class="hero-unit header-carousel" style="">
        <div class="row">
          <div class="span8 image-carousel" style="margin-bottom:10px;">
            <div id="simple-carousel" class="carousel slide">
                <!-- Carousel items -->
                <div class="carousel-inner">
                  <?php if ($carousel): ?>
                    <?php foreach ($carousel as $i=>$item): ?>
                      <?php if ($item): ?>
                        <div class="item <?php echo $i===0 ? 'active' : '' ?>" data-item="<?php echo $item->id ?>">
                            <!-- <img <?php echo $i!==0 ? 'data-' : '' ?>src="<?php echo base_url() ?>uploads/original/<?php echo $item->hero_image ?>" alt=""> -->
                            <img <?php echo $i!==0 ? 'data-' : '' ?>src="<?php echo create_mobile_image($item->hero_image, 'hero') ?>?full=<?php echo base_url() ?>uploads/original/<?php echo $item->hero_image ?>" alt="">
                            <div class="carousel-caption">
                              <div class="row">
                                <div class="span6 hidden-phone">
                                  <h3>
                                    <?php echo $item->name ?>
                                  </h3>
                                  <p>
                                    <?php echo $item->short_description ?> 
                                  </p>
                                </div>
                                <div class="options span2">
                                  <p class="hidden-phone">
                                    <?php if ($item->video): ?>
                                      <a rel="in-modal" href = "#" data-href="<?php echo base_url() ?>games/<?php echo $item->url ?>/video/on_mainpage" class="btn btn-primary"><strong>Watch video</strong> <i style="margin-top:2px;" class="icon-facetime-video icon-white"></i></a>
                                    <?php else: ?>
                                      &nbsp;
                                    <?php endif ?>
                                  </p>
                                  <p>
                                    <a <?php echo event_tracking($item->analytics['hero']) ?> href="<?php echo base_url() ?>games/<?php echo $item->url ?>" class=" view-game-details btn btn-orange"><strong>View details</strong> <i style="margin-top:1px;" class="icon-chevron-right icon-white"></i></a>
                                  </p>
                                </div>
                              </div>
                            </div>        
                        </div> 
                      <?php endif ?>
                    <?php endforeach ?>
                  <?php endif ?>
                </div>
                <!-- Carousel nav -->
                <a class="carousel-control left hidden-phone" href="#simple-carousel" data-slide="prev">&lsaquo;</a>
                <a class="carousel-control right hidden-phone" href="#simple-carousel" data-slide="next">&rsaquo;</a>
            </div>
          </div>  
          <div class="span4 teasers">
            <?php if ($carousel): ?>
              <?php foreach ($carousel as $i=>$item): ?>
                <?php if ($item): ?>
                  <div class="teaser <?php echo $i === 0 ? 'hide' : '' ?>" data-item="<?php echo $item->id ?>">
                    <a <?php echo event_tracking($item->analytics['teaser']) ?> href="<?php echo base_url() ?>games/<?php echo $item->url ?>">
                      <!-- <img data-src="<?php echo base_url() ?>uploads/original/<?php echo $item->teaser_image ?>" alt=""> -->
                      <img data-src="<?php echo create_mobile_image($item->teaser_image, 'teaser') ?>" data-full="<?php echo base_url() ?>uploads/original/<?php echo $item->teaser_image ?>" alt="">
                    </a>
                  </div>
                <?php endif ?>
              <?php endforeach ?>
            <?php endif ?>
          </div>        
        </div>
      </div>
      <div class="hero-unit social">
        <div class="row">
          <div class="span8 ">
            <?php if ($current_offer): ?>
              <div class="row newsletter">
                <div class="">
                  <h2>Offer: <span class="upper-gray"><?php echo $current_offer->name ?></span></h2>
                </div>
                <div class="span4 subscribe">
                  <!-- <img src="http://placehold.it/360x160" alt=""> -->
                  <img src="<?php echo base_url() ?>uploads/original/<?php echo $current_offer->image ?>" alt="">
                </div>
                <div class="span4 offer">
                  <!-- <h2>Current offer</h2> -->
                  <p>
                    <?php echo nl2br($current_offer->description) ?>
                  </p>
                </div>
                <div class="span7 email-subscription">
                  <hr>
                  <?php echo form_open(base_url()."pages/subscribe", array('id'=>'subscribe-form', 'class'=>'form-search')) ?>
                    <input name="email" type="text" class="input-large search-query span5" style="font-size:1.4em; height:36px" placeholder="example@domain.com">
                    <button class="btn btn-orange btn-large" type="submit" <?php echo $current_offer ? event_tracking($current_offer) : '' ?>><i class="icon-pencil icon-white"></i> Subscribe</button>
                  <?php echo form_close() ?>
                </div>
              </div>
            <?php endif ?>
            <?php if ($about): ?>
              <div class="blog">
                <div class="">
                  <h2>About Invictus</h2>
                </div>
                <p style="padding:10px;"><?php echo nl2br($about->description) ?></p>
              </div>
            <?php endif ?>
          </div>
          <div class="span4 social-feed">
              <h2 style="margin-bottom:20px;">
                Invictus on
              </h2>
              <div class="fb-like" data-send="false" data-layout="button_count" data-width="80" data-show-faces="false"></div>
              <a href="https://twitter.com/<?php echo $settings->twitter_id ?>" class="twitter-follow-button" data-show-count="false">Follow @<?php echo $settings->twitter_id ?></a>
              <g:plusone size="medium"></g:plusone>
              <p>&nbsp;</p>
              <div class="facebook-widget" data-type="like-box" data-page="<?php echo $settings->facebook_page ?>"></div>
          </div>
        </div>
      </div>