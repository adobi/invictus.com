<?php 

if (! defined('BASEPATH')) exit('No direct script access');

class Gameimages extends MY_Model 
{
    protected $_name = "c_game_image";
    protected $_primary = "id";
    
    public function fetchForGame($gameId, $public = false) 
    {
      if (!$gameId) return false;
      
      $param = array('game_id'=>$gameId);
      
      if ($public) {
        $param['path is not null'] = null;
      }
      
      $return = $this->fetchRows(array('where'=>$param));
      
      //$return = $this->fetchBy('game_id', $gameId);
      
      return $return;
    }      
}