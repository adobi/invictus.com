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
    
    public function fetchForGameByPlatform($id)
    {
      if (!$id) return false;
      
      $this->load->model('Gameplatforms', 'platforms');
      
      $platforms = $this->platforms->fetchForGame($id, false);
      
      if (!$platforms) return false;
      
      $return = array();
      foreach ($platforms as $platform) {
        
        $return[] = array(
          'platform' => $platform,
          'images' => $this->fetchRows(array('where'=>array('game_id'=>$id, 'platform_id'=>$platform->platform_id))),
        );
      }
      
      return $return;
    }
    
    public function fetchForGameWithoutPlatform($id) 
    {
      if (!$id) return false;
      
      return $this->fetchRows(array('where'=>array('game_id'=>$id, '(platform_id is null or platform_id = 0)'=>null)));
    }
    
    public function addToPlatform($image, $platform) 
    {
      if (!$image || !$platform) return false;
      
      return $this->update(array('platform_id'=>$platform), $image);
    }
}