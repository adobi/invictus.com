
<?php if (validation_errors()): ?>
    <div class="alert alert-error">
        <?php echo validation_errors() ?>
    </div>
<?php endif ?>
  
  <?php echo panel_close('edit/'.($item ? $item->id : '')) ?>
  
  <legend>
    <strong>2. </strong>
      <?php if ($item): ?>
        "<?php echo $item->name ?>" available on
      <?php endif ?>
      <p class="pull-right">
        <!-- <button class="btn btn-primary" rel="tooltip" title="Save game"><i class="icon-ok icon-white"></i></button> -->
        <a class="btn btn-primary" href="<?php echo base_url() ?>gameplatform/edit/for_game/<?php echo $item->id ?>" rel="tooltip" title="Add new platform" data-ajax-link><i class="icon-plus-sign icon-white"></i></a>
        <?php if ($item): ?>
          <a href="<?php echo base_url() ?>game/delete/<?php echo $item->id ?>" class="btn delete-item" data-location="r" rel="tooltip" title="Delete game" data-modal-header="Game <?php echo $item->name ?>"><i class="icon-trash"></i></a>
        <?php endif ?>
      </p> 
  </legend> 
  <div class="right-side-scroll">
    <?php if ($game_platforms): ?>
      <div class="items">
      <?php foreach ($game_platforms as $p): ?>
          <div class="item">
            <h6><?php echo $p->name ?></h6>
            <a href="<?php echo $p->url ?>" target="_blank"><img src="<?php echo base_url() ?>uploads/original/<?php echo $p->image ?>" alt=""></a>
            <div class="pull-right">
              <!--  <a class="btn" href="<?php echo base_url() ?>gameplatform/analytics/<?php echo $p->id ?>" rel="tooltip" title="Analytics settings" data-ajax-link><i class="icon-signal"></i></a>-->
              <a class="btn" href="<?php echo base_url() ?>gameplatform/edit/<?php echo $p->id ?>" rel="tooltip" title="Edit" data-ajax-link><i class="icon-pencil"></i></a>
              <a class="btn delete-item" href="<?php echo base_url() ?>gameplatform/delete/<?php echo $p->id ?>" data-reload="right"  rel="tooltip" title="Delete" data-modal-header="<?php echo $p->name ?> platforms from <?php echo $item->name ?>"><i class="icon-trash"></i></a>
            </div>
          </div>
      <?php endforeach ?>
      </div>
    <?php endif ?>
  </div>
  <fieldset class="form-actions right">
      <!-- <button class="btn btn-primary" rel="tooltip" title="Save game"><i class="icon-ok icon-white"></i></button> -->
      <a class="btn" data-ajax-link="1" href="<?php echo base_url() ?>game/images/<?php echo $item->id ?>"><strong>3.</strong> Set up images</a>
  </fieldset>      
