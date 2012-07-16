<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Updater
{
  protected $_ci;
  protected $_uri;
  protected $_secret;
  
  
  public function __construct()
  {
    $this->_ci = & get_instance();
  }
  
  public function setUri($uri) 
  {
    if ($uri) $this->_uri = $uri;
    
    return $this;
  }
  
  public function setSecret($secret) 
  {
    if ($secret) $this->_secret = $secret;
    
    return $this;
  }
  
  public function update()
  {
    
    //phpinfo(); die;
    
    $key = md5(microtime());
    
    $hash = md5($this->_secret . $key);
    
    $this->_uri .= $hash . '/' . $key;
    
    ini_set('max_execution_time', 300);
    $res = false;
    //$res = $this->_ci->curl->simple_get($this->_uri);
    
    //file_get_contents($this->_uri);
    
    //$this->cliUpdate();
    
    return $res;
    
    //dump($res); die;
  }
  
  public function cliUpdate()
  {
    if ($_SERVER['HTTP_HOST'] === 'localhost') {
      
      $cmd = 'f:/wamp/bin/php/php5.3.8/php.exe '.dirname($_SERVER['SCRIPT_FILENAME']).'/crosspromo_update.php';
    } else {
      $cmd = 'php '.dirname($_SERVER['SCRIPT_FILENAME']).'/crosspromo_update.php';
    }
    //echo $cmd;
    $res = `$cmd`;
    
    //dump($res); die;
  }
}