  <?php //if ($items): ?>
    <?php echo panel_close() ?>
    <div class="items page-items">
      <div class="subnav" style="margin:-20px 0 20px 0">
        <ul class="nav nav-pills">
          <li><a href="#">All</a></li>
          <li><a href="#">MAC</a></li>
          <li><a href="#">iOS</a></li>
          <li><a href="#">Android</a></li>
          <li><a href="#">PC</a></li>
          <li><a href="#">Web</a></li>
        </ul>
      </div>
      <div class="right-side-scroll"> 
        <div class="hidden csrf-form">
          <?php echo form_open() ?>
          <?php echo form_close() ?>
        </div>            
        <ul class="thumbnails all-games">
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
          <?php foreach (range(1,32) as $key=>$value): ?>
            <li class="span2">
              <div class="item thumbnail">
                <h6 class="center">
                  Game #<?php echo $value ?>
                </h6> 
                <img src="http://placehold.it/96x96" alt="">
                <div class="caption center hide">
                  <hr style="margin:4px 0 6px;">
                  <a href="#" class="btn"><i class="icon-signal"></i></a>  
                  <a href="#" class="btn" onclick="$(this).parents('li:first').remove()"><i class="icon-trash"></i></a>
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
