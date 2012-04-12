<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://www.facebook.com/2008/fbml" style="overflow: hidden_">
    <head>
      <title><?php echo SITE_TITLE ?></title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
      
      <meta name="description" content="">
      <meta name="author" content="">
      
      <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
      <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
      <![endif]-->        
      
      <!-- 
      <link rel = "stylesheet" href="<?= base_url() ?>css/bootstrap.css" media="all" />
      <link rel = "stylesheet" href="<?= base_url() ?>css/bootstrap-responsive.css" media="all" />
      <link rel = "stylesheet" href="<?= base_url() ?>css/bootstrap.custom.min.css" media="all" />
      <link rel = "stylesheet" href="<?= base_url() ?>css/aristo.css" media="all" />
      <link rel = "stylesheet" href="<?= base_url() ?>css/page.css" media="all" />
      <link rel = "stylesheet" href="<?= base_url() ?>scripts/plugins/file-upload/jquery.fileupload-ui.css" media="all" />
      <link rel = "stylesheet" href="<?= base_url() ?>scripts/plugins/colorpicker/farbtastic.css" media="all" />
      <link rel = "stylesheet" href="<?php echo base_url() ?>scripts/plugins/redactor/js/redactor/css/redactor.css" />        
      <link rel = "stylesheet" href="<?= base_url() ?>scripts/plugins/fancybox/jquery.fancybox.css" media="all" />
      <link rel = "stylesheet" href="<?= base_url() ?>scripts/plugins/chosen/chosen.css" media="all" />
      <link rel = "stylesheet" href="<?= base_url() ?>scripts/plugins/lionbars/lionbars.css" media="all" />
      <link rel = "stylesheet" href="<?= base_url() ?>scripts/plugins/google-code-prettify/prettify.css" media="all" />
       -->
      <!-- 
      <script type="text/javascript" src="https://getfirebug.com/firebug-lite.js"></script>
       -->

      <?php if (ENVIRONMENT==="development"): ?>
        <link rel="stylesheet/less" type="text/css" href="<?= base_url() ?>css/common/all.less">
        <script type="text/javascript" src="<?php echo base_url() ?>scripts/plugins/lessjs/less-1.3.0.min.js"></script>
        <script type="text/javascript">
          less.env = "development";
          //less.watch();        
        </script>
      <?php else: ?>
        <link rel = "stylesheet" type="text/css" href="<?= base_url() ?>css/common/all.css">
      <?php endif ?>       
       
    </head>
    
    <body>    
        	
        <?php if ($this->session->userdata('logged_in')): ?>
            <div class="navbar navbar-fixed-top">
              <div class="navbar-inner" style="height:60px">
                <div class="container-fluid">
                  <a data-target=".nav-collapse" data-toggle="collapse" class="btn btn-navbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </a>
                  <!-- 
                  <a href="<?php echo base_url() ?>" class="span1 brand" style="margin-top:10px; margin-right:3px;">
                    <i class="icon-big home-icon"></i>
                    <?php //echo SITE_TITLE ?>
                  </a>
                   -->
                  <div class="nav-collapse">
                    <ul class="nav">
                    </ul>
                    <div class="pull-right">
                        <form action="" class="navbar-search pull-left" style="margin:15px 10px 0 0;">
                          <!-- <input type="text" placeholder="Search" class="search-query span3"> -->
                          <?php echo form_dropdown('filter_games_select', $games_for_select, '', 'class="chosen span4"  data-placeholder="Select a game" id="filter-games-select"') ?>
                        </form>                        
                        <ul class="nav">
                            <li class="divider-vertical"></li>
                            <li>
                              <a href="<?php echo base_url() ?>auth/logout" style="font-weight:bold;margin-top:5px;" rel="tooltip" title="Logout" data-placement="bottom">
                                <i class="icon-big power-icon"></i>
                                
                              </a>
                            </li>
                        </ul>
                    </div>
                  </div><!--/.nav-collapse -->
                </div>
              </div>
            </div>               
        <?php endif ?> 
        <div class="container-fluid" id="container" style="padding-left:0px;">
        	<div class="content row-fluid" style="margin-top:60px;">
        	  <?php if ($this->session->userdata('logged_in')): ?>
          	  <div class="span1 sidebar-navigation-wrapper-left">
          	    <div class="sidebar-nav">
          	      <ul class="nav nav-list left-side-nav">
          	        <!-- 
                    <li <?php echo $this->uri->segment(1) === 'dashboard' ? 'class="active"' : '' ?>>
                      <a href="<?php echo base_url() ?>dashboard" rel="tooltip" title="Dashboard" data-placement="right">
                        <i class="icon-big dashboard-icon"></i>
                        <span>Dashboard</span>
                      </a>
                    </li>
                     -->
          	        <li <?php echo $this->uri->segment(1) === 'game' ? 'class="active"' : '' ?>>
                      <a href="<?php echo base_url() ?>game" rel="tooltip" title="Games" data-placement="right">
                        <i class="icon-big games-icon"></i>
                        <span>Games</span>
                      </a>
                    </li>
          	        <li <?php echo $this->uri->segment(1) === 'layout' ? 'class="active"' : '' ?>>
                      <a href="<?php echo base_url() ?>layout" rel="tooltip" title="Internal linking: menus and banners" data-placement="right">
                        <i class="icon-big display-icon"></i>
                        <span>Layout</span>
                      </a>
                    </li>
          	        <li <?php echo $this->uri->segment(1) === 'crosspromo' ? 'class="active"' : '' ?>>
                      <a href="<?php echo base_url() ?>crosspromo" rel="tooltip" title="Crosspromo" data-placement="right">
                        <i class="icon-big roundabout-icon"></i>
                        <span>Crosspromo</span>
                      </a>
                    </li>                    
          	        <li <?php echo $this->uri->segment(1) === 'page' ? 'class="active"' : '' ?>>
                      <a href="<?php echo base_url() ?>page" rel="tooltip" title="Links" data-placement="right">
                        <i class="icon-big link-icon"></i>
                        <span>Links</span>
                      </a>
                    </li>
          	        <li <?php echo $this->uri->segment(1) === 'offer' ? 'class="active"' : '' ?>>
                      <a href="<?php echo base_url() ?>offer" rel="tooltip" title="Offers" data-placement="right">
                        <i class="icon-big gift-icon"></i>
                        <span>Offers</span>
                      </a>
                    </li>
          	        <li <?php echo $this->uri->segment(1) === 'job' ? 'class="active"' : '' ?>>
                      <a href="<?php echo base_url() ?>job" rel="tooltip" title="Jobs" data-placement="right">
                        <i class="icon-big usd-icon"></i>
                        <span>Jobs</span>
                      </a>
                    </li>
          	        <!-- <li <?php echo $this->uri->segment(1) === 'jobapplication' ? 'class="active"' : '' ?>><a href="<?php echo base_url() ?>jobapplication"><i class="icon-big group-icon"></i>Candidates</a></li> -->
          	        <li <?php echo $this->uri->segment(1) === 'contact' ? 'class="active"' : '' ?>>
                      <a href="<?php echo base_url() ?>contact" rel="tooltip" title="Contact" data-placement="right">
                        <i class="icon-big contact-icon"></i>
                        <span>Contact</span>
                      </a>
                    </li>
          	        <!-- 
          	        <li><a href="<?php echo base_url() ?>contact"><i class="icon-big charts-icon"></i>Analytics</a></li>
          	         -->
          	        <li <?php echo $this->uri->segment(1) === 'platform' ? 'class="active"' : '' ?>>
                      <a href="<?php echo base_url() ?>platform" rel="tooltip" title="Platforms" data-placement="right">
                        <i class="icon-big iphone-icon"></i>
                        <span>Platforms</span>
                      </a>
                    </li>
          	        <li <?php echo $this->uri->segment(1) === 'settings' ? 'class="active"' : '' ?>>
                      <a href="<?php echo base_url() ?>settings" rel="tooltip" title="Settings" data-placement="right">
                        <i class="icon-big settings-icon"></i>
                        <span>Settings</span>
                      </a>
                    </li>
          	      </ul>
          	    </div>
          	  </div>
        	  <?php endif ?>
        	  <div class="span7 content-wrapper">
                
                
