<?php 

if (! defined('BASEPATH')) exit('No direct script access');

//require_once 'MY_Controller.php';

class Job extends MY_Controller 
{
    public function index() 
    {
        $data = array();
        
        $this->load->model('Jobs', 'model');
        
        $data['job_items'] = $this->model->fetchAll();
        
        $this->load->model('Jobcategorys', 'categories');
        
        $data['job_category_items'] = $this->categories->fetchAll();
        
        $this->template->build('job/index', $data);
    }
    
    public function edit() 
    {
        $data = array();
        
        $id = $this->uri->segment(3);
        
        $this->load->model('Jobs', 'model');
        
        $this->load->model('Jobcategorys', 'categories');
        
        $data['job_category_items'] = $this->categories->toAssocArray('id', 'name', $this->categories->fetchAll());        
        
        $item = false;
        if ($id) {
            $item = $this->model->find((int)$id);
        }
        $data['item'] = $item;
        
        
        
        $this->form_validation->set_rules("type", "Type", "trim|required");
    		$this->form_validation->set_rules("category_id", "Category_id", "trim|required");
    		$this->form_validation->set_rules("description", "Description", "trim|required");
    		$this->form_validation->set_rules("responsabilities", "Responsabilities", "trim|required");
    		$this->form_validation->set_rules("qualification", "Qualification", "trim|required");
    		$this->form_validation->set_rules("skills", "Skills", "trim|required");
    		$this->form_validation->set_rules("we_offer", "We_offer", "trim|required");
    		$this->form_validation->set_rules("order", "Order", "trim|required");
    		//$this->form_validation->set_rules("created", "Created", "trim|required");
    		$this->form_validation->set_rules("available", "Available", "trim|required");
    		/*
    		$this->form_validation->set_rules("job_ga_category", "Job_ga_category", "trim|required");
    		$this->form_validation->set_rules("job_ga_action", "Job_ga_action", "trim|required");
    		$this->form_validation->set_rules("job_ga_label", "Job_ga_label", "trim|required");
    		$this->form_validation->set_rules("job_ga_value", "Job_ga_value", "trim|required");
    		$this->form_validation->set_rules("job_ga_noninteraction", "Job_ga_noninteraction", "trim|required");
    		$this->form_validation->set_rules("apply_ga_category", "Apply_ga_category", "trim|required");
    		$this->form_validation->set_rules("apply_ga_action", "Apply_ga_action", "trim|required");
    		$this->form_validation->set_rules("apply_ga_label", "Apply_ga_label", "trim|required");
    		$this->form_validation->set_rules("apply_ga_value", "Apply_ga_value", "trim|required");
    		$this->form_validation->set_rules("apply_ga_noninteraction", "Apply_ga_noninteraction", "trim|required");
		    */
        
        if ($this->form_validation->run()) {
        
            if ($id) {
                $this->model->update($_POST, $id);
            } else {
                $this->model->insert($_POST);
            }
            redirect($_SERVER['HTTP_REFERER']);
        }
        $this->template->build('job/edit', $data);
    }
    
    public function delete()
    {
        $id = $this->uri->segment(3);
        
        if ($id) {
            $this->load->model('Jobs', 'model');
            
            $this->model->delete($id);
        }
        
        redirect($_SERVER['HTTP_REFERER']);
    }
}