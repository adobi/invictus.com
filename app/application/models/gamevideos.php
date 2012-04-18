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
    public function activate($id) 
    {
      if (!$id) return false;
      
      $item = $this->find($id);
      
      if (!$item) return false;
      $this->update(array('is_on_mainpage'=>null), array('game_id'=>$item->game_id, 'is_on_mainpage'=>1));
      return  $this->update(array('is_on_mainpage'=>1), $id);
    }
    
    public function inactivate($id) 
    {
      if (!$id) return false;
      
      return $this->update(array('is_on_mainpage'=>null), $id);
    }    
}