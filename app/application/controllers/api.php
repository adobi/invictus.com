<?php 

if (! defined('BASEPATH')) exit('No direct script access');

require_once(APPPATH.'core/Page_Controller'.EXT);

class Api extends Page_Controller 
{
  public function __construct()
  {
    parent::__construct();
  }
  
  public function index() 
  {
    $this->template->build('api/index', $this->data);
  }
  
  public function platforms()
  {
    $this->load->model('Platforms', 'platforms');
    
    $platforms = $this->platforms->fetchAll();
    
    if ($platforms) {
      
      foreach ($platforms as $item) {
        $item->image_name = $item->image;
        $item->image = base_url() . 'uploads/original/'.$item->image;
      }
    } else {
      $platforms = array();
    }
    
    echo json_encode($platforms);
    die;
  }
  
  public function games()
  {
    $this->load->model('Games', 'games');
    $games = $this->games->fetchAll();
    
    if ($games) {
      
      foreach ($games as $item) {
        $item->logo_name = $item->logo;
        $item->logo = base_url() . 'uploads/original/'.$item->logo_name;
      }
      
    } else {
      $games = array();
    }
    
    echo json_encode($games);
    
    die;
  }
  
  public function game_platforms()
  {
    $this->load->model('Gameplatforms', 'model');
    
    $platforms = $this->model->fetchAll();
    
    echo json_encode($platforms);
    
    die;
  }
  
  public function categories()
  {
    $this->load->model('Categorys', 'model');
    
    $categories = $this->model->fetchAll();
    
    echo json_encode($categories);
    
    die;
  }
  
  
}