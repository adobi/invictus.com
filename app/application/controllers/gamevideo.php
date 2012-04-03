<?php 

if (! defined('BASEPATH')) exit('No direct script access');

//require_once 'MY_Controller.php';

class Gamevideo extends MY_Controller 
{
    public function index() 
    {
        $data = array();
        
        $this->load->model('Gamevideos', 'model');
        
        $data['items'] = $this->model->fetchAll();
        
        $this->template->build('gamevideo/index', $data);
    }
    
    public function edit() 
    {
        $data = array();
        
        $id = $this->uri->segment(3);
        
        $this->load->model('Gamevideos', 'model');
        
        $item = false; $gameId = false;
        if (is_numeric($id)) {
            $item = $this->model->find((int)$id);
            $gameId = $item->game_id;
        } else {
          $gameId = $this->uri->segment(4);
        }
        
        $data['item'] = $item;
        
        $this->load->model('Games', 'game');
        
        $data['game'] = $this->game->find($gameId);        
        
        $this->form_validation->set_rules("description", "Description", "trim|required");
		    $this->form_validation->set_rules("code", "Code", "trim|required");

        if ($this->form_validation->run()) {
        
            $_POST['ga_category'] = "Video";
            $_POST['ga_action'] = "View";
            $_POST['ga_value'] = 1;
            $_POST['ga_label'] = $data['game']->name . ' - ' . $_POST['description'] . ' ' . $_POST['code'] . ' - ' . time();
            
            if (is_numeric($id)) {
              
                $this->model->update($_POST, $id);
            } else {
                $_POST['game_id'] = $gameId;
                
                $this->model->insert($_POST);
            }
            $response = display_success('Saved');
        } else {

            $response = display_errors(validation_errors());
        }

        if ($this->input->is_ajax_request() && $response) {
          
            echo $response;
            die;
        } 
        
        $this->template->build('gamevideo/edit', $data);
    }
    
    public function delete()
    {
        $id = $this->uri->segment(3);
        
        if ($id) {
            $this->load->model('Gamevideos', 'model');
            
            $this->model->delete($id);
        }
        if ($this->input->is_ajax_request()) {
          echo 1; die;
        }
        redirect($_SERVER['HTTP_REFERER']);
    }
    
    public function analytics()
    {
      $id = $this->uri->segment(3);
      
      $this->load->model('Gamevideos', 'model');
      
      $this->template->set_partial('video_analytics', '_partials/analytics', array('prefix'=>'')); 
      
      $data['item'] = $this->model->find($id);
      
      $this->load->model('Games', 'games');
      $data['game'] = $this->games->find($data['item']->game_id);
      
      
      $this->form_validation->set_rules("ga_category", "Page category", "trim|required");
      $this->form_validation->set_rules("ga_action", "Page action", "trim|required");
      $this->form_validation->set_rules("ga_label", "Page label", "trim|required");
      $this->form_validation->set_rules("ga_value", "Page value", "trim|required");

      if ($this->form_validation->run()) {
        
        $this->model->update($_POST, $id);
        
        echo 'Saved'; die;
      } else {
        if ($_POST) {
          
          echo validation_errors(); die;
        }
      }
                
      $this->template->build('gamevideo/analytics', $data);
    }     
}