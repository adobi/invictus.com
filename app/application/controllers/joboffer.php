<?php 

if (! defined('BASEPATH')) exit('No direct script access');

//require_once 'MY_Controller.php';

class Joboffer extends MY_Controller 
{
    public function index() 
    {
        $data = array();
        
        $this->load->model('Joboffers', 'model');
        
        $data['items'] = $this->model->fetchAll();
        
        $this->template->build('joboffer/index', $data);
    }
    
    public function edit() 
    {
        $data = array();
        
        $id = $this->uri->segment(3);
        
        $this->load->model('Joboffers', 'model');
        
        $item = false;
        if ($id && is_numeric($id)) {
            $item = $this->model->find((int)$id);
            $jobId = $this->uri->segment(5);
        } else {
          $jobId = $this->uri->segment(4);
        }
        $data['item'] = $item;
        
        $this->form_validation->set_rules("description", "Description", "trim|required");
		
        
        if ($this->form_validation->run()) {
        
            if ($id) {
                $this->model->update($_POST, $id);
            } else {
                $_POST['job_id'] = $jobId;
                $this->model->insert($_POST);
            }
            redirect($_SERVER['HTTP_REFERER']);
        }
        $this->template->build('joboffer/edit', $data);
    }
    
    public function delete()
    {
        $id = $this->uri->segment(3);
        
        if ($id) {
            $this->load->model('Joboffers', 'model');
            
            $this->model->delete($id);
        }
        
        redirect($_SERVER['HTTP_REFERER']);
    }
}