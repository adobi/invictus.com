
<?php if (validation_errors()): ?>
    <div class="alert alert-error">
        <?php echo validation_errors() ?>
    </div>
<?php endif ?>

<?php echo form_open('', array('id'=>'edit-form', 'data-ajax-form'=>1)) ?>    

    <?php echo panel_close('publish_to_news/'.($item ? $item->id : '')) ?>
    
    <legend>
      <strong>7. </strong>
        <?php if ($item): ?>
          "<?php echo $item->name ?>" press release
        <?php endif ?>
        <p class="pull-right">
          <a href="<?php echo base_url() ?>game/publish_to_press/<?php echo $item->id ?>" data-ajax-link class="btn"><i class="icon-refresh"></i></a>

          <!-- <button class="btn btn-primary" rel="tooltip" title="Save game"><i class="icon-ok icon-white"></i></button> -->
          <?php if ($item): ?>
            <a href="<?php echo base_url() ?>game/delete/<?php echo $item->id ?>" class="btn delete-item" data-location="r" rel="tooltip" title="Delete game" data-modal-header="Game <?php echo $item->name ?>"><i class="icon-trash"></i></a>
          <?php endif ?>
        </p>
    </legend> 
    <div class="right-side-scroll">
      <fieldset class="control-group">
          <label class="control-label" for="title">Title</label>
          <div class="controls">
              <input type="text" name = "title" id = "title" class = "span4" value = "<?php echo $item->name ?> released"/>
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
          <label class="control-label" for="video">Videos</label>
          <div class="controls">
            <?php if ($videos): ?>
              <ul class="thumbnails">
                <?php foreach ($videos as $p): ?>
                  <li class="thumbnail">
                    <?php echo embed_youtube($p->code, false, 170, 130) ?>
                    <p style="text-align:center">
                      <input type="radio" name="video" value="<?php echo $p->code ?>">
                    </p>
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
      <?php if ($item->logo): ?>
        <fieldset class="form-actions right">
            <button class="btn btn-primary" rel="tooltip" title="Save as press release" data-noaction="1"><i class="icon-ok icon-white"></i> Save as press release</button>
        </fieldset>       
      <?php else: ?>
        <div class="alert alert-error">
          <p>First upload the logo for <strong><?php echo $item->name ?></strong></p>
        </div>
       <?php endif ?>     
      
    </div> <!-- /.right-side-scroll -->
    <fieldset class="form-actions right">
        <!-- <button class="btn btn-primary" rel="tooltip" title="Save game"><i class="icon-ok icon-white"></i></button>  -->
        <a class="btn" data-ajax-link="1" href="<?php echo base_url() ?>game/publish_to_microsite/<?php echo $item->id ?>"><strong>8.</strong> Microsite &rarr;</a>
    </fieldset>      
<?php echo form_close() ?>    