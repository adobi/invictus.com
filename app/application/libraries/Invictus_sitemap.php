<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Invictus_sitemap
{
  protected $_ci;
  
  public function __construct()
  {
    $this->_ci = & get_instance();
  }  
  
  public function generate()
  {
    $this->_ci->load->library('sitemap');
    $this->_ci->load->helper('url');
    $this->_ci->load->model('Games', 'games');
    
    $games = $this->_ci->games->fetchActive();
    
    $items = array();
    $items[] = array('loc'=>base_url().'pages/contact');
    $items[] = array('loc'=>base_url().'pages/jobs');
    $items[] = array('loc'=>'http://privacy.invictus.com/');
    if ($games) {
      $items[] = array('loc'=>base_url().'games/all');
      foreach ($games as $item) {
        $items[] = array('loc'=>base_url().'games/'.$item->url);
      }
      
      //header("Content-Type: application/xml");
      $this->_ci->sitemap->generate($items, dirname($_SERVER['SCRIPT_FILENAME']).'/sitemap.xml');
    }    
  }
  
}