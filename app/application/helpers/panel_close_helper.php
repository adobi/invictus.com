
    
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	if(!function_exists('panel_close')) {
	
		function panel_close() {
		    return '<p class="right panel-close">
            <a href="#" data-close-right="1" data-unselect="1"><i class="icon-remove" style="margin-right:0"></i></a>
        </p>';
		}	
	}

?>    