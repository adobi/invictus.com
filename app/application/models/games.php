<?php 

if (! defined('BASEPATH')) exit('No direct script access');

class Games extends MY_Model 
{
    protected $_name = "c_game";
    protected $_primary = "id";
    
    public function fetchAllWithPlatforms()
    {
      $items = $this->fetchAll();
      
      if (!$items) return false;
      
      $this->load->model('Gameplatforms', 'gameplatform');
      
      foreach ($items as $item) {
        $item->platforms = $this->gameplatform->fetchIdsForGame($item->id);
      }
      //dump($items); die;
      return $items;
    }
    
    public function fetchActive()
    {
      return $this->fetchRows(array('where'=>array('is_active'=>1)));
    }
    
    public function fetchAllActiveWithPlatforms()
    {
      $items = $this->fetchActive();
      
      if (!$items) return false;
      
      $this->load->model('Gameplatforms', 'gameplatform');
      
      foreach ($items as $item) {
        $item->platforms = $this->gameplatform->fetchIdsForGame($item->id);
      }
      //dump($items); die;
      return $items;
    }
    
    public function fetchLastReleased() 
    {
      $result = $this->fetchAll(array('order'=>array('by'=>'released', 'dest'=>'desc'), 'limit'=>1, 'offset'=>0), true);
      
      if (!$result) return false;
      
      $this->load->model('Gameplatforms', 'gameplatforms');
      
      $result->platforms = $this->gameplatforms->fetchForGame($result->id);
      
      return $result;
    }
    
    public function activate($id) 
    {
      if (!$id) return false;
      
      return $this->update(array('is_active'=>1), $id);
    }
    
    public function inactivate($id) 
    {
      if (!$id) return false;
      
      return $this->update(array('is_active'=>null), $id);
    }

    public function fetchForLayout($section)
    {
      $result = $this->fetchRows(
        array('where'=>array("is_$section"=>1), 
              'order'=>array('by'=>"order_$section", 'dest'=>'asc'))
      );
      
      $d = array();
      $max = ($section === 'on_mainpage' ? 4 : 5);
      for ( $i=0; $i < $max; $i++ ) {
        $d[$i] = $this->_getByOrder($result, "order_$section", $i);   
      }
      
      return $d;
    }
    
    public function fetchByUrl($url) 
    {
      return $this->fetchRows(array('where'=>array('url'=>$url)), true);
    }
    
    public function getMeta($url) 
    {
      $game = $this->fetchByUrl($url);
      
      if (!$game) return false;
      
      $this->load->model('Meta', 'meta');
      
      return $this->meta->find($game->meta_id);      
    }
    
    private function _getByOrder($items, $column, $order) 
    {
      foreach( $items as $item ) {
        if ($item->$column == $order) {
          return $item;
        }
      }
      
      return false;
    }
}