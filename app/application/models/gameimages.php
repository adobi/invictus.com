<?php 

if (! defined('BASEPATH')) exit('No direct script access');

class Gameimages extends MY_Model 
{
    protected $_name = "c_game_image";
    protected $_primary = "id";
    
    public function fetchForGame($gameId) 
    {
      if (!$gameId) return false;
      
      return $this->fetchRows(array('where'=>array('game_id'=>$gameId)));
    }      
}