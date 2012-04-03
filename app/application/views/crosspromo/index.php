<div class="well">
    <h3>
      Crosspromo
      <p class="pull-right">
        <a href="<?php echo base_url() ?>/crosspromo/generate_analytics" class="btn" rel="tooltip" title="Re-generate analytics "><i class="icon-signal"></i></a>
      </p>      
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
              <h6 style="display:inline-block; position:relative; top:-10px">Select a game</h6>
              <?php echo form_dropdown('game_id', $games, '', 'id="crosspromo_base_game" class="span5 chosen" data-placeholder="Select a game"') ?>
              <span class="pull-right">
                <span class="label label-info">Tipp</span> <span class="tipp-text"><strong>Move items to change the order</strong></span>
              </span>
            </a>
        </div>
        <div class="accordion-body collapse in" id="crosspromo-games">
          <div class=" accordion-inner">
          </div>
        </div>
      </div>
    </div>  
</div>