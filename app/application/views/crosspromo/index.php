<div class="well crosspromo" style="overflow:visible">
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
              <a  style="margin-left:5px; margin-top:-7px;" onclick="$('#crosspromo-games>.thumbnails').toggle(); return false;" class="btn" rel="tooltip" title="Toggle list"><i class="icon-resize-vertical" style="left:0; top:0"></i></a>
              <?php echo form_dropdown('game_id', $games_select, '', 'id="crosspromo_base_game" class="span5 chosen" data-placeholder="Select a game"') ?>
              <h6 style="display:inline-block; position:relative; top:0px; "> or select from the list</h6>
            </a>
        </div>
        <div class="accordion-body collapse in" id="crosspromo-games" style="padding:5px;">
 
          <ul class="thumbnails" style="margin-top:20px;"  id="crosspromo-all-games">
          </ul>
          
          <div class=" accordion-inner">
          </div>
        </div>
      </div>
    </div>  
</div>