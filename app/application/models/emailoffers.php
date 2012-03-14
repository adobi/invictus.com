<?php 

if (! defined('BASEPATH')) exit('No direct script access');

class Emailoffers extends MY_Model 
{
    protected $_name = "ic_email_offer";
    protected $_primary = "id";
    
    public function fetchForOffer($id)
    {
      if(!$id) return false;
      
      return $this->fetchRows(array('where'=>array('offer_id'=>$id)));
    }
}