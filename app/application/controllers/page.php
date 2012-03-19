<?php 

if (! defined('BASEPATH')) exit('No direct script access');

//require_once 'MY_Controller.php';

class Page extends MY_Controller 
{
    public function index() 
    {
        $data = array();
        
        $this->load->model('Pages', 'model');
        
        $data['items'] = $this->model->fetchAll();
        
        $this->template->build('page/index', $data);
    }
    
    public function edit() 
    {
        $data = array();
        
        $id = $this->uri->segment(3);
        
        $this->load->model('Pages', 'model');
        
        $item = false;
        if ($id) {
            $item = $this->model->find((int)$id);
        }
        $data['item'] = $item;
        
        $this->form_validation->set_rules("title", "Title", "trim");
        $this->form_validation->set_rules("name", "Name", "trim|required");
    		$this->form_validation->set_rules("description", "Description", "trim");
    
        if ($this->form_validation->run()) {
          
            $this->load->library('Sanitizer', 'sanitizer');
            
            $_POST['url'] = $this->sanitizer->sanitize_title_with_dashes($_POST['name']);
          
            if ($id) {
                $this->model->update($_POST, $id);
            } else {
                $this->load->model('Meta', 'meta');
                
                $meta_id = $this->meta->insert(array('title'=>$_POST['title'], 'og_title'=>$_POST['title'], 'og_site_name'=>'Invictus Games', 'og_type'=>'game'));
                
                $_POST['meta_id'] = $meta_id;
              
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
        
        $this->template->build('page/edit', $data);
    }

    public function analytics()
    {
      $id = $this->uri->segment(3);
      
      $this->load->model('Pages', 'model');
      
      $this->template->set_partial('page_analytics', '_partials/analytics', array('prefix'=>'')); 
      
      $data['item'] = $this->model->find($id);
      
  		$this->form_validation->set_rules("ga_category", "Page category", "trim|required");
  		$this->form_validation->set_rules("ga_action", "Page action", "trim|required");
  		$this->form_validation->set_rules("ga_label", "Page label", "trim|required");
  		$this->form_validation->set_rules("ga_value", "Page value", "trim|required");
      
  		if ($this->form_validation->run()) {
  		  
  		  $this->model->update($_POST, $id);
  		  
  		  echo 'Saved'; die;
  		} else {
  		  if ($_POST) {
  		    
  		    echo validation_errors(); die;
  		  }
  		}
  		
      $this->template->build('page/analytics', $data);
    }  
    
    public function seo() 
    {
      $id = $this->uri->segment(3);
      
      $this->load->model('Pages', 'model');
      
      $this->load->model('Meta', 'meta');
      
      $item = $this->model->find($id);
      
      $data['page'] = $item;
      
      $data['item'] = false;
      if ($item && $item->meta_id) {
        $data['item'] = $this->meta->find($item->meta_id);
      }
      
      $this->form_validation->set_rules("title", "Title", "trim|required");
  		$this->form_validation->set_rules("description", "Description", "trim|required");
  		$this->form_validation->set_rules("keywords", "Keywords", "trim|required");
      
      if ($this->form_validation->run()) {
        if ($item && $item->meta_id) {
          $this->meta->update($_POST, $item->meta_id);
        }
  		  
  		  echo 'Saved'; die;
      } else {
  		  if ($_POST) {
  		    
  		    echo validation_errors(); die;
  		  }
  		}
      
      $this->template->build('page/seo', $data);
    }
    
    public function delete()
    {
        $id = $this->uri->segment(3);
        
        if ($id) {
            $this->load->model('Pages', 'model');
            
            $this->model->delete($id);
        }
        
        redirect($_SERVER['HTTP_REFERER']);
    }
}