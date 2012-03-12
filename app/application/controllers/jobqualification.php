<?php 

if (! defined('BASEPATH')) exit('No direct script access');

//require_once 'MY_Controller.php';

class Jobqualification extends MY_Controller 
{
    public function index() 
    {
        $data = array();
        
        $this->load->model('Jobqualifications', 'model');
        
        $data['items'] = $this->model->fetchAll();
        
        $this->template->build('jobqualification/index', $data);
    }
    
    public function edit() 
    {
        $data = array();
        
        $id = $this->uri->segment(3);
        
        $this->load->model('Jobqualifications', 'model');
        
        $item = false;
        if ($id) {
            $item = $this->model->find((int)$id);
        }
        $data['item'] = $item;
        
        $this->form_validation->set_rules("job_id", "Job_id", "trim|required");
		$this->form_validation->set_rules("description", "Description", "trim|required");
		
        
        if ($this->form_validation->run()) {
        
            if ($id) {
                $this->model->update($_POST, $id);
            } else {
                $this->model->insert($_POST);
            }
            redirect($_SERVER['HTTP_REFERER']);
        }
        $this->template->build('jobqualification/edit', $data);
    }
    
    public function delete()
    {
        $id = $this->uri->segment(3);
        
        if ($id) {
            $this->load->model('Jobqualifications', 'model');
            
            $this->model->delete($id);
        }
        
        redirect($_SERVER['HTTP_REFERER']);
    }
}