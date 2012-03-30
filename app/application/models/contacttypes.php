<?php 

if (! defined('BASEPATH')) exit('No direct script access');

class Contacttypes extends MY_Model 
{
    protected $_name = "ic_contact_type";
    protected $_primary = "id";
    
    public function fetchEmailsWithMessageCount()
    {
      return $this->execute("select t.*, (select count(id) from ic_contact_message where email_id = t.id and is_read is null) as messages from $this->_name as t order by `order` asc");
    }
}