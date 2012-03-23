
<?php if (validation_errors()): ?>
    <div class="alert alert-error">
        <?php echo validation_errors() ?>
    </div>
<?php endif ?>

<?php echo form_open_multipart(base_url() .'gameimage/upload_for_game/'.$game->id, array('id'=>'fileupload', 'class'=>'_form-horizontal', '_data-ajax-form'=>1, '_data-trigger'=>'back')) ?>    
    <?php echo panel_close('images/'.($game ? $game->id : '')) ?>
    <legend>
      <?php if ($item): ?>
          Edit images
      <?php else: ?>
          New images
      <?php endif ?>
      for <?php echo $game->name ?>
      <p class="pull-right">
        <?php if ($item): ?>
          <a href="<?php echo base_url() ?>game/delete/<?php echo $item->id ?>" class="btn delete-item" data-location="r" rel="tooltip" title="Delete video" data-modal-header="<?php echo $item->description ?> video"><i class="icon-trash"></i></a>
        <?php endif ?>
      </p>        
    </legend>    
    <div class="right-side-scroll">
         <!-- The file upload form used as target for the file upload widget -->
        <!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
        <div class="row fileupload-buttonbar">
            <div class="span2">
                <!-- The fileinput-button span is used to style the file input field as button -->
                <span class="btn btn-success fileinput-button" rel="tooltip" title="Select files">
                    <i class="icon-plus icon-white"></i>
                    <!-- <span>Add files</span> -->
                    <input type="file" name="userfile" multiple>
                </span>
                <button type="submit" class="btn btn-primary start" rel="tooltip" title="Start upload">
                    <i class="icon-upload icon-white"></i>
                    <!-- <span>Start upload</span> -->
                </button>
                <button type="reset" class="btn cancel" rel="tooltip" title="Cancel upload">
                    <i class="icon-ban-circle"></i>
                    <!-- <span>Cancel upload</span> -->
                </button>
                <!-- 
                <button type="button" class="btn delete" rel="tooltip" title="Delete">
                    <i class="icon-trash"></i>
                    <span>Delete</span>
                </button>
                 -->
                <!-- <input type="checkbox" class="toggle"> -->
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
        <!-- The table listing the files available for upload/download -->
        <!-- <table class="table table-striped"><tbody class="files" data-toggle="modal-gallery" data-target="#modal-gallery"></tbody></table> -->
        <legend>Uploaded files</legend>
        <div class="items files"></div>
        <!-- The template to display files available for upload -->
        <script id="template-upload" type="text/x-tmpl">
        {% for (var i=0, file; file=o.files[i]; i++) { %}
          <div class="item template-upload fade">
            <h6>
              {%=file.name%}
              {%=o.formatFileSize(file.size)%}
              <p class="pull-right">
                {% if (!o.options.autoUpload) { %}
                  <span class="start">
                    <button class="btn btn-primary">
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
            <div class="progress progress-success progress-striped active" style="display:inline-block"><div class="bar" style="width:0%;"></div></div>
          </div>
        {% } %}        
        </script>
        <!-- The template to display files available for download -->
        <script id="template-download" type="text/x-tmpl">
        {% for (var i=0, file; file=o.files[i]; i++) { %}
           <div class="item template-download fade">
            <h6>
              <a href="{%=file.url%}" title="{%=file.name%}" rel="{%=file.thumbnail_url&&'gallery'%}" download="{%=file.name%}">{%=file.name%}</a>
              {%=o.formatFileSize(file.size)%}
              <p class="pull-right delete">
                <a data-ajax-link class="btn" href="<?php echo base_url() ?>gameimage/analytics/{%=file.image_id%}"><i class="icon-signal"></i></a>
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
        
        <!-- The template to display files available for upload -->
        <script id="_template-upload" type="text/x-tmpl">
        {% for (var i=0, file; file=o.files[i]; i++) { %}
            <tr class="template-upload fade">
                <td class="preview"><span class="fade"></span></td>
                <td class="name"><span>{%=file.name%}</span></td>
                <td class="size"><span>{%=o.formatFileSize(file.size)%}</span></td>
                {% if (file.error) { %}
                    <td class="error" colspan="2"><span class="label label-important">{%=locale.fileupload.error%}</span> {%=locale.fileupload.errors[file.error] || file.error%}</td>
                {% } else if (o.files.valid && !i) { %}
                    <td>
                        <div class="progress progress-success progress-striped active"><div class="bar" style="width:0%;"></div></div>
                    </td>
                    <td class="start">{% if (!o.options.autoUpload) { %}
                        <button class="btn btn-primary">
                            <i class="icon-upload icon-white"></i>
                        </button>
                    {% } %}</td>
                {% } else { %}
                    <td colspan="2"></td>
                {% } %}
                <td class="cancel">{% if (!i) { %}
                    <button class="btn">
                        <i class="icon-ban-circle"></i>
                    </button>
                {% } %}</td>
            </tr>
        {% } %}
        </script>
        <script id="__template-upload" type="text/x-tmpl">
        {% for (var i=0, file; file=o.files[i]; i++) { %}
            <tr class="template-upload fade">
                <td class="preview"><span class="fade"></span></td>
                <td class="name">
                  <span>{%=file.name%}</span>
                  <br />
                  <span>{%=o.formatFileSize(file.size)%}</span> 
                  <br />
                  <div class="progress progress-success progress-striped active"><div class="bar" style="width:0%;"></div></div>
                </td>
                {% if (file.error) { %}
                    <td class="error" colspan="2"><span class="label label-important">{%=locale.fileupload.error%}</span> {%=locale.fileupload.errors[file.error] || file.error%}</td>
                {% } else if (o.files.valid && !i) { %}
                    <td class="start">{% if (!o.options.autoUpload) { %}
                        <button class="btn btn-primary">
                            <i class="icon-upload icon-white"></i>
                        </button>
                    {% } %}</td>
                {% } else { %}
                    
                {% } %}
                <td class="cancel">{% if (!i) { %}
                    <button class="btn">
                        <i class="icon-ban-circle"></i>
                    </button>
                {% } %}</td>
            </tr>
        {% } %}
        </script>


        <!-- The template to display files available for download -->
        <script id="_template-download" type="text/x-tmpl">
        {% for (var i=0, file; file=o.files[i]; i++) { %}
            <tr class="template-download fade">
                {% if (file.error) { %}
                    <td></td>
                    <td class="error" colspan="2"><span class="label label-important">{%=locale.fileupload.error%}</span> {%=locale.fileupload.errors[file.error] || file.error%}</td>
                {% } else { %}
                    <td class="preview">{% if (file.thumbnail_url) { %}
                        <a href="{%=file.url%}" title="{%=file.name%}" rel="gallery" download="{%=file.name%}"><img style="width:64px" src="{%=file.thumbnail_url%}"></a>
                    {% } %}</td>
                    <td class="name">
                        <a href="{%=file.url%}" title="{%=file.name%}" rel="{%=file.thumbnail_url&&'gallery'%}" download="{%=file.name%}">{%=file.name%}</a>
                    </td>
                    <td class="size"><span>{%=o.formatFileSize(file.size)%}</span></td>
                    <td colspan="2"></td>
                {% } %}
                <td class="delete">
                    <button class="btn" data-type="{%=file.delete_type%}" data-url="{%=file.delete_url%}">
                        <i class="icon-trash"></i>
                    </button>
                    <input type="checkbox" name="delete" value="1">
                </td>
            </tr>
        {% } %}
        </script>
          
    </div>
<?php echo form_close() ?>
