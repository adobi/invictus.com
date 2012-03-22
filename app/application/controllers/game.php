<?php 

if (! defined('BASEPATH')) exit('No direct script access');

//require_once 'MY_Controller.php';

class Game extends MY_Controller 
{
    public function index() 
    {
        $data = array();
        
        $this->load->model('Games', 'model');
        
        $data['items'] = $this->model->fetchAll();
        
        $this->template->build('game/index', $data);
    }
    
    public function edit() 
    {
        $data = array();
        
        $id = $this->uri->segment(3);
        
        $this->load->model('Games', 'model');
        //$this->load->model('Platforms', 'platform');
        //$this->load->model('Gameplatforms', 'game_platforms');
        
        //$data['platforms'] = $this->platform->toAssocArray('id', 'name', $this->platform->fetchAll());
        $item = false;
        if ($id) {
            $item = $this->model->find((int)$id);
        }
        $data['item'] = $item;

        //$data['game_platforms'] = $item ? $this->game_platforms->fetchIdsForGame($item->id) : false;
        
        
    		$this->form_validation->set_rules("name", "Name", "trim|required");
    		$this->form_validation->set_rules("released", "Released", "trim|required");
    		//$this->form_validation->set_rules("short_description", "Short_description", "trim|required");
    		//$this->form_validation->set_rules("long_description", "Long_description", "trim|required");
    		$this->form_validation->set_rules("facebook_app_id", "Facebook_app_id", "trim|required");
    		$this->form_validation->set_rules("twitter_page", "Twitter_page", "trim|required");
    		$this->form_validation->set_rules("facebook_page", "Facebook_page", "trim|required");

        if ($this->form_validation->run()) {
            
            if ($this->upload->do_upload('logo')) {
                
                if ($id) {
                    
                    $this->_deleteImage($id, false, 'logo');
                }
                
                $_POST['logo'] = $this->upload->file_name;
            }          
            if ($this->upload->do_upload('hero_image')) {
                
                if ($id) {
                    
                    $this->_deleteImage($id, false, 'hero_image');
                }
                
                $_POST['hero_image'] = $this->upload->file_name;
            }            
            if ($this->upload->do_upload('teaser_image')) {
                
                if ($id) {
                    
                    $this->_deleteImage($id, false, 'teaser_image');
                }
                
                $_POST['teaser_image'] = $this->upload->file_name;
            }            
            
            $this->load->library('Sanitizer', 'sanitizer');
            
            $_POST['url'] = $this->sanitizer->sanitize_title_with_dashes($_POST['name']);        
            
            $platforms = $_POST['platforms'];
            
            unset($_POST['platforms']);
            
            $hash = ''; $insertId = false;
            if ($id) {
                $this->model->update($_POST, $id);
            } else {
                $this->load->model('Meta', 'meta');
                
                $meta_id = $this->meta->insert(array(
                  'title'=>$_POST['name'], 
                  'description'=>$_POST['name'] . ' the official game',
                  'keywords'=> 'invictus games, '.$_POST['name'],
                  'og_title'=>$_POST['name'], 
                  'og_url'=>'http://invictus.com/games/'.$_POST['url'],
                  'og_image'=>'http://invictus.com/uploads/original/'.$_POST['logo'],
                  'og_site_name'=>'Invictus Games', 
                  'og_type'=>'game'
                ));
                
                $_POST['meta_id'] = $meta_id;
              
                $insertId = $this->model->insert($_POST);
                
                $hash = '#images/' . $insertId;
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
          redirect('game'.$hash);
        }

        $this->template->build('game/edit', $data);
    }
    
    public function platforms() 
    {
        $data = array();
        
        $id = $this->uri->segment(3);
        
        $this->load->model('Games', 'model');
        $this->load->model('Platforms', 'platform');
        $this->load->model('Gameplatforms', 'game_platforms');
        
        $data['platforms'] = $this->platform->toAssocArray('id', 'name', $this->platform->fetchAll());

        $item = $this->model->find((int)$id);
      
        $data['item'] = $item;

        $data['game_platforms'] = $item ? $this->game_platforms->fetchForGame($item->id) : false;
        //dump($data['game_platforms']); die;
        /*
        if ($_POST) {

          $this->game_platforms->deleteByGame($id);
          
          $this->game_platforms->insertPlatformsForGame($id, $platforms);      
        }
        */

        $this->template->build('game/platforms', $data);
    }
    
    public function images() 
    {
      $id = $this->uri->segment(3);
      
      $this->load->model('Games', 'model');
      
      $data['item'] = $this->model->find($id);
      
      if ($_POST) {
        redirect('game'.'#videos/'.$data['item']->id);
      }
      
      $this->template->build('game/images', $data);
    }
    
    public function videos() 
    {
      $id = $this->uri->segment(3);
      
      $this->load->model('Games', 'model');
      
      $data['item'] = $this->model->find($id);
      
      $this->template->build('game/videos', $data);
    }


    public function analytics()
    {
      $id = $this->uri->segment(3);
      
      $this->load->model('Games', 'model');
      
      $this->template->set_partial('game_analytics', '_partials/analytics', array('prefix'=>'')); 
      
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
  		
      $this->template->build('game/analytics', $data);
    }  
    
    public function seo() 
    {
      $id = $this->uri->segment(3);
      
      $this->load->model('Games', 'model');
      
      $this->load->model('Meta', 'meta');
      
      $item = $this->model->find($id);
      
      $data['game'] = $item;
      
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
      
      $this->template->build('game/seo', $data);
    }    
    
    public function delete()
    {
        $id = $this->uri->segment(3);
        
        if ($id) {
            $this->load->model('Games', 'model');
            
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
            
            $this->_deleteImage($id, false, $this->uri->segment(4));
            
            $this->session->set_flashdata('message', 'Deleted');
        }
        
        echo display_success('Deleted');
        
        die;
        
        //redirect($_SERVER['HTTP_REFERER']);
    }  
    
    public function publish_to_news()
    {
      $id = $this->uri->segment(3);
      
      $this->load->model('Games', 'model');
            
      $data['item'] = $this->model->find($id);
      
      $this->template->build('game/publish_to_news', $data);
    }

    public function publish_to_press()
    {
      $id = $this->uri->segment(3);
      
      $this->load->model('Games', 'model');
            
      $data['item'] = $this->model->find($id);
            
      $this->template->build('game/publish_to_press', $data);
    }
    
    public function publish_to_microsite()
    {
      $id = $this->uri->segment(3);
      
      $this->load->model('Games', 'model');
            
      $data['item'] = $this->model->find($id);
            
      $this->template->build('game/publish_to_microsite', $data);
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
      
      $this->load->model('Games', 'model');
      
      echo $this->model->$action($id);
      
      die;
    }    
    
    public function upload_image() 
    {
      
      //dump($_FILES); die;
      
	  	if ($this->upload->do_upload('userfile')) {
	  	    
	  	    $this->load->config('upload');
	  	    
	  	    $data = $this->upload->data();

          //$this->load->model('Images', 'model');
          /*
          $inserted = $this->model->insert(array(
              'site_id'=>$this->uri->segment(3),
              'image'=>$data['file_name']
          ));
          */
  	      $inserted = 1;
          $info->name = $data['file_name'];
          $info->size = $data['file_size'];
          $info->type = $data['file_type'];
          $info->url = base_url() . 'uploads/original/' .$data['file_name'];
          $info->thumbnail_url = base_url() . 'uploads/original/' .$data['file_name'];
          $info->delete_url = base_url().'microsite/delete/'.$inserted;
          $info->delete_type = 'DELETE';	 
          
          if ($this->input->is_ajax_request()) {
              echo json_encode(array($info));
          } 
	  	}
	  	
      die;
    }
    
    
    private function _deleteImage($id, $withRecord = false, $field = false) 
    {
        $this->load->model('Games', 'model');
        
        $item = $this->model->find($id);
        
        $this->load->config('upload');
        
        if ($item && $field && $item->$field) {
            
            @unlink($this->config->item('upload_path') . $item->$field);
        }
        
        if (!$withRecord) {
            
            $this->model->update(array($field=>null), $id);
        } else {
          @unlink($this->config->item('upload_path') . $item->logo);
          @unlink($this->config->item('upload_path') . $item->hero_image);
          @unlink($this->config->item('upload_path') . $item->teaser_image);
        }
        
        if ($withRecord) {
          $this->load->model('Meta', 'meta');
          $item = $this->model->find($id);
          $this->meta->delete($item->meta_id);          
          $this->model->delete($id);
        };
        
        return true;
    } 

}