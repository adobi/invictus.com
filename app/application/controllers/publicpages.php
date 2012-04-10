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
    $this->data['current_offer'] = $this->offers->fetchCurrent();

    /**
     * slider
     */
    $this->load->model('Games', 'games');
    $this->data['carousel'] = $this->games->fetchForLayout('on_mainpage');
    
    /**
     * about
     */
    $this->load->model('Pages', 'pages');
    $this->data['about'] = $this->pages->findBy('name', 'About');
    
    $this->template->build('invictus/index', $this->data);
  }
  
  public function missing()
  {
    $this->template->build('invictus/error', $this->data);
  }
  
  public function contact()
  {
    
    $this->load->model('Contacts', 'model');
    $this->load->model('Contacttypes', 'types');
    
    $this->data['contacts'] = $this->model->fetchAll();
    $this->data['emails'] = $this->types->fetchAll(array('order'=>array('by'=>'order', 'dest'=>'asc')));    
    
    $this->data['send_ga'] = $this->model->getAnalytics();
    
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
        
        $message = $_POST['message'];
        $subject = $_POST['subject'];
        
        if (ENVIRONMENT === 'production') {
          $this->email->send();
          
          $reply = "Hi,

Your message with the following subject has been forwarded to the relevant people of Invictus Games.

Department: $dest->name
Subject: $subject
Message: $message";
          $reply .= "
          
Thank a lot for contacting Invictus Games Ltd. Due to our tight schedule, we assume to respond to your inquiry in 72 hours. Thanks a lot for your patience.

Best regards,
Invictus Games Support Team";
          
          //$config['mailtype'] = 'html';
          
          //$this->email->initialize($config);
          $this->email->from('noreply@invictus.com');
          $this->email->to($_POST['email']);
          //$this->email->cc('hello.attila@gmail.com');
          
          $this->email->subject('Your Invictus inquiry');
          $this->email->message(($reply));
          
          $this->email->send();

        }
        
        $this->load->model('Contactmessages', 'messages');
        
        $_POST['created'] = date('Y-m-d H:i:s');
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
      
      $this->data['job'] = $this->model->findBy('url', $this->uri->segment(3));
      
      if (!$this->data['job'] || !$this->data['job']->is_active) {
        redirect('missing');
      }
    }
    
    $this->load->model('Jobcategorys', 'category');
    $this->data['job']->is_graphic_designer = $this->category->isGraphicDesigner($this->data['job']->category_id);
    
    $this->form_validation->set_rules('firstname', 'First name', 'trim|required');
    $this->form_validation->set_rules('lastname', 'Last name', 'trim|required');
    $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
    $this->form_validation->set_rules('phone', 'Phone', 'trim|required');
    
    $this->data['error'] = '';
    $this->data['hash'] = false;
    $this->data['was_error'] = false;
    if ($this->form_validation->run()) {
      if ($this->upload->do_upload('cv')) {
          
          $_POST['cv'] = $this->upload->file_name;
      } else {
        $this->data['was_error'] = true;
        $this->data['hash'] = '#job-application-form';
      
        $this->data['error'] .= $this->upload->display_errors();
      }     

      if ($this->upload->do_upload('portfolio')) {
          
          $_POST['portfolio'] = $this->upload->file_name;
      }    
      
      if (!$this->data['error']) {
        $this->load->model('Jobapplications', 'application');
        
        $_POST['created'] = date('Y-m-d H:i:s', time());
        
        $this->application->insert($_POST);
        
        $this->session->set_flashdata("message", '<p>Thanks for your application. We will contact You soon!</p>');
        if (ENVIRONMENT === 'production') {
          $this->load->library('email');
          $firstname = $_POST['firstname'];
          $lastname = $_POST['lastname'];
          $position = $this->data['job']->name;
          
          $reply = "Hi $firstname $lastname 

  Thanks a lot for applying for the $position position. Should your application be succesful, we'll contact you in 2 weeks.


  Best regards,
  Invictus HR team
  ";
          $this->email->from('noreply@invictus.com');
          $this->email->to($_POST['email']);
          
          $this->email->subject('Your Invictus inquiry');
          $this->email->message(($reply));
          
          $this->email->send();    
        }
        redirect($_SERVER['HTTP_REFERER']);
      }
      
    } else {
      if ($_POST) {
          
        $this->data['error'] .= validation_errors();
        
        if ($_FILES && isset($_FILES['cv']) && !$_FILES['cv']['name'])
          $this->data['error'] .= 'The CV field is required';
        
        $this->data['was_error'] = true;
        $this->data['hash'] = '#job-application-form';
      }
    }

    $this->template->build('invictus/jobs', $this->data);
  } 
  
  public function subscribe()
  {
    $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
    if ($this->form_validation->run()) {
      $this->load->model('Emailoffers', 'emails');
      $this->load->model('Offers', 'offers');
      
      $current = $this->offers->fetchCurrent();
      
      if ($current) {
        
        if ($this->emails->emailExists($_POST['email'], $current->id)) {
          //echo "This is email is already subscribed";
          echo json_encode(array('success'=>false, 'message'=>'This is email is already subscribed'));
        } else {
          
          $_POST['offer_id'] = $current->id;
          $this->emails->insert($_POST);
          //echo "Thank You for the subscription";
          echo json_encode(array('success'=>true, 'message'=>'Thank You for the subscription'));
        }
      }
    } else {
      echo json_encode(array('success'=>false, 'message'=>validation_errors()));
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
      
      if ($this->uri->segment(3) && $this->uri->segment(3) === 'short') {
        $allInfo = false;
        $view = 'game_short';
      } else {
        $allInfo = true;
        $view = 'game';
      }
      
      $this->data['game'] = $this->games->fetchByUrl($url, $allInfo);
      
      if (!$this->data['game']) {
        $view = 'error';
      }
      
      //dump($this->data['game']); die;
    }
    
    //dump($url !== 'all' && (!$this->data['game'] || !$this->data['game']->is_active)); die;
    if ($url !== 'all' && (!$this->data['game'] || !$this->data['game']->is_active)) {
      redirect('missing');
    }    
    
    $this->template->build('invictus/'.$view, $this->data);
  }
  
  public function video()
  {
    echo embed_youtube($this->uri->segment(3), false, 770, 510);
    die;
  }
}