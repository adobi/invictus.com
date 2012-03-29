<div class="well">
    <h3>
      Layout
      <!-- 
      <p class="pull-right" style="margin:5px 0 0 0">
        <span class="label label-info">Tipp</span> <span class="tipp-text"><span class="tipp-text">Drag items from the right <span style="font-size:1.6em;">&rarr;</span></span></span>
      </p>
       -->
    </h3>
    <hr>
    <div id="layout" class="accordion">
      <div class="hidden csrf-form">
        <?php echo form_open() ?>
        <?php echo form_close() ?>
      </div>     
      <div class=" accordion-group">
        <div class="accordion-heading">
          <h6>
            <a href="#more-games" data-toggle="collapse" class="accordion-toggle">
              <i class="icon-resize-vertical"></i>More games
              <span class="pull-right">
                <span class="label label-info">Tipp</span> <span class="tipp-text">Move items to change the order</span>
              </span>
            </a>
          </h6>
        </div>
        <div class="accordion-body collapse in" id="more-games">
          <div class=" accordion-inner">
            <ul class="thumbnails" data-section="is_in_more_games">
              <?php foreach ($in_more_games as $item): ?>
                <?php if ($item) :?>
                  <li class="span2" id="<?php echo $item->id ?>" rel="tooltip" title="<?php echo $item->name ?>">
                    <div class="item thumbnail" data-id="<?php echo $item->id ?>">
                      <h6 class="center">
                        <?php echo substr($item->name, 0, 12) ?>...
                      </h6> 
                      <img src="<?php echo base_url() ?>uploads/original/<?php echo $item->logo ?>" style="width:96px" alt="">
                      <div class="caption center">
                        <hr style="margin:4px 0 6px;">
                        <a href="#" class="btn"><i class="icon-signal"></i></a>  
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
          </div>
        </div>
      </div>
      <div class=" accordion-group">
        <div class="accordion-heading">
          <h6><a href="#footer" data-toggle="collapse" class="accordion-toggle">
            <i class="icon-resize-vertical"></i>Footer Top games
              <span class="pull-right">
                <span class="label label-info">Tipp</span> <span class="tipp-text">Move items to change the order</span>
              </span>            
          </a></h6>
        </div>
        <div class="accordion-body collapse in" id="footer" >
          <div class=" accordion-inner">
            <ul class="thumbnails" data-section="is_in_footer">
              <?php foreach ($in_footer as $item): ?>
                <?php if ($item) :?>
                  <li class="span2" id="<?php echo $item->id ?>">
                    <div class="item thumbnail" data-id="<?php echo $item->id ?>">
                      <h6 class="center">
                        <?php echo $item->name ?>
                      </h6> 
                      <img src="<?php echo base_url() ?>uploads/original/<?php echo $item->logo ?>" style="width:96px" alt="">
                      <div class="caption center">
                        <hr style="margin:4px 0 6px;">
                        <a href="#" class="btn"><i class="icon-signal"></i></a>  
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
          </div>
        </div>
      </div>
      <div class=" accordion-group">
        <div class="accordion-heading">
          <h6><a href="#banners" data-toggle="collapse" class="accordion-toggle">
            <i class="icon-resize-vertical"></i>Banners
              <span class="pull-right">
                <span class="label label-info">Tipp</span> <span class="tipp-text">Move items to change the order</span>
              </span>            
          </a></h6>
        </div>
        <div class="accordion-body collapse in" id="banners">
          <div class=" accordion-inner">
            <ul class="thumbnails" data-section="is_on_mainpage">
              <?php foreach ($on_mainpage as $item): ?>
                <?php if ($item) :?>
                  <li class="span2" id="<?php echo $item->id ?>">
                    <div class="item thumbnail" data-id="<?php echo $item->id ?>">
                      <h6 class="center">
                        <?php echo $item->name ?>
                      </h6> 
                      <img src="<?php echo base_url() ?>uploads/original/<?php echo $item->logo ?>" style="width:96px" alt="">
                      <div class="caption center">
                        <hr style="margin:4px 0 6px;">
                        <a href="#" class="btn"><i class="icon-signal"></i></a>  
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
          </div>
        </div>
      </div>
    </div>  
</div>