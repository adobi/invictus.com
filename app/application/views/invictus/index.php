      <!-- Main hero unit for a primary marketing message or call to action -->
      <div class="hero-unit header-carousel" style="">
        <div class="row">
          <div class="span8" class="image-carousel" style="margin-bottom:10px;">
            <div id="simple-carousel" class="carousel slide">
                <!-- Carousel items -->
                <div class="carousel-inner">
                  <?php if ($carousel): ?>
                    <?php foreach ($carousel as $i=>$item): ?>
                      <?php if ($item): ?>
                        <div class="item <?php echo $i===0 ? 'active' : '' ?>" data-item="<?php echo $item->id ?>">
                            <img src="<?php echo base_url() ?>uploads/original/<?php echo $item->hero_image ?>" alt="">
                            <div class="carousel-caption">
                              <h4><?php echo $item->name ?></h4>
                              <p><?php echo $item->short_description ?> <a href="<?php echo base_url() ?>games/<?php echo $item->url ?>" class="btn">View detailes <i class="icon-arrow-right"></i></a></p>
                            </div>        
                        </div> 
                      <?php endif ?>
                    <?php endforeach ?>
                  <?php endif ?>
                </div>
                <!-- Carousel nav -->
                <a class="carousel-control left" href="#simple-carousel" data-slide="prev">&lsaquo;</a>
                <a class="carousel-control right" href="#simple-carousel" data-slide="next">&rsaquo;</a>
            </div>
          </div>  
          <div class="span4 teasers">
              <?php if ($carousel): ?>
                <?php foreach ($carousel as $i=>$item): ?>
                  <?php if ($item): ?>
                    <div class="teaser <?php echo $i === 0 ? 'hide' : '' ?>" data-item="<?php echo $item->id ?>">
                      <a href="<?php echo base_url() ?>games/<?php echo $item->url ?>">
                        <img src="<?php echo base_url() ?>uploads/original/<?php echo $item->teaser_image ?>" alt="">
                      </a>
                    </div>
                  <?php endif ?>
                <?php endforeach ?>
              <?php endif ?>
              <!-- 
              <div class="teaser">
                <a href="details.php">
                  <img src="assets/games/froggyjump/teaser.png" alt="">
                </a>
              </div>
              <div class="teaser">
                <a href="details.php">
                  <img src="assets/games/blastwave/teaser.png" alt="">
                </a>
              </div>
              <div class="teaser">
                <a href="details.php">
                  <img src="assets/games/flycontrol/teaser.png" alt="">
                </a>
              </div>
               -->
              <!-- 
              <div class="teaser">
                <a href="details.php">
                  <img src="http://placehold.it/370x165" alt="">
                </a>
              </div>
               -->
          </div>        
        </div>
      </div>
      <div class="hero-unit social">
        <div class="row">
          <div class="span8">
            <div>
              <h2 style="margin-bottom:10px;">Latest blog posts</h2>
              <?php foreach (range(0,2) as $key => $value): ?>
                <div>
                  <h5>Lorem ipsum dolor sit amet</h5>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam varius lorem in magna ornare dapibus. Nam vel lectus mauris. Sed ante felis vulputate sit amet mi</p>
                  <p style="text-align:right">
                    <a href="#">Read more &rarr;</a>
                  </p>
                  <?php if ($key !== 2): ?>
                    <hr>
                  <?php endif ?>
                </div>
              <?php endforeach ?>
            </div>
            
            <div class="row newsletter" style="margin-top:20px;">
              <div class="span4" style="margin:auto 10px;">
                <h2 style="margin-bottom:10px;">Newsletter</h2>
                <?php echo form_open(base_url()."pages/subscribe", array('id'=>'subscribe-form', 'class'=>'form-search')) ?>
                  <input name="email" type="text" class="input-large search-query" style="font-size:1.4em; height:36px" placeholder="example@domain.com">
                  <button class="btn btn-orange btn-large" type="submit"><i class="icon-pencil icon-white"></i> Subscribe</button>
                <?php echo form_close() ?>
              </div>
              <div class="span4 offer">
                <h2>Current offer</h2>
                <p>
                  <?php if ($current_offer): ?>
                    <?php echo $current_offer->description ?>
                  <?php endif ?>
                </p>
              </div>
          </div>
          </div>
          <div class="span4 social-feed">
              <h2 style="margin-bottom:20px;">
                Invictus on Facebook
              </h2>
              
              <div class="fb-like" data-send="false" data-layout="button_count" data-width="80" data-show-faces="false"></div>
              <a href="https://twitter.com/share" class="twitter-share-button" data-via="adobi">Tweet</a>
              <g:plusone size="medium"></g:plusone>
              <p>&nbsp;</p>
              <div class="fb-like-box" data-href="https://www.facebook.com/invictusgames" data-width="360" data-show-faces="true" data-stream="true" data-header="false"></div>
              
          </div>
        </div>
      </div>