<?php 

if (! defined('BASEPATH')) exit('No direct script access');

//require_once 'MY_Controller.php';

class Offer extends MY_Controller 
{
    public function index() 
    {
        $data = array();
        
        $this->load->model('Offers', 'model');
        
        $data['items_current'] = $this->model->fetchCurrent(false);
        
        $data['items_old'] = $this->model->fetchOld();
        
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
            if ($this->upload->do_upload('image')) {
                
                if ($id) {
                    
                    $this->_deleteImage($id);
                }
                
                $_POST['image'] = $this->upload->file_name;
            }                    
            if ($id) {
                $this->model->update($_POST, $id);
            } else {
                $current = $this->model->fetchCurrent();
                
                if ($current)
                  $this->model->close($current[0]->id);
                
                $id = $this->model->insert($_POST);
            }
            
            $this->model->setupAnalytics($id);
            
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
    
    public function emails()
    {
      $data = array();
      
      $id = $this->uri->segment(3);
      $this->load->model('Emailoffers', 'model');
      
      $data['items'] = $this->model->fetchForOffer($id);
      
      $this->template->build('offer/emails', $data);
    }

    public function analytics()
    {
      $id = $this->uri->segment(3);
      
      $this->load->model('Offers', 'model');
      
      $this->template->set_partial('subscribe_analytics', '_partials/analytics', array('prefix'=>'')); 
      
      $data['item'] = $this->model->find($id);
      
  		$this->form_validation->set_rules("ga_category", "Category", "trim|required");
  		$this->form_validation->set_rules("ga_action", "Action", "trim|required");
  		$this->form_validation->set_rules("ga_label", "Label", "trim|required");
  		$this->form_validation->set_rules("ga_value", "Value", "trim|required");
  		
  		if ($this->form_validation->run()) {
  		  
  		  $this->model->update($_POST, $id);
  		  
  		  echo 'Saved'; die;
  		} else {
  		  if ($_POST) {
  		    
  		    echo validation_errors(); die;
  		  }
  		}
  		
      $this->template->build('offer/analytics', $data);
    }    
    
    public function delete()
    {
        $id = $this->uri->segment(3);
        
        if ($id) {
            $this->load->model('Offers', 'model');
            
            $this->_deleteImage($id, true);

            $this->model->delete($id);
            
            $this->session->set_flashdata('message', 'Deleted');
        }
        
        redirect($_SERVER['HTTP_REFERER']);
    }
    
    public function delete_image() 
    {
        $id = $this->uri->segment(3);
        
        if ($id) {
            
            $this->_deleteImage($id);
            
            $this->session->set_flashdata('message', 'Deleted');
        }
        
        echo display_success('Deleted');
        
        die;
        
        //redirect($_SERVER['HTTP_REFERER']);
    }  
    
    private function _deleteImage($id, $withRecord = false) 
    {
        $this->load->model('Offers', 'model');
        
        $item = $this->model->find($id);
        
        if ($item && $item->image) {
            $this->load->config('upload');
            
            @unlink($this->config->item('upload_path') . $item->image);
        }
        
        if (!$withRecord) {
            
            $this->model->update(array('image'=>null), $id);
        }
        
        return $withRecord ? $this->model->delete($id) : true;
    }      
}