<?php 

if (! defined('BASEPATH')) exit('No direct script access');

require_once(APPPATH.'core/Page_Controller'.EXT);

class Publicpages extends Page_Controller 
{
  public function __construct()
  {
    parent::__construct();
  }
  
  public function index()
  {
    /**
     * current offer
     */
    $this->load->model('Offers', 'offers');
    $this->data['current_offer'] = current($this->offers->fetchCurrent());

    /**
     * slider
     */
    $this->load->model('Games', 'games');
    $this->data['carousel'] = $this->games->fetchForLayout('on_mainpage');
    
    $this->template->build('invictus/index', $this->data);
  }
  
  public function contact()
  {
    
    $this->load->model('Contacts', 'model');
    $this->load->model('Contacttypes', 'types');
    
    $this->data['contacts'] = $this->model->fetchAll();
    $this->data['emails'] = $this->types->fetchAll(array('order'=>array('by'=>'order', 'dest'=>'asc')));    
    
    $this->template->build('invictus/contact', $this->data);
  }
  
  public function send()
  {
    $this->form_validation->set_rules('email_id', 'To', 'trim|required');
    $this->form_validation->set_rules('subject', 'Subject', 'trim|required');
    $this->form_validation->set_rules('email', 'Eamil', 'trim|required|valid_email');
    $this->form_validation->set_rules('message', 'Message', 'trim|required');
    
    if ($this->form_validation->run()) {
      
      $this->load->model('Contacttypes', 'email');
      
      $dest = $this->email->find($_POST['email_id']);
      
      if ($dest) {
        
        $this->load->library('email');
        
        $this->email->from($_POST['email']);
        $this->email->to($dest->email);
        $this->email->cc('hello.attila@gmail.com');
        
        $this->email->subject($_POST['subject']);
        $this->email->message($_POST['message']);
        
        //$this->email->send();
        
        $this->load->model('Contactmessages', 'messages');
        
        $this->messages->insert($_POST);
        
        echo json_encode(array('success'=>true, 'message'=>'Thank You! The message was sent.'));
        
      }
      
    } else {
      echo json_encode(array('success'=>false, 'message'=>validation_errors()));
    }
    
    die;
  }
  
  public function jobs()
  {
    $this->load->model('Jobs', 'model');
    
    $this->data['jobs'] = $this->model->fetchAllJobsByCategory();    

    if (!$this->uri->segment(3)) {
      
      $this->data['job'] = $this->model->fetchLatestJob();
      
    } else {
      
      $this->data['job'] = $this->model->find($this->uri->segment(3));
    }
  
    $this->template->build('invictus/jobs', $this->data);
  } 
  
  public function subscribe()
  {
    $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
    if ($this->form_validation->run()) {
      $this->load->model('Emailoffers', 'emails');
      $this->load->model('Offers', 'offers');
      
      $current = current($this->offers->fetchCurrent());
      
      if ($current) {
        
        if ($this->emails->emailExists($_POST['email'])) {
          echo "This is email is already subscribed";
        } else {
          
          $_POST['offer_id'] = $current->id;
          $this->emails->insert($_POST);
          echo "Thank You for the subscription";
        }
      }
    } else {
      echo validation_errors();
    }
    
    die;
  }
  
  public function game() 
  {
    $url = $this->uri->segment(2) ? $this->uri->segment(2) : 'all';
    
    $this->load->model('Games', 'games');
    
    if ($url === 'all') {
      $this->load->model('Platforms', 'platforms');
      
      $this->data['platforms'] = $this->platforms->fetchAll();
      
      $this->data['games'] = $this->games->fetchAllActiveWithPlatforms();
      
      $this->data['game'] = $this->games->fetchLastReleased();
      
      $view = 'games';
    } else {
      
      $this->data['game'] = $this->games->fetchByUrl($url);
      
      if ($this->uri->segment(3) && $this->uri->segment(3) === 'short') {

        $view = 'game_short';
      } else {
        
        $view = 'game';
      }
    }
    
    $this->template->build('invictus/'.$view, $this->data);
  }
}