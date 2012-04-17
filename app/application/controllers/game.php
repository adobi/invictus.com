<?php 

if (! defined('BASEPATH')) exit('No direct script access');

//require_once 'MY_Controller.php';

class Game extends MY_Controller 
{
    public function index() 
    {
        $data = array();
        
        $this->load->model('Games', 'model');
        
        $data['items'] = $this->model->fetchAllWithPlatforms();
        
        $this->load->model('Platforms', 'platform');
        $data['platforms'] = $this->platform->fetchAll();
        
        $this->template->build('game/index', $data);
    }
    /**
     * layout/right-side
     */
    public function all()
    {
        $data = array();
        
        $this->load->model('Games', 'model');
        
        $data['items'] = $this->model->fetchAllActiveWithPlatforms();
        
        $this->load->model('Platforms', 'platform');
        $data['platforms'] = $this->platform->fetchAll();        
        
        $this->template->build('game/all', $data);
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
    		$this->form_validation->set_rules("short_description", "Short_description", "trim|required");
    		$this->form_validation->set_rules("long_description", "Long_description", "trim|required");
    		//$this->form_validation->set_rules("facebook_app_id", "Facebook_app_id", "trim|required");
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
            
            //$platforms = $_POST['platforms'];
            
            //unset($_POST['platforms']);
            
            $hash = ''; $insertId = false;
            
            $this->load->model('Meta', 'meta');
            
            $meta = array(
                  'title'=>$_POST['name'], 
                  'og_url'=>base_url().'games/'.$_POST['url'],
            );
            
            if (isset($_POST['logo'])) {
              $meta['og_image'] = base_url().'uploads/original/'.$_POST['logo'];
            }
                
            if ($id) {
                
                $item = $this->model->find($id);
                
                $this->model->update($_POST, $id);
                
                $this->meta->update($meta, $item->meta_id);
                $hash = '#edit/'.$id;
                
            } else {
                $met['description'] = $_POST['name'] . ' the official game';
                $meta['keywords'] = 'invictus games, '.$_POST['name'];
                $meta['og_title'] = $_POST['name'];
                $meta['og_site_name'] = 'Invictus Games';
                $meta['og_type'] = 'game';

                $meta_id = $this->meta->insert($meta);
                
                $_POST['meta_id'] = $meta_id;
              
                $insertId = $this->model->insert($_POST);
                
                $hash = '#platforms/' . $insertId;
                
                $id = $insertId;
            }
            
            $this->model->setupAnalytics($id);
            
            $response = display_success('Saved');
        } else {
            $hash = '#edit/' . ($id ? $id : '');
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

      $this->load->model('Gameimages', 'images');
      
      $data['images'] = $this->images->fetchForGame($id);
      
      $this->template->build('game/images', $data);
    }
    
    public function videos() 
    {
      $id = $this->uri->segment(3);
      
      $this->load->model('Games', 'model');
      
      $data['item'] = $this->model->find($id);
      
      $this->load->model('Gamevideos', 'videos');
      
      $data['videos'] = $this->videos->fetchForGame($id);
      
      $this->template->build('game/videos', $data);
    }
    
    public function preview_video() 
    {
      echo embed_youtube($this->uri->segment(3));
      die;
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

            $this->session->set_flashdata('message', 'Deleted');
        }
        if ($this->input->is_ajax_request()) {
          die;
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
      
      $this->form_validation->set_rules('title', 'Title', 'trim|required');
      $this->form_validation->set_rules('description', 'Description', 'trim|required');
      $this->form_validation->set_rules('thumbnail', 'Thumbnail', 'trim|required');
      $this->form_validation->set_rules('link_text', 'Link text', 'trim|required');
      $this->form_validation->set_rules('link_url', 'Link url', 'trim|required');
      
      if ($this->form_validation->run()) {
        
        $_POST['thumbnail_name'] = $data['item']->logo;
        $_POST['image_name'] = $data['item']->teaser_image;
        $_POST['game_id'] = $data['item']->id;
        
        $res = $this->curl->simple_post(NEWS_API_URL, $_POST);
        //dump($res);
        //$this->session->set_flashdata('message', 'In game news created');
        echo display_success('In game news created');
        die;
      }
      
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
    
    public function layout()
    {
      $id = $this->uri->segment(3);
      
      if ($_POST) {
        $this->load->model('Games', 'model');
        
        $this->model->update($_POST, $id);
      }
      
      die;
    }
    
    public function update_layout_order()
    {
        if ($_POST && isset($_POST['order'])) {
            
            $this->load->model('Games', 'model');
            
            foreach ($_POST['order'] as $order => $id) {
              if ($id)
                $this->model->update(array($this->uri->segment(3)=>$order), $id);
            }
        }
        
        die;
    }  
    
    public function generate_analytics()
    {
      $this->load->model('Games', 'games');
      $games = $this->games->fetchAll();
      
      if ($games) {
        foreach ($games as $item) {
          $this->games->setupAnalytics($item->id);
        }
      }
      
      redirect($_SERVER['HTTP_REFERER']);
    }
    
    private function _deleteImage($id, $withRecord = false, $field = false) 
    {
        $this->load->model('Games', 'model');
        
        $item = $this->model->find($id);

        
        if ($withRecord) {
          $this->load->model('Meta', 'meta');
          $item = $this->model->find($id);
          $this->meta->delete($item->meta_id);          
          $this->model->delete($id);
        };
        
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
        
        return true;
    } 

}