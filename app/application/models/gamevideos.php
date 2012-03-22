<?php 

if (! defined('BASEPATH')) exit('No direct script access');

class Gamevideos extends MY_Model 
{
    protected $_name = "c_game_video";
    protected $_primary = "id";
    
    public function fetchForGame($gameId) 
    {
      if (!$gameId) return false;
      
      return $this->fetchRows(array('where'=>array('game_id'=>$gameId)));
    }    
}