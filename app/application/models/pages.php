<?php 

if (! defined('BASEPATH')) exit('No direct script access');

class Pages extends MY_Model 
{
    protected $_name = "ic_page";
    protected $_primary = "id";
    
    public function getMeta($name)
    {
      
      $page = $this->fetchRows(array('where'=>array('name'=>$name ? $name : 'Home')), true);
      //dump($page);
      if (!$page) return false;
      
      $this->load->model('Meta', 'meta');
      
      return $this->meta->find($page->meta_id);
    }
}