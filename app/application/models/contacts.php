<?php 

if (! defined('BASEPATH')) exit('No direct script access');

class Contacts extends MY_Model 
{
    protected $_name = "ic_contact";
    protected $_primary = "id";
    
    public function getAnalytics()
    {
      $ga = new stdClass();
      
      $ga->ga_category = 'Contact';
      $ga->ga_label = 'Contact - button - ' . time();
      $ga->ga_action = 'Send';
      $ga->ga_value = '1';
      $ga->ga_noninteraction = '';
      
      return $ga;
    }
}