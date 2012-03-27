<?php 

if (! defined('BASEPATH')) exit('No direct script access');

require_once(APPPATH.'core/Page_Controller'.EXT);

class Pages extends Page_Controller 
{
  public function __construct()
  {
    parent::__construct();
  }
  
  public function index()
  {
    $this->template->build('invictus/index');
  }
  
  public function contact()
  {
    $this->template->build('invictus/contact');
  }
  
  public function jobs()
  {
    $this->template->build('invictus/jobs');
  } 
  
  public function game() 
  {
    $this->template->build('invictus/game');
  }
}