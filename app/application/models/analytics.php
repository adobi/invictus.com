<?php 

if (! defined('BASEPATH')) exit('No direct script access');

class Analytics extends MY_Model 
{
    protected $_name = "ic_analytics";
    protected $_primary = "id";
    
    public function fetchByGame($id) 
    {
      if (!$id) return false;
      
      $result = $this->fetchBy('game_id', $id);
      
      if (!$result) return false;
      
      $return = array();
      foreach ($result as $r) {
        $return[$r->type] = $r;
      }
      
      return $return;
    }
}