<?php 

if (! defined('BASEPATH')) exit('No direct script access');

//require_once 'MY_Controller.php';

class Jobapplication extends MY_Controller 
{
    public function index() 
    {
        $data = array();
        
        $this->load->model('Jobapplications', 'model');
        
        $data['items'] = $this->model->fetchAll();
        
        $this->template->build('jobapplication/index', $data);
    }
    
    public function edit() 
    {
        $data = array();
        
        $id = $this->uri->segment(3);
        
        $this->load->model('Jobapplications', 'model');
        
        $item = false;
        if ($id) {
            $item = $this->model->find((int)$id);
        }
        $data['item'] = $item;
        
        $this->form_validation->set_rules("job_id", "Job_id", "trim|required");
    		$this->form_validation->set_rules("name", "Name", "trim|required");
    		$this->form_validation->set_rules("email", "Email", "trim|required|valid_email");
    		$this->form_validation->set_rules("cv", "Cv", "trim|required");
    		$this->form_validation->set_rules("phone", "Phone", "trim|required");
    		$this->form_validation->set_rules("portfolio", "Portfolio", "trim|required");
		
        
        if ($this->form_validation->run()) {
        
            if ($id) {
                $this->model->update($_POST, $id);
            } else {
                $this->model->insert($_POST);
            }
            redirect($_SERVER['HTTP_REFERER']);
        }
        $this->template->build('jobapplication/edit', $data);
    }
    
    public function delete()
    {
        $id = $this->uri->segment(3);
        
        if ($id) {
            $this->load->model('Jobapplications', 'model');
            
            $this->model->delete($id);
        }
        
        redirect($_SERVER['HTTP_REFERER']);
    }
    
    public function called()
    {
      $id = $this->uri->segment(3);
      
      $this->load->model('Jobapplications', 'model');
      
      $this->model->update(array('called'=>1), $id);
      
      die;
    }
    
    public function not_called()
    {
      $id = $this->uri->segment(3);
      
      $this->load->model('Jobapplications', 'model');
      
      $this->model->update(array('called'=>null), $id);
      
      die;
    }

}