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
    		$this->form_validation->set_rules("responsabilities[]", "Responsabilities", "trim|required");
    		$this->form_validation->set_rules("qualifications[]", "Qualification", "trim|required");
    		$this->form_validation->set_rules("skills[]", "Skills", "trim|required");
    		$this->form_validation->set_rules("offers[]", "We offer", "trim|required");
    		$this->form_validation->set_rules("available", "Available", "trim|required");

        $response = 'Saved';
        if ($this->form_validation->run()) {
        
            $_POST['description'] = $_POST['description'];
            $_POST['created'] = date('Y-m-d H:i:s', time());
            
            if ($id) {
                $this->model->update($_POST, $id);
            } else {
                $inserted = $this->model->insert($_POST);
            }
            
            $response = display_success('Saved');
            
            //redirect($_SERVER['HTTP_REFERER']);
        } else {
            if ($_POST)
              $response = display_errors(validation_errors());
        }

        if ($_POST && $this->input->is_ajax_request() && $response) {
          
            //$this->session->set_flashdata('message', $response); 
            echo $response;
            die;
        } 
        
        if (!$this->input->is_ajax_request()) {
          redirect('job');
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
        
        if (!$this->input->is_ajax_request()) {
          redirect('job');
        }
    }
    
    public function show()
    {
      $id = $this->uri->segment(3);
      
      $this->load->model('Jobs', 'model');
      
      $data['item'] = $this->model->find($id);
      
      $this->template->build('job/show', $data);
    }
    
    public function analytics()
    {
      $id = $this->uri->segment(3);
      
      $this->load->model('Jobs', 'model');
      
      $this->template->set_partial('job_analytics', '_partials/analytics', array('prefix'=>'job_')); 
      $this->template->set_partial('apply_analytics', '_partials/analytics', array('prefix'=>'apply_')); 
      
      $data['item'] = $this->model->find($id);
      
  		$this->form_validation->set_rules("job_ga_category", "Job category", "trim|required");
  		$this->form_validation->set_rules("job_ga_action", "Job action", "trim|required");
  		$this->form_validation->set_rules("job_ga_label", "Job label", "trim|required");
  		$this->form_validation->set_rules("job_ga_value", "Job value", "trim|required");
  		$this->form_validation->set_rules("apply_ga_category", "Apply category", "trim|required");
  		$this->form_validation->set_rules("apply_ga_action", "Apply action", "trim|required");
  		$this->form_validation->set_rules("apply_ga_label", "Apply label", "trim|required");
  		$this->form_validation->set_rules("apply_ga_value", "Apply value", "trim|required");
      
  		if ($this->form_validation->run()) {
  		  
  		  $this->model->update($_POST, $id);
  		  
  		  echo 'Saved'; die;
  		} else {
  		  if ($_POST) {
  		    
  		    echo validation_errors(); die;
  		  }
  		}
  		
      $this->template->build('job/analytics', $data);
    }
}