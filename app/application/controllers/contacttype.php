<?php 

if (! defined('BASEPATH')) exit('No direct script access');

//require_once 'MY_Controller.php';

class Contacttype extends MY_Controller 
{
    public function index() 
    {
        $data = array();
        
        $this->load->model('Contacttypes', 'model');
        
        $data['items'] = $this->model->fetchAll();
        
        $this->template->build('contacttype/index', $data);
    }
    
    public function edit() 
    {
        $data = array();
        
        $id = $this->uri->segment(3);
        
        $this->load->model('Contacttypes', 'model');
        
        $item = false;
        if ($id) {
            $item = $this->model->find((int)$id);
        }
        $data['item'] = $item;
        
        $this->form_validation->set_rules("name", "Name", "trim|required");
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
        
        $this->template->build('contacttype/edit', $data);
    }
    
    public function delete()
    {
        $id = $this->uri->segment(3);
        
        if ($id) {
            $this->load->model('Contacttypes', 'model');
            
            $this->model->delete($id);
        }
       if ($this->input->is_ajax_request()) {
          
            echo $response;
            die;
        }        
        redirect($_SERVER['HTTP_REFERER']);
    }
    
    public function analytics()
    {
      $id = $this->uri->segment(3);
      
      $this->load->model('Contacttypes', 'model');
      
      $this->template->set_partial('send_email_analytics', '_partials/analytics', array('prefix'=>'')); 
      
      $data['item'] = $this->model->find($id);
      
  		$this->form_validation->set_rules("ga_category", "Contact type category", "trim|required");
  		$this->form_validation->set_rules("ga_action", "Contact type action", "trim|required");
  		$this->form_validation->set_rules("ga_label", "Contact type label", "trim|required");
  		$this->form_validation->set_rules("ga_value", "Contact type value", "trim|required");
      
  		if ($this->form_validation->run()) {
  		  
  		  $this->model->update($_POST, $id);
  		  
  		  echo 'Saved'; die;
  		} else {
  		  if ($_POST) {
  		    
  		    echo validation_errors(); die;
  		  }
  		}
  		
      $this->template->build('contacttype/analytics', $data);
    }  
    
    public function update_order()
    {
        if ($_POST && isset($_POST['order'])) {
            
            $this->load->model('Contacttypes', 'model');
            
            foreach ($_POST['order'] as $order => $id) {
                $this->model->update(array('order'=>$order), $id);
            }
        }
        
        die;
    }      
}