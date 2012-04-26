<?php 

if (! defined('BASEPATH')) exit('No direct script access');

class Gameplatform extends MY_Controller 
{
    public function index() 
    {
        $data = array();
        
        $this->load->model('Gameplatforms', 'model');
        
        $data['items'] = $this->model->fetchAll();
        
        $this->template->build('/index', $data);
    }
    
    public function edit() 
    {
        $data = array();
        
        $id = $this->uri->segment(3);

        $this->load->model('Platforms', 'platform');
        
        $this->load->model('Gameplatforms', 'model');
        
        $item = false; $gameId = false;
        if (is_numeric($id)) {
            $item = $this->model->find((int)$id);
            $gameId = $item->game_id;
        } else {
          $gameId = $this->uri->segment(4);
        }

        $data['platforms'] = $this->platform->toAssocArray('id', 'name', (!$item ? $this->platform->fetchAvailableForGame($gameId) : $this->platform->fetchAll()));
        
        $data['item'] = $item;
        
        $this->load->model('Games', 'game');
        
        $data['game'] = $this->game->find($gameId);
        
    		$this->form_validation->set_rules("platform_id", "Platform", "trim|required");
    		//$this->form_validation->set_rules("url", "Url", "trim|required");        
    		//$this->form_validation->set_rules("long_url", "Long url", "trim|required");        
        
        if ($this->form_validation->run()) {
        
            if (is_numeric($id)) {
                $this->model->update($_POST, $id);
            } else {
                $_POST['game_id'] = $gameId;

                $inserted = $this->model->insert($_POST);
                
                $id = $inserted;
            }
            
             $this->model->setupAnalytics($id);
            
            $response = display_success('Saved');
        } else {

            $response = display_errors(validation_errors());
        }

        if ($this->input->is_ajax_request() && $response) {
          
            echo $response;
            die;
        } 
        
        $this->template->build('gameplatform/edit', $data);
    }
    
    public function delete()
    {
        $id = $this->uri->segment(3);
        
        if ($id) {
            $this->load->model('Gameplatforms', 'model');
            
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
      
      $this->load->model('Gameplatforms', 'model');
      if (is_numeric($id))
        $data['the_item'] = $this->model->find($id);
      
      $this->load->model('Games', 'game');
      
      if (is_numeric($id))
        $data['game'] = $this->game->find($data['the_item']->game_id);
      
      $this->load->model('Gameplatformanalytics', 'analytics');
      
      $analytics = $this->analytics->fetchForGamePlatform($id);
      
      //$data['analytics'] = $analytics;
      
      $this->template->set_partial('game_platform_analytics', '_partials/analytics_multi', array('prefix'=>'', 'analytics'=>$analytics)); 
      
  		$this->form_validation->set_rules("ga_category", "Platform category", "trim|required");
  		$this->form_validation->set_rules("ga_action", "Platform action", "trim|required");
  		$this->form_validation->set_rules("ga_label", "Platform label", "trim|required");
  		//$this->form_validation->set_rules("ga_label_pp", "Platform label product page", "trim|required");
  		$this->form_validation->set_rules("ga_value", "Platform value", "trim|required");
      
  		if ($this->form_validation->run()) {
  		  
  		  $this->analytics->update($_POST, $this->uri->segment(4));
  		  
  		  echo 'Saved'; die;
  		} else {
  		  if ($_POST) {
  		    
  		    echo validation_errors(); die;
  		  }
  		}
  		
      $this->template->build('gameplatform/analytics', $data);
    }     
}