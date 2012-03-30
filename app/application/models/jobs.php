<?php 

if (! defined('BASEPATH')) exit('No direct script access');

class Jobs extends MY_Model 
{
    protected $_name = "ic_job";
    protected $_primary = "id";
    
    public function insert($data)
    {
      if (!$data) return false;
     
      $d = array();
          
      $d['responsabilities'] = $data['responsabilities'];
      unset($data['responsabilities']);
      $d['qualifications'] = $data['qualifications'];
      unset($data['qualifications']);
      $d['skills'] = $data['skills'];
      unset($data['skills']);
      $d['offers'] = $data['offers'];
      unset($data['offers']);      
       
      $inserted = parent::insert($data);
            
      $this->load->model('Jobresponsabilitys', 'responsabilities');
      $this->load->model('Jobqualifications', 'qualifications');
      $this->load->model('Jobskills', 'skills');
      $this->load->model('Joboffers', 'offers');  
      
      foreach ($d as $key=>$val) {
        foreach ($val as $k=>$v) {
          $this->$key->insert(array('description'=>$v, 'job_id'=>$inserted));
        }
      }
      
      return $inserted;
    }
    
    public function update($data, $id) 
    {
      $d = array();
      if (isset($data['responsabilities']) && isset($data['qualifications']) && isset($data['skills']) && isset($data['offers'])) {
          
        $d['responsabilities'] = $data['responsabilities'];
        unset($data['responsabilities']);
        $d['qualifications'] = $data['qualifications'];
        unset($data['qualifications']);
        $d['skills'] = $data['skills'];
        unset($data['skills']);
        $d['offers'] = $data['offers'];
        unset($data['offers']);      
         
      }
      $rows = parent::update($data, $id);

      if ($d) {
        
        $this->load->model('Jobresponsabilitys', 'responsabilities');
        $this->load->model('Jobqualifications', 'qualifications');
        $this->load->model('Jobskills', 'skills');
        $this->load->model('Joboffers', 'offers');  
        
        foreach ($d as $key=>$val) {
          $this->$key->delete(array('job_id'=>$id));
          foreach ($val as $k=>$v) {
            $this->$key->insert(array('description'=>$v, 'job_id'=>$id));
          }
        }      
        
      }
      return $rows;
    }
    
    public function delete($id)
    {
      $rows = parent::delete($id);
      
      $this->load->model('Jobresponsabilitys', 'responsabilities');
      $this->load->model('Jobqualifications', 'qualifications');
      $this->load->model('Jobskills', 'skills');
      $this->load->model('Joboffers', 'offers'); 
      
      $this->responsabilities->delete(array('job_id'=>$id));      
      $this->qualifications->delete(array('job_id'=>$id));
      $this->skills->delete(array('job_id'=>$id));
      $this->offers->delete(array('job_id'=>$id));
      
      return $rows;
    }
    
    public function find($id, $onlyJob=false)
    {
      $item = parent::find($id);
      
      if ($onlyJob) return $item;
      
      $this->load->model('Jobresponsabilitys', 'responsabilities');
      $this->load->model('Jobqualifications', 'qualifications');
      $this->load->model('Jobskills', 'skills');
      $this->load->model('Joboffers', 'offers'); 
      
      $item->responsabilities = $this->responsabilities->fetchRows(array('where'=>array('job_id'=>$id)));
      $item->qualifications = $this->qualifications->fetchRows(array('where'=>array('job_id'=>$id)));
      $item->skills = $this->skills->fetchRows(array('where'=>array('job_id'=>$id)));
      $item->offers = $this->offers->fetchRows(array('where'=>array('job_id'=>$id)));
      
      return $item;
    }
    
    public function findBy($prop, $value) 
    {
      $item = parent::findBy($prop, $value);
      
      return $item ? $this->find($item->id) : false;
    }
    
    public function fetchAllWithApplicationCount()
    {
      return $this->execute("select j.*, c.icon as category_icon, c.name as category_name, (select count(id) from ic_job_application where job_id = j.id) as applications from $this->_name as j join ic_job_category c on j.category_id = c.id");
    }
    
    public function fetchAllJobsByCategory() 
    {
      $this->load->model('Jobcategorys', 'category');
      
      $categories = $this->category->fetchAll();
      
      if (!$categories) return false;
      
      $result = array();
      foreach ($categories as $category) {
        $jobs = $this->fetchBy('category_id', $category->id);
        if ($jobs) {
          $item = array('category'=>$category);
          foreach ($jobs as $job) {
            $job = $this->find($job->id, true);
            $item['jobs'][] = $job;
          }
          $result[] = $item;
        }
      }
      
      //dump($result); die;
      
      return $result;
    }
    
    public function fetchLatestJob()
    {
      $result = $this->fetchAll(array('order'=>array('by'=>'available', 'dest'=>'desc'), 'limit'=>1, 'offset'=>0), true);
      
      return $result ? $this->find($result->id) : false; 
    }
}