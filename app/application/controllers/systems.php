<?php 

if (! defined('BASEPATH')) exit('No direct script access');

class Systems extends MY_Controller 
{
    public function show() 
    {
        $data = array();
        
        $url = false;
        
        switch ($this->uri->segment(3)) {
          case 'press': 
            $url = 'http://press.invictus.com/auth/auto_login';
            break;
          case 'news':
            $url = 'http://invictus.com/invictus-news/auth/auto_login';
            break;
          case 'microsites':
            $url = 'http://invictus.com/microsites/auth/auto_login';
            break;
        }
        
        $data['url'] = $url;
        
        $this->template->build('systems/show', $data);
    }
  }