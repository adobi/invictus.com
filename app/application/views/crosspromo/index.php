<div class="well">
    <h3>
      Crosspromo
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
              <?php echo form_dropdown('game_id', $games, '', 'id="crosspromo_base_game" class="chosen" data-placeholder="Select a game"') ?>
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