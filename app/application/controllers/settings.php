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
        
            if ($this->upload->do_upload('logo')) {
                
                if ($id) {
                    
                    $this->_deleteImage($id, false, 'logo');
                }
                
                $_POST['logo'] = $this->upload->file_name;
            }           
          
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
          redirect('settings');
        }
        
        $this->template->build('settings/edit', $data);
    }
    public function delete_image() 
    {
        $id = $this->uri->segment(3);
        
        if ($id) {
            
            $this->_deleteImage($id, false);
            
            $this->session->set_flashdata('message', 'Deleted');
        }
        
        echo display_success('Deleted');
        
        die;
        
        //redirect($_SERVER['HTTP_REFERER']);
    } 

    private function _deleteImage($id, $withRecord = false) 
    {
        $this->load->model('Settingss', 'model');
        
        $item = $this->model->find($id);
        
        if ($item && $item->logo) {
            $this->load->config('upload');
            
            @unlink($this->config->item('upload_path') . $item->logo);
        }
        
        if (!$withRecord) {
            
            $this->model->update(array('logo'=>null), $id);
        }
        
        return $withRecord ? $this->model->delete($id) : true;
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