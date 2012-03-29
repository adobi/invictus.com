<?php 

if (! defined('BASEPATH')) exit('No direct script access');

//require_once 'MY_Controller.php';

class Settings extends MY_Controller 
{
    public function index() 
    {
        $data = array();
        
        $this->load->model('Settingss', 'model');
        
        $data['items'] = $this->model->fetchAll();
        
        $this->template->build('settings/index', $data);
    }
    
    public function edit() 
    {
        $data = array();
        
        $id = $this->uri->segment(3);
        
        $this->load->model('Settingss', 'model');
        
        $item = false;
        if ($id) {
            $item = $this->model->find((int)$id);
        }
        $data['item'] = $item;
        
        //$this->form_validation->set_rules("logo", "Logo", "trim|required");
    		//$this->form_validation->set_rules("facebook_app_id", "Facebook_app_id", "trim|required");
    		$this->form_validation->set_rules("facebook_page", "Facebook_page", "trim|required");
    		$this->form_validation->set_rules("twitter_id", "Twitter_id", "trim|required");
    		$this->form_validation->set_rules("google_analytics", "Google_analytics", "trim|required");
		
        
        if ($this->form_validation->run()) {
        
            if ($id) {
                $this->model->update($_POST, $id);
            } else {
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
        
        if (!$this->input->is_ajax_request()) {
          $this->session->set_flashdata('message', $response); 
          redirect('contact');
        }
        
        $this->template->build('settings/edit', $data);
    }
    
    public function delete()
    {
        $id = $this->uri->segment(3);
        
        if ($id) {
            $this->load->model('Settingss', 'model');
            
            $this->model->delete($id);
        }
        
        redirect($_SERVER['HTTP_REFERER']);
    }
}