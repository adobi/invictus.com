     
    </div> <!-- /container -->
      <footer style="padding-top:20px;">
        <div class="container">
          <div class="row">
            <div class="span4 footer-column">
              <?php if ($footer_games): ?>
                <h4>Top Games</h4>
                <ul class="unstyled">
                  <?php foreach ($footer_games as $item): ?>
                    <?php if ($item): ?>
                      <li>
                        <a <?php echo event_tracking($item->analytics['footer']) ?> href="<?php echo base_url() ?>games/<?php echo $item->url ?>"><i class="icon-heart icon-white"></i><?php echo $item->name ?></a>
                      </li>
                    <?php endif ?>
                  <?php endforeach ?>
                </ul>
              <?php endif ?>
            </div>
            <div class="span4 footer-column">
              <h4>Privacy policy</h4>
              <ul class="unstyled">
                <li>
                  <a href="http://privacy.invictus.com/" target="_blank"><i class="icon-book icon-white"></i>Privacy</a>
                </li>
              </ul>
            </div>
            <div class="span4 footer-column text-right">
              <h4>Find us on</h4>
              <ul class="unstyled">
                <li><a href="http://twitter.com/<?php echo $settings->twitter_id ?>" target="_blank"><i class="icon-globe icon-white"></i>Twitter</a></li>
                <li><a href="http://facebook.com/<?php echo $settings->facebook_page ?>" target="_blank"><i class="icon-globe icon-white"></i>Facebook</a></li>
              </ul>
            </div>
          </div>
        </div>
        <div style="margin-top:20px; background:rgba(18,18,18,.6); padding:10px;">
          <div class="container">
            <h6>All rights reserved, <?php echo date('Y') ?> &copy; Invictus Games Ltd</h6>
          </div>
        </div>
      </footer>    	  
      
      <div id="loading-global">Working...</div>		

  		<!-- Le javascript templates -->
  	  <div class="hide_">
        <div class="modal hide fade" id="video-in-modal">
          <div class="modal-header well">
            <a class="close" data-dismiss="modal">×</a>
            <h3 class="modal-title">&nbsp;</h3>
          </div>
          <div class="modal-body">
            
          </div>
          <div class="modal-footer">
            <a href="#" class="btn" data-dismiss="modal">Close</a>
            <!-- <a id="view-details-from-video" href="" class=" btn-large btn btn-orange"><strong>View details</strong> <i style="margin-top:1px;" class="icon-chevron-right icon-white"></i></a> -->
          </div>
        </div>
        	    
  	  </div>
      <!-- /javascript templates -->
                
      <script type="text/javascript">
          var App = App || {};
          App.URL = "<?php echo base_url() ?>";
          App.Produsction = true
      </script>      
    	<script src = "<?php echo base_url() ?>scripts/plugins/headjs/head.min.js"></script> 
    	<script src = "<?php echo base_url() ?>scripts/plugins/ga_social_tracking.js"></script> 
    	
    	<script type="text/javascript">
    	    head.js("http://code.jquery.com/jquery-1.7.2.min.js", 
    	            //"https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.17/jquery-ui.min.js",
    	            <?php if (ENVIRONMENT === 'development') : ?>
                    "<?php echo base_url() ?>scripts/plugins/elastislide/js/jquery.easing.1.3.min.js",
                    "<?php echo base_url() ?>scripts/plugins/elastislide/js/jquery.elastislide.js",
                    "<?php echo base_url() ?>scripts/plugins/event-tracking/jquery.trackevent.js",
                    "<?php echo base_url() ?>scripts/plugins/prettify-upload/jquery.prettify-upload.js",
                    //"<?php echo base_url() ?>scripts/plugins/fotorama/fotorama.src.js",
      	            "<?php echo base_url() ?>scripts/plugins/bootstrap/bootstrap.js",
      	            //"http://www.jacklmoore.com/colorbox/colorbox/jquery.colorbox.js",
                    "<?php echo base_url() ?>scripts/plugins/spinjs/spin.min.js",
                    "<?php echo base_url() ?>scripts/invictus/invictus.js",
                  <?php else: ?>
                    "<?php echo base_url() ?>assets/scripts/all.min.js",
                  <?php endif ?>
                  
                  function() {
                    <?php if ($this->session->flashdata('message')): ?>
                        $(function() {
                            App.showNotification("<?php echo ($this->session->flashdata("message")) ?>")
                        })
                    <?php endif ?> 
                    
                    <?php if (((isset($was_error_1) && $was_error_1) ||isset($was_error_2) && $was_error_2) && isset($hash) && $hash) :?>
                      window.location.hash = '<?php echo $hash ?>'
                    <?php else : ?>
                      window.location.hash = ''
                    <?php endif; ?>    
                    
                    twttr.ready(function(twttr) {
                      _ga.trackTwitter(); //Google Analytics tracking
                    });
                    
                  }                     
            );

    	</script>
     
  </body>
</html>