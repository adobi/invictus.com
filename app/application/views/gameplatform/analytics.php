  <?php echo panel_close('platforms/'.($game ? $game->id : '')) ?>
  <legend>
    &nbsp;
      <p class="pull-right">
        <!-- <button class="btn btn-primary" rel="tooltip" title="Save analytics"><i class="icon-ok icon-white"></i></button> -->
        <?php if ($the_item): ?>
          <a href="<?php echo base_url() ?>gameplatform/delete/<?php echo $the_item->id ?>" class="btn delete-item" data-location="r" rel="tooltip" title="Delete game platform" data-modal-header="Game platform"><i class="icon-trash"></i></a>
        <?php endif ?>
      </p> 
  </legend>

    <div class="right-side-scroll" style="">
      <?php echo $template['partials']['game_platform_analytics'] ?>
    </div>
