<?php 

if (! defined('BASEPATH')) exit('No direct script access');

class Crosspromos extends MY_Model 
{
    protected $_name = "ic_crosspromo";
    protected $_primary = "id";
    
    public function fetchByGame($id) 
    {
      if (!$id) return false;

      $result = $this->fetchRows(
        array('where'=>array("base_game_id"=>$id), 
              'join'=>array(array('table'=>'c_game', 'condition'=>'c_game.id = promo_game_id', 'columns'=>array('c_game.name, c_game.logo'))),
              'order'=>array('by'=>"order", 'dest'=>'asc'))
      );
      
      $d = array();
      $max = 5;
      for ( $i=0; $i < $max; $i++ ) {
        $d[$i] = $this->_getByOrder($result, "order", $i);   
      }
      //dump($d); die;
      return $d;
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