<?php require_once 'h.php'; ?>
  <!--
  <div class="carousel slide" style="margin-top:10px">
    <a href="details.php" class="carousel-control left">‹</a>
    <a href="details.php" class="carousel-control right">›</a>
  </div>
    -->
  <div class="row">
    <div class="span8 game-logo">
      <div id="simple-carousel-details" class="carousel slide">
          <!-- Carousel items -->
          <div class="carousel-inner">
              <div class="item active">
                  <img src="assets/games/greedcorp/hero.png" alt="">
              </div>  
              <div class="item">
                  <img src="assets/games/greedcorp/hero.png" alt="">
              </div>                          
          </div>
          <!-- Carousel nav -->
          <a class="carousel-control left" href="#simple-carousel-details" data-slide="prev">&lsaquo;</a>
          <a class="carousel-control right" href="#simple-carousel-details" data-slide="next">&rsaquo;</a>
      </div>      
      <div class="tabbable tabs-below" style="margin:15px 0;">
        <div class="tab-content">
          <div id="images" class="tab-pane active game-tab-pane span8" style="margin-left:0px;">
            <div id="image-carousel" class="es-carousel-wrapper span7">
                <div class="es-carousel">
                    <ul>
                      <li>
                        <a href="#" class="thumbnail">
                          <img alt="" src="assets/games/greedcorp/1.png">
                        </a>
                      </li>                      
                      <li>
                        <a href="#" class="thumbnail">
                          <img alt="" src="assets/games/greedcorp/2.png">
                        </a>
                      </li>                      
                      <li>
                        <a href="#" class="thumbnail">
                          <img alt="" src="assets/games/greedcorp/3.png">
                        </a>
                      </li>                      
                      <?php foreach (range(0, 10) as $key => $value): ?>
                        <li>
                          <a href="#" class="thumbnail">
                            <img alt="" src="http://placehold.it/110x70/">
                          </a>
                        </li>
                      <?php endforeach ?>
                    </ul>
                </div>
            </div>             
          </div>
          <div id="videos" class="tab-pane game-tab-pane span8" style="margin-left:0px;">
            <div id="video-carousel" class="es-carousel-wrapper span7">
                <div class="es-carousel">
                    <ul>
                      <?php foreach (range(0, 20) as $key => $value): ?>
                        <li>
                          <a href="#" class="thumbnail">
                            <img alt="" src="http://placehold.it/100x70/">
                          </a>
                        </li>
                      <?php endforeach ?>
                    </ul>
                </div>
            </div>             
          </div>
        </div> <!-- /tab-content -->
        <ul class="nav nav-tabs game-tabs">
          <li class="active"><a data-toggle="tab" href="#images">Images</a></li>
          <li class=""><a data-toggle="tab" href="#videos">Videos</a></li>
        </ul>
        
      </div>      
      
      <div class="span8 newsletter" style="margin-bottom:20px;">
        <h3 style="margin-bottom:-15px; padding:5px 20px;">Other games</h3>
        <hr>
        <ul class="thumbnails" style="margin-bottom:10px; margin-left:20px;">
          <li class="span2" style="width:135px; margin-bottom:0; margin-left:10px;"><a href="#" class="thumbnail"><img alt="" src="assets/games/flyfu/Icon170.png"></a></li>
          <li class="span2" style="width:135px;margin-bottom:0; margin-left:10px;"><a href="#" class="thumbnail"><img alt="" src="assets/games/roc/Icon170.png"></a></li>
          <li class="span2" style="width:135px;margin-bottom:0; margin-left:10px;"><a href="#" class="thumbnail"><img alt="" src="assets/games/lazyfarmer/Icon170.png"></a></li>
          <li class="span2" style="width:135px;margin-bottom:0; margin-left:10px;"><a href="#" class="thumbnail"><img alt="" src="assets/games/greedcorp/Icon170.png"></a></li>
          <li class="span2" style="width:135px;margin-bottom:0; margin-left:10px;"><a href="#" class="thumbnail"><img alt="" src="assets/games/mistbouncer/Icon170.png"></a></li>
        </ul>
      </div>
      
      <div class="fb-comments" data-href="http://example.com" data-num-posts="2" data-width="620"></div>
      
    </div>
    <div class="span4 details-pane game-details">
      <h3 class="game-name-and-icon">
        Lorem ipsum dolor sit amet
        <img src="assets/games/greedcorp/Icon64.png" alt="" class="pull-right">
      </h3>
      <hr>
      <p>
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis velit augue, consectetur nec ullamcorper et, congue non enim. Aliquam tempor sem sed sapien faucibus vestibulum ullamcorper est laoreet.
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis velit augue, consectetur nec ullamcorper et, congue non enim. Aliquam tempor sem sed sapien faucibus vestibulum ullamcorper est laoreet.
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis velit augue, consectetur nec ullamcorper et, congue non enim. 
      </p>
      <div class="game-available-in">
        <hr>
        <h4 style="margin-top:10px;">Stores</h4>
        <ul class="thumbnails">
          <!-- 
          <?php foreach (range(0, 4) as $key => $value): ?>
            <li class="span2">
              <a class="thumbnail" href="#">
                <img alt="" src="http://placehold.it/150x60/">
              </a>
            </li>           
          <?php endforeach ?>
           -->
          <li class="span2">
            <a class="thumbnail" href="#">
              <img alt="" src="assets/stores/android_market.png">
            </a>
          </li>           
          <li class="span2">
            <a class="thumbnail" href="#">
              <img alt="" src="assets/stores/mac_app_store.png">
            </a>
          </li>           
          <li class="span2">
            <a class="thumbnail" href="#">
              <img alt="" src="assets/stores/app_store.png">
            </a>
          </li>           
        </ul>
      </div>
      
      <hr>
      
      <h2 style="margin-bottom:20px;">Greed Corp on Facebook</h2>
      
      <div class="fb-like" data-send="false" data-layout="button_count" data-width="80" data-show-faces="false"></div>
      <a href="https://twitter.com/share" class="twitter-share-button" data-via="adobi">Tweet</a>
      <g:plusone size="medium"></g:plusone>
      <p>&nbsp;</p> 
      <div class="fb-like-box" data-href="https://www.facebook.com/greedcorp.mobile" data-width="360" data-show-faces="true" data-stream="true" data-header="false"></div>
    </div>
  </div>

<?php require_once 'f.php'; ?>