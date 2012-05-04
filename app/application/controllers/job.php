<?php 

if (! defined('BASEPATH')) exit('No direct script access');

//require_once 'MY_Controller.php';

class Job extends MY_Controller 
{
    public function index() 
    {
        $data = array();
        
        $this->load->model('Jobs', 'model');
        
        $data['job_items'] = $this->model->fetchAllWithApplicationCount();
        
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

        $response = array();
        if ($this->form_validation->run()) {
          
          //dump($_POST); die;

            $this->load->library('Sanitizer', 'sanitizer');
            
            $_POST['url'] = $this->sanitizer->sanitize_title_with_dashes($_POST['name']);        
            
          
            $_POST['description'] = $_POST['description'];
            $_POST['created'] = date('Y-m-d H:i:s', time());
            
            if ($id) {
                $this->model->update($_POST, $id);
            } else {
                $inserted = $this->model->insert($_POST);
                
                $id = $inserted;
            }
            
            $this->model->setupAnalytics($id);
            
            $response['message'] = display_success('Saved');
            $response['success'] = true;
            //redirect($_SERVER['HTTP_REFERER']);
        } else {
            if ($_POST) {
              
              $response['message'] = display_errors(validation_errors());
              $response['error'] = true;
            }
        }

        if ($_POST && $this->input->is_ajax_request()) {
          
            //$this->session->set_flashdata('message', $response); 
            echo json_encode($response);
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
    
    public function applications()
    {
      $data = array();
      
      $id = $this->uri->segment(3);
      
      $this->load->model('Jobapplications', 'model');
      $this->load->model('Jobs', 'jobs');
      
      $data['item'] = $this->jobs->find($id);
      
      $data['items'] = $this->model->fetchForJob($id);
      
      $this->template->build('job/applications', $data);
    }
    
    public function show_first()
    {
      $id = $this->uri->segment(3);
      
      if ($id) {
        $this->load->model('Jobs', 'model');
        
        $item = $this->model->find($id, true);
        
        if ($item) {
          $this->model->update(array('is_first'=>null), false);
          
          $this->model->update(array('is_first'=>1), $id);
        }
      }
      
      die;redirect($_SERVER['HTTP_REFERER']);
    }
    
    public function remove_first() 
    {
      $id = $this->uri->segment(3);
      
      if ($id) {
        $this->load->model('Jobs', 'model');
        
        $item = $this->model->find($id, true);
        
        if ($item) {
          
          $this->model->update(array('is_first'=>null), $id);
        }
      }
      
      die; redirect($_SERVER['HTTP_REFERER']);
    }
    
    /**
     * activate/inactivate
     *
     * @return void
     * @author Dobi Attila
     */
    public function action()
    {
      $action = $this->uri->segment(3);
      $id = $this->uri->segment(4);
      
      $this->load->model('Jobs', 'model');
      
      echo $this->model->$action($id);
      
      //redirect($_SERVER['HTTP_REFERER']);//die;
      die;
    }     
}