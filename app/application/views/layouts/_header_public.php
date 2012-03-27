<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Invictus Games</title>
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
    
    <!-- Le HTML5 shim, for IE6-8 support of HTML elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le styles -->
    <?php if (ENVIRONMENT==="development"): ?>
      <link rel="stylesheet/less" type="text/css" href="<?= base_url() ?>css/invictus/all.less">
      <script type="text/javascript" src="<?php echo base_url() ?>scripts/plugins/lessjs/less-1.3.0.min.js"></script>
      <script type="text/javascript">
        less.env = "development";
        //less.watch();        
      </script>
    <?php else: ?>
      <link rel = "stylesheet" type="text/css" href="<?= base_url() ?>css/invictus/all.css">
    <?php endif ?>  
    
    <!--[if IE]>
      <link href="assets/css/ie.css" rel="stylesheet">
    <![endif]-->
    <!--[if IE]>
      <script src="https://getfirebug.com/firebug-lite-debug.js"></script>
      <script src="assets/js/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
  
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=298005276910571";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
    
    <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>

    <script type="text/javascript">
      
      (function() {
        var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
        po.src = 'https://apis.google.com/js/plusone.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
      })();
    </script>    
    
    
    <div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="btn btn-navbar bigger-font" href="#" style="padding-top:5px;padding-bottom:4px;"><span class="icon-zoom-in icon-white"></span></a>
          <a class="brand" href="<?php echo base_url() ?>">Invictus Games</a>
          
          <div class="nav-collapse">
            <ul class="nav">
              
              <li <?php echo !$this->uri->segment(1) ? 'class="active"' : '' ?>><a href="<?php echo base_url() ?>"><i class="home-icon"></i>Home</a></li>
              <li <?php echo $this->uri->segment(1) === 'contact' ? 'class="active"' : '' ?>><a href="<?php echo base_url() ?>contact"><i class="contact-icon"></i>Contact</a></li>
              <li <?php echo $this->uri->segment(1) === 'jobs' ? 'class="active"' : '' ?>><a href="<?php echo base_url() ?>jobs"><i class="jobs-icon"></i>Jobs</a></li>
            </ul>
            
            <ul class="nav span4 pull-right more-games">
              <li class="dropdown">
                <a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="games-icon"></i>More games <b class="caret"></b></a>
                <ul class="span4 dropdown-menu all-games-dropdown-menu">
                  <!-- 
                  <?php foreach (range(0,4) as $key => $value): ?>
                    <li>
                      <a href="details.php">
                        <img src="http://placehold.it/64x64" alt="">
                        <span>Game <?php echo $key+1 ?></span>
                      </a>
                    </li>
                  <?php endforeach ?>
                   -->
                    <li>
                      <a href="details.php">
                        <img src="<?php echo base_url() ?>assets/games/froggyjump/Icon64.png" alt="">
                        <span>Froggy Jump</span>
                      </a>
                    </li>
                    <li>
                      <a href="details.php">
                        <img src="<?php echo base_url() ?>assets/games/santaride/Icon64.png" alt="">
                        <span>Santa Ride!</span>
                      </a>
                    </li>
                    <li>
                      <a href="details.php">
                        <img src="<?php echo base_url() ?>assets/games/lazyfarmer/Icon64.png" alt="">
                        <span>Lazy Farmer</span>
                      </a>
                    </li>
                    <li>
                      <a href="details.php">
                        <img src="<?php echo base_url() ?>assets/games/greedcorp/Icon64.png" alt="">
                        <span>Greed Corp</span>
                      </a>
                    </li>
                    <li>
                      <a href="details.php">
                        <img src="<?php echo base_url() ?>assets/games/mistbouncer/Icon64.png" alt="">
                        <span>Mist Bouncer</span>
                      </a>
                    </li>
                  <!-- <li class="divider"></li> -->
                  <li><a href="<?php echo base_url() ?>games/all" class="all-games-link"><strong>All games &raquo;</strong></a></li>
                </ul>
              </li>
            </ul>
          
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

    <div class="container" id="container">          