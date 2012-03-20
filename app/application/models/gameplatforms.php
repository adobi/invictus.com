<?php 

if (! defined('BASEPATH')) exit('No direct script access');

class Gameplatforms extends MY_Model 
{
    protected $_name = "c_game_platform";
    protected $_primary = "id";
    
    public function fetchForGame($gameId) 
    {
      if (!$gameId) return false;
      
      return $this->fetchRows(array('where'=>array('game_id'=>$gameId)));
    }
    
    public function fetchIdsForGame($gameId)
    {
      $platforms = $this->fetchForGame($gameId);
      
      if (!$platforms) return false;
      
      $return = array();
      foreach ($platforms as $item) $return[] = $item->platform_id;
      
      return $return;
    }
    
    public function deleteByGame($gameId) 
    {
      if (!$gameId) return false;
      
      return $this->delete(array('game_id'=>$gameId));
    }
    
    public function insertPlatformsForGame($gameId, $platforms) 
    {
      if (!$gameId || !$platforms) return false;
      
      $this->load->model('Games', 'game');
      $this->load->model('Platforms', 'platform');
      
      $game = $this->game->find($gameId);
      
      if (!$game) return false;
      
      foreach ($platforms as $p) {
        $platform = $this->model->find($p);
        $this->insert(array(
          'game_id'=>$gameId, 
          'platform_id'=>$p,
          'ga_category'=>'Store',
          'ga_action'=>'Click',
          'ga_value'=>1,
          'ga_label'=>$game->name . ' - ' . $platform->name,
        ));
      }
      
      return true;
    }
}

