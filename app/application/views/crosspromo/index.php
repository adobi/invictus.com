<div class="well">
    <h3>
      Crosspromo
      <!-- 
      <p class="pull-right">
        <a href="<?php echo base_url() ?>/crosspromo/generate_analytics" class="btn" rel="tooltip" title="Re-generate analytics "><i class="icon-signal"></i></a>
      </p> 
       -->     
    </h3>
    <hr>
    <div id="layout" class="accordion in">
      <div class="hidden csrf-form">
        <?php echo form_open() ?>
        <?php echo form_close() ?>
      </div>     
      <div class=" accordion-group">
        <div class="accordion-heading">
            <a href="#more-games" data-toggle="collapse" class="accordion-toggle">
              
              <?php echo form_dropdown('game_id', $games_select, '', 'id="crosspromo_base_game" class="span5 chosen" data-placeholder="Select a game"') ?>
              <h6 style="display:inline-block; position:relative; top:-10px; "> or select from the list</h6>
            </a>
            <p class="pull-right" style="position:relative; top:-40px; right:10px;"> <a onclick="$('#crosspromo-games>.thumbnails').toggle()" class="btn" rel="tooltip" title="Toggle list"><i class="icon-resize-vertical" style="left:0; top:0"></i></a> </p>
        </div>
        <div class="accordion-body collapse in" id="crosspromo-games" style="padding:5px;">
 
              <?php if ($games): ?>
                <ul class="thumbnails _all-games _games-list" style="margin-top:20px;">
                  <?php foreach ($games as $item): ?>
                    <li class="span2" rel="tooltip" title="<?php echo $item->name ?>" style="min-height:100%">
                      <div class="item thumbnail">
                        <h6 class="center">
                          <?php echo strlen($item->name) > 12 ? substr($item->name, 0, 13) . '...' : $item->name ?>
                        </h6>
                        <a href="#" class="crosspromo-selected-game" data-id="<?php echo $item->id ?>">
                          <img src="<?php echo base_url() ?>uploads/original/<?php echo $item->logo ?>" style="width:96px" alt="">
                        </a> 
                        <div class="caption center" style="padding:5px 0">
                          <a href="#" class="crosspromo-selected-game" data-id="<?php echo $item->id ?>">
                            <span class="badge badge-info"><?php echo $item->count ?></span>
                          </a>
                        </div>                 
                      </div>
                    </li>
                  <?php endforeach ?>
                   
                </ul>
              <?php endif ?>
          
          <div class=" accordion-inner">
          </div>
        </div>
      </div>
    </div>  
</div>