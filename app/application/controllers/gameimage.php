<?php 

if (! defined('BASEPATH')) exit('No direct script access');

//require_once 'MY_Controller.php';

class Gameimage extends MY_Controller 
{
    public function index() 
    {
        $data = array();
        
        $this->load->model('Gameimages', 'model');
        
        $data['items'] = $this->model->fetchAll();
        
        $this->template->build('gameimage/index', $data);
    }
    
    public function edit() 
    {
        $data = array();
        
        $id = $this->uri->segment(3);
        
        $this->load->model('Gameimages', 'model');
        
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
                
        $this->template->build('gameimage/edit', $data);
    }
    
    public function delete()
    {
        $id = $this->uri->segment(3);
        
        if ($id) {
            //$this->load->model('Gameimages', 'model');
            
            //$this->model->delete($id);
            $this->_deleteImage($id, true);
        }
        if ($this->input->is_ajax_request()) {
          die;
        }        
        redirect($_SERVER['HTTP_REFERER']);

    }
    
    public function upload_for_game()
    {
      
      //dump($_FILES); die;
      
        if ($this->upload->do_upload('userfile')) {
          
          $this->load->config('upload');
          
          $data = $this->upload->data();

          $this->load->model('Gameimages', 'model');
          
          $this->load->model("Games", 'games');
          
          $game = $this->games->find($this->uri->segment(3));
          
          $inserted = $this->model->insert(array(
              'game_id'=>$this->uri->segment(3),
              'path'=>$data['file_name'],
              'ga_category'=>'Image',
              'ga_action'=>'View',
              'ga_value'=>1,
              'ga_label'=>$game->name.' - image - ' . $data['file_name']
          ));
          
          $info->name = $data['file_name'];
          $info->size = $data['file_size'];
          $info->type = $data['file_type'];
          $info->url = base_url() . 'uploads/original/' .$data['file_name'];
          $info->thumbnail_url = base_url() . 'uploads/original/' .$data['file_name'];
          $info->delete_url = base_url().'gameimage/delete/'.$inserted;
          $info->delete_type = 'GET';
          $info->image_id = $inserted;	 
          
          if ($this->input->is_ajax_request()) {
              echo json_encode(array($info));
          } 
        }
	  	
      die;      
    }
    
    public function analytics()
    {
      $id = $this->uri->segment(3);
      
      $this->load->model('Gameimages', 'model');
      
      $this->template->set_partial('image_analytics', '_partials/analytics', array('prefix'=>'')); 
      
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
                
      $this->template->build('gameimage/analytics', $data);
    }   
    
    private function _deleteImage($id, $withRecord = false) 
    {
        $this->load->model('Gameimages', 'model');
        
        $item = $this->model->find($id);
        
        if ($item && $item->path) {
            $this->load->config('upload');
            
            @unlink($this->config->item('upload_path') . $item->path);
        }
        
        if (!$withRecord) {
            
            $this->model->update(array('path'=>null), $id);
        }
        
        return $withRecord ? $this->model->delete($id) : true;
    }       
}