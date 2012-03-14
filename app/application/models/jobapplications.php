<?php 

if (! defined('BASEPATH')) exit('No direct script access');

class Jobapplications extends MY_Model 
{
    protected $_name = "ic_job_application";
    protected $_primary = "id";
    
    public function fetchForJob($id)
    {
      if (!$id) return false;
      
      return $this->fetchRows(array('where'=>array('job_id'=>$id)));
    }
}