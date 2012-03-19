
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

	  <div class="hidden">
      <div class="modal hide fade" id="delete-confirmation">
        <div class="modal-header alert-error">
          <a class="close" data-dismiss="modal">×</a>
          <h3>Confirmation</h3>
          </div>
          <div class="modal-body">
          <p>Are you sure you want to delete this item?</p>
        </div>
        <div class="modal-footer">
          <a href="#" class="btn" data-dismiss="modal">No, I changed my mind</a>
          <a href="#" class="delete-item btn btn-danger"id="delete-yes">Ok, let's do this!</a>
        </div>
      </div>	    
	  </div>

  	<script src = "<?php echo base_url() ?>scripts/plugins/headjs/head.min.js"></script> 
  	<script type="text/javascript">
  	    head.js("http://code.jquery.com/jquery-1.7.1.min.js", 
  	            "https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.17/jquery-ui.min.js",
                  "<?php echo base_url() ?>scripts/plugins/bootstrap/bootstrap-dropdown.js",
                  "<?php echo base_url() ?>scripts/plugins/bootstrap/bootstrap-tab.js",
                  "<?php echo base_url() ?>scripts/plugins/bootstrap/bootstrap-transition.js",
                  "<?php echo base_url() ?>scripts/plugins/bootstrap/bootstrap-alert.js",
                  "<?php echo base_url() ?>scripts/plugins/bootstrap/bootstrap-modal.js",
                  "<?php echo base_url() ?>scripts/plugins/bootstrap/bootstrap-tooltip.js",
                  "<?php echo base_url() ?>scripts/plugins/bootstrap/bootstrap-popover.js",
                  "<?php echo base_url() ?>scripts/plugins/bootstrap/bootstrap-transition.js",
                  "<?php echo base_url() ?>scripts/plugins/redactor/js/redactor/redactor.js",
                  "<?php echo base_url() ?>scripts/plugins/fancybox/jquery.fancybox.pack.js",
                  "<?php echo base_url() ?>scripts/plugins/chosen/chosen.jquery.min.js",
                  "http://ajax.aspnetcdn.com/ajax/jquery.templates/beta1/jquery.tmpl.js",
                  "<?php echo base_url(); ?>scripts/plugins/file-upload/jquery.iframe-transport.js",
                  "<?php echo base_url(); ?>scripts/plugins/file-upload/jquery.fileupload.js",
                  "<?php echo base_url(); ?>scripts/plugins/file-upload/jquery.fileupload-ui.js",
                  "<?php echo base_url(); ?>scripts/plugins/scroll/jquery.scrollTo-min.js",
                  "<?php echo base_url() ?>scripts/plugins/google-code-prettify/prettify.js",
                  "<?php echo base_url() ?>scripts/plugins/charcounter/jquery.charcounter.js",
                  "<?php echo base_url() ?>scripts/plugins/prettify-upload/jquery.prettify-upload.js",
                  "<?php echo base_url() ?>scripts/plugins/lionbars/jquery.lionbars.0.3.min.js",
                  "<?php echo base_url() ?>scripts/nav.js?<?php echo time(); ?>",
                  "<?php echo base_url() ?>scripts/jobs.js?<?php echo time(); ?>",
                  "<?php echo base_url() ?>scripts/contacts.js?<?php echo time(); ?>",
                  "<?php echo base_url() ?>scripts/page.js?<?php echo time(); ?>",
                  function() {
                  
                      <?php if ($this->session->flashdata('message')): ?>
                          $(function() {
                              App.showNotification("<?php echo ($this->session->flashdata("message")) ?>")
                          })
                      <?php endif ?>
                  }                     
          );
  	</script>
    	            
		<script type="text/javascript">
		    var App = App || {};
			App.URL = "<?php echo base_url() ?>";

		</script>     
    </body>
</html>