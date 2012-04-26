
<?php if (validation_errors()): ?>
    <div class="alert alert-error">
        <?php echo validation_errors() ?>
    </div>
<?php endif ?>

<?php echo form_open('', array('id'=>'edit-form', 'data-ajax-form'=>1)) ?>    

    <?php echo panel_close('publish_to_press/'.($item ? $item->id : '')) ?>
    
    <legend>
      <strong>8. </strong>
        <?php if ($item): ?>
          "<?php echo $item->name ?>" microsite
        <?php endif ?>
        <p class="pull-right">
          <a href="<?php echo base_url() ?>game/publish_to_microsite/<?php echo $item->id ?>" data-ajax-link class="btn"><i class="icon-refresh"></i></a>          
          <!-- <button class="btn btn-primary" rel="tooltip" title="Save game"><i class="icon-ok icon-white"></i></button> -->
          <?php if ($item): ?>
            <a href="<?php echo base_url() ?>game/delete/<?php echo $item->id ?>" class="btn delete-item" data-location="r" rel="tooltip" title="Delete game" data-modal-header="Game <?php echo $item->name ?>"><i class="icon-trash"></i></a>
          <?php endif ?>
        </p>
    </legend> 
    <div class="right-side-scroll">
    
      <fieldset class="control-group">
          <label class="control-label" for="name">Title</label>
          <div class="controls">
              <input type="text" name = "name" id = "name" class = "span4" value = "<?php echo $item->name ?> released"/>
          </div>
      </fieldset>       
      <fieldset class="control-group">
          <label class="control-label" for="released">Released</label>
          <div class="controls">
              <input type="text" name = "released" id = "released" class = "span2 datepicker" value = "<?php echo to_date($item->released) ?>"/>
          </div>
      </fieldset>       
      <fieldset class="control-group">
          <label class="control-label" for="logo">Logo</label>
          <div class="controls">
              <input type="hidden" name = "logo" id = "logo" class = "span4" value = "<?php echo base_url() . 'uploads/original/'.$item->logo ?>"/>
              <img src="<?php echo base_url() . 'uploads/original/'.$item->logo ?>" alt="" style="width:64px">
          </div>
      </fieldset>       
      <fieldset class="control-group">
          <label class="control-label" for="video">
            Images 
            <a href="#" onclick="$(this).parent().next().find('[type=checkbox]').attr('checked', !$(this).parent().next().find('[type=checkbox]').attr('checked'))" rel="tooltip" title="Check/Uncheck all" class="btn pull-right"><i class="icon-list"></i></a>
          </label>
          <div class="controls">
            <?php if ($images): ?>
              <ul class="thumbnails">
                <?php foreach ($images as $p): ?>
                  <li class="thumbnail">
                    <label>
                    <img src="<?php echo base_url() ?>uploads/original/<?php echo $p->path ?>" alt=""  style="width:128px">
                    <p style="text-align:center">
                      <input style="display:inline-block" type="checkbox" name="images[]" value="<?php echo $p->id ?>">
                    </p>
                    </label>
                  </li>
                <?php endforeach ?>
              </ul>
            <?php else: ?>
              <div class="alert alert-error">
                <p>First upload some images for <strong><?php echo $item->name ?></strong></p>
              </div>                
            <?php endif ?>  
          </div>
      </fieldset>       
      <fieldset class="control-group">
          <label class="control-label" for="video">
            Videos
            <a href="#" onclick="$(this).parent().next().find('[type=checkbox]').attr('checked', !$(this).parent().next().find('[type=checkbox]').attr('checked'))" rel="tooltip" title="Check/Uncheck all" class="btn pull-right"><i class="icon-list"></i></a>
          </label>
          <div class="controls">
            <?php if ($videos): ?>
              <ul class="thumbnails">
                <?php foreach ($videos as $p): ?>
                  <li class="thumbnail">
                    <label>
                    <?php echo youtube_video_image($p->code, 128, 85) ?>
                    <p style="text-align:center">
                      <input style="display:inline-block" type="checkbox" name="videos[]" value="<?php echo $p->code ?>">
                    </p>
                    </label>
                  </li>
                <?php endforeach ?>
              </ul>
            <?php else: ?>
              <div class="alert alert-error">
                <p>First upload some videos for <strong><?php echo $item->name ?></strong></p>
              </div>                
            <?php endif ?>  
          </div>
      </fieldset>       
      <fieldset class="control-group">
          <label class="control-label" for="link_url">Platforms</label>
          <div class="controls">
            <?php if ($platforms): ?>
              <div class="items">
              <?php foreach ($platforms as $p): ?>
                  <div class="item">
                    <h6><?php echo $p->name ?></h6>
                    <?php echo $p->long_url ?>
                    <input type="hidden" name="platforms[]" value="<?php echo $p->platform_id ?>">
                    <input type="hidden" name="urls[]" value="<?php echo $p->url ?>">
                  </div>
              <?php endforeach ?>
              </div>
            <?php else: ?>
              <div class="alert alert-error">
                <p>First upload some platforms for <strong><?php echo $item->name ?></strong></p>
              </div>                
            <?php endif ?>              
          </div>
      </fieldset>       
      <fieldset class="form-actions right">
          <button class="btn btn-primary" rel="tooltip" title="Save as microsite" data-noaction="1"><i class="icon-ok icon-white"></i> Save as microsite</button>
      </fieldset>       
    </div> <!-- /.right-side-scroll -->
    <fieldset class="form-actions right">
        <!-- <button class="btn btn-primary" rel="tooltip" title="Save game"><i class="icon-ok icon-white"></i></button>  -->
        <a class="btn" data-ajax-link="1" href="<?php echo base_url() ?>game/publish_final/<?php echo $item->id ?>"><strong>9.</strong> Final verification &rarr;</a>
    </fieldset> 
  <?php echo form_close() ?>    