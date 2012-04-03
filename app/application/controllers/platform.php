<?php 

if (! defined('BASEPATH')) exit('No direct script access');

//require_once 'MY_Controller.php';

class Platform extends MY_Controller 
{
    public function index() 
    {
        $data = array();
        
        $this->load->model('Platforms', 'model');
        
        $data['items'] = $this->model->fetchAll();
        
        $this->template->build('platform/index', $data);
    }
    
    public function edit() 
    {
        $data = array();
        
        $id = $this->uri->segment(3);
        
        $this->load->model('Platforms', 'model');
        
        $item = false;
        if ($id) {
            $item = $this->model->find((int)$id);
        }
        $data['item'] = $item;
        
        $this->form_validation->set_rules("name", "Name", "trim|required");
		    //$this->form_validation->set_rules("icon", "Icon", "trim|required");
		
		    $response = false;
		    
        if ($this->form_validation->run()) {
            if ($this->upload->do_upload('image')) {
                
                if ($id) {
                    
                    $this->_deleteImage($id);
                }
                
                $_POST['image'] = $this->upload->file_name;
            }
                    
            if ($id) {
                
              $this->model->update($_POST, $id);
              
              $this->load->model('Gameplatforms', 'gp');
              
              $this->gp->updateAnalytics($id);  
                
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
          redirect('platform');
        }
        
        $this->template->build('platform/edit', $data);        
    }
    
    public function delete()
    {
        $id = $this->uri->segment(3);
        
        if ($id) {
            $this->load->model('Platforms', 'model');
            
            $this->_deleteImage($id, true);

            $this->model->delete($id);
            
            $this->session->set_flashdata('message', 'Deleted');
        }
        
        redirect($_SERVER['HTTP_REFERER']);
    }
    
    public function delete_image() 
    {
        $id = $this->uri->segment(3);
        
        if ($id) {
            
            $this->_deleteImage($id);
            
            $this->session->set_flashdata('message', 'Deleted');
        }
        
        echo display_success('Deleted');
        
        die;
        
        //redirect($_SERVER['HTTP_REFERER']);
    }  
    
    private function _deleteImage($id, $withRecord = false) 
    {
        $this->load->model('Platforms', 'model');
        
        $item = $this->model->find($id);
        
        if ($item && $item->image) {
            $this->load->config('upload');
            
            @unlink($this->config->item('upload_path') . $item->image);
        }
        
        if (!$withRecord) {
            
            $this->model->update(array('image'=>null), $id);
        }
        
        return $withRecord ? $this->model->delete($id) : true;
    }        
    
}