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
    <link href="css/bootstrap.css" rel="stylesheet">
    
    <style type="text/css">
      .thumbnail {
        background-color: #eeeeee; /* Old browsers */
        background-repeat: repeat-x; /* Repeat the gradient */
        background-image: -moz-linear-gradient(top, #f5f5f5 0%, #eeeeee 100%); /* FF3.6+ */
        background-image: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#f5f5f5), color-stop(100%,#eeeeee)); /* Chrome,Safari4+ */
        background-image: -webkit-linear-gradient(top, #f5f5f5 0%,#eeeeee 100%); /* Chrome 10+,Safari 5.1+ */
        background-image: -ms-linear-gradient(top, #f5f5f5 0%,#eeeeee 100%); /* IE10+ */
        background-image: -o-linear-gradient(top, #f5f5f5 0%,#eeeeee 100%); /* Opera 11.10+ */
        filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#f5f5f5', endColorstr='#eeeeee',GradientType=0 ); /* IE6-9 */
        background-image: linear-gradient(top, #f5f5f5 0%,#eeeeee 100%); /* W3C */        
      }
    </style>
  </head>

  <body>

    <div class="container" id="container" style="padding-top:60px;">
      <h1 style="margin-bottom:30px;">Versions:</h1>
      <ul class="thumbnails">
        <?php foreach (range(0,9) as $key => $value): ?>
          <li class="span3"><a href="<?php echo ++$key ?>/" class="thumbnail" style="font-size:3em; line-height:96px; text-align:center"><?php echo $key ?></a></li>
        <?php endforeach ?>
      </ul>
    </div> <!-- /container -->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
    <script src="assets/js/bootstrap.js"></script>
    <script src="assets/js/invictus.js"></script>

  </body>

</html>    