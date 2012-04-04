<h3>
  Promotional games
  
</h3>
<hr>
<ul class="thumbnails">
  <?php foreach ($games as $item): ?>
    <?php if ($item) :?>
      <li class="span2" id="<?php echo $item->id ?>" rel="tooltip" title="<?php echo $item->name ?>">
        <div class="item thumbnail" data-id="<?php echo $item->promo_game_id ?>">
          <h6 class="center">
            <?php echo strlen($item->name) > 12 ? substr($item->name, 0, 13) . '...' : $item->name ?>
          </h6> 
          <img src="<?php echo base_url() ?>uploads/original/<?php echo $item->logo ?>" style="width:96px" alt="">
          <div class="caption right">
            <hr style="margin:4px 0 6px;">
            <!-- <a href="#" class="btn"><i class="icon-signal"></i></a>   -->
            <a href="javascript:void(0)" class="btn layout-remove" rel="tooltip" title="Remove"><i class="icon-trash"></i></a>
          </div>                 
        </div>                  
      </li>
    <?php else : ?>
      <li class="span2" id="0">
      </li>
    <?php endif; ?>
  <?php endforeach; ?>
  
</ul>