     
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
                        <a href="<?php echo base_url() ?>games/<?php echo $item->url ?>"><?php echo $item->name ?></a>
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
                <li><a href="#">Twitter</a></li>
                <li><a href="#">Facebook</a></li>
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
      <script type="text/javascript">
          var App = App || {};
          App.URL = "<?php echo base_url() ?>";
      </script>      
    	<script src = "<?php echo base_url() ?>scripts/plugins/headjs/head.min.js"></script> 
    	<script type="text/javascript">
    	    head.js("http://code.jquery.com/jquery-1.7.1.min.js", 
    	            //"https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.17/jquery-ui.min.js",
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
                  "<?php echo base_url() ?>scripts/plugins/bootstrap/bootstrap-carousel.js",
                  "<?php echo base_url() ?>scripts/plugins/bootstrap/bootstrap-button.js",
                  
                  "<?php echo base_url() ?>scripts/plugins/elastislide/js/jquery.easing.1.3.js",
                  "<?php echo base_url() ?>scripts/plugins/elastislide/js/jquery.elastislide.js",
                  "<?php echo base_url() ?>scripts/admin/games.js",
                  "<?php echo base_url() ?>scripts/invictus/invictus.js",
                  
                  function() {
                  
                  }                     
            );
    	</script>
     
  </body>
</html>