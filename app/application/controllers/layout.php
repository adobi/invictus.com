<?php 

if (! defined('BASEPATH')) exit('No direct script access');

//require_once 'MY_Controller.php';

class Layout extends MY_Controller 
{
    public function index() 
    {
      $data = array();
      
      $this->template->build('layout/index', $data);
    }
}