
            </div> <!-- content-wrapper -->
            <?php if ($this->session->userdata('logged_in')): ?>
              <div class="span5 sidebar-navigation-wrapper-right">
          	    <div class="well">
                </div> <!-- well -->
              </div>
            <?php endif ?>
          </div> <!-- /content -->   
        </div> <!-- /container -->
		
		<div id="loading-global">Working...</div>		
    
		<!-- Le javascript templates -->
	  <div class="hidden">
      <div class="modal hide fade" id="delete-confirmation">
        <div class="modal-header alert-error">
          <a class="close" data-dismiss="modal">×</a>
          <h3>Confirmation</h3>
          </div>
          <div class="modal-body">
          <p>Are you sure you want to delete the following "<strong id="the-item"></strong>" ?</p>
        </div>
        <div class="modal-footer">
          <a href="#" class="btn" data-dismiss="modal">No, I changed my mind</a>
          <a href="#" class="delete-item btn btn-danger" id="delete-yes">Ok, let's do this!</a>
        </div>
      </div>
      
      <div class="modal hide fade" id="overwrite-warning">
        <div class="modal-header alert-warning">
          <a class="close" data-dismiss="modal">×</a>
          <h3>Warning</h3>
          </div>
          <div class="modal-body">
          <p>Are you sure you want to replace <strong id="old-item"></strong> with <strong id="new-item"></strong>?</p>
        </div>
        <div class="modal-footer">
          <a href="#" class="btn" data-dismiss="modal">No, I changed my mind</a>
          <a href="#" class="btn btn-warning" id="overwrite-yes">Ok, let's do this!</a>
        </div>
      </div>      
      	    
	  </div>
    <!-- /javascript templates -->
    
    <!-- drag'n'drop helper -->
    <ul class="unstyled dnd-helper"></ul>
    	            
    <script type="text/javascript">
        var App = App || {};
        App.URL = "<?php echo base_url() ?>";
    </script>      
  	<script src = "<?php echo base_url() ?>scripts/plugins/headjs/head.min.js"></script> 
  	<script type="text/javascript">
  	    head.js("http://code.jquery.com/jquery-1.7.1.min.js", 
  	            "https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.17/jquery-ui.min.js",
  	            "https://raw.github.com/cowboy/jquery-hashchange/v1.3/jquery.ba-hashchange.min.js",
                "<?php echo base_url() ?>scripts/plugins/bootstrap/bootstrap-dropdown.js",
                "<?php echo base_url() ?>scripts/plugins/bootstrap/bootstrap-tab.js",
                "<?php echo base_url() ?>scripts/plugins/bootstrap/bootstrap-transition.js",
                "<?php echo base_url() ?>scripts/plugins/bootstrap/bootstrap-alert.js",
                "<?php echo base_url() ?>scripts/plugins/bootstrap/bootstrap-modal.js",
                "<?php echo base_url() ?>scripts/plugins/bootstrap/bootstrap-tooltip.js",
                "<?php echo base_url() ?>scripts/plugins/bootstrap/bootstrap-popover.js",
                "<?php echo base_url() ?>scripts/plugins/bootstrap/bootstrap-transition.js",
                "<?php echo base_url() ?>scripts/plugins/bootstrap/bootstrap-collapse.js",

                "<?php echo base_url() ?>scripts/plugins/redactor/js/redactor/redactor.js",
                "<?php echo base_url() ?>scripts/plugins/fancybox/jquery.fancybox.pack.js",
                "<?php echo base_url() ?>scripts/plugins/chosen/chosen.jquery.min.js",
                
                "http://ajax.aspnetcdn.com/ajax/jquery.templates/beta1/jquery.tmpl.js",
                //"<?php echo base_url(); ?>scripts/plugins/fileupload/vendor/jquery.ui.widget.js",
                "http://blueimp.github.com/JavaScript-Templates/tmpl.min.js",
                "http://blueimp.github.com/JavaScript-Load-Image/load-image.min.js",
                "http://blueimp.github.com/JavaScript-Canvas-to-Blob/canvas-to-blob.min.js",
                "<?php echo base_url(); ?>scripts/plugins/fileupload/jquery.iframe-transport.js",
                "<?php echo base_url(); ?>scripts/plugins/fileupload/jquery.fileupload.js",
                "<?php echo base_url(); ?>scripts/plugins/fileupload/jquery.fileupload-ip.js",
                "<?php echo base_url(); ?>scripts/plugins/fileupload/jquery.fileupload-ui.js",
                "<?php echo base_url(); ?>scripts/plugins/fileupload/locale.js",
                "<?php echo base_url(); ?>scripts/plugins/fileupload/main.js",
                
                "<?php echo base_url(); ?>scripts/plugins/scroll/jquery.scrollTo-min.js",
                "<?php echo base_url() ?>scripts/plugins/google-code-prettify/prettify.js",
                "<?php echo base_url() ?>scripts/plugins/charcounter/jquery.charcounter.js",
                "<?php echo base_url() ?>scripts/plugins/prettify-upload/jquery.prettify-upload.js",
                "<?php echo base_url() ?>scripts/plugins/lionbars/jquery.lionbars.0.3.min.js",

                "<?php echo base_url() ?>scripts/admin/nav.js?<?php echo time(); ?>",
                "<?php echo base_url() ?>scripts/admin/jobs.js?<?php echo time(); ?>",
                "<?php echo base_url() ?>scripts/admin/contacts.js?<?php echo time(); ?>",
                "<?php echo base_url() ?>scripts/admin/games.js?<?php echo time(); ?>",
                "<?php echo base_url() ?>scripts/admin/layout.js?<?php echo time(); ?>",
                "<?php echo base_url() ?>scripts/admin/crosspromo.js?<?php echo time(); ?>",
                "<?php echo base_url() ?>scripts/admin/page.js?<?php echo time(); ?>",
                function() {
                
                    <?php if ($this->session->flashdata('message')): ?>
                        $(function() {
                            App.showNotification("<?php echo ($this->session->flashdata("message")) ?>")
                        })
                    <?php endif ?>
                    
                    <?php if ($this->uri->segment(1) === 'layout' || $this->uri->segment(1) === 'crosspromo') :?>
                      $(function () {
                        (new App.Nav()).setHref('<?php echo base_url() ?>game/all').loadIntoRightPanel()
                      })
                          //
                    <?php endif; ?>
                }                     
          );
  	</script>
   
  </body>
</html>