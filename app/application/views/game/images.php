
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
        <div class="pull-right">
          <!-- <button class="btn btn-primary" rel="tooltip" title="Save game"><i class="icon-ok icon-white"></i></button> -->
          <!-- <a class="btn btn-primary" href="<?php echo base_url() ?>gameimage/edit/for_game/<?php echo $item->id ?>" rel="tooltip" title="Add new image" data-ajax-link><i class="icon-plus-sign icon-white"></i></a> -->
          <?php if ($item): ?>
            <a href="<?php echo base_url() ?>game/delete/<?php echo $item->id ?>" class="btn delete-item" data-location="r" rel="tooltip" title="Delete game" data-modal-header="Game <?php echo $item->name ?>"><i class="icon-trash"></i></a>
          <?php endif ?>
        </div>  
        
    </legend> 
    <div class="right-side-scroll">
      <?php if ($images): ?>
        <?php foreach ($images as $img): ?>
          <legend for="">
            <?php echo $img['platform'] ? $img['platform']->name : '' ?>
            <a class="btn btn-primary pull-right" href="<?php echo base_url() ?>gameimage/edit/for_game/<?php echo $item->id ?>/platform/<?php echo $img['platform']->platform_id ?>" rel="tooltip" title="Add new image to <?php echo $img['platform']->name ?>" data-ajax-link><i class="icon-plus-sign icon-white"></i></a>
          </legend>
          <?php if (!$img['images']): ?>
            <div class="alert alert-error">No images for this platform</div>
          <?php else: ?>
            <div class="items">
            <?php foreach ($img['images'] as $p): ?>
                <div class="item" data-image-id = "<?php echo $p->id ?>">
                  <h6>
                    <?php echo $p->path ?>  
                    <div class="pull-right">
                      <div class="btn-group">
                        <?php if ($platforms): ?>
                          <a href="#" class="btn dropdown-toggle" data-toggle="dropdown" style="border-bottom-right-radius:0px; border-top-right-radius: 0px;" rel="tooltip" title="Select a platform"><i class="icon-platform"></i></a>
                          <ul class="dropdown-menu">
                            <?php foreach ($platforms as $pl): ?>
                              <li><a href="#" class="add-to-platform" data-platform-id="<?php echo $pl->platform_id ?>"><?php echo $pl->name ?></a></li>
                            <?php endforeach ?>
                          </ul>
                        <?php endif ?>                      
                        <a class="btn delete-item" href="<?php echo base_url() ?>gameimage/delete/<?php echo $p->id ?>" rel="tooltip" title="Delete image" data-trigger="reload" data-location="r"  data-modal-header="<?php echo $p->path ?> image with the HD version"><i class="icon-trash"></i></a>
                      </div>
                    </div>
                  </h6>
                  <hr>
                  <?php if ($p->path && $p->hd_path): ?>
                    <div class="row">
                      <div class="span2 thumbnail">
                        <h6>
                          Normal image 
                          <div class="pull-right">
                            <a class="btn delete-item" href="<?php echo base_url() ?>gameimage/delete_normal/<?php echo $p->id ?>" rel="tooltip" title="Delete image" data-trigger="reload" data-location="r"  data-modal-header="<?php echo $p->path ?> image"><i class="icon-trash"></i></a>
                          </div>
                        </h6>
                        <hr>
                        <?php if ($p->path): ?>
                          
                        <?php endif ?>
                        <div>
                          <span style="display:inline-block">
                            <img style="max-width:300px; max-height:80px" src="<?php echo base_url() ?>uploads/original/<?php echo $p->path ?>" alt="">
                          </span>
                        </div>
                      </div>
                      <div class="span2 thumbnail">
                        <h6>
                          HD image
                          <div class="pull-right">
                            <!-- <a class="btn" href="<?php echo base_url() ?>gameimage/analytics/<?php echo $p->id ?>" rel="tooltip" title="Analytics settings" data-ajax-link><i class="icon-signal"></i></a> -->
                            <!-- <a class="btn" href="<?php echo base_url() ?>gamevideo/edit/<?php echo $p->id ?>" rel="tooltip" title="Edit video" data-ajax-link><i class="icon-pencil"></i></a> -->
                            <a class="btn delete-item" href="<?php echo base_url() ?>gameimage/delete_hd/<?php echo $p->id ?>" rel="tooltip" title="Delete image" data-trigger="reload" data-location="r"  data-modal-header="<?php echo $p->path ?> HD image"><i class="icon-trash"></i></a>
                          </div>
                        </h6>
                        <hr>
                        <span style="display:inline-block">
                          <img style="max-width:300px; max-height:80px" src="<?php echo base_url() ?>uploads/original/<?php echo $p->hd_path ?>" alt="">
                        </span>                  
                      </div>
                    </div> <!-- /.row -->
                  <?php else: ?>
                    <div class="thumbnail" style="margin-bottom:10px;">
                      <h6>
                        Normal image 
                        <?php if ($p->path): ?>
                          <div class="pull-right">
                            <a class="btn delete-item" href="<?php echo base_url() ?>gameimage/delete_normal/<?php echo $p->id ?>" rel="tooltip" title="Delete image" data-trigger="reload" data-location="r"  data-modal-header="<?php echo $p->path ?> image"><i class="icon-trash"></i></a>
                          </div>
                        <?php endif ?>
                      </h6>
                      <hr>
                      <?php if (!$p->path): ?>
                        <?php echo form_open_multipart(base_url() .'gameimage/upload_normal/'.$p->id, array('class'=>'fileupload', 
                                'data-upload-template-id'=>'template-upload-'.$p->id, 
                                'data-download-template-id'=>'template-download-'.$p->id)) ?>    
                            <div class="row fileupload-buttonbar">
                                <div class="span2">
                                    <!-- The fileinput-button span is used to style the file input field as button -->
                                    <span class="btn btn-success fileinput-button" rel="tooltip" title="Select files">
                                        <i class="icon-plus-sign icon-white"></i>
                                        <!-- <span>Add files</span> -->
                                        <input type="file" name="userfile">
                                    </span>
                                    <button type="submit" class="btn btn-primary start" rel="tooltip" title="Start upload">
                                        <i class="icon-upload icon-white"></i>
                                        <!-- <span>Start upload</span> -->
                                    </button>
                                    <button type="reset" class="btn cancel" rel="tooltip" title="Cancel upload">
                                        <i class="icon-ban-circle"></i>
                                    </button>
                                </div>
                                <div class="span4">
                                    <!-- The global progress bar -->
                                    Progress:
                                    <div class="progress progress-success progress-striped active">
                                        <div class="bar" style="width:0%;"></div>
                                    </div>
                                </div>
                            </div>
                            <!-- The loading indicator is shown during image processing -->
                            <div class="fileupload-loading"></div>
                            <br>
                            <div class="items files"></div>
                            <!-- The template to display files available for upload -->
                            <script id="template-upload-<?php echo $p->id ?>" type="text/x-tmpl">
                            {% for (var i=0, file; file=o.files[i]; i++) { %}
                              <div class="item template-upload fade">
                                <h6>
                                  {%=file.name%}
                                  {%=o.formatFileSize(file.size)%}
                                  <p class="pull-right">
                                    {% if (!o.options.autoUpload) { %}
                                      <span class="start">
                                        
                                        <button class="btn btn-primary hide">
                                          <i class="icon-upload icon-white"></i>
                                        </button>
                                         
                                      </span>
                                    {% } %}
                                    <span class="cancel">
                                      <button class="btn">
                                        <i class="icon-ban-circle"></i>
                                      </button>
                                    </span>
                                  </p>
                                </h6>
                                <span class="preview"><span class="fade"></span></span>
                                <!-- <div class="progress progress-success progress-striped active" style="display:inline-block"><div class="bar" style="width:0%;"></div></div> -->
                              </div>
                            {% } %}        
                            </script>
                            <!-- The template to display files available for download -->
                            <script id="template-download-<?php echo $p->id ?>" type="text/x-tmpl">
                            {% for (var i=0, file; file=o.files[i]; i++) { %}
                               <div class="template-download fade">
                                <h6>
                                  <a href="{%=file.url%}" title="{%=file.name%}" rel="{%=file.thumbnail_url&&'gallery'%}" download="{%=file.name%}">{%=file.name%}</a>
                                  {%=o.formatFileSize(file.size)%}
                                  <p class="pull-right delete">
                                    <a data-trigger="reload" data-location="r" class="btn delete-item" href="{%=file.delete_url%}">
                                        <i class="icon-trash"></i>
                                    </a>
                                  </p>
                                </h6>
                                <span class="preview">
                                  {% if (file.thumbnail_url) { %}
                                    <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}">
                                      <img style="width:64px" src="{%=file.thumbnail_url%}">
                                    </a>
                                  {% } %}
                                </span>            
                              </div>
                            {% } %}
                            </script>        
                        <?php echo form_close() ?>
                      <?php else: ?>
                        <div>
                          <span style="display:inline-block">
                            <img style="max-width:300px; max-height:80px" src="<?php echo base_url() ?>uploads/original/<?php echo $p->path ?>" alt="">
                          </span>
                        </div>                
                      <?php endif ?>
                    </div> <!-- /.thumbnail -->
                    
                    <div class="thumbnail">
                      <h6>
                        HD image
                        <?php if ($p->hd_path): ?>
                          <div class="pull-right">
                            <a class="btn delete-item" href="<?php echo base_url() ?>gameimage/delete_hd/<?php echo $p->id ?>" rel="tooltip" title="Delete image" data-trigger="reload" data-location="r"  data-modal-header="<?php echo $p->hd_path ?> HD image"><i class="icon-trash"></i></a>
                          </div>
                        <?php endif ?>                    
                      </h6>
                      <?php if (!$p->hd_path): ?>
                        <?php echo form_open_multipart(base_url() .'gameimage/upload_hd/'.$p->id, array('class'=>'fileupload', 
                                'data-upload-template-id'=>'hd-template-upload-'.$p->id, 
                                'data-download-template-id'=>'hd-template-download-'.$p->id)) ?>    
                            <div class="row fileupload-buttonbar">
                                <div class="span2">
                                    <!-- The fileinput-button span is used to style the file input field as button -->
                                    <span class="btn btn-success fileinput-button" rel="tooltip" title="Select files">
                                        <i class="icon-plus-sign icon-white"></i>
                                        <!-- <span>Add files</span> -->
                                        <input type="file" name="userfile">
                                    </span>
                                    <button type="submit" class="btn btn-primary start" rel="tooltip" title="Start upload">
                                        <i class="icon-upload icon-white"></i>
                                        <!-- <span>Start upload</span> -->
                                    </button>
                                    <button type="reset" class="btn cancel" rel="tooltip" title="Cancel upload">
                                        <i class="icon-ban-circle"></i>
                                    </button>
                                </div>
                                <div class="span4">
                                    <!-- The global progress bar -->
                                    Progress:
                                    <div class="progress progress-success progress-striped active">
                                        <div class="bar" style="width:0%;"></div>
                                    </div>
                                </div>
                            </div>
                            <!-- The loading indicator is shown during image processing -->
                            <div class="fileupload-loading"></div>
                            <br>
                            <div class="items files"></div>
                            <!-- The template to display files available for upload -->
                            <script id="hd-template-upload-<?php echo $p->id ?>" type="text/x-tmpl">
                            {% for (var i=0, file; file=o.files[i]; i++) { %}
                              <div class="item template-upload fade">
                                <h6>
                                  {%=file.name%}
                                  {%=o.formatFileSize(file.size)%}
                                  <p class="pull-right">
                                    {% if (!o.options.autoUpload) { %}
                                      <span class="start">
                                        
                                        <button class="btn btn-primary hide">
                                          <i class="icon-upload icon-white"></i>
                                        </button>
                                      </span>
                                    {% } %}
                                    <span class="cancel">
                                      <button class="btn">
                                        <i class="icon-ban-circle"></i>
                                      </button>
                                    </span>
                                  </p>
                                </h6>
                                <span class="preview"><span class="fade"></span></span>
                                <!-- <div class="progress progress-success progress-striped active" style="display:inline-block"><div class="bar" style="width:0%;"></div></div> -->
                              </div>
                            {% } %}        
                            </script>
                            <!-- The template to display files available for download -->
                            <script id="hd-template-download-<?php echo $p->id ?>" type="text/x-tmpl">
                            {% for (var i=0, file; file=o.files[i]; i++) { %}
                               <div class="template-download fade">
                                <h6>
                                  <a href="{%=file.url%}" title="{%=file.name%}" rel="{%=file.thumbnail_url&&'gallery'%}" download="{%=file.name%}">{%=file.name%}</a>
                                  {%=o.formatFileSize(file.size)%}
                                  <p class="pull-right delete">
                                    <a data-trigger="reload" data-location="r" class="btn delete-item" href="{%=file.delete_url%}">
                                        <i class="icon-trash"></i>
                                    </a>
                                  </p>
                                </h6>
                                <span class="preview">
                                  {% if (file.thumbnail_url) { %}
                                    <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}">
                                      <img style="width:64px" src="{%=file.thumbnail_url%}">
                                    </a>
                                  {% } %}
                                </span>            
                              </div>
                            {% } %}
                            </script>        
                        <?php echo form_close() ?>
                      <?php else: ?>
                        <div>
                          <span style="display:inline-block">
                            <img style="max-width:300px; max-height:80px" src="<?php echo base_url() ?>uploads/original/<?php echo $p->hd_path ?>" alt="">
                          </span>
                        </div>                     
                      <?php endif ?>
                    </div> <!-- /.thumbnail -->
                    
                  <?php endif ?>
                </div> <!-- /.item -->
            <?php endforeach ?>
            </div>
          <?php endif ?>
        <?php endforeach ?>
      <?php else: ?>
        <div class="alert alert-error">
          No images
        </div>
      <?php endif ?>  
    
      <?php if ($images_without_platform): ?>
        <legend>Images without platform</legend>
        <div class="items">
          <?php foreach ($images_without_platform as $p): ?>
            <div class="item" data-image-id = "<?php echo $p->id ?>">
              <h6>
                <?php echo $p->path ?>  
                <div class="pull-right">
                  <div class="btn-group">
                    <?php if ($platforms): ?>
                      <a href="#" class="btn dropdown-toggle" data-toggle="dropdown" style="border-bottom-right-radius:0px; border-top-right-radius: 0px;" rel="tooltip" title="Select a platform"><i class="icon-platform"></i></a>
                      <ul class="dropdown-menu">
                        <?php foreach ($platforms as $pl): ?>
                          <li><a href="#" class="add-to-platform" data-platform-id="<?php echo $pl->platform_id ?>"><?php echo $pl->name ?></a></li>
                        <?php endforeach ?>
                      </ul>
                    <?php endif ?>
                    <a class="btn delete-item" href="<?php echo base_url() ?>gameimage/delete/<?php echo $p->id ?>" rel="tooltip" title="Delete image" data-trigger="reload" data-location="r"  data-modal-header="<?php echo $p->path ?> image with the HD version"><i class="icon-trash"></i></a>
                  </div>
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
   