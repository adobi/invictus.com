<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	if(!function_exists('embed_youtube')) {
	
		function embed_youtube($video, $autoplay = false, $width = 340, $height = 260) {
            
			return '<iframe width="'.$width.'" height="'.$height.'" src="http://www.youtube.com/embed/'.$video.($autoplay ? '/?autoplay=1&' : '/?') .'wmode=Opaque" frameborder="0" allowfullscreen></iframe>';
		}	
	}

?>