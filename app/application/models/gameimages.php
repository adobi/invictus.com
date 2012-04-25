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
          'images' => $this->fetchRows(array(
            'columns'=>array('SUBSTR(path, 12, LENGTH(path)) as original'), 
            'where'=>array('game_id'=>$id, 'platform_id'=>$platform->platform_id),
            'order'=>array('by'=>'original', 'dest'=>'asc')
          ), false, true, true),
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
    
    public function copyToPlatform($image, $platform) 
    {
      if (!$image || !$platform) return false;
      
      $img = $this->find($image);
      
      if (!$img) return false;
      
      $this->_copyImage($img, $platform);
    }
    
    public function copyAllToPlatform($game, $platform) 
    {
      if (!$game || !$platform) return false;
      
      $items = $this->fetchForGame($game);
      
      if (!$items) return false;
      
      foreach ($items as $img) {
        $this->_copyImage($img, $platform);
      }
    }
    
    private function _copyImage($item, $platform) 
    {
      $newPath = $this->_rename($item->path);
      $newHDPath = $this->_rename($item->hd_path);
      
      $this->load->config('upload');
      
      $dir = $this->config->item('upload_path');
      
      $data = array();
      foreach ($item as $k=>$v) {
        if ($k !== 'id')
          $data[$k] = $v;
      }
      
      $data['platform_id'] = $platform;
      $data['path'] = $newPath;
      $data['hd_path'] = $newHDPath;
      
      $this->insert($data);
      
      @copy($dir.$item->path, $dir.$newPath);
      @copy($dir.$item->hd_path, $dir.$newHDPath);
      
    }
    
    private function _rename($image) 
    {
      if ($image) {
        $path = explode('_', $image);
        
        $path[0] = time();
        sleep(1);
        return implode('_', $path);
      }
      return false;
    }
    
    public function fetchByGameAndPlatform($game, $platform) 
    {
      if (!$game || !$platform) return false;
      
      return $this->fetchRows(array('where'=>array('game_id'=>$game, 'platform_id'=>$platform)));
    }
    
    public function addAllToPlatform($game, $platform)
    {
      if (!$game || !$platform) return false;
      
      return $this->update(array('platform_id'=>$platform), array('game_id'=>$game));
    }
}