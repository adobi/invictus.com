    <?php echo panel_close() ?>
    <legend>
      Offer subscribers
    </legend>  
    <div class="right-side-scroll" style="">
      <?php if ($items): ?>
        <div class="items category-items">
          <?php foreach ($items as $item): ?>
            <div class="item">
              <h4>
                <a href="mailto:<?php echo $item->email ?>"><?php echo $item->email ?></a>
                <p class="pull-right" style="font-size:0.8em; color:#999"><?php echo $item->created ?></p>
              </h4>
            </div>
          <?php endforeach ?>
        </div>
      <?php endif ?>
    </div>