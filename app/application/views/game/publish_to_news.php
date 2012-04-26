
<?php if (validation_errors()): ?>
    <div class="alert alert-error">
        <?php echo validation_errors() ?>
    </div>
<?php endif ?>

<?php echo form_open('', array('id'=>'edit-form', 'data-ajax-form'=>1)) ?>    

    <?php echo panel_close('seo/'.($item ? $item->id : '')) ?>
    
    <legend>
      <strong>6. </strong>
        <?php if ($item): ?>
          "<?php echo $item->name ?>" In Game news
        <?php endif ?>
        <p class="pull-right">
          <!-- <button class="btn btn-primary" rel="tooltip" title="Save game"><i class="icon-ok icon-white"></i></button> -->
          <a href="<?php echo base_url() ?>game/publish_to_news/<?php echo $item->id ?>" data-ajax-link class="btn"><i class="icon-refresh"></i></a>
          <?php if ($item): ?>
            <!--  <a href="<?php echo base_url() ?>game/delete/<?php echo $item->id ?>" class="btn delete-item" data-location="r" rel="tooltip" title="Delete game" data-modal-header="Game <?php echo $item->name ?>"><i class="icon-trash"></i></a>-->
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
          <label class="control-label" for="description">Description</label>
          <div class="controls">
              <input type="text" name = "description" id = "description" class = "span4" value = "<?php echo $item->short_description ?>"/>
          </div>
      </fieldset>       
      <fieldset class="control-group">
          <label class="control-label" for="thumbnail">Thumbnail</label>
          <div class="controls">
              <input type="hidden" name = "thumbnail" id = "thumbnail" class = "span4" value = "<?php echo base_url() . 'uploads/original/'.$item->logo ?>"/>
              <img src="<?php echo base_url() . 'uploads/original/'.$item->logo ?>" alt="" style="width:64px">
          </div>
      </fieldset>       
      <fieldset class="control-group">
          <label class="control-label" for="link_text">Link text</label>
          <div class="controls">
              <input type="text" name = "link_text" id = "link_text" class = "span4" value = "Check out <?php echo $item->name ?>"/>
          </div>
      </fieldset>       
      <fieldset class="control-group">
          <label class="control-label" for="link_url">Link url</label>
          <div class="controls">
              <input type="text" name = "link_url" id = "link_url" class = "span4" value = "<?php echo base_url() ?>games/<?php echo $item->url ?>"/>
          </div>
      </fieldset>       
      <fieldset class="control-group">
          <label class="control-label" for="image">Image</label>
          <div class="controls">
              <?php if ($item->teaser_image): ?>
                <input type="hidden" name = "image" id = "image" class = "span4" value = "<?php echo base_url() ?>uploads/original/<?php echo $item->teaser_image ?>"/>
                <img src="<?php echo base_url() ?>uploads/original/<?php echo $item->teaser_image ?>" alt=""  style="width:135px">
              <?php endif ?>
          </div>
      </fieldset>  
      <?php if ($item->logo && $item->teaser_image): ?>
        <fieldset class="form-actions right">
            <button class="btn btn-primary" rel="tooltip" title="Save as in game news" data-noaction="1"><i class="icon-ok icon-white"></i> Save as in game news</button>
        </fieldset>       
      <?php else: ?>
        <div class="alert alert-error">
          <p>First upload the logo and/or teaser image for <strong><?php echo $item->name ?></strong></p>
        </div>
       <?php endif ?>     
    </div><!-- /.right-side-scroll -->
    <fieldset class="form-actions right">
        <!-- <button class="btn btn-primary" rel="tooltip" title="Save game"><i class="icon-ok icon-white"></i></button>  -->
        <a class="btn" data-ajax-link="1" href="<?php echo base_url() ?>game/publish_to_press/<?php echo $item->id ?>"><strong>7.</strong> Press release &rarr;</a>
    </fieldset>      
<?php echo form_close() ?>    
