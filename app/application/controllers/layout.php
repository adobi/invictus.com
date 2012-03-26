<?php 

if (! defined('BASEPATH')) exit('No direct script access');

//require_once 'MY_Controller.php';

class Layout extends MY_Controller 
{
    public function index() 
    {
      $data = array();
      
      $this->load->model('Games', 'model');
      
      $data['in_more_games'] = $this->model->fetchForLayout('in_more_games');
      $data['on_mainpage'] = $this->model->fetchForLayout('on_mainpage');
      $data['in_footer'] = $this->model->fetchForLayout('in_footer');
      
      $this->template->build('layout/index', $data);
    }
}