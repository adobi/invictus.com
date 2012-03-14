<?php 

if (! defined('BASEPATH')) exit('No direct script access');

class Offers extends MY_Model 
{
    protected $_name = "ic_offer";
    protected $_primary = "id";
    
    public function close($id) 
    {
      if (!$id) return false;
      
      return $this->update(array('to_date'=>date('Y-m-d H:i:s', time())), $id);
    }
    
    public function fetchCurrent()
    {
      //return $this->fetchRows(array('where'=>array('CURDATE() BETWEEN from_date and to_date'=>null)));
      
      return $this->execute("select o.*, (select count(id) from ic_email_offer where offer_id = o.id) as email_count from $this->_name o where CURRENT_TIMESTAMP() BETWEEN o.from_date and o.to_date");
    }
    
    public function fetchOld() 
    {
      //return $this->fetchRows(array('where'=>array('CURDATE() NOT BETWEEN from_date and to_date'=>null)));
      return $this->execute("select o.*, (select count(id) from ic_email_offer where offer_id = o.id) as email_count from $this->_name o where CURRENT_TIMESTAMP() NOT BETWEEN o.from_date and o.to_date");
    }
    
}