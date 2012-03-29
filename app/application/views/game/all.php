  <?php //if ($items): ?>
    <?php echo panel_close() ?>
    <legend style="margin-top:-30px;">Drag items and move them</legend>
    <div class="items page-items">
      <div class="subnav" style="margin:10px 0 10px 0">
        <ul class="nav nav-pills games-filter">
          <li class="active"><a href="#" data-platform="all">All</a></li>
          <?php if ($platforms): ?>
            <?php foreach ($platforms as $item): ?>
              <li><a href="#" data-platform='<?php echo $item->id ?>'><?php echo $item->name ?></a></li>
            <?php endforeach ?>
          <?php endif ?>
        </ul>
      </div>
      <div class="right-side-scroll"> 
           
        <ul class="thumbnails all-games games-list">
          <!-- 
          <?php foreach ($items as $item): ?>
            <li class="span2">
              <div class="item thumbnail">
                <h6 class="center">
                  <?php echo $item->name ?>
                </h6> 
                <img src="<?php echo $item && $item->logo ? base_url() . 'uploads/original/'.$item->logo : 'http://placehold.it/170x170' ?>" style="width:96px;" alt="">
              </div>
            </li>
          <?php endforeach ?>
           -->
          <?php foreach ($items as $item): ?>
            <li class="span2" data-platforms='<?php echo json_encode($item->platforms) ?>'>
              <div class="item thumbnail" data-id="<?php echo $item->id ?>">
                <h6 class="center">
                  <?php echo $item->name ?>
                </h6> 
                <img src="<?php echo base_url() ?>uploads/original/<?php echo $item->logo ?>" style="width:96px" alt="">
                <div class="caption center hide">
                  <hr style="margin:4px 0 6px;">
                  <a href="#" class="btn"><i class="icon-signal"></i></a>  
                  <a href="javascript:void(0)" class="btn layout-remove" rel="tooltip" title="Remove"><i class="icon-trash"></i></a>
                </div>                 
              </div>
            </li>
          <?php endforeach ?>
           
        </ul>
      </div> <!-- /right-side-scrol -->
    </div> <!-- /items -->
  <?php //endif ?>

<script>
  App.Layout.DragAndDropGames()   
</script>
