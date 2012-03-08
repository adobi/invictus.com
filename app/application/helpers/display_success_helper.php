<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	if(!function_exists('display_success')) {
		
		function display_success($message) {
		    $html = '';
			if ($message) {
    			    
    			$html .= '<div class = "alert alert-success">';
    				$html .= $message;
    			$html .= '</div>';
			
			}
			return $html;
		}
	}

?>