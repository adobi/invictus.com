     
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
                        <a <?php echo event_tracking($item->analytics['footer']) ?> href="<?php echo base_url() ?>games/<?php echo $item->url ?>"><?php echo $item->name ?></a>
                      </li>
                    <?php endif ?>
                  <?php endforeach ?>
                </ul>
              <?php endif ?>
            </div>
            <div class="span4 footer-column">
              <h4>Terms and Conditions</h4>
            </div>
            <div class="span4 footer-column text-right">
              <h4>Find us on</h4>
              <ul class="unstyled">
                <li><a href="http://twitter.com/<?php echo $settings->twitter_id ?>" target="_blank">Twitter</a></li>
                <li><a href="http://facebook.com/<?php echo $settings->facebook_page ?>" target="_blank">Facebook</a></li>
              </ul>
            </div>
          </div>
        </div>
        <div style="margin-top:20px; background:rgba(18,18,18,.6); padding:10px;">
          <div class="container">
            <h6>All rights reserved &copy; Invictus Games Ltd</h6>
          </div>
        </div>
      </footer>    	  
      
      <div id="loading-global">Working...</div>		
                
      <script type="text/javascript">
          var App = App || {};
          App.URL = "<?php echo base_url() ?>";
          App.Produsction = true
      </script>      
    	<script src = "<?php echo base_url() ?>scripts/plugins/headjs/head.min.js"></script> 
    	<script type="text/javascript">
    	    head.js("http://code.jquery.com/jquery-1.7.1.min.js", 
    	            //"https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.17/jquery-ui.min.js",
    	            "<?php echo base_url() ?>scripts/plugins/bootstrap/bootstrap.js",
                  
                  "<?php echo base_url() ?>scripts/plugins/elastislide/js/jquery.easing.1.3.min.js",
                  "<?php echo base_url() ?>scripts/plugins/elastislide/js/jquery.elastislide.js",
                  "<?php echo base_url() ?>scripts/plugins/event-tracking/jquery.trackevent.js",
                  "<?php echo base_url() ?>scripts/plugins/prettify-upload/jquery.prettify-upload.js",
                  "<?php echo base_url() ?>scripts/invictus/invictus.js",
                  
                  function() {
                    <?php if ($this->session->flashdata('message')): ?>
                        $(function() {
                            App.showNotification("<?php echo ($this->session->flashdata("message")) ?>")
                        })
                    <?php endif ?>                  
                  }                     
            );
    	</script>
     
  </body>
</html>