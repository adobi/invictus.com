<?php 

if (! defined('BASEPATH')) exit('No direct script access');

require_once(APPPATH.'core/Page_Controller'.EXT);

class Api extends Page_Controller 
{
  public function __construct()
  {
    parent::__construct();
  }
  
  public function platforms()
  {
    $this->load->model('Platforms', 'platforms');
    
    $platforms = $this->platforms->fetchAll();
    
    if ($platforms) {
      
      foreach ($platforms as $item) {
        $item->image = base_url() . 'uploads/original/'.$item->image;
      }
    } else {
      $platforms = array();
    }
    
    echo json_encode($platforms);
    die;
  }
  
}