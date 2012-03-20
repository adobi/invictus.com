<?php if (validation_errors()): ?>
  <div class="alert alert-error">
    <?php echo validation_errors() ?>
  </div>
<?php endif ?>
 
<?php echo form_open('', array('id'=>'edit-form', 'data-ajax-form'=>1)) ?>

  <?php echo panel_close() ?>
       
  <legend>
    <?php if ($item): ?>
      "<?php echo $game->name ?>"
    <?php endif ?>
    <p class="pull-right">
      <button class="btn btn-primary" rel="tooltip" title="Save settings"><i class="icon-ok icon-white"></i></button>
      <?php if ($game): ?>
        <a href="<?php echo base_url() ?>game/edit/<?php echo $game->id ?>" class="btn" data-ajax-link="1" rel="tooltip" title="Edit game"><i class="icon-pencil"></i></a>
        <a href="<?php echo base_url() ?>game/analytics/<?php echo $game->id ?>" class="btn " data-ajax-link="1" rel="tooltip" title="Analytics settings"><i class="icon-signal"></i></a>
        <a href="<?php echo base_url() ?>game/delete/<?php echo $game->id ?>" class="btn delete-item" data-location="r" rel="tooltip" title="Delete game" data-modal-header="Game <?php echo $game->name ?>"><i class="icon-trash"></i></a>
      <?php endif ?>
    </p>     
  </legend>
  <div class="right-side-scroll">
    
    <legend>SEO settings</legend>
    <fieldset class="control-group">
      <label class="control-label" for="title">Title</label>
      <div class="controls">
        <input type="text" name = "title" id = "title" class = "span4" value = "<?php echo $_POST && isset($_POST['title']) ? $_POST['title'] : ($item ? $item->title : '') ?>"/>
      </div>
    </fieldset>
    <fieldset class="control-group">
      <label class="control-label" for="description">Description</label>
      <div class="controls">
        <input type="text" name = "description" id = "description" class = "span4" value = "<?php echo $_POST && isset($_POST['description']) ? $_POST['description'] : ($item ? $item->description : '') ?>"/>
      </div>
    </fieldset>
    <fieldset class="control-group">
      <label class="control-label" for="keywords">Keywords</label>
      <div class="controls">
        <input type="text" name = "keywords" id = "keywords" class = "span4" value = "<?php echo $_POST && isset($_POST['keywords']) ? $_POST['keywords'] : ($item ? $item->keywords : '') ?>"/>
      </div>
    </fieldset>
    
    <legend>
      Facebook open graph settings 
      <span style="position:relative;top:5px; left:15px;">
        <a href="http://ogp.me/" target="_blank" rel="tooltip" title="See the documentation"><i class="icon-book"></i></a>
        <a href="https://developers.facebook.com/tools/debug/og/object?q=<?php echo base_url() ?>game/<?php echo $game->url ?>" target="_blank" rel="tooltip" title="Try out!"><i class="icon-retweet"></i></a>
      </span>
    </legend>
    <fieldset class="control-group">
      <label class="control-label" for="og_title">OG title</label>
      <div class="controls">
        <input type="text" name = "og_title" id = "og_title" class = "span4" value = "<?php echo $_POST && isset($_POST['og_title']) ? $_POST['og_title'] : ($item ? $item->og_title : '') ?>"/>
        <span class="help-inline span4">The title of your object as it should appear within the graph, e.g., "Froggy Jump"</span>
      </div>
    </fieldset>
    <fieldset class="control-group">
      <label class="control-label" for="og_url">OG url</label>
      <div class="controls">
        <input type="text" name = "og_url" id = "og_url" class = "span4" value = "<?php echo $_POST && isset($_POST['og_url']) ? $_POST['og_url'] : ($item ? $item->og_url : '') ?>"/>
        <span class="help-inline span4">The canonical URL of your object that will be used as its permanent ID in the graph, e.g., "http://www.imdb.com/title/tt0117500/".</span>
      </div>
    </fieldset>
    <fieldset class="control-group">
      <label class="control-label" for="og_type">OG type</label>
      <div class="controls">
        <input type="text" name = "og_type" id = "og_type" class = "span4" value = "<?php echo $_POST && isset($_POST['og_type']) ? $_POST['og_type'] : ($item ? $item->og_type : '') ?>"/>
        <span class="help-inline span4">The type of your object, e.g., "video.movie"</span>
      </div>
    </fieldset>
    <fieldset class="control-group">
      <label class="control-label" for="og_image">OG image url</label>
      <div class="controls">
        <input type="text" name = "og_image" id = "og_image" class = "span4" value = "<?php echo $_POST && isset($_POST['og_image']) ? $_POST['og_image'] : ($item ? $item->og_image : '') ?>"/>
        <span class="help-inline span4">An image URL which should represent your object within the graph.</span>
      </div>
    </fieldset>
    <fieldset class="control-group">
      <label class="control-label" for="og_description">OG description</label>
      <div class="controls">
        <input type="text" name = "og_description" id = "og_description" class = "span4" value = "<?php echo $_POST && isset($_POST['og_description']) ? $_POST['og_description'] : ($item ? $item->og_description : '') ?>"/>
        <span class="help-inline span4">A one to two sentence description of your object.</span>
      </div>
    </fieldset>
    <fieldset class="control-group">
      <label class="control-label" for="og_site_name">OG site name</label>
      <div class="controls">
        <input type="text" name = "og_site_name" id = "og_site_name" class = "span4" value = "<?php echo $_POST && isset($_POST['og_site_name']) ? $_POST['og_site_name'] : ($item ? $item->og_site_name : '') ?>"/>
        <span class="help-inline span4">If your object is part of a larger web site, the name which should be displayed for the overall site. e.g., "IMDb"</span>
      </div>
    </fieldset>
  </div>
  <fieldset class="form-actions right">
    <button class="btn btn-primary" rel="tooltip" title="Save settings"><i class="icon-ok icon-white"></i></button>
  </fieldset>
<?php echo form_close() ?>