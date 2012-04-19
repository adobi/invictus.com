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
    public function activate($id, $col) 
    {
      if (!$id || !$col) return false;
      
      $col = 'is_'.$col;
      
      $item = $this->find($id);
      
      if (!$item) return false;
      $this->update(array($col=>null), array('game_id'=>$item->game_id, $col=>1));
      return  $this->update(array($col=>1), $id);
    }
    
    public function inactivate($id, $col) 
    {
      if (!$id || !$col) return false;
      
      $col = 'is_'.$col;
      
      return $this->update(array($col=>null), $id);
    }    
    
    public function fetchOnSectionForGame($gameId, $section) 
    {
      if (!$gameId) return false;
      
      $result = $this->fetchRows(array('where'=>array('game_id'=>$gameId, 'is_'.$section=>'1')));
      
      return $result ? $result[0] : false;
    }
}