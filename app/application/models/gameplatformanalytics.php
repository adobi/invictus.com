<?php 

if (! defined('BASEPATH')) exit('No direct script access');

class Gameplatformanalytics extends MY_Model 
{
    protected $_name = "ic_game_platorm_analyitcs";
    protected $_primary = "id";
    
    public function fetchForGamePlatform($id) 
    {
      if (!$id) return false;
      
      return $this->fetchRows(array('where'=>array('game_platform_id'=>$id)));
    }
}