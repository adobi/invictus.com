<?php 

if (! defined('BASEPATH')) exit('No direct script access');

//require_once 'MY_Controller.php';

class Crosspromo extends MY_Controller 
{
    public function index() 
    {
      $data = array();
      
      $this->load->model('Games', 'model');
      $games = $this->model->fetchWithCrosspromo();
      $data['games_select'] = $this->model->toAssocArray('id', 'name+count', $games);
      $data['games'] = $games;
      
      $this->template->build('crosspromo/index', $data);
    }
    
    public function edit() 
    {
      $id = $this->uri->segment(3);
      
      $this->form_validation->set_rules('promo_game_id', 'Promo game', 'trim|required');
      
      if ($this->form_validation->run()) {
        
        $this->load->model("Crosspromos", 'model');
        
        /*
          TODO generate analytics
        */
        
        $this->model->setupAnalytics($this->session->userdata('selected_game'), $_POST['promo_game_id'], $_POST);
        
        if ($id && $id !== "0") {
          
          $this->model->update($_POST, $id);
          
        } else {
          
          $_POST['base_game_id'] = $this->session->userdata('selected_game');
          
          echo $this->model->insert($_POST);
        }
      }
      
      die;
    }
    
    public function for_game()
    {
      $data = array();
      
      $this->load->model('Crosspromos', 'model');
      
      $this->session->set_userdata('selected_game', $this->uri->segment(3)); 
      
      $data['games'] = $this->model->fetchByGame($this->uri->segment(3));
      //dump($data['games']); die;
      $this->template->build('crosspromo/for_game', $data);
    }
    
    public function update_order()
    {
        if ($_POST && isset($_POST['order'])) {
            
            $this->load->model('Crosspromos', 'model');
            
            foreach ($_POST['order'] as $order => $id) {
              if ($id)
                $this->model->update(array('order'=>$order), $id);
            }
        }
        
        die;
    } 
    
    public function delete()
    {
        $id = $this->uri->segment(3);
        
        if ($id) {
            $this->load->model('Crosspromos', 'model');
            
            $this->model->delete($id);
        }
        
        //redirect($_SERVER['HTTP_REFERER']);
        die;
    } 
    
    public function generate_analytics()
    {
      $this->load->model('Crosspromos', 'model');
      
      $promos = $this->model->fetchAll();
      
      if ($promos) {
        
        foreach ($promos as $item) {
          $data = array();
          
          $data = $this->model->setupAnalytics($item->base_game_id, $item->promo_game_id, $data);
          
          $this->model->update($data, $item->id);
        }
      }
      redirect($_SERVER['HTTP_REFERER']);
    }        
}