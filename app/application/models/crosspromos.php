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
        array('where'=>array("base_game_id"=>$id, 'c_game.is_active'=>1), 
              'join'=>array(array('table'=>'c_game', 'condition'=>'c_game.id = promo_game_id', 'columns'=>array('c_game.name, c_game.logo, c_game.url'))),
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
    
    public function setupAnalytics($srcGameId, $destGameId, &$return)
    {
      /*
        product page cross promo a másik product page-re	játék_neve	játék neve	cross_promo	fájl_név	timestamp	Outbound link	Click																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																								

      */
      
      $this->load->model('Games', 'games');
      $src = $this->games->find($srcGameId);
      $dest = $this->games->find($destGameId);
      
      $return['ga_category'] = 'Inbound link';
      $return['ga_label'] = $src->name.' - '.$dest->name.' - Crosspromo - '.strip_ext($src->logo);
      $return['ga_action'] = 'Click';
      $return['ga_value'] = 1;      
      
      return $return;
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