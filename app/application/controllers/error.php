<?php 

if (! defined('BASEPATH')) exit('No direct script access');

require_once(APPPATH.'core/Error_Controller'.EXT);

class Error extends Error_Controller 
{
  public function __construct()
  {
    parent::__construct();
  }  
  public function missing() 
  {
      $data = array();
      
      $this->template->build('error/index', $data);
  }
}