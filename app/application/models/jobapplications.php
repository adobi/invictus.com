<?php 

if (! defined('BASEPATH')) exit('No direct script access');

class Jobapplications extends MY_Model 
{
    protected $_name = "ic_job_application";
    protected $_primary = "id";
    
    public function fetchForJob($id)
    {
      if (!$id) return false;
      
      return $this->fetchRows(array('where'=>array('job_id'=>$id), 'order'=>array('by'=>'created', 'dest'=>'desc')));
    }
    
    public function fetchNewTalents()
    {
      return $this->fetchRows(array('where'=>array('job_id is null'=>null), 'order'=>array('by'=>'created', 'dest'=>'desc')));
    }    
}