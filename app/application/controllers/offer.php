<?php 

if (! defined('BASEPATH')) exit('No direct script access');

//require_once 'MY_Controller.php';

class Offer extends MY_Controller 
{
    public function index() 
    {
        $data = array();
        
        $this->load->model('Offers', 'model');
        
        $data['items'] = $this->model->fetchAll();
        
        $this->template->build('offer/index', $data);
    }
    
    public function edit() 
    {
        $data = array();
        
        $id = $this->uri->segment(3);
        
        $this->load->model('Offers', 'model');
        $item = false;
        if ($id) {
            $item = $this->model->find((int)$id);
        }
        $data['item'] = $item;
        
        $this->form_validation->set_rules("description", "Description", "trim|required");
      	$this->form_validation->set_rules("from_date", "From date", "trim|required");
      	$this->form_validation->set_rules("to_date", "To date", "trim|required");
        
		    $response = false;
		    
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
          redirect('offer');
        }        
        $this->template->build('offer/edit', $data);
    }
    
    public function delete()
    {
        $id = $this->uri->segment(3);
        
        if ($id) {
            $this->load->model('Offers', 'model');
            
            $this->model->delete($id);
        }
        
        redirect($_SERVER['HTTP_REFERER']);
    }
}