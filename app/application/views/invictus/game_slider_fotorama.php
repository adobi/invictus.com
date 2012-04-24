<div class="tab-content">
  <div class="fotorama_ span8 tab-pane active game-tab-pane" id="images-fotorama" data-height="510" data-width="770px" data-caption="overlay" style="padding:0px;">
    <?php if (!$game->images_is_empty): ?>
      <a href="<?php echo base_url() ?>uploads/original/<?php echo $game->hero_image ?>">
        <img src="<?php echo base_url() ?>uploads/original/<?php echo $game->hero_image ?>" 
          alt='<?php if ($game->video): ?>
                <a rel="in-modal" href = "#" data-href="<?php echo base_url() ?>games/<?php echo $game->url ?>/video/on_product_page" class="btn btn-primary"><strong>Watch video</strong> <i style="margin-top:2px;" class="icon-facetime-video icon-white"></i></a>
              <?php else: ?>
                &nbsp;
              <?php endif ?>
        '>
      </a>
      <?php if ($game->images): ?>
        <?php foreach ($game->images as $i => $item): ?>
            <a href="<?php echo base_url() ?>uploads/original/<?php echo $item->path ?>" <?php echo event_tracking($item, 'hd') ?> data-platforms='<?php echo json_encode(array($item->platform_id)) ?>'>
              <img src="<?php echo base_url() ?>uploads/original/<?php echo $item->path ?>" alt="" data-href="<?php echo base_url() ?>/uploads/original/<?php echo $item->hd_path ?>" target="_blank"
                >
            </a>
        <?php endforeach ?>
      <?php endif ?>      
    <?php endif ?>   
  </div> <!-- /.fotorama -->
  <div class="fotorama_ span8 tab-pane  game-tab-pane" id="videos-fotorama" data-height="510" data-width="770px" data-caption="overlay" style="padding:0px;">
    <?php if (!$game->videos_is_empty): ?>
      <?php if ($game->videos): ?>
        <?php foreach ($game->videos as $i => $item): ?>
            <a <?php echo event_tracking($item) ?> href="http://img.youtube.com/vi/<?php echo $item->code ?>/0.jpg" data-type="videos" data-code="<?php echo $item->code ?>">
              <?php echo youtube_video_image($item->code, 770, 510) ?>
            </a>            
        <?php endforeach ?>
      <?php endif ?>      
    <?php endif ?>   
  </div> <!-- /.fotorama -->
</div> <!-- /tab-content -->

<div class="tabbable tabs-below" style="margin:15px 0;">
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
      <li class="active"><a data-toggle="tab" href="#<?php echo $game->images_is_empty ? 'videos' : 'images-fotorama' ?>">Images</a></li>
    <?php endif ?>
    
    <?php if (!$game->videos_is_empty): ?>
      <li class=""><a data-toggle="tab" href="#videos-fotorama">Videos</a></li>
    <?php endif ?>
  </ul> <!-- /nav -->  
</div>