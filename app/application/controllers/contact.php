<?php 

if (! defined('BASEPATH')) exit('No direct script access');

//require_once 'MY_Controller.php';

class Contact extends MY_Controller 
{
    public function index() 
    {
        $data = array();
        
        $this->load->model('Contacts', 'model');
         $this->load->model('Contacttypes', 'types');
        
        $data['items_contacts'] = $this->model->fetchAll();
        $data['items_emails'] = $this->types->fetchAll(array('order'=>array('by'=>'order', 'dest'=>'asc')));
        
        $this->template->build('contact/index', $data);
    }
    
    public function edit() 
    {
        $data = array();
        
        $id = $this->uri->segment(3);
        
        $this->load->model('Contacts', 'model');
        
        $item = false;
        if ($id) {
            $item = $this->model->find((int)$id);
        }
        $data['item'] = $item;
        
        $this->form_validation->set_rules("name", "Name", "trim|required");
    		$this->form_validation->set_rules("location", "Location", "trim|required");
    		$this->form_validation->set_rules("address", "Address", "trim|required");
    		$this->form_validation->set_rules("phone", "Phone", "trim|required");
    		$this->form_validation->set_rules("fax", "Fax", "trim|required");
    		$this->form_validation->set_rules("email", "Email", "trim|required|valid_email");
		
        
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
        
        $this->template->build('contact/edit', $data);
    }
    
    public function delete()
    {
        $id = $this->uri->segment(3);
        
        if ($id) {
            $this->load->model('Contacts', 'model');
            
            $this->model->delete($id);
        }
        
        redirect($_SERVER['HTTP_REFERER']);
    }
}