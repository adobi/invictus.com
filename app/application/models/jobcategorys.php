<?php 

if (! defined('BASEPATH')) exit('No direct script access');

class Jobcategorys extends MY_Model 
{
    protected $_name = "ic_job_category";
    protected $_primary = "id";
    
    public function isGraphicDesigner($category) 
    {
      if (!$category) return false;
      
      $c = $this->find($category);
      
      if (!$c) return false;
      //dump(preg_match('/(graphic|3d|3D|2d|2D|artist)/', strtolower($c->name))); die;
      return preg_match('/graphic|3d|3D|2d|2D|artist/', strtolower($c->name));
    }
}