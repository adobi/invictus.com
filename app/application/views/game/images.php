
<?php if (validation_errors()): ?>
    <div class="alert alert-error">
        <?php echo validation_errors() ?>
    </div>
<?php endif ?>

    <?php echo panel_close('platforms/'.($item ? $item->id : '')) ?>
    
    <legend>
      <strong>3. </strong>
        <?php if ($item): ?>
            "<?php echo $item->name ?>" images
        <?php endif ?>
        <p class="pull-right">
          <!-- <button class="btn btn-primary" rel="tooltip" title="Save game"><i class="icon-ok icon-white"></i></button> -->
          <a class="btn btn-primary" href="<?php echo base_url() ?>gameimage/edit/for_game/<?php echo $item->id ?>" rel="tooltip" title="Add new image" data-ajax-link><i class="icon-plus-sign icon-white"></i></a>
          <?php if ($item): ?>
            <a href="<?php echo base_url() ?>game/delete/<?php echo $item->id ?>" class="btn delete-item" data-location="r" rel="tooltip" title="Delete game" data-modal-header="Game <?php echo $item->name ?>"><i class="icon-trash"></i></a>
          <?php endif ?>
        </p>  
        
    </legend> 
    <div class="right-side-scroll">
      <?php if ($images): ?>
        <div class="items">
        <?php foreach ($images as $p): ?>
            <div class="item">
              <h6>
                <?php echo $p->path ?>  
                <div class="pull-right">
                  <a class="btn" href="<?php echo base_url() ?>gameimage/analytics/<?php echo $p->id ?>" rel="tooltip" title="Analytics settings" data-ajax-link><i class="icon-signal"></i></a>
                  <!-- <a class="btn" href="<?php echo base_url() ?>gamevideo/edit/<?php echo $p->id ?>" rel="tooltip" title="Edit video" data-ajax-link><i class="icon-pencil"></i></a> -->
                  <a class="btn delete-item" href="<?php echo base_url() ?>gameimage/delete/<?php echo $p->id ?>" data-reload="right"  rel="tooltip" title="Delete image" data-modal-header="<?php echo $p->path ?> image"><i class="icon-trash"></i></a>
                </div>
              </h6>
              <img style="max-width:300px; max-height:80px" src="<?php echo base_url() ?>uploads/original/<?php echo $p->path ?>" alt="">
            </div>
        <?php endforeach ?>
        </div>
      <?php endif ?>  
    </div>
    <fieldset class="form-actions right">
        <!-- <button class="btn btn-primary" rel="tooltip" title="Save game"><i class="icon-ok icon-white"></i></button>  -->
        <a class="btn" data-ajax-link="1" href="<?php echo base_url() ?>game/videos/<?php echo $item->id ?>"><strong>4.</strong> Set up videos</a>
    </fieldset>      
   