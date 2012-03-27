  <h1 style="margin-bottom:20px;" class="all-games-title">All games by Invictus</h1>

  <div class="subnav" style="margin-bottom:40px;">
    <ul class="nav nav-pills">
      <li><a href="#">All</a></li>
      <li><a href="#">MAC</a></li>
      <li><a href="#">iOS</a></li>
      <li><a href="#">Android</a></li>
      <li><a href="#">PC</a></li>
      <li><a href="#">Web</a></li>
    </ul>
  </div>  
  
  <div class="row">
    <div class="span8 all-games-wrapper">
      <ul class="thumbnails all-games">
        <!-- 
        <?php foreach (range(0, 1) as $key => $value): ?>
          <li class="span2 <?php echo $key === 0 ? 'selected-game' : '' ?>">
            <div class="thumbnail game">
              <a href="#">
                <img alt="" src="http://placehold.it/170x170">
              </a>
            </div>
          </li>
        <?php endforeach ?>
         -->          
          <li class="span2 selected-game">
            <div class="thumbnail game">
              <a href="#">
                <img alt="" src="<?php echo base_url() ?>assets/games/flyfu/Icon170.png">
              </a>
            </div>
          </li>
          <li class="span2">
            <div class="thumbnail game">
              <a href="#">
                <img alt="" src="<?php echo base_url() ?>assets/games/roc/Icon170.png">
              </a>
            </div>
          </li>
          <li class="span2">
            <div class="thumbnail game">
              <a href="#">
                <img alt="" src="<?php echo base_url() ?>assets/games/froggyjump/Icon170.png">
              </a>
            </div>
          </li>
          <li class="span2">
            <div class="thumbnail game">
              <a href="#">
                <img alt="" src="<?php echo base_url() ?>assets/games/lazyfarmer/Icon170.png">
              </a>
            </div>
          </li>
          <li class="span2">
            <div class="thumbnail game">
              <a href="#">
                <img alt="" src="<?php echo base_url() ?>assets/games/greedcorp/Icon170.png">
              </a>
            </div>
          </li>
          <li class="span2">
            <div class="thumbnail game">
              <a href="#">
                <img alt="" src="<?php echo base_url() ?>assets/games/mistbouncer/Icon170.png">
              </a>
            </div>
          </li>
          <li class="span2">
            <div class="thumbnail game">
              <a href="#">
                <img alt="" src="<?php echo base_url() ?>assets/games/santaride/Icon170.png">
              </a>
            </div>
          </li>
          <li class="span2">
            <div class="thumbnail game">
              <a href="#">
                <img alt="" src="<?php echo base_url() ?>assets/games/froggylauncher/Icon170.png">
              </a>
            </div>
          </li>      
        </ul>
    </div>
    <div class="span4 details-pane" style="height:auto;">
      <div class="details-pane-logo-big">
        <!-- 
        <img alt="" src="http://placehold.it/370x260" style="">
         -->
         <img src="<?php echo base_url() ?>assets/games/lazyfarmer/hero-small.png" alt="">
      </div>
      <h3 style="margin-top:20px;">Lazy Farmer</h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
      <p style="text-align:right">
        <a href="details.php" class="btn">View detailes <i class="icon-arrow-right"></i></a>
      </p>
      <hr>
      <div class="game-available-in">
        <h4>Stores</h4>
        <ul class="thumbnails">
          <!-- 
          <?php foreach (range(0, 4) as $key => $value): ?>
            <li class="span2">
              <a class="thumbnail" href="#">
                <img alt="" src="http://placehold.it/130x70/">
              </a>
            </li>           
          <?php endforeach ?>
           -->
          <li class="span2">
            <a class="thumbnail" href="#">
              <img alt="" src="<?php echo base_url() ?>assets/stores/android_market.png">
            </a>
          </li>           
          <li class="span2">
            <a class="thumbnail" href="#">
              <img alt="" src="<?php echo base_url() ?>assets/stores/mac_app_store.png">
            </a>
          </li>           
          <li class="span2">
            <a class="thumbnail" href="#">
              <img alt="" src="<?php echo base_url() ?>assets/stores/app_store.png">
            </a>
          </li>           
        </ul>
      </div>
    </div>
  </div>
