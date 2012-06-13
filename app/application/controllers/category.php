<?php 

if (! defined('BASEPATH')) exit('No direct script access');

//require_once 'MY_Controller.php';

class Category extends MY_Controller 
{
    public function index() 
    {
        $data = array();
        
        $this->load->model('Categorys', 'model');
        
        $data['items'] = $this->model->fetchAll();
        
        $this->template->build('category/index', $data);
    }
    
    public function edit() 
    {
        $data = array();
        
        $id = $this->uri->segment(3);
        
        $this->load->model('Categorys', 'model');
        
        $item = false;
        if ($id) {
            $item = $this->model->find((int)$id);
        }
        $data['item'] = $item;
        
        $this->form_validation->set_rules("name", "Name", "trim|required");
		
        $response = array();
        
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
        
        $this->template->build('category/edit', $data);
    }
    
    public function delete()
    {
        $id = $this->uri->segment(3);
        
        if ($id) {
            $this->load->model('Categorys', 'model');
            
            $this->model->delete($id);
        }
        die;
        //redirect($_SERVER['HTTP_REFERER']);
    }
}