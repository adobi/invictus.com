<?php 

if (! defined('BASEPATH')) exit('No direct script access');

class Games extends MY_Model 
{
    protected $_name = "c_game";
    protected $_primary = "id";
    
    public function fetchActive()
    {
      return $this->fetchRows(array('where'=>array('is_active'=>1)));
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
    
    private function _getByOrder($items, $column, $order) 
    {
      foreach( $items as $item ) {
        if ($item->$column == $order) {
          return $item;
        }
      }
      
      return false;
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

    
    
}